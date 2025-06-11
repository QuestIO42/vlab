#!/bin/sh
echo "Welcome do DC/UFSCar synthesis service. Trying..."
date

echo "Stopping other Quartus processes..."
P=`ps ax | grep 'quartus_' | grep -v grep | awk '{ print $1 }'`

echo "PID = $P"

kill $P
kill $P
sleep 1
kill -9 $P
kill -9 $P

export HOME=`pwd`
D=`date +%Y-%m-%d-%H-%M-%S`

cp /srv/QuestIO42/vlab/html/editors/fpga/top.sv /home/vlab/quartus
cp /srv/QuestIO42/vlab/html/editors/fpga/top.sv /home/vlab/quartus/build_history/$D
cd /home/vlab/quartus

make clean
make program

date 
exit
