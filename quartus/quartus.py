#!/bin/env python3

# https://github.com/emqx/MQTT-Client-Examples/blob/master/mqtt-client-Python3/pub_sub_tcp.py

import sys
import random
import subprocess
from paho.mqtt import client as mqtt_client

broker = 'localhost'
port = 1883
topic = "quartus/mqtt"
# Generate a Client ID with the subscribe prefix.
client_id = f'subscribe-{random.randint(0, 100)}'
# username = 'emqx'
# password = 'public'

def connect_mqtt() -> mqtt_client:
    def on_connect(client, userdata, flags, rc):
        if rc == 0:
            print("Connected to MQTT Broker!")
        else:
            print("Failed to connect, return code %d\n", rc)

    client = mqtt_client.Client(client_id)
    # client.username_pw_set(username, password)
    client.on_connect = on_connect
    client.connect(broker, port)
    return client


def subscribe(client: mqtt_client):
    def on_message(client, userdata, msg):
        print(f"Received `{msg.payload.decode()}` from `{msg.topic}` topic")
        make_command = msg.payload.decode().split()
        make_proc = subprocess.Popen(make_command, shell=False, stdout=subprocess.PIPE, stderr=subprocess.STDOUT)
        stdout, stderr = make_proc.communicate()
        print("stdout: {}".format(stdout))
        print("stderr: {}".format(stderr))
        print("Return code: {}".format(make_proc.returncode))

    client.subscribe(topic)
    client.on_message = on_message

def run():
    client = connect_mqtt()
    subscribe(client)
    client.loop_forever()


if __name__ == '__main__':
    run()

