//////////////////////////////////////////////////////////////////////////////////
// Company: UFSCar
// Author: Ricardo Menotti
// 
// Create Date: 29.05.2021 13:50:41
// Project Name: Lab. Remoto de Lógica Digital - DC/UFSCar
// Design Name: uP1 with Video
//////////////////////////////////////////////////////////////////////////////////

module top #(parameter VGA_BITS = 8) (
  input CLOCK_50, // 50MHz
  output [VGA_BITS-1:0] VGA_R, VGA_G, VGA_B,
  output VGA_HS, VGA_VS,
  output reg VGA_CLK,
  output VGA_BLANK_N, VGA_SYNC_N);

  wire reset, we; 
  wire [7:0] address, data, vaddr, vdata;

  always@(posedge CLOCK_50)
    VGA_CLK = ~VGA_CLK;

  power_on_reset por(CLOCK_50, reset);
  cpu proc(CLOCK_50, reset, data, we, address);
  mem #("top.bin") ram(CLOCK_50, we, address, data, vaddr, vdata); 
  vga video(VGA_CLK, reset, vdata, vaddr, VGA_R, VGA_G, VGA_B, VGA_HS, VGA_VS);

  assign VGA_BLANK_N = 1'b1;
  assign VGA_SYNC_N  = 1'b0;
endmodule

module cpu(
  input clock, reset,
  inout [7:0] mbr,
  output logic we,
  output logic [7:0] mar, pc, ir);
  
  typedef enum logic [1:0] {FETCH, DECODE, EXECUTE} statetype;
  statetype state, nextstate;
  
  logic [7:0] acc, vaddr;
  
  always @(posedge clock or posedge reset)
  begin
    if (reset) begin
      pc <= 'b0;
      vaddr <= 8'b10000000; // 128
      state <= FETCH;
    end
    else begin
      case(state)
      FETCH: begin
        we <= 0;
        pc <= pc + 1;
        mar <= pc;
      end
      DECODE: begin
        ir = mbr;
        if (ir[7:5] == 3'b000)       // load/store video
          mar <= vaddr;
        else 
          mar <= {4'b1111, ir[3:0]};
      end
      EXECUTE: begin
        if (ir[7] == 1'b1 && acc != 8'b00000000) // jnz
          pc <= {1'b0, ir[6:0]};
        else if (ir[7:4] == 4'b0100) // indirect load 
          acc <= mbr;
        else if (ir[7:4] == 4'b0101) // add acc + data
          acc <= acc + mbr;
        else if (ir[7:4] == 4'b0110) // sub acc - data
          acc <= acc - mbr;
        else if (ir[7:4] == 4'b0011) // store
          we <= 1'b1;
        else if (ir[7:4] == 4'b0000) // load video
          acc <= mbr;
        else if (ir[7:4] == 4'b0001) // store video
        begin
          we <= 1'b1;
          vaddr <= vaddr + 1;
          if (vaddr > 207) 
            vaddr <= 8'b10000000;  // 128
        end
      end
      endcase  
      state <= nextstate;                  
    end
  end
  
  always_comb
    casex(state)
      FETCH:   nextstate = DECODE;
      DECODE:  nextstate = EXECUTE;
      EXECUTE: nextstate = FETCH;
      default: nextstate = FETCH; 
    endcase
  
  assign mbr = we ? acc : 'bz;
endmodule

module mem #(parameter filename = "ram.hex")
          (input clock, we,
           input [7:0] address,
           inout [7:0] data,
           input [7:0] vaddr,
           output [7:0] vdata);

  logic [7:0] RAM[255:0];

  initial
    $readmemb(filename, RAM);

  assign data  = we ? 'bz : RAM[address]; 
  assign vdata = RAM[vaddr]; 

  always @(posedge clock)
    if (we) RAM[address] <= data;
endmodule

module vga(
  input clk, reset,
  input  [7:0] vdata,
  output [7:0] vaddr,
  output [7:0] VGA_R, VGA_G, VGA_B, 
  output VGA_HS_O, VGA_VS_O);

  reg [9:0] CounterX, CounterY;
  reg inDisplayArea;
  reg vga_HS, vga_VS;

  wire CounterXmaxed = (CounterX == 800); // 16 + 48 + 96 + 640
  wire CounterYmaxed = (CounterY == 525); // 10 +  2 + 33 + 480
  wire [3:0] row, col;

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

  assign row = (CounterY>>6);
  assign col = (CounterX>>6);
  assign vaddr = {1'b1,col[3:0],row[2:0]}; 

  always @(posedge clk)
  begin
    vga_HS <= (CounterX > (640 + 16) && (CounterX < (640 + 16 + 96)));   // active for 96 clocks
    vga_VS <= (CounterY > (480 + 10) && (CounterY < (480 + 10 +  2)));   // active for  2 clocks
    inDisplayArea <= (CounterX < 640) && (CounterY < 480);
  end

  assign VGA_HS_O = ~vga_HS;
  assign VGA_VS_O = ~vga_VS;  

  assign VGA_R = inDisplayArea ? {vdata[5:4], 6'b000000} : 8'b00000000;
  assign VGA_G = inDisplayArea ? {vdata[3:2], 6'b000000} : 8'b00000000;
  assign VGA_B = inDisplayArea ? {vdata[1:0], 6'b000000} : 8'b00000000;
endmodule
 

