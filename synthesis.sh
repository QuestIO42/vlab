#!/bin/sh
echo "Welcome do DC/UFSCar synthesis service. Trying..."
date

echo "Stopping other Vivado processes..."
P=`ps ax | grep vivado | grep -v color | awk '{ print $1 }'`

echo "PID = $P"

kill $P
kill $P
sleep 1
kill -9 $P
kill -9 $P

export HOME=`pwd`
D=`date +%d-%m-%Y-%H-%M-%S`

cp /var/www/html/editors/fpga/top.sv /home/vlab/golden/golden.srcs/sources_1/imports/new
cp /var/www/html/editors/fpga/top.sv /home/vlab/build_history/fpga/$D
cd /home/vlab/golden

/opt/Xilinx/Vivado/2019.2/bin/vivado -mode tcl -source flow.tcl

date 
exit
