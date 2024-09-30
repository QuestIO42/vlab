#!/usr/bin/env python3

#https://blog.sommerfeldsven.de/monitor-raspberry-pi-cpu-temperature-and-display-it-in-openhab/
#https://thingsmatic.com/2017/02/01/self-monitoring-a-raspberry-pi-with-mqtt/

import random
import time
import psutil
import sys

from datetime import datetime
from gpiozero import CPUTemperature
from paho.mqtt import client as mqtt_client
from paho.mqtt import publish
from subprocess import check_output

broker = 'mosquitto.dc.ufscar.br'
port = 1883
topic = "PI4/"
client_id = f'python-mqtt-{random.randint(0, 1000)}'

def get_temp():
    temp = CPUTemperature().temperature
    return "{{ temp: {0:.2f}, timestamp: {1} }}".format(temp, time.time())

def get_disk_usage():
    disk = psutil.disk_usage('/').percent
    return "{{ disk: {0}%, timestamp: {1} }}".format(disk, time.time())

def get_memory_usage():
    ram = psutil.virtual_memory().percent
    return "{{ ram: {0}%, timestamp: {1} }}".format(ram, time.time())

def get_cpu_usage():
    cpu = psutil.cpu_percent(interval=None)
    return "{{ cpu: {0}%, timestamp: {1} }}".format(cpu, time.time())

def get_ips(): #TODO: psutils.get_ip_...
    return check_output(['hostname', '--all-ip-addresses'])

def connect_mqtt():
    def on_connect(client, userdata, flags, rc):
        if rc == 0:
            print("Connected to MQTT Broker!")
        else:
            print("Failed to connect, return code %d\n", rc)
    # Set Connecting Client ID
    client = mqtt_client.Client(client_id)
    client.username_pw_set("***", "***")
    client.on_connect = on_connect
    client.connect(broker, port)
    return client

def publish(client, topic, msg):
     result = client.publish(topic, msg, retain=True)
     # result: [0, 1]
     status = result[0]
     if status == 0:
         print(f"Send `{msg}` to topic `{topic}`")
     else:
         print(f"Failed to send message to topic {topic}")

def run():
    client = connect_mqtt()
    client.loop_start()
    publish(client, topic + "temp", get_temp())
    publish(client, topic + "disk", get_disk_usage())
    publish(client, topic + "ram", get_memory_usage())
    publish(client, topic + "cpu", get_cpu_usage())
    publish(client, topic + "ips", get_ips())

if __name__ == '__main__':
    run()
