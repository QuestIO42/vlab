//////////////////////////////////////////////////////////////////////////////////
// Company: UFSCar
// Author: Ricardo Menotti
//
// Create Date: 09.05.2024 12:18:28
// Project Name: Lab. Remoto de Lógica Digital - DC/UFSCar
// Design Name: Conway's Game of Life
// Module Name: conway
//////////////////////////////////////////////////////////////////////////////////

module top #(parameter VGA_BITS = 8) (
  input CLOCK_50, // 50MHz
  input [3:0] SW,
  output [VGA_BITS-1:0] VGA_R, VGA_G, VGA_B,
  output VGA_HS, VGA_VS,
  output reg VGA_CLK,
  output VGA_BLANK_N, VGA_SYNC_N);

  wire VGA_DA; // In display area
  wire VGA_QR; // Display QR code
  wire VGA_PIXEL, QR_PIXEL, PIXEL, RESET;
  
    //http://tinyvga.com/vga-timing
	 
  // 640 x 480 @ 25.175 MHz (negative)
  localparam  WIDTH = 640, HEIGHT = 480;
  localparam HFRONT =  16,  HSYNC =  96, HBACK = 48, HPULSEN = 1;
  localparam VFRONT =  10,  VSYNC =   2, VBACK = 33, VPULSEN = 1;
  
  // 800 x 600 @ 36 MHz (positive)
//  localparam  WIDTH = 800, HEIGHT = 600;
//  localparam HFRONT =  24,  HSYNC =  72, HBACK = 128, HPULSEN = 0;
//  localparam VFRONT =   1,  VSYNC =   2, VBACK =  22, VPULSEN = 0;

  // 1024 x 768 @ 65 MHz (negative)
//  localparam  WIDTH = 1024, HEIGHT = 768;
//  localparam HFRONT =   24,  HSYNC =  136, HBACK = 160, HPULSEN = 1;
//  localparam VFRONT =    3,  VSYNC =    6, VBACK =  29, VPULSEN = 1;

  // 1280 x 1024 @ 108 MHz (positive)
