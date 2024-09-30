#!/bin/sh
echo "Welcome do DC/UFSCar assembly service. Trying..."
date

export HOME=`pwd`
D=`date +%d-%m-%Y-%H-%M-%S`

cp /srv/QuestIO42/vlab/html/editors/fpga/top.asm /home/vlab/quartus/up1/assembler
cp /srv/QuestIO42/vlab/html/editors/fpga/top.asm /home/vlab/quartus/build_history/assembly/$D
cd /home/vlab/quartus/up1/assembler
./assembler.py top.asm 
cp top.bin /home/vlab/quartus/ 

date 
exit
