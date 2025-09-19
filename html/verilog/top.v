module tb_basic;
  reg x, y;
  wire x_and_y, x_or_y, not_x, not_y;

  basic dut(x, y, x_and_y, x_or_y, not_x, not_y);

  initial begin
    $dumpvars(0);
  end

  initial begin
    x = 1'b0; y = 1'b0; #10
    x = 1'b0; y = 1'b1; #10
    x = 1'b1; y = 1'b0; #10
    x = 1'b1; y = 1'b1; #10
    $finish;
  end
endmodule

module basic(
  input x, y,
  output x_and_y, x_or_y, not_x, not_y
  );

  // continuous assignment 
  assign x_and_y = x & y;
  assign not_x = ~x;

  // basic primitives
  or (x_or_y, x, y);
  not (not_y, y);
endmodule