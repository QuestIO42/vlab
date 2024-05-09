//////////////////////////////////////////////////////////////////////////////////
// Company: UFSCar
// Author: Ricardo Menotti
// 
// Create Date: 18.11.2020 13:15:28
// Project Name: Lab. Remoto de Lógica Digital - DC/UFSCar
// Design Name: Alert (combinational)
// Module Name: colors
// Target Devices: xc7z020
// Tool Versions: Vivado v2019.2 (64-bit)
//////////////////////////////////////////////////////////////////////////////////

module top(
  input sysclk,
  output [3:0] led,
  output led5_r, led5_g, led5_b, led6_r, led6_g, led6_b 
  );

  integer count = 0;
  
  always@(posedge sysclk)
    count = count + 1;

  alert dut(count[31], count[30], count[29], count[28], led5_r, led5_g, led5_b, led6_r, led6_g, led6_b);
      
  assign led = count[31:28]; 
endmodule

module alert(
  input ld3, ld2, ld1, ld0,
  output led5_r, led5_g, led5_b, led6_r, led6_g, led6_b
  );

  assign led5_r = ld0;
  assign led5_g = 0;
  assign led5_b = 0;
  assign led6_r = ~ld0;
  assign led6_g = 0;
  assign led6_b = 0;
endmodule
