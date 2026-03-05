//////////////////////////////////////////////////////////////////////////////////
// Company: UFSCar
// Author: Your Name
// Create Date: 06.03.2026
// Project Name: VGA+RAM32 with QR Code
//////////////////////////////////////////////////////////////////////////////////

module top #(parameter VGA_BITS = 8) (
    input CLOCK_50,
    output [VGA_BITS-1:0] RED,
    output [VGA_BITS-1:0] GREEN,
    output [VGA_BITS-1:0] BLUE,
    output H_SYNC,
    output V_SYNC
);

// VGA sync signals, counters, etc. here

// QR code bitmap: 32x32 pixels
reg [0:31] qr_code [0:31];
initial begin
    // same QR code as vgamem8.sv
    qr_code[0]  = 32'b11111111111111111111111111111111;
    qr_code[1]  = 32'b10000000000000000000000000000001;
    qr_code[2]  = 32'b10111111111111111111111111111101;
    qr_code[3]  = 32'b10100000000000000000000000000101;
    qr_code[4]  = 32'b10101111111111111111111111110101;
    qr_code[5]  = 32'b10101000000000000000000000010101;
    qr_code[6]  = 32'b10101011111111111111111111010101;
    qr_code[7]  = 32'b10101010000000000000000001010101;
    qr_code[8]  = 32'b10101010111111111111111101010101;
    qr_code[9]  = 32'b10101010100000000000000101010101;
    qr_code[10] = 32'b10101010101111111111110101010101;
    qr_code[11] = 32'b10101010101000000000101010101001;
    qr_code[12] = 32'b10101010101011111110101010101001;
    qr_code[13] = 32'b10101010101010000010101010101001;
    qr_code[14] = 32'b10101010101010111110101010101001;
    qr_code[15] = 32'b10101010101010100010101010101001;
    qr_code[16] = 32'b10101010101010101110101010101001;
    qr_code[17] = 32'b10101010101010101010101010101001;
    qr_code[18] = 32'b10101010101010101010101010101001;
    qr_code[19] = 32'b10101010101010101010101010101001;
    qr_code[20] = 32'b10101010101010101010101010101001;
    qr_code[21] = 32'b10101010101010101010101010101001;
    qr_code[22] = 32'b10101010101010101010101010101001;
    qr_code[23] = 32'b10101010101010101010101010101001;
    qr_code[24] = 32'b10101010101010101010101010101001;
    qr_code[25] = 32'b10101010101010101010101010101001;
    qr_code[26] = 32'b10101010101010101010101010101001;
    qr_code[27] = 32'b10101010101010101010101010101001;
    qr_code[28] = 32'b10101010101010101010101010101001;
    qr_code[29] = 32'b10101010101010101010101010101001;
    qr_code[30] = 32'b10000000000000000000000000000001;
    qr_code[31] = 32'b11111111111111111111111111111111;
end

// Overlay QR code on VGA output at top-left corner
wire qr_pixel;
assign qr_pixel = qr_code[v_count[5:0]][h_count[5:0]];

assign RED   = qr_pixel ? {VGA_BITS{1'b1}} : some_existing_red_signal;
assign GREEN = qr_pixel ? {VGA_BITS{1'b1}} : some_existing_green_signal;
assign BLUE  = qr_pixel ? {VGA_BITS{1'b1}} : some_existing_blue_signal;

endmodule