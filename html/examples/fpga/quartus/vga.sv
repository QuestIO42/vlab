//////////////////////////////////////////////////////////////////////////////////
// Company: UFSCar
// Author: Ricardo Menotti
// 
// Create Date: 27.05.2021 13:15:28
// Project Name: Lab. Remoto de Lógica Digital - DC/UFSCar
// Design Name: VGA Test
// Module Name: vga
//////////////////////////////////////////////////////////////////////////////////

module top #(parameter VGA_BITS = 8) (
  input CLOCK_50, // 50MHz
  output [9:0] LEDR,
  output [VGA_BITS-1:0] VGA_R, VGA_G, VGA_B,
  output VGA_HS, VGA_VS,
  output reg VGA_CLK,
  output VGA_BLANK_N, VGA_SYNC_N);

  always@(posedge CLOCK_50)
    VGA_CLK = ~VGA_CLK;

  vga video(VGA_CLK, VGA_R, VGA_G, VGA_B, VGA_HS, VGA_VS);

  assign VGA_BLANK_N = 1'b1;
  assign VGA_SYNC_N  = 1'b0;
endmodule

// Author: Gustavo de Macena Barreto
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

module vga #(parameter VGA_BITS = 8) (
  input clk, 
  output [VGA_BITS-1:0] VGA_R, VGA_G, VGA_B, 
  output VGA_HS_O, VGA_VS_O);

  localparam QR_SIZE = 54;
  localparam WAIT_TIME = 1350000;

  reg [9:0] CounterX, CounterY;
  reg inDisplayArea;
  reg vga_HS, vga_VS;
  reg [9:0] qr_x, qr_y, top_left_x, top_left_y;
  reg [23:0] clockCounter = 0;
  reg visual_clk;
  
  wire CounterXmaxed = (CounterX == 800); // 16 + 48 + 96 + 640
  wire CounterYmaxed = (CounterY == 525); // 10 + 2 + 33 + 480       
  
  reg [26:0] QR_code [0:26];
  wire [26:0] QR_line;
  reg vga_QR;

  initial 
    $readmemb("qr_code.bin", QR_code);

  assign QR_line = QR_code[top_left_x>>1];
  assign QR_pixel = ~QR_line[top_left_y>>1];

  always @(posedge clk) begin
    clockCounter <= clockCounter + 1;
    if (clockCounter == WAIT_TIME) begin
      clockCounter <= 0;
      visual_clk <= ~visual_clk;
    end
  end

  always @(posedge clk)
    if (CounterXmaxed)
      CounterX <= 0;
    else
      CounterX <= CounterX + 1;

  always @(posedge clk)
    if (CounterXmaxed)
      if(CounterYmaxed)
        CounterY <= 0;
      else
        CounterY <= CounterY + 1;

  always @(posedge clk)
  begin
    vga_HS <= (CounterX > (640 + 16) && (CounterX < (640 + 16 + 96)));   // active for 96 clocks
    vga_VS <= (CounterY > (480 + 10) && (CounterY < (480 + 10 + 2)));   // active for 2 clocks
    inDisplayArea <= (CounterX < 640) && (CounterY < 480);
    vga_QR <= (CounterX >= qr_x && CounterX <= QR_SIZE + qr_x) && 
              (CounterY >= qr_y && CounterY <= QR_SIZE + qr_y);
    top_left_x <= (CounterX-qr_x);
    top_left_y <= (CounterY-qr_y);
  end

  assign VGA_HS_O = ~vga_HS;
  assign VGA_VS_O = ~vga_VS;  

  assign VGA_R = vga_QR ? {VGA_BITS{QR_pixel}} : inDisplayArea ? CounterX[VGA_BITS-1:0] : {VGA_BITS{1'b0}};
  assign VGA_G = vga_QR ? {VGA_BITS{QR_pixel}} : inDisplayArea ? CounterY[VGA_BITS-1:0] : {VGA_BITS{1'b0}};
  assign VGA_B = vga_QR ? {VGA_BITS{QR_pixel}} : inDisplayArea ? ((CounterX[VGA_BITS-1:0]<<1)+CounterY[VGA_BITS-1:0])>>1 : {VGA_BITS{1'b0}};
  
  bouncing_qr #(
    .H_RESOLUTION(640),
    .V_RESOLUTION(480),
    .QR_CODE_SIZE(QR_SIZE)
  ) qrcode (
    .visual_clk(visual_clk),
    .CounterX(CounterX),
    .CounterY(CounterY), 
    .x_ball(qr_x), 
    .y_ball(qr_y)
  );
endmodule

