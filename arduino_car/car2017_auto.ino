/************************ZZU Robot******************
 * 文件名:car2017_auto
 * 描述:循迹小车循迹程序
 * 作者:郑州大学智能机器人协会
 * 创建日期:2017.12.3
 * 维护人:
 * 维护日期:
 **************************************************/

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

#define SPEED_LINE 80           //直线速度
#define SPEED_ADJUST_LOW 0      //调整速度,低速一侧
#define SPEED_ADJUST_HIGH 80    //调整速度,高速一侧
#define SPEED_TURN_LOW -50      //转弯速度,低速一侧
#define SPEED_TURN_HIGH 100     //转弯速度,高速一侧
#define SPEED_CYCLE 100         //直角弯转圈速度
#define SPEED_TRIG 200          //制动速度

#define TIME_TRIG 10            //制动时间,单位ms
#define TIME_STOP 500           //静止时间,单位ms
#define TIME_ADJUST 1           //小弯调整时间,单位ms
#define TIME_TURN_MAX 3000      //转弯最大时间,单位ms
#define TIME_CYCLE_MAX 5000     //旋转最大时间,单位ms

//速度误差值,以左轮为速度基准,小车跑直线时右轮速度误差,得意跑直线时实际设置的R-L
//12个数组分别为-240,-200,-160,-120,-80,-40,40,80,120,160,200,240时的误差
static int motor_offset[12] = {0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0};

int t=0;//延时计时时间
int speed_l=0,speed_r=0;//当前小车左右轮的设置速度

int Read(void);
void Move(int L, int R);

void setup() {
  // put your setup code here, to run once:
  //串口初始化
  Serial.begin(9600);

  //管脚初始化
  pinMode(IN1, OUTPUT);
  pinMode(IN2, OUTPUT);
  pinMode(IN3, OUTPUT);
  pinMode(IN4, OUTPUT);
  pinMode(ENA, OUTPUT);
  pinMode(ENB, OUTPUT);
  pinMode(13, OUTPUT);

  //当小车放在地面上时开始循迹
  while (Read() != 0);
  
}

void loop() {
  // put your main code here, to run repeatedly:
  switch(Read()){
    
    //直行
    case 0:
      Move(SPEED_LINE,SPEED_LINE);
      break;
      
    //左转直角
    case 1110:
    case 1100:
      //让小车静止下来,保证小车旋转时不受之前的轮子速度影响
      if(speed_l>0&&speed_r>0)
        Move(-SPEED_TRIG,-SPEED_TRIG);
      if(speed_l>0&&speed_r<0)
        Move(SPEED_TRIG,-SPEED_TRIG);
      if(speed_l>0&&speed_r<0)
        Move(-SPEED_TRIG,SPEED_TRIG);
      delay(TIME_TRIG);
      Move(0,0);
      delay(TIME_STOP);

      //原地旋转
      Move(-SPEED_CYCLE,SPEED_CYCLE);
      t=0;
      while(Read()!=100&&t++<TIME_CYCLE_MAX)//旋转直到只有左边第二个灯检测到黑线或超时
        delay(1);

      Move(0,0);
      break;
      
    //右转直角
    case 11:
    case 111:
      //让小车静止下来,保证小车旋转时不受之前的轮子速度影响
      if(speed_l>0&&speed_r>0)
        Move(-SPEED_TRIG,-SPEED_TRIG);
      else if(speed_l>0&&speed_r<0)
        Move(SPEED_TRIG,-SPEED_TRIG);
      else if(speed_l>0&&speed_r<0)
        Move(-SPEED_TRIG,SPEED_TRIG);
      else if(speed_l<0&&speed_r<0)
        Move(SPEED_TRIG,-SPEED_TRIG);
      delay(TIME_TRIG);
      Move(0,0);
      delay(TIME_STOP);

      //原地旋转
      Move(SPEED_CYCLE,-SPEED_CYCLE);
      t=0;
      while(Read()!=10&&t++<TIME_CYCLE_MAX)//旋转直到只有右边第二个灯检测到黑线或超时
        delay(1);

      Move(0,0);
      break;
      
    //左转大弯
    case 1000:
      Move(SPEED_TURN_LOW,SPEED_TURN_HIGH);
      t=0;
      while(Read()!=100&&t++<TIME_TURN_MAX)//旋转直到只有左边第二个灯检测到黑线或超时
        delay(1);
      break;
      
    //右转大弯
    case 1:
      Move(SPEED_TURN_HIGH,SPEED_TURN_LOW);
      t=0;
      while(Read()!=100&&t++<TIME_TURN_MAX)//旋转直到只有右边第二个灯检测到黑线或超时
        delay(1);
      break;
      
    //左转小弯调整
    case 100:
      Move(SPEED_ADJUST_LOW,SPEED_ADJUST_HIGH);
      delay(TIME_ADJUST);
      break;
      
    //右转小弯调整
    case 10:
      Move(SPEED_ADJUST_HIGH,SPEED_ADJUST_LOW);
      delay(TIME_ADJUST);
      break;
      
    //十字路口
    case 1111:
      delay(1);
      break;
    default:
      delay(1);
  }
}

/**
  * 函数功能：读取小车传感器状态
  * 入口参数：无
  * 返回参数：千位到个位分别表示四个传感器的状态，1111表示四路检测到，0表示未检测到黑线
  */
int Read(void) {
  return (digitalRead(D1) + digitalRead(D2) * 10 + digitalRead(D3) * 100 + digitalRead(D4) * 1000);
}

/**
  *函数功能：设置小车的两个轮子转速
  *入口参数：L左轮输出速度，范围0~255
  *入口参数：R右轮输出速度，范围0~255
  *返回参数：无
  */
void Move(int L, int R) {
  int area, remainder; //区间，余数

  //直行指示灯
  if(L==R)
    digitalWrite(13, HIGH);
   else
    digitalWrite(13, LOW);

  //记录设置速度,制动时使用
  speed_l=L;
  speed_r=R;
  
  //左轮方向设置
  if (L > 0) {
    digitalWrite(IN1, HIGH);
    digitalWrite(IN2, LOW);
  }
  else if (L < 0) {
    digitalWrite(IN1, LOW);
    digitalWrite(IN2, HIGH);
  } else {
    digitalWrite(IN1, LOW);
    digitalWrite(IN2, LOW);
  }

  //右轮方向设置
  if (R > 0) {
    digitalWrite(IN3, HIGH);
    digitalWrite(IN4, LOW);
  }

  else {
    digitalWrite(IN3, LOW);
    digitalWrite(IN4, HIGH);
  }

  //速度计算
  area = R / 40;
  remainder = R % 40;

  if(R>0&&R<=40)
    R = R - motor_offset[6];
  else if (R > 40 && R < 240)
    R = R - (motor_offset[area + 6] + (motor_offset[area + 6 + 1] - motor_offset[area + 6]) * remainder / 40);
  else if (R >= 240)
    R = R - motor_offset[11];
  else if(R<0&&R>=-40)
    R = R - motor_offset[5];
  else if (R < -40 && R > -240)
    R = R - (motor_offset[area + 6] + (motor_offset[area + 6 - 1] - motor_offset[area + 6]) * (-remainder) / 40);
  else if (R <= -240)
    R = R - motor_offset[0];
  else
    R = 0;

  L = abs(L);
  R = abs(R);
  if (L > 0xff) L = 0xff;
  if (R > 0xff) R = 0xff;

  //速度设置
  analogWrite(ENA, L);
  analogWrite(ENB, R);
}

