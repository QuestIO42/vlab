#!/bin/env python3

# https://github.com/emqx/MQTT-Client-Examples/blob/master/mqtt-client-Python3/pub_sub_tcp.py

import random
import subprocess
from time import sleep
from paho.mqtt import client as mqtt_client
from light import turn_on_switch, turn_off_switch

BROKER = 'localhost'
PORT = 1883
TOPIC = "quartus"
CLIENT_ID = f'subscriber-{random.randint(0, 100)}'

FIRST_RECONNECT_DELAY = 1
MAX_RECONNECT_COUNT = 12
MAX_RECONNECT_DELAY = 60
RECONNECT_RATE = 2
FLAG_EXIT = False

def connect_mqtt() -> mqtt_client:

    def on_connect(client, userdata, flags, rc):
        if rc == 0:
            print("Connected to MQTT broker!")
        else:
            print("Failed to connect, return code %d\n", rc)

    def on_disconnect(client, userdata, rc):
        print("Disconnected with result code: %s", rc)
        reconnect_count, reconnect_delay = 0, FIRST_RECONNECT_DELAY
        while reconnect_count < MAX_RECONNECT_COUNT:
            print("Reconnecting in %d seconds...", reconnect_delay)
            time.sleep(reconnect_delay)
            try:
                client.reconnect()
                print("Reconnected successfully!")
                return
            except Exception as err:
                print("%s. Reconnect failed. Retrying...", err)
            reconnect_delay *= RECONNECT_RATE
            reconnect_delay = min(reconnect_delay, MAX_RECONNECT_DELAY)
            reconnect_count += 1
        print("Reconnect failed after %s attempts. Exiting...", reconnect_count)
        global FLAG_EXIT
        FLAG_EXIT = True

    client = mqtt_client.Client(CLIENT_ID)
    client.on_connect = on_connect
    client.on_disconnect = on_disconnect
    client.connect(BROKER, PORT)
    return client

def subscribe(client: mqtt_client):
    def on_message(client, userdata, msg):
        print(f"Received `{msg.payload.decode()}` from `{msg.topic}` topic")
        command = msg.payload.decode()
        if command == 'light':
            turn_on_switch("switch.vlabpixar")
            sleep(300)
            turn_off_switch("switch.vlabpixar")
        elif command == 'quartus':
            turn_on_switch("switch.vlabpixar")
            make_proc = subprocess.Popen(["./quartus.sh"], shell=False, stdout=subprocess.PIPE, stderr=subprocess.STDOUT)
            stdout, stderr = make_proc.communicate()
            client.publish(TOPIC+'/output', stdout)
            client.publish(TOPIC+'/output', stderr)
            print("stdout: {}".format(stdout))
            print("stderr: {}".format(stderr))
            print("Return code: {}".format(make_proc.returncode))
            sleep(300)
            turn_off_switch("switch.vlabpixar")
        else:
            print("Invalid command!")

    client.subscribe(TOPIC)
    client.on_message = on_message

def run():
    client = connect_mqtt()
    subscribe(client)
    client.loop_forever()

if __name__ == '__main__':
    run()
