//https://8bitworkshop.com/v3.9.0/?platform=verilog-vga&file=starfield.v#
`include "hvsync_generator.sv"
`include "lfsr.sv"
`include "power_on_reset.sv"

module top #(parameter VGA_BITS = 8) (
  input CLOCK_50, // 50MHz
  output [9:0] LEDR,
  output [VGA_BITS-1:0] VGA_R, VGA_G, VGA_B,
  output VGA_HS, VGA_VS,
  output reg VGA_CLK,
  output VGA_BLANK_N, VGA_SYNC_N);

  always@(posedge CLOCK_50)
    VGA_CLK = ~VGA_CLK;

  wire RESET;
  power_on_reset por(VGA_CLK, RESET);

  wire [2:0] RGB;
  starfield_top(VGA_CLK, RESET, VGA_HS, VGA_VS, RGB);
  assign VGA_R = {VGA_BITS{RGB[2]}};
  assign VGA_G = {VGA_BITS{RGB[1]}};
  assign VGA_B = {VGA_BITS{RGB[0]}};

  assign VGA_BLANK_N = 1'b1;
  assign VGA_SYNC_N  = 1'b0;
endmodule

/*
Bouncing QR code module - makes the QR code float around the screen
*/
module bouncing_qr #(
  parameter H_RESOLUTION    = 640,
  parameter V_RESOLUTION    = 480,
  parameter QR_CODE_SIZE    = 54
)(
  input     visual_clk,
  input  reg [9:0] CounterX , CounterY,
  output reg [9:0] x_ball, y_ball);

  localparam x_max = H_RESOLUTION - QR_CODE_SIZE; 
  localparam x_min = 0;
  
  localparam y_max = V_RESOLUTION - QR_CODE_SIZE;
  localparam y_min = 0;

  reg incr_x, incr_y; // reg to hold the state (1 increment, 0 decrement)
  reg [31:0] reg_x = 31'd0;
  reg [31:0] reg_y = 31'd0;
  
  assign x_ball = reg_x;
  assign y_ball = reg_y;

  always @(posedge visual_clk) begin
    if (incr_x) // Increment in H_RESOLUTION (Horizontal) 
      if (reg_x >= x_max) 
        incr_x <=0;
      else
        reg_x <= reg_x + 1;
    else
      if (reg_x <= x_min) 
        incr_x <=1;
      else 
        reg_x <= reg_x - 1;    
    if(incr_y) // Increment in V_RESOLUTION (Vertical)
      if (reg_y >= y_max)  
        incr_y <=0;
      else 
        reg_y <= reg_y + 1;
    else      
      if (reg_y <= y_min) 
        incr_y <= 1;
      else 
        reg_y <= reg_y - 1;    
  end
endmodule

/*
Scrolling starfield generator with floating QR code overlay.
*/

module starfield_top(clk, reset, hsync, vsync, rgb);

  input clk, reset;
  output hsync, vsync;
  output [2:0] rgb;
  wire display_on;
  wire [9:0] hpos;
  wire [9:0] vpos;
  wire [15:0] lfsr;

  // QR code parameters
  localparam QR_SIZE = 54;
  localparam WAIT_TIME = 1350000; // Controls QR code movement speed

  hvsync_generator hvsync_gen(
    .clk(clk),
    .reset(reset),
    .hsync(hsync),
    .vsync(vsync),
    .display_on(display_on),
    .hpos(hpos),
    .vpos(vpos)
  );
  
  // enable LFSR only in 512x512 area
  wire star_enable = !hpos[9] & !vpos[9];
  
  // LFSR with period = 2^16-1 = 256*256-1
  LFSR #(16'b1000000001011,0) lfsr_gen(
    .clk(clk),
    .reset(reset),
    .enable(star_enable),
    .lfsr(lfsr));

  wire star_on = &lfsr[15:9]; // all 7 bits must be set
  wire [2:0] star_rgb = display_on && star_on ? lfsr[2:0] : 3'b000;

  // QR code display logic
  reg [26:0] QR_code [0:26];
  wire [26:0] QR_line;
  reg vga_QR;
  reg [9:0] qr_x, qr_y, top_left_x, top_left_y;
  reg [23:0] clockCounter = 0;
  reg visual_clk;
  
  // Load QR code from binary file
  initial 
    $readmemb("qr_code.bin", QR_code);

  assign QR_line = QR_code[top_left_x>>1];
  wire QR_pixel = ~QR_line[top_left_y>>1];

  // Clock divider for QR code movement
  always @(posedge clk) begin
    clockCounter <= clockCounter + 1;
    if (clockCounter == WAIT_TIME) begin
      clockCounter <= 0;
      visual_clk <= ~visual_clk;
    end
  end

  // QR code position tracking
  always @(posedge clk) begin
    vga_QR <= (hpos >= qr_x && hpos <= QR_SIZE + qr_x) && 
              (vpos >= qr_y && vpos <= QR_SIZE + qr_y);
    top_left_x <= (hpos - qr_x);
    top_left_y <= (vpos - qr_y);
  end

  // Bouncing QR code instance
  bouncing_qr #(
    .H_RESOLUTION(640),
    .V_RESOLUTION(480),
    .QR_CODE_SIZE(QR_SIZE)
  ) qrcode (
    .visual_clk(visual_clk),
    .CounterX(hpos),
    .CounterY(vpos), 
    .x_ball(qr_x), 
    .y_ball(qr_y)
  );

  // Output RGB: QR code overlays starfield
  assign rgb = vga_QR ? {QR_pixel, QR_pixel, QR_pixel} : star_rgb;

endmodule