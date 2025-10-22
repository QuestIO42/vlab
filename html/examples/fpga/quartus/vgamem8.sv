//////////////////////////////////////////////////////////////////////////////////
// Company: UFSCar
// Author: Ricardo Menotti
// 
// Create Date: 27.01.2023 14:28
// Project Name: Lab. Remoto de Lógica Digital - DC/UFSCar
// Design Name: VGA Test + Memory (8 bits) + roll 
// Module Name: vga
//////////////////////////////////////////////////////////////////////////////////

module top #(parameter VGA_BITS = 8) (
  input CLOCK_50, // 50MHz
  output [VGA_BITS-1:0] VGA_R, VGA_G, VGA_B,
  output VGA_HS, VGA_VS,
  output reg VGA_CLK,
  output VGA_BLANK_N, VGA_SYNC_N);

  wire reset, we; 
  wire [7:0] vdata, data;
  wire [8:0] vaddr, addr; // 2^9 <= 512

  always@(posedge CLOCK_50)
    VGA_CLK = ~VGA_CLK;
  
  power_on_reset por(VGA_CLK, reset);
  roll r8m(VGA_CLK, reset, we, data, addr); 
  mem #("mario8.bin") ram(VGA_CLK, we, addr, data, vaddr, vdata);
  vga video(VGA_CLK, reset, vdata, vaddr, VGA_R, VGA_G, VGA_B, VGA_HS, VGA_VS);

  assign VGA_BLANK_N = 1'b1;
  assign VGA_SYNC_N  = 1'b0;
endmodule

module roll(
  input clk, reset,
  output reg we, 
  inout [7:0] data,
  output reg [8:0] addr);
  
  parameter LOAD = 0, MEM_SHIFT = 1, STORE = 2, DELAY = 3; 
  integer counter;
  reg [7:0] idata, fdata;
  reg [1:0] state;

  always @(posedge clk or posedge reset)
    if (reset)
    begin
      state <= LOAD; 
      counter <= 0;
      addr <= 0;
      we <= 0; 
    end
    else
    begin
      case (state)
      LOAD:
      begin
        fdata <= data;
        addr <= addr + 1;
        state <= MEM_SHIFT;
      end
      MEM_SHIFT:
      begin
        if (!we) 
        begin
          idata <= data;
          we <= 1;
          addr <= addr - 1;
        end
        else
        begin
          we <= 0;
          addr <= addr + 2;
          if (addr == 298)
          begin
            idata <= fdata;
            addr <= 299;
            we <= 1;
            state <= STORE;
          end
        end
      end
      STORE:
      begin
        we <= 0;
        addr <= 0;
        counter <= counter + 1;
        if (counter == 19)
          state <= DELAY;
        else
          state <= LOAD;
      end
      DELAY:
      begin
        counter <= counter + 1;
        if (!counter[22:0])
        begin
          state <= LOAD;
          counter <= 0;  
        end
      end
      endcase
    end
  assign data = we ? idata : 'bz;
endmodule

module vga #(parameter VGA_BITS = 8) ( // 20x15 
  input clk, reset,
  input  [7:0] vdata,
  output [8:0] vaddr, // 2^9 <= 512
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
  reg [9:0] qr_x = 10'd8;  // static position similar to other examples
  reg [9:0] qr_y = 10'd8;
  initial $readmemb("qr_code.bin", QR_code);

  wire CounterXmaxed = (CounterX == 800); // 16 + 48 + 96 + 640
  wire CounterYmaxed = (CounterY == 525); // 10 +  2 + 33 + 480
  wire [4:0] col;
  wire [3:0] row;
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
  assign col = (CounterX>>5); // 32 pixels 
  assign vaddr = col + (row<<4) + (row<<2); // addr <= col + row x 20

  always @(posedge clk)
  begin
    vga_HS <= (CounterX > (640 + 16) && (CounterX < (640 + 16 + 96)));   // active for 96 clocks
    vga_VS <= (CounterY > (480 + 10) && (CounterY < (480 + 10 +  2)));   // active for  2 clocks
    inDisplayArea <= (CounterX < 640) && (CounterY < 480);
  end

  // QR sampling (2:1 scaling)
  assign in_qr = (CounterX >= qr_x && CounterX < (qr_x + QR_SIZE)) && (CounterY >= qr_y && CounterY < (qr_y + QR_SIZE));
  assign QR_line = QR_code[(CounterY - qr_y) >> 1];
  assign QR_pixel = ~QR_line[(CounterX - qr_x) >> 1];

  assign VGA_HS_O = ~vga_HS;
  assign VGA_VS_O = ~vga_VS;  

  wire [VGA_BITS-1:0] r_mem = {vdata[5:4], {VGA_BITS-2{1'b0}}};
  wire [VGA_BITS-1:0] g_mem = {vdata[3:2], {VGA_BITS-2{1'b0}}};
  wire [VGA_BITS-1:0] b_mem = {vdata[1:0], {VGA_BITS-2{1'b0}}};
  wire [VGA_BITS-1:0] qr_bus = {VGA_BITS{QR_pixel}};

  assign VGA_R = inDisplayArea ? (in_qr ? qr_bus : r_mem) : {VGA_BITS{1'b0}};
  assign VGA_G = inDisplayArea ? (in_qr ? qr_bus : g_mem) : {VGA_BITS{1'b0}};
  assign VGA_B = inDisplayArea ? (in_qr ? qr_bus : b_mem) : {VGA_BITS{1'b0}};
endmodule

module mem #(parameter filename = "ram.hex")
          (input clock, we,
           input [8:0] address,
           inout [7:0] data,
           input [8:0] vaddr,
           output [7:0] vdata);

  reg [7:0] RAM[511:0];

  initial
    $readmemb(filename, RAM);

  assign data  = we ? 'bz : RAM[address]; 
  assign vdata = RAM[vaddr]; 

  always @(posedge clock)
    if (we) 
      RAM[address] <= data;
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
