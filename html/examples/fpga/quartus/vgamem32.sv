//////////////////////////////////////////////////////////////////////////////////
// Company: UFSCar
// Author: Ricardo Menotti
// 
// Create Date: 27.05.2021 13:15:28
// Project Name: Lab. Remoto de Logica Digital - DC/UFSCar
// Design Name: VGA Test + Memory (32 bits)
// Module Name: vga
//////////////////////////////////////////////////////////////////////////////////

module top #(parameter VGA_BITS = 8) (
  input CLOCK_50, // 50MHz
  output [9:0] LEDR,
  output [VGA_BITS-1:0] VGA_R, VGA_G, VGA_B,
  output VGA_HS, VGA_VS,
  output VGA_CLK,
  output VGA_BLANK_N, VGA_SYNC_N);

  reg [9:0] bar = 10'b1000000000;
  integer count = 0; 
  wire [31:0] vdata;
  wire [ 6:0] vaddr; // 2^7 = 128
  wire clk1hz, reset, we; 

  always@(posedge CLOCK_50)
    count = count + 1;
  
  always@(posedge clk1hz)
    bar = {bar[0],bar[9:1]};

  assign VGA_BLANK_N = 1'b1;
  assign VGA_SYNC_N  = 1'b0;
  assign VGA_CLK = count[0];
  assign clk1hz = count[25];
  assign LEDR = bar; 

  power_on_reset por(CLOCK_50, reset);
  mem #("mario32.bin") ram(CLOCK_50, we, address, data, vaddr, vdata); 
  vga video(VGA_CLK, reset, vdata, vaddr, VGA_R, VGA_G, VGA_B, VGA_HS, VGA_VS);
endmodule

module vga #(parameter VGA_BITS = 8) ( // 20x15 
  input clk, reset,
  input  [31:0] vdata,
  output [ 6:0] vaddr, 
  output [VGA_BITS-1:0] VGA_R, VGA_G, VGA_B,
  output VGA_HS_O, VGA_VS_O);

  reg [9:0] CounterX, CounterY;
  reg inDisplayArea;
  reg vga_HS, vga_VS;

  // QR support
  localparam QR_SIZE = 54;
  reg  [26:0] QR_code [0:26];
  wire [26:0] QR_line;
  wire QR_pixel;
  reg [9:0] qr_x = 10'd8;
  reg [9:0] qr_y = 10'd8;
  initial $readmemb("qr_code.bin", QR_code);

  wire CounterXmaxed = (CounterX == 800); // 16 + 48 + 96 + 640
  wire CounterYmaxed = (CounterY == 525); // 10 +  2 + 33 + 480
  wire [4:0] col;
  wire [3:0] row;
  wire [7:0] vbyte;
  wire in_qr;

  always @(posedge clk or posedge reset)
    if (reset)
      CounterX <= 0;
    else 
      if (CounterXmaxed)
        CounterX <= 0;
      else
        CounterX <= CounterX + 1;

  always @(posedge clk or posedge reset)
    if (reset)
      CounterY <= 0;
    else 
      if (CounterXmaxed)
        if(CounterYmaxed)
          CounterY <= 0;
        else
          CounterY <= CounterY + 1;

  assign row = (CounterY>>5); // 32 pixels x
  assign col = (CounterX>>5); // 32 pixels (x4 bytes)
  assign vaddr = (col>>2) + (row<<2) + row; // addr = col / 4 + row * 5 
  assign vbyte = col[1] ? (col[0] ? vdata[7:0] : vdata[15:8]) : (col[0] ? vdata[23:16] : vdata[31:24]); // byte select 

  always @(posedge clk)
  begin
    vga_HS <= (CounterX > (640 + 16) && (CounterX < (640 + 16 + 96)));   // active for 96 clocks
    vga_VS <= (CounterY > (480 + 10) && (CounterY < (480 + 10 +  2)));   // active for  2 clocks
    inDisplayArea <= (CounterX < 640) && (CounterY < 480);
  end

  // QR sampling
  assign in_qr = (CounterX >= qr_x && CounterX < (qr_x + QR_SIZE)) && (CounterY >= qr_y && CounterY < (qr_y + QR_SIZE));
  assign QR_line = QR_code[(CounterY - qr_y) >> 1];
  assign QR_pixel = ~QR_line[(CounterX - qr_x) >> 1];

  assign VGA_HS_O = ~vga_HS;
  assign VGA_VS_O = ~vga_VS;  

  wire [VGA_BITS-1:0] r_mem = {vbyte[5:4], {VGA_BITS-2{1'b0}}};
  wire [VGA_BITS-1:0] g_mem = {vbyte[3:2], {VGA_BITS-2{1'b0}}};
  wire [VGA_BITS-1:0] b_mem = {vbyte[1:0], {VGA_BITS-2{1'b0}}};
  wire [VGA_BITS-1:0] qr_bus = {VGA_BITS{QR_pixel}};

  assign VGA_R = inDisplayArea ? (in_qr ? qr_bus : r_mem) : {VGA_BITS{1'b0}};
  assign VGA_G = inDisplayArea ? (in_qr ? qr_bus : g_mem) : {VGA_BITS{1'b0}};
  assign VGA_B = inDisplayArea ? (in_qr ? qr_bus : b_mem) : {VGA_BITS{1'b0}};
endmodule


module mem #(parameter filename = "ram.hex")
          (input clock, we,
           input [6:0] address,
           inout [31:0] data,
           input [6:0] vaddr,
           output [31:0] vdata);

  logic [31:0] RAM[127:0];

  initial
    $readmemb(filename, RAM);

  assign data  = we ? 'bz : RAM[address]; 
  assign vdata = RAM[vaddr]; 

  always @(posedge clock)
    if (we) RAM[address] <= data;
endmodule

module power_on_reset(
  input clk, 
  output reset);

  reg q0 = 1'b0;
  reg q1 = 1'b0;
  reg q2 = 1'b0;
 
  always@(posedge clk)
  begin
       q0 <= 1'b1;
       q1 <= q0;
       q2 <= q1;
  end

  assign reset = !(q0 & q1 & q2);
endmodule


