int LA=7,LB=8,RA=9,RB=10,PWML=5,PWMR=6;
int IN1,IN2,IN3,IN4,MIX,DT;
unsigned long starttime,stoptime,looptime;
void setup()
{

  pinMode(LA,OUTPUT); 
  pinMode(LB,OUTPUT); 
  pinMode(RA,OUTPUT); 
  pinMode(RB,OUTPUT); 

}

void loop()

{
start:
TEST();
switch(MIX)
    {   
    case 0:FORW(0);break;
    case 100:turL();break;
    case 10:turR();break;
    case 1000:starttime=millis();do {TEST();if (IN4==1){FORW(50);goto start;}stoptime=millis();looptime=stoptime-starttime;} while(looptime<45);
BACK(75);STOP(50);do {TEST();crcL(0,135);} while(MIX!=100);crcR(85,100);STOP(100);break;
    case 1:starttime=millis();do {TEST();if (IN1==1){FORW(50);goto start;}stoptime=millis();looptime=stoptime-starttime;} while(looptime<45);
BACK(75);STOP(50);do {TEST();crcR(0,135);} while(MIX!=10);crcL(85,100);STOP(100);break;
    case 1100:starttime=millis();do {TEST();if (IN4==1){FORW(50);goto start;}stoptime=millis();looptime=stoptime-starttime;} while(looptime<45);
BACK(75);STOP(50);do {TEST();crcL(0,135);} while(MIX!=100);crcR(85,100);STOP(100);break;
    case 11:starttime=millis();do {TEST();if (IN1==1){FORW(50);goto start;}stoptime=millis();looptime=stoptime-starttime;} while(looptime<45);
BACK(75);STOP(50);do {TEST();crcR(0,135);} while(MIX!=10);crcL(85,100);STOP(100);break;
    case 1111:FORW(50);break;
    
    }
}

 void STOP(int DS)    //停止
  {
    digitalWrite(LA,0);
    digitalWrite(LB,0);
    digitalWrite(RA,0);
    digitalWrite(RB,0);
    delay(DS);
  }
  void FORW(int DF)    //前进
  {
    digitalWrite(LA,1);
    digitalWrite(LB,0);
    digitalWrite(RA,1);
    digitalWrite(RB,0);
      analogWrite(PWML,85);
      analogWrite(PWMR,85);
      delay(DF);
  }
  void BACK(int DB)    //后退
  {
    digitalWrite(LA,0);
    digitalWrite(LB,1);
    digitalWrite(RA,0);
    digitalWrite(RB,1);
      analogWrite(PWML,130);
      analogWrite(PWMR,130);
      delay(DB);
  }
  void turL()    //左转
  { digitalWrite(LA,1);
    digitalWrite(LB,0);
    digitalWrite(RA,1);
    digitalWrite(RB,0);
      analogWrite(PWML,0);
      analogWrite(PWMR,125);
  }
   void turR()  //右转
  { digitalWrite(LA,1);
    digitalWrite(LB,0);
    digitalWrite(RA,1);
    digitalWrite(RB,0);
      analogWrite(PWML,125);
      analogWrite(PWMR,0);
  }
    void crcL(int DCL,int L )   //    左旋
  { digitalWrite(LA,0);
    digitalWrite(LB,1);
    digitalWrite(RA,1);
    digitalWrite(RB,0);
      analogWrite(PWML,L);
      analogWrite(PWMR,L);
      delay(DCL);
  }
  void crcR(int DCR,int R)     //    右旋
  { digitalWrite(LA,1);
    digitalWrite(LB,0);
    digitalWrite(RA,0);
    digitalWrite(RB,1);
      analogWrite(PWML,R);
      analogWrite(PWMR,R);
      delay(DCR);
  }

 void TEST()
{
  IN1=digitalRead(17);
  IN2=digitalRead(16);
  IN3=digitalRead(15);
  IN4=digitalRead(14);
  MIX=IN1*1000+IN2*100+IN3*10+IN4;
}



