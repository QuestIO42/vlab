//////////////////////////////////////////////////////////////////////////////////
// Company: UFSCar
// Author: Ricardo Menotti
// 
// Create Date: 27.05.2021 13:15:28
// Project Name: Lab. Remoto de Lógica Digital - DC/UFSCar
// Design Name: VGA Test
// Module Name: vga
// Target Devices: xc7z020
// Tool Versions: Vivado v2019.2 (64-bit)
//////////////////////////////////////////////////////////////////////////////////

module top(
  input sysclk, // 125MHz
  output [3:0] led,
  output led5_r, led5_g, led5_b, led6_r, led6_g, led6_b,
  output [3:0] VGA_R, VGA_G, VGA_B, 
  output VGA_HS_O, VGA_VS_O);

  wire pixel_clk; 
  
  clk_wiz_1 clockdiv(pixel_clk, sysclk); // 25MHz

  vga video(pixel_clk, VGA_R, VGA_G, VGA_B, VGA_HS_O, VGA_VS_O);
endmodule

module vga(
  input clk, 
  output [3:0] VGA_R, VGA_G, VGA_B, 
  output VGA_HS_O, VGA_VS_O);

  reg [9:0] CounterX, CounterY;
  reg inDisplayArea;
  reg vga_HS, vga_VS;

  wire CounterXmaxed = (CounterX == 800); // 16 + 48 + 96 + 640
  wire CounterYmaxed = (CounterY == 525); // 10 + 2 + 33 + 480

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
  end

  always @(posedge clk)
    inDisplayArea <= (CounterX < 640) && (CounterY < 480);

  assign VGA_HS_O = ~vga_HS;
  assign VGA_VS_O = ~vga_VS;  

  assign VGA_R = inDisplayArea && CounterX < 320 ? 4'b1111 : 4'b0000;
  assign VGA_G = inDisplayArea ? CounterX[6:3] : 4'b0000;
  assign VGA_B = inDisplayArea ? CounterY[7:4] : 4'b0000;
endmodule

