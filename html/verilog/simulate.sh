#!/bin/sh
echo "Welcome do DC/UFSCar simulation service. Trying..."
whoami 

rm dump.* a.out
iverilog -Wall top.v
vvp a.out
/usr/bin/python3 vcd2wavedrom.py -i dump.vcd > dump.json

date 
exit
