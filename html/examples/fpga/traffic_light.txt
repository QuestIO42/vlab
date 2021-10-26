//////////////////////////////////////////////////////////////////////////////////
// Company: UFSCar
// Author: Ricardo Menotti
// 
// Create Date: 18.11.2020 13:15:28
// Project Name: Lab. Remoto de Lógica Digital - DC/UFSCar
// Design Name: Traffic Light (sequential)
// Module Name: semaphore
// Instructions: https://www.youtube.com/watch?v=s-Du9P-3JFg
// Target Devices: xc7z020
// Tool Versions: Vivado v2019.2 (64-bit)
//////////////////////////////////////////////////////////////////////////////////

module top(
  input sysclk,
  output [3:0] led,
  output led5_r, led5_g, led5_b, led6_r, led6_g, led6_b 
  );

  wire led5_r_l, led5_g_l, led5_b_l, led6_r_l, led6_g_l, led6_b_l;
  wire clk1hz, zc, bt;
  wire [3:1] stA, stB;
  reg [5:0] count1hz;
  integer count = 0;
 
  assign clk1hz = count[26];
  assign bt = &count[31:28];

  always@(posedge sysclk)
    count = count + 1;

  always@(posedge clk1hz)
    if (zc)
      count1hz = 0;
    else
      count1hz = count1hz + 1;

  traffic light(clk1hz, bt, t5s, t15s, t20s, t50s, stA, stB, zc);
      
  assign  t5s = count1hz == 6'b000101; //  5
  assign t15s = count1hz == 6'b001111; // 15
  assign t20s = count1hz == 6'b010100; // 20
  assign t50s = count1hz == 6'b110010; // 50

  assign led = count[31:28]; 
  assign led5_r = led5_r_l & (&count[2:0]);
  assign led5_g = led5_g_l & (&count[2:0]);
  assign led5_b = led5_b_l & (&count[2:0]);
  assign led6_r = led6_r_l & (&count[2:0]);
  assign led6_g = led6_g_l & (&count[2:0]);
  assign led6_b = led6_b_l & (&count[2:0]);
  assign {led5_r_l,led5_g_l,led5_b_l} = stA;
  assign {led6_r_l,led6_g_l,led6_b_l} = stB;
endmodule

module traffic (clk, BT, t5s, t15s, t20s, t50s, stA, stB, zc);
  parameter [3:1] A = 3'b000, B = 3'b001, C = 3'b010, D = 3'b011, A1 = 3'b100, A2 = 3'b101;
  parameter red=3'b100, yellow=3'b110, green=3'b010;
  input clk, BT, t5s, t15s, t20s, t50s;
  output [3:1] stA, stB;
  output zc;
  reg [3:1] Y, y = A;
  wire [3:1] red_blink; 

  // Define the next state combinational circuit
  always @(BT, t5s, t15s, t20s, t50s, y)
    case (y)
      A: if (BT)    Y = B;
         else       Y = A;
      A1:if (t50s)  Y = A;
         else 
           if (BT)  Y = A2;
           else     Y = A1; 
      A2:if (t50s)  Y = B;
         else       Y = A2; 
      B: if (t5s)   Y = C;
         else       Y = B;
      C: if (t15s)  Y = D;
         else       Y = C;
      D: if (t20s)  Y = A1;
         else       Y = D;
   default:         Y = 2'bxx;
 endcase

  // Define the sequential block 
  always @(posedge clk)
    y <= Y;
  
  // Define outputs
  assign red_blink = red & {clk, 2'b0};
  assign stA = y == C ? green : (y == D ? red_blink : red);
  assign stB = (y == A | y == A1 | y == A2) ? green : (y == B ? yellow : red);
  assign zc = (y == A);
endmodule

