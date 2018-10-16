#include "robotGeometry.h"
#include <math.h>
#include <Arduino.h>

RobotGeometry::RobotGeometry() {
  
}

void RobotGeometry::set(float axmm, float aymm, float azmm) {
  xmm = axmm;
  ymm = aymm;
  zmm = azmm; 
  calculateGrad();
}

float RobotGeometry::getXmm() const {
  return xmm;
}

float RobotGeometry::getYmm() const {
  return ymm;
}

float RobotGeometry::getZmm() const {
  return zmm;
}

float RobotGeometry::getRotRad() const {
  return rot;
}

float RobotGeometry::getLowRad() const {
  return low;
}

float RobotGeometry::getHighRad() const {
  return high;
}

void RobotGeometry::calculateGrad() {
  
   float rrot =  sqrt((xmm * xmm) + (ymm * ymm));    //radius from Top View//顶视图的半径
   float rside = sqrt((rrot * rrot) + (zmm * zmm));  //radius from Side View. Use rrot instead of ymm..for everything
                                                     //半径从侧面看。 使用rrot而不是ymm..for一切
   
   rot = asin(xmm / rrot);
   //Angle of Higher Stepper Motor
   //更高步进电机的角度
   high = acos((rside * 0.5) / 120.0) * 2.0;  //120mm shank length//柄长120mm
   
   //Angle of Lower Stepper Motor  (asin()=Angle To Gripper)
   //下步进电机的角度（asin（）=夹持器的角度）
   if (zmm > 0) {
     low =      asin(rrot / rside) + ((PI - high) / 2.0) - (PI / 2.0);
   } else {
     low = PI - asin(rrot / rside) + ((PI - high) / 2.0) - (PI / 2.0);
   }
   
   
   //correct higher Angle as it is mechanically bounded width lower Motor
   //修正较高的角度，因为它是机械有限宽度较低的电机
   high = high + low;
}


