//////////////////////////////////////////////////////////////////////////////////
// Company: UFSCar
// Author: Ricardo Menotti
// 
// Create Date: 07.05.2024 22:58:28
// Project Name: Lab. Remoto de Lógica Digital - DC/UFSCar
// Design Name: Hex Counter
//////////////////////////////////////////////////////////////////////////////////

module top(
  input CLOCK_50,
  output [6:0] HEX5, HEX4, HEX3, HEX2, HEX1, HEX0);

  integer count = 0;

  always@(posedge CLOCK_50)
    count = count + 1;

  dec7seg dig0(count[11: 8], HEX0);
  dec7seg dig1(count[15:12], HEX1);
  dec7seg dig2(count[19:16], HEX2);
  dec7seg dig3(count[23:20], HEX3);
  dec7seg dig4(count[27:24], HEX4);
  dec7seg dig5(count[31:28], HEX5);
endmodule

module dec7seg (
    input  [3:0] bcd,
    output reg [6:0] segs);
        
    always @(bcd)        // gfedcba
      case (bcd)         // 6543210
        4'b0000 : segs = 7'b0111111; // 0
        4'b0001 : segs = 7'b0000110; // 1
        4'b0010 : segs = 7'b1011011; // 2
        4'b0011 : segs = 7'b1001111; // 3
        4'b0100 : segs = 7'b1100110; // 4
        4'b0101 : segs = 7'b1101101; // 5
        4'b0110 : segs = 7'b1111101; // 6
        4'b0111 : segs = 7'b0000111; // 7
        4'b1000 : segs = 7'b1111111; // 8
        4'b1001 : segs = 7'b1101111; // 9
        4'b1010 : segs = 7'b1110111; // A
        4'b1011 : segs = 7'b1111100; // b
        4'b1100 : segs = 7'b0111001; // C
        4'b1101 : segs = 7'b1011110; // d
        4'b1110 : segs = 7'b1111001; // E
        4'b1111 : segs = 7'b1110001; // F
      endcase
endmodule
