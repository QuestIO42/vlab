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
Scrolling starfield generator using a period (2^16-1) LFSR.
*/

module starfield_top(clk, reset, hsync, vsync, rgb);

  input clk, reset;
  output hsync, vsync;
  output [2:0] rgb;
  wire display_on;
  wire [9:0] hpos;
  wire [9:0] vpos;
  wire [15:0] lfsr;

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
  assign rgb = display_on && star_on ? lfsr[2:0] : 0;

endmodule
