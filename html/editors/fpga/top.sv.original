//////////////////////////////////////////////////////////////////////////////////
// Company: UFSCar
// Author: Ricardo Menotti
// 
// Create Date: 07.06.2024 14:08:28
// Project Name: Lab. Remoto de Lógica Digital - DC/UFSCar
// Design Name: LEDs
//////////////////////////////////////////////////////////////////////////////////

module top(
  input CLOCK_50,
  output [9:0] LEDR);

  integer count = 0;
  reg [9:0] slide = 10'b0000000001;

  always@(posedge CLOCK_50)
    count = count + 1;

  assign clk1hz = count[24];

  always@(posedge clk1hz)
    slide = {slide[0], slide[9:1]};

  assign LEDR = slide;
endmodule