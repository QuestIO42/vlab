#!/bin/bash

export PATH=$PATH:/var/local/Gowin_V1.9.10.03_Education_linux/IDE/bin
export LD_PRELOAD=/lib/x86_64-linux-gnu/libfreetype.so

echo "Welcome do DC/UFSCar synthesis service. Trying..."
date

echo "Stopping other Gowin processes..."
P=`ps ax | grep gw | grep -v color | awk '{ print $1 }'`

echo "PID = $P"

kill $P
kill $P
sleep 1
kill -9 $P
kill -9 $P

export HOME=`pwd`
D=`date +%d-%m-%Y-%H-%M-%S`

#cp /var/www/html/editors/fpga/top.sv /home/vlab/golden/golden.srcs/sources_1/imports/new
#cp /var/www/html/editors/fpga/top.sv /home/vlab/build_history/fpga/$D
cd /home/vlab/gowin

gw_sh flow.tcl

date 
exit