//  localparam  WIDTH = 1280, HEIGHT = 1024;
//  localparam HFRONT =   48,  HSYNC =  112, HBACK = 248, HPULSEN = 0;
//  localparam VFRONT =    1,  VSYNC =    3, VBACK =  38, VPULSEN = 0;

  always@(posedge CLOCK_50)
    VGA_CLK = ~VGA_CLK; // 25MHz

  on_off_reset oor(CLOCK_50, RESET);

  vga #(WIDTH, HEIGHT, 
        HFRONT, HSYNC, HBACK, HPULSEN, 
		    VFRONT, VSYNC, VBACK, VPULSEN) 
		    video(VGA_CLK, VGA_HS, VGA_VS, VGA_DA, VGA_QR, QR_PIXEL);

  gol #(WIDTH, HEIGHT) 
        board(VGA_CLK, RESET, VGA_DA, VGA_PIXEL);
  
  assign PIXEL = VGA_QR ? QR_PIXEL : VGA_PIXEL;
  assign VGA_R = {VGA_BITS{VGA_DA ? SW[3] ^ PIXEL : 1'b0}};
  assign VGA_G = {VGA_BITS{VGA_DA ? SW[2] ^ PIXEL : 1'b0}};
  assign VGA_B = {VGA_BITS{VGA_DA ? SW[1] ^ PIXEL : 1'b0}};
  assign VGA_BLANK_N = 1'b1;
  assign VGA_SYNC_N  = 1'b0;
endmodule

module on_off_reset(
  input clk, 
  output reg reset);

  integer q = 0;
 
  always@(posedge clk)
       q = q + 1;

  assign reset = ~|q[31:28];
endmodule

module vga #(
  parameter WIDTH = 640, HEIGHT = 480, // 640 x 480 @ 25 MHz (negative)
  HFRONT = 16, HSYNC = 96, HBACK = 48, HPULSEN = 1,
  VFRONT = 10, VSYNC =  2, VBACK = 33, VPULSEN = 1
) (
  input clk,
  output reg vga_HS, vga_VS, vga_DA, vga_QR, 
  output QR_pixel);

  localparam QR_SIZE = 54;
  localparam WAIT_TIME = 1350000;

  reg [26:0] QR_code [0:26];
  reg [9:0] CounterX, CounterY;
  reg [9:0] qr_x, qr_y, top_left_x, top_left_y;
  reg [23:0] clockCounter = 0;
  reg visual_clk;
  wire [26:0] QR_line;
  wire CounterXmaxed = (CounterX == (WIDTH + HFRONT + HSYNC + HBACK));
  wire CounterYmaxed = (CounterY == (HEIGHT + VFRONT + VSYNC + VBACK));

  initial 
    $readmemb("qr_code.bin", QR_code);

  assign QR_line = QR_code[top_left_x>>1];
  assign QR_pixel = ~QR_line[top_left_y>>1];

  always @(posedge clk) begin
    clockCounter <= clockCounter + 1;
    if (clockCounter == WAIT_TIME) begin
      clockCounter <= 0;
      visual_clk <= ~visual_clk;
    end
  end

  always @(posedge clk)
  begin
    if (CounterXmaxed)
      CounterX <= 10'b0;
    else
      CounterX <= CounterX + 1'b1;
		
    if (CounterXmaxed)
      if(CounterYmaxed)
        CounterY <= 10'b0;
      else
        CounterY <= CounterY + 1'b1;
		  
    vga_HS <= HPULSEN[0] ^ (CounterX > ( WIDTH + HFRONT) && (CounterX < ( WIDTH + HFRONT + HSYNC)));
    vga_VS <= VPULSEN[0] ^ (CounterY > (HEIGHT + VFRONT) && (CounterY < (HEIGHT + VFRONT + VSYNC)));
    vga_DA <= (CounterX < WIDTH) && (CounterY < HEIGHT);
    vga_QR <= (CounterX >= qr_x && CounterX <= QR_SIZE + qr_x) && 
              (CounterY >= qr_y && CounterY <= QR_SIZE + qr_y);
    top_left_x <= (CounterX-qr_x);
    top_left_y <= (CounterY-qr_y);
  end

  bouncing_qr #(
    .H_RESOLUTION(640),
    .V_RESOLUTION(480),
    .QR_CODE_SIZE(QR_SIZE)
  ) qrcode (
    .visual_clk(visual_clk),
    .CounterX(CounterX),
    .CounterY(CounterY), 
    .x_ball(qr_x), 
    .y_ball(qr_y)
  );
endmodule

// Author: Gustavo de Macena Barreto
module bouncing_qr #(
  parameter H_RESOLUTION    = 640,
  parameter V_RESOLUTION    = 480,
  parameter QR_CODE_SIZE    = 54
)(
  input     visual_clk,
  input  reg [9:0] CounterX , CounterY,
  output reg [9:0] x_ball, y_ball);

  localparam x_max = H_RESOLUTION - QR_CODE_SIZE; 
  localparam x_min = 0;
  
  localparam y_max = V_RESOLUTION - QR_CODE_SIZE;
  localparam y_min = 0;

  reg incr_x, incr_y; // reg to hold the state (1 increment, 0 decrement)

  reg [31:0] reg_x = 31'd0;
  reg [31:0] reg_y = 31'd0;
  
  assign x_ball = reg_x;
  assign y_ball = reg_y;

  always @(posedge visual_clk) begin
    if (incr_x) // Increment in H_RESOLUTION (Horizontal) 
      if (reg_x >= x_max) 
        incr_x <=0;
      else
        reg_x <= reg_x + 1;
    else
      if (reg_x <= x_min) 
        incr_x <=1;
      else 
        reg_x <= reg_x - 1;    
    if(incr_y) // Increment in V_RESOLUTION (Vertical)
      if (reg_y >= y_max)  
        incr_y <=0;
      else 
        reg_y <= reg_y + 1;
    else      
      if (reg_y <= y_min) 
        incr_y <= 1;
      else 
        reg_y <= reg_y - 1;    
  end
endmodule

module gol #(parameter WIDTH = 640, HEIGHT = 480) (
  input clk, rst, ena,
  output reg pixel);

  localparam row_size   =                     WIDTH-2-1;
  localparam fifo1_size = ((WIDTH*HEIGHT)>>1)        -1;
  localparam fifo2_size = ((WIDTH*HEIGHT)>>1)-WIDTH-2-1;

  random lfsr(clk, random_data);

  reg newgen, r1c1, r1c2, r2c1, r2c2, r3c1, r3c2;
  reg [fifo1_size:0] fifo1;
  reg [fifo2_size:0] fifo2;
  reg [row_size:0] row1;
  reg [row_size:0] row2;

  wire [30:0] random_data;
  wire head_row1, head_row2, head_fifo1, head_fifo2;
  wire [3:0] neighbor_count = (r1c1 + r1c2 + head_row1) +
                              (r2c1 +        head_row2) +
                              (r3c1 + r3c2 + head_fifo1);

  assign head_row1 = row1[row_size];
  assign head_row2 = rst ? random_data[0] : row2[row_size];
  assign head_fifo1 = fifo1[fifo1_size];
  assign head_fifo2 = fifo2[fifo2_size];

  always @(posedge clk)
	  if (ena)
	  begin
		 row1  <= { row1[  row_size-1:0], r2c1};
		 row2  <= { row2[  row_size-1:0], r3c1};
		 fifo1 <= {fifo1[fifo1_size-1:0], head_fifo2};
		 fifo2 <= {fifo2[fifo2_size-1:0], newgen};
		 r1c1  <= r1c2;     r1c2 <= head_row1;
		 r2c1  <= r2c2;     r2c2 <= head_row2;
		 r3c1  <= r3c2;     r3c2 <= head_fifo1;
		 pixel <= newgen; newgen <= (neighbor_count | r2c2) == 4'd3;
	  end
endmodule

module random (
  input clk,
  output reg [30:0] lfsr);

  always @(posedge clk)
    lfsr = {lfsr[29:0], lfsr[16] ^~ lfsr[14] ^~ lfsr[13] ^~ lfsr[11]};
endmodule

