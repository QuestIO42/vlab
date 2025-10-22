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
Scrolling starfield generator using a period (2^16-1) LFSR with a floating QR overlay.
*/

module starfield_top(clk, reset, hsync, vsync, rgb);

  input clk, reset;
  output hsync, vsync;
  output [2:0] rgb;
  wire display_on;
  wire [9:0] hpos;
  wire [9:0] vpos;
  wire [15:0] lfsr;

  // Slow clock for QR movement
  reg [23:0] clk_div = 0;
  reg visual_clk = 0;
  localparam WAIT_TIME = 24'd1350000;
  always @(posedge clk) begin
    clk_div <= clk_div + 1;
    if (clk_div == WAIT_TIME) begin
      clk_div <= 0;
      visual_clk <= ~visual_clk;
    end
  end

  hvsync_generator hvsync_gen(
    .clk(clk),
    .reset(reset),
    .hsync(hsync),
    .vsync(vsync),
    .display_on(display_on),
    .hpos(hpos),
    .vpos(vpos)
  );

  // Enable LFSR over the full visible area (fix screen width)
  wire star_enable = display_on;

  // LFSR with period = 2^16-1 = 256*256-1
  LFSR #(16'b1000000001011,0) lfsr_gen(
    .clk(clk),
    .reset(reset),
    .enable(star_enable),
    .lfsr(lfsr)
  );

  wire star_on = &lfsr[15:9]; // all 7 bits must be set
  wire [2:0] star_rgb = star_on ? lfsr[2:0] : 3'b000;

  // Floating QR overlay (bouncing)
  localparam QR_SIZE = 54;
  reg  [26:0] QR_code [0:26];
  initial $readmemb("qr_code.bin", QR_code);

  reg [9:0] qr_x = 10'd0, qr_y = 10'd0; // top-left of QR
  reg incr_x = 1'b1, incr_y = 1'b1;

  // Bounce QR position at a slower rate
  always @(posedge visual_clk) begin
    // Horizontal bounce
    if (incr_x) begin
      if (qr_x >= (640 - QR_SIZE)) incr_x <= 1'b0; else qr_x <= qr_x + 1'b1;
    end else begin
      if (qr_x == 0) incr_x <= 1'b1; else qr_x <= qr_x - 1'b1;
    end
    // Vertical bounce
    if (incr_y) begin
      if (qr_y >= (480 - QR_SIZE)) incr_y <= 1'b0; else qr_y <= qr_y + 1'b1;
    end else begin
      if (qr_y == 0) incr_y <= 1'b1; else qr_y <= qr_y - 1'b1;
    end
  end

  wire in_qr = (hpos >= qr_x && hpos < (qr_x + QR_SIZE)) && (vpos >= qr_y && vpos < (qr_y + QR_SIZE));
  wire [9:0] tlx = hpos - qr_x;
  wire [9:0] tly = vpos - qr_y;
  wire [26:0] QR_line = QR_code[tly[9:1]];   // /2 scaling
  wire QR_pixel = ~QR_line[tlx[9:1]];        // /2 scaling
  wire [2:0] qr_rgb = {3{QR_pixel}};

  assign rgb = display_on ? (in_qr ? qr_rgb : star_rgb) : 3'b000;

endmodule
