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

module vga #(parameter VGA_BITS = 8) (
  input clk, 
  output [VGA_BITS-1:0] VGA_R, VGA_G, VGA_B, 
  output VGA_HS_O, VGA_VS_O);

  localparam QR_SIZE = 54;

  reg [9:0] CounterX, CounterY;
  reg inDisplayArea;
  reg vga_HS, vga_VS;

  wire CounterXmaxed = (CounterX == 800); // 16 + 48 + 96 + 640
  wire CounterYmaxed = (CounterY == 525); // 10 + 2 + 33 + 480

  reg [26:0] QR_code [0:26];
  wire [26:0] QR_line;
  reg vga_QR;

  initial 
    $readmemb("qr_code.bin", QR_code);

  assign QR_line = QR_code[CounterX>>1];
  assign QR_pixel = QR_line[CounterY>>1];

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
    vga_QR <= (CounterX < QR_SIZE) && (CounterY < QR_SIZE);
  end

  assign VGA_HS_O = ~vga_HS;
  assign VGA_VS_O = ~vga_VS;  

  assign VGA_R = vga_QR ? {VGA_BITS{QR_pixel}} : inDisplayArea ? CounterX[VGA_BITS-1:0] : {VGA_BITS{1'b0}};
  assign VGA_G = vga_QR ? {VGA_BITS{QR_pixel}} : inDisplayArea ? CounterY[VGA_BITS-1:0] : {VGA_BITS{1'b0}};
  assign VGA_B = vga_QR ? {VGA_BITS{QR_pixel}} : inDisplayArea ? ((CounterX[VGA_BITS-1:0]<<1)+CounterY[VGA_BITS-1:0])>>1 : {VGA_BITS{1'b0}};
endmodule

