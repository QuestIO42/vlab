#!/usr/bin/env python3
import os
import requests
from time import sleep
from dotenv import load_dotenv

# Carregar variáveis do arquivo .env
load_dotenv()

# Ler o URL e o Token do Home Assistant a partir do .env
HA_URL = os.getenv("HOME_ASSISTANT_URL")
HA_TOKEN = os.getenv("HOME_ASSISTANT_TOKEN")

# Configurar os cabeçalhos da requisição
headers = {
    "Authorization": f"Bearer {HA_TOKEN}",
    "Content-Type": "application/json"
}

# Exemplo 1: Consultar o estado do switch
def get_switch_state(entity_id):
    url = f"{HA_URL}/api/states/{entity_id}"
    response = requests.get(url, headers=headers)
    if response.status_code == 200:
        data = response.json()
        print(f"Estado atual de {entity_id}: {data['state']}")
        return data
    else:
        print(f"Erro ao consultar estado: {response.status_code}")
        print(response.text)
        return None

# Exemplo 2: Ligar o switch
def turn_on_switch(entity_id):
    url = f"{HA_URL}/api/services/switch/turn_on"
    payload = {"entity_id": entity_id}
    response = requests.post(url, headers=headers, json=payload)
    if response.status_code == 200:
        print(f"{entity_id} foi ligado com sucesso!")
    else:
        print(f"Erro ao ligar {entity_id}: {response.status_code}")
        print(response.text)

# Exemplo 3: Desligar o switch
def turn_off_switch(entity_id):
    url = f"{HA_URL}/api/services/switch/turn_off"
    payload = {"entity_id": entity_id}
    response = requests.post(url, headers=headers, json=payload)
    if response.status_code == 200:
        print(f"{entity_id} foi desligado com sucesso!")
    else:
        print(f"Erro ao desligar {entity_id}: {response.status_code}")
        print(response.text)

# Usar as funções
if __name__ == "__main__":
    switch_id = "switch.vlabpixar"
    get_switch_state(switch_id)  # Consultar o estado
    turn_on_switch(switch_id)    # Ligar o switch
    sleep(30)                    # Esperar 30 segundos
    turn_off_switch(switch_id)   # Desligar o switch
