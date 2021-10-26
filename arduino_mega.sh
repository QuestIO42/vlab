#!/bin/sh
echo "Welcome do DC/UFSCar compilation service. Trying..."
date

echo "TARGET = $1"

D=`date +%d-%m-%Y-%H-%M-%S`

cp /var/www/html/editors/arduino_mega/code.ino /home/vlab/arduino_mega/ardu.ino
cp /var/www/html/editors/arduino_mega/code.ino /home/vlab/build_history/arduino_mega/$D
cd /home/vlab/arduino_mega

make $1

echo
date

sleep 10

exit
