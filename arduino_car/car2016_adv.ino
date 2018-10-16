#define D1 A0
#define D2 A1
#define D3 A2
#define D4 A3
#define IN1 2
#define IN2 4
#define IN3 5
#define IN4 7
#define ENA 3
#define ENB 6

#define RUNSPEED 0x80
#define TURNSPEED 0x60

int Read(void);
void Move(int speed_l,int speed_r);


void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);
  pinMode(IN1,OUTPUT);
  pinMode(IN2,OUTPUT);
  pinMode(IN3,OUTPUT);
  pinMode(IN4,OUTPUT);
  pinMode(ENA,OUTPUT);
  pinMode(ENB,OUTPUT);
   Serial.println("START");
}

void loop() {
  // put your main code here, to run repeatedly:

}

int Read(void){
 static int situation=0;
  int temp;
  temp=digitalRead(D1)+digitalRead(D2)*10+digitalRead(D3)*100+digitalRead(D4)*1000;    
  switch(temp){
  case 0001: 
  case 0011:
    situation=3;
    break;
  case 0010:
    situation=1;
    break;
  case 1000: 
  case 1100:
    situation=-3;
    break;
  case 0100:
    situation=-1;
    break;
  case 0000: 
    if(situation<=-2)
      situation=-2;
    else if(situation>=2)
      situation=2;
    else
      situation=0;
  }
}

void Move(int L,int R){
  Serial.print("L=");
  Serial.println(L);
  Serial.print("R=");
  Serial.println(R);
  if(L>0){
    digitalWrite(IN1,HIGH);
    digitalWrite(IN2,LOW);
  }
  else if(L==0){
    digitalWrite(IN1,LOW);
    digitalWrite(IN2,LOW);
  }
  else{
    digitalWrite(IN1,LOW);
    digitalWrite(IN2,HIGH);
    L=-L;
  }
  if(R>0){
    digitalWrite(IN3,HIGH);
    digitalWrite(IN4,LOW);
  }
  else if(R==0){
    digitalWrite(IN3,LOW);
    digitalWrite(IN4,LOW);
  }
  else{
    digitalWrite(IN3,LOW);
    digitalWrite(IN4,HIGH);
    R=-R;
  }
  if(L>0xff) L=0xff;
  if(R>0xff) R=0xff;
  analogWrite(ENA,L);
  analogWrite(ENB,R);
}
