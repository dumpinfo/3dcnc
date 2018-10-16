/************************ZZU Robot******************
 * 文件名:car2017_sensor
 * 描述:循迹小车传感器测试程序,串口返回传感器状态
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

int Read(void);

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
  Serial.println(Read());
  delay(200);
}

/**
   函数功能：读取小车传感器状态
   入口参数：无
   返回参数：千位到个位分别表示四个传感器的状态，1111表示四路检测到，0表示未检测到黑线
*/
int Read(void) {
  return (digitalRead(D1) + digitalRead(D2) * 10 + digitalRead(D3) * 100 + digitalRead(D4) * 1000);
}

