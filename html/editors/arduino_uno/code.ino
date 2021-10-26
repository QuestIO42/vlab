#include <SPI.h> 
#include <Ethernet.h> 

byte mac[] = {0xCA, 0xFE, 0xBA, 0xBE, 0xFE, 0xED};
byte ip[]      = {200,  18,  99, 146}; // Acesse http://uno.dc.ufscar.br/ para comandar 
byte gateway[] = {200,  18,  99, 129}; 
byte subnet[]  = {255, 255, 255, 128}; 
EthernetServer server(80); 

const int greenLedPin = 6; 
const int   redLedPin = 7; 
String readString = String(30); 
int status = 0; 

void setup(){
  Ethernet.begin(mac, ip, gateway, subnet); 
  server.begin(); 
  pinMode(greenLedPin, OUTPUT); 
  pinMode(redLedPin, OUTPUT); 
  digitalWrite(greenLedPin, LOW); 
  digitalWrite(redLedPin, HIGH); 
}

void loop(){
  EthernetClient client = server.available(); 
  if (client) { 
     while (client.connected()) {
       if (client.available()) { 
       char c = client.read(); 
       if (readString.length() < 100) {
         readString += c; 
       }  
       if (c == '\n') { 
         if (readString.indexOf("?") < 0) { 
         }
         else 
           if(readString.indexOf("ledParam=1") > 0) {
             digitalWrite(greenLedPin, HIGH); 
             digitalWrite(redLedPin, LOW); 
             status = 1; 
           } 
           else { 
             digitalWrite(greenLedPin, LOW); 
             digitalWrite(redLedPin, HIGH); 
             status = 0; 
           }
           client.println("HTTP/1.1 200 OK"); 
           client.println("Content-Type: text/html"); 
           client.println(""); 
           client.println("<!DOCTYPE HTML>"); 
           client.println("<html>"); 
           client.println("<head>");
           client.println("<title>Lab. Remoto - DC/UFSCar</title>"); 
           client.println("</head>"); 
           client.println("<body style=background-color:#E0E0E0>"); 
           client.println("<center>");
           client.println("<h1>Lab. Remoto - DC/UFSCar</h1>");
           client.println("<hr/>"); 
           client.println("<h2>Tornar LED:</h2>"); 
           if (status == 1) { 
             client.println("<form method=get name=LED><input type=hidden name=ledParam value=0 /><input type=submit value=VERMELHO /></form>");
           }
           else { 
             client.println("<form method=get name=LED><input type=hidden name=ledParam value=1 /><input type=submit value=VERDE /></form>");
           }
           client.println("<hr/>"); 
           client.println("<h2>Status do LED:</h2>"); 
           if (status == 1){ 
             client.println("<font color='green' size='5'>VERDE</font>"); 
           } 
           else { 
             client.println("<font color='red' size='5'>VERMELHO</font>"); 
           }     
           client.println("<hr/>"); 
           client.println("</center>");
           client.println("</body>"); 
           client.println("</html>"); 
           readString=""; 
           client.stop(); 
         }
       }
     }
   }
 }

