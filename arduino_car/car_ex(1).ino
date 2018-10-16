const int ENA=6;
const int ENB=5;
const int IN1=11;
const int IN2=10;
const int IN3=9;
const int IN4=8;
const int D1=3;
const int D2=2;
const int D3=4;
const int D4=7;
const int START=12;
int read();//这个一个函数声明
           //这个函数用来读取红外传感器状态
void move(int left,int right);//这是一个函数声明
                              //这个函数用来更改左右轮子转速以及方向
                              //方向由参数left和right的正负决定
                              //转速由left和right的绝对值决定
/*这两个函数的定义在loop（）函数之后*/
void setup() 
{
  // put your setup code here, to run once:
pinMode(IN1,OUTPUT);
pinMode(IN2,OUTPUT);
pinMode(IN3,OUTPUT);
pinMode(IN4,OUTPUT);
pinMode(ENA,OUTPUT);
pinMode(ENB,OUTPUT);
pinMode(D1,INPUT);
pinMode(D2,INPUT);
pinMode(D3,INPUT);
pinMode(D4,INPUT);
pinMode(START,INPUT);
move(0,0);
while(!digitalRead(START));

}


void loop() 
{
  // put your main code here, to run repeatedly:
  
 
int a=read();
//move(0,0);
//delay(5);
switch(a)
  {
   //直行
    case 1111:
    move(0,0);
    break;
    case 0000:
    move(80,80);
    break;

  //左转相关
    case 100:
    move(0,0);
    delay(40);
   if(read()==100)
   {
    move(-200,200);
    while(read()!=0000);
    move(0,0);
   }
   else if(read()==1100)
   goto LEFT_A;
    break;


    case 1100:
    LEFT_A:move(0,0);
    delay(40);
    if(read()==1100)
    {
     move(-50,50);
     while(read()!=0000);
     move(0,0);
    }
    break;
    
    case 1000:
    move(0,0);
    delay(40);
    if(read()==1000)
    {
    move(-200,200);
    while(read()!=0000);
    move(0,0);
    }
     else if(read()==1100)
     goto LEFT_A;
    break;
    
  
    

    //向右转相关
    case 11:
    RIGHT_A:move(0,0);
    delay(40);
    if(read()==11)
   {
    move(50,-50);
    while(read()!=0000);
    move(0,0);
   }
    break;
    
    case 1:
    move(0,0);
    delay(40);
   if(read()==1)
   {
    move(200,-200);
    while(read()!=0000);
    move(0,0);
   }
   else if(read()==11)
   goto RIGHT_A;
    break;
  
    case 10:
    move(0,0);
    delay(40);
    if(read()==10)
   {
    move(200,-200);
    while(read()!=0000);
    move(0,0);
   }
   else if(read()==11)goto RIGHT_A;
   break;

   
   default:break;
   }
}

int read()
{
  int num,DATA_D4=0,DATA_D3=0,DATA_D2=0,DATA_D1=0;
  if(digitalRead(D4)){delay(2);if(digitalRead(D4))DATA_D4=1;}
  if(digitalRead(D3)){delay(2);if(digitalRead(D3))DATA_D3=1;}
  if(digitalRead(D2)){delay(2);if(digitalRead(D2))DATA_D2=1;}
  if(digitalRead(D1)){delay(2);if(digitalRead(D1))DATA_D1=1;}
  num=
  DATA_D4*1000
  +DATA_D3*100
  +DATA_D2*10
  +DATA_D1;
//  num=
//  digitalRead(D4)*1000
//  +digitalRead(D3)*100
//  +digitalRead(D2)*10
//  +digitalRead(D1);
  return num;
}

void move(int left,int right)
{
    if(left<0)//如果left小于零，规定左侧转向为反，转速为|left|，即-left
      {
        digitalWrite(IN1,HIGH);
        digitalWrite(IN2,LOW);//设置左侧转向为反
        analogWrite(ENA,-left);//设置左侧转速为|left|
      }
      else if(left==0)analogWrite(ENA,0);
    else //如果left大于零，规定左侧转向为正，转速为|left|
      {
        digitalWrite(IN1,LOW);
        digitalWrite(IN2,HIGH);
        analogWrite(ENA,left);
      }

    //同理，规定右侧转向和转速
    if(right<0)
      {
        digitalWrite(IN3,HIGH);
        digitalWrite(IN4,LOW);
        analogWrite(ENB,-right);
      }
      else if(right==0)analogWrite(ENB,0);
    else 
      {
          digitalWrite(IN3,LOW);
          digitalWrite(IN4,HIGH);
          analogWrite(ENB,right);
      }
}
