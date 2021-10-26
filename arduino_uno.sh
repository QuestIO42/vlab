#!/bin/sh
echo "Welcome do DC/UFSCar compilation service. Trying..."
date

echo "TARGET = $1"

D=`date +%d-%m-%Y-%H-%M-%S`

cp /var/www/html/editors/arduino_uno/code.ino /home/vlab/arduino_uno/ardu.ino
cp /var/www/html/editors/arduino_uno/code.ino /home/vlab/build_history/arduino_uno/$D
cd /home/vlab/arduino_uno

make $1

echo
date

sleep 10

exit
