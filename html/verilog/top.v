// Code your testbench here
// or browse Examples
module tb_fsm;

// Testbench signals
reg clk;
reg rst_n;
reg load;
reg [2:0] load_state;
reg rev;
wire [2:0] state;

// Instantiate the FSM
fsm uut (
    .clk(clk),
    .rst_n(rst_n),
    .load(load),
    .load_state(load_state),
    .rev(rev),
    .state(state)
);

// Clock generation
always #5 clk = ~clk; // 10 time units period

// Test procedure
initial begin
    // Initialize signals
    clk = 0;
    rst_n = 0;
    load = 0;
    load_state = 3'd0;
    rev = 0;

    // Apply reset
    #10 rst_n = 1; // Release reset

    // Test all states and transitions with normal cycle
    #10 load = 1; load_state = 3'd0; // Load initial state S0
    #10 load = 0; // Start FSM
    
    // Transition through all states
    #10 rev = 0; // Normal cycle
    #10; // Wait for state transitions
    if (state !== 3'd6) $display("Error: Expected S6, got %d", state);
    #10;
    if (state !== 3'd7) $display("Error: Expected S7, got %d", state);
    #10;
    if (state !== 3'd3) $display("Error: Expected S3, got %d", state);
    #10;
    if (state !== 3'd1) $display("Error: Expected S1, got %d", state);
    #10;
    if (state !== 3'd0) $display("Error: Expected S0, got %d", state);

    // Test reverse cycle
    #10 rev = 1; // Reverse cycle
    #10; // Wait for state transitions
    if (state !== 3'd1) $display("Error: Expected S1, got %d", state);
    #10;
    if (state !== 3'd3) $display("Error: Expected S3, got %d", state);
    #10;
    if (state !== 3'd7) $display("Error: Expected S7, got %d", state);
    #10;
    if (state !== 3'd6) $display("Error: Expected S6, got %d", state);
    #10;
    if (state !== 3'd0) $display("Error: Expected S0, got %d", state);

    // Test loading specific states
    #10 load = 1; load_state = 3'd5; // Load state S5
    #10 load = 0;
    #10;
    if (state !== 3'd5) $display("Error: Expected S5, got %d", state);

    #10 load = 1; load_state = 3'd2; // Load state S2
    #10 load = 0;
    #10;
    if (state !== 3'd2) $display("Error: Expected S2, got %d", state);

    // Finish simulation
    #10 $finish;
end

endmodule

// Code your design here
module fsm(
    input clk,           // Clock input
    input rst_n,         // Active-low reset
    input load,          // Input to load a specific state
    input [2:0] load_state, // 3-bit input to specify the state to load
    input rev,           // Input to reverse the order of the cycle
    output reg [2:0] state // 3-bit state output
);

// Define states using parameters
parameter S0 = 3'd0;
parameter S1 = 3'd1;
parameter S2 = 3'd2;
parameter S3 = 3'd3;
parameter S4 = 3'd4;
parameter S5 = 3'd5;
parameter S6 = 3'd6;
parameter S7 = 3'd7;

// Internal state register
reg [2:0] current_state, next_state;

// State transition logic
always @(posedge clk or negedge rst_n) begin
    if (!rst_n)
        current_state <= S0; // Reset to initial state S0
    else if (load)
        current_state <= load_state; // Load specific state
    else
        current_state <= next_state;
end

// Next state logic
always @(*) begin
    case (current_state)
        S0: next_state = (rev) ? S1 : S6;
        S1: next_state = (rev) ? S3 : S0;
        S3: next_state = (rev) ? S7 : S1;
        S7: next_state = (rev) ? S6 : S3;
        S6: next_state = (rev) ? S0 : S7;
        S5: next_state = S0;
        S4: next_state = S0;
        S2: next_state = S0;
        default: next_state = S0; // Default to initial state
    endcase
end

// Output logic
always @(posedge clk or negedge rst_n) begin
    if (!rst_n)
        state <= S0; // Reset to initial state S0
    else
        state <= current_state;
end

endmodule
