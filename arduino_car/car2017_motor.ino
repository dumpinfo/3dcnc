/************************ZZU Robot******************
 * 文件名:car2017_motor
 * 描述:循迹小车马达测试程序,串口返回设置速度
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

//速度误差值,以左轮为速度基准,小车跑直线时右轮速度误差,得意跑直线时实际设置的R-L
//12个数组分别为-240,-200,-160,-120,-80,-40,40,80,120,160,200,240时的误差
static int motor_offset[12] = {0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0};

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

}

void loop() {
  // put your main code here, to run repeatedly:
  //速度从-255~255逐渐加快
  int move_speed = 255;
  while (move_speed-- >= -255) {
    Move(move_speed, move_speed);
    Serial.print("speed=");
    Serial.println(move_speed);
    delay(2);
  }
  //速度从255~-255逐渐减慢
  while (move_speed++ <= 255) {
    Move(move_speed, move_speed);
    Serial.print("speed=");
    Serial.println(move_speed);
    delay(2);
  }
}

/**
   函数功能：设置小车的两个轮子转速
   入口参数：L左轮输出速度，范围0~255
   入口参数：R右轮输出速度，范围0~255
   返回参数：无
*/
void Move(int L, int R) {
  int area, remainder; //区间，余数

  //直行指示灯
  if(L==R)
    digitalWrite(13, HIGH);
   else
    digitalWrite(13, LOW);
   
  //左轮方向管脚设置
  if (L > 0) {
    digitalWrite(IN1, HIGH);
    digitalWrite(IN2, LOW);
  }
  else if (L < 0) {
    digitalWrite(IN1, LOW);
    digitalWrite(IN2, HIGH);
  }
  else {
    digitalWrite(IN1, LOW);
    digitalWrite(IN2, LOW);
  }

  //右轮方向管脚设置
  if (R > 0) {
    digitalWrite(IN3, HIGH);
    digitalWrite(IN4, LOW);
  }
  else if (R < 0) {
    digitalWrite(IN3, LOW);
    digitalWrite(IN4, HIGH);
  }
  else {
    digitalWrite(IN3, LOW);
    digitalWrite(IN4, LOW);
  }

  //速度误差矫正计算
  /*************************************************************************************************************/
  area = R / 40;
  remainder = R % 40;

  if (R > 0 && R <= 40)
    R = R - motor_offset[6];
  else if (R > 40 && R < 240)
    R = R - (motor_offset[area + 6] + (motor_offset[area + 6 + 1] - motor_offset[area + 6]) * remainder / 40);
  else if (R >= 240)
    R = R - motor_offset[11];
  else if (R < 0 && R >= -40)
    R = R - motor_offset[5];
  else if (R < -40 && R > -240)
    R = R - (motor_offset[area + 6] + (motor_offset[area + 6 - 1] - motor_offset[area + 6]) * (-remainder) / 40);
  else if (R <= -240)
    R = R - motor_offset[0];
  else
    R = 0;
/************************************看不懂的可以把上面函数删了，影响不大************************************/

  L = abs(L);
  R = abs(R);
  if (L > 0xff) L = 0xff;
  if (R > 0xff) R = 0xff;

  //速度设置
  analogWrite(ENA, L);
  analogWrite(ENB, R);
}

