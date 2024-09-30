#!/bin/sh
echo "Welcome do DC/UFSCar simulation service. Trying..."

rm dump.* a.out
iverilog -Wall top.v
vvp a.out
/usr/bin/python3.6 vcd2wavedrom.py -i dump.vcd > dump.json

date 
exit