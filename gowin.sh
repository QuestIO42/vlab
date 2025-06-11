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

cd /home/vlab/gowin/src
tar zxvf $1
mv $1 ../build_history 
cd ..

gw_sh flow.tcl && openFPGALoader -b tangprimer20k impl/pnr/project.fs

date 
exit
