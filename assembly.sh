#!/bin/sh
echo "Welcome do DC/UFSCar assembly service. Trying..."
date

export HOME=`pwd`
D=`date +%d-%m-%Y-%H-%M-%S`

cp /var/www/html/editors/fpga/top.asm /home/vlab/Workspace/up1/assembler
cp /var/www/html/editors/fpga/top.asm /home/vlab/build_history/assembly/$D
cd /home/vlab/Workspace/up1/assembler
./assembler.py top.asm 
rm /home/vlab/golden/golden.srcs/sources_1/imports/new/top.bin
cp top.bin /home/vlab/golden/golden.srcs/sources_1/imports/new/ 

date 
exit
