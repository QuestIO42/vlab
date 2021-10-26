#include <SPI.h> 
#include <Ethernet.h> 

byte mac[] = {0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED};
byte ip[]      = {200,  18,  99, 147}; // Acesse http://mega.dc.ufscar.br/ para controlar
byte gateway[] = {200,  18,  99, 129}; 
byte subnet[]  = {255, 255, 255, 128}; 
EthernetServer server(80); 

const int blueLedPin = 6; 
String readString = String(30); 
int status = 0; 

void setup(){
  Ethernet.begin(mac, ip, gateway, subnet); 
  server.begin(); 
  pinMode(blueLedPin, OUTPUT); 
  digitalWrite(blueLedPin, LOW); 
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
             digitalWrite(blueLedPin, HIGH); 
             status = 1; 
           } 
           else { 
             digitalWrite(blueLedPin, LOW); 
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
           client.println("<h2>LED:</h2>"); 
           if (status == 1) { 
             client.println("<form method=get name=LED><input type=hidden name=ledParam value=0 /><input type=submit value=APAGAR /></form>");
           }
           else { 
             client.println("<form method=get name=LED><input type=hidden name=ledParam value=1 /><input type=submit value=ACENDER /></form>");
           }
           client.println("<hr/>"); 
           client.println("<h2>Status do LED:</h2>"); 
           if (status == 1){ 
             client.println("<font color='blue' size='5'>ACESO</font>"); 
           } 
           else { 
             client.println("<font color='gray' size='5'>APAGADO</font>"); 
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

