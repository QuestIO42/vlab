//////////////////////////////////////////////////////////////////////////////////
// Company: UFSCar
// Author: Ricardo Menotti
// 
// Create Date: 18.11.2020 13:15:28
// Project Name: Lab. Remoto de Lógica Digital - DC/UFSCar
// Design Name: Colors (combinational)
// Module Name: colors
// Target Devices: xc7z020
// Tool Versions: Vivado v2019.2 (64-bit)
//////////////////////////////////////////////////////////////////////////////////

module top(
  input sysclk,
  output [3:0] led,
  output led5_r, led5_g, led5_b, led6_r, led6_g, led6_b 
  );

  wire led5_r_l, led5_g_l, led5_b_l, led6_r_l, led6_g_l, led6_b_l;
  integer count = 0;
    
  always@(posedge sysclk)
    count = count + 1;

  colors dut(count[31], count[30], count[29], count[28], led5_r_l, led5_g_l, led5_b_l, led6_r_l, led6_g_l, led6_b_l);
        
  assign led = count[31:28];
  assign led5_r = led5_r_l & (&count[2:0]);
  assign led5_g = led5_g_l & (&count[2:0]);
  assign led5_b = led5_b_l & (&count[2:0]);
  assign led6_r = led6_r_l & (&count[2:0]);
  assign led6_g = led6_g_l & (&count[2:0]);
  assign led6_b = led6_b_l & (&count[2:0]);
endmodule

module colors(
  input ld3, ld2, ld1, ld0,
  output led5_r, led5_g, led5_b, led6_r, led6_g, led6_b
  );

  assign led5_r = ld3;
  assign led5_g = ld2;
  assign led5_b = ld1 ^ ld0;
  assign led6_r = ld1;
  assign led6_g = ld0;
  assign led6_b = ld3 ^ ld2;
endmodule
