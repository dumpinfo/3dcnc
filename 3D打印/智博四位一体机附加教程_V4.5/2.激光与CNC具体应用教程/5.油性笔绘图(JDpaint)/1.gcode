G21; 单位mm 
G90; 绝对坐标 
M106 S255; 测试激光 
M107; close 
;G28; home 
G92 Z0 
G0 F1000 Z1 
G92 X0 Y0
;文件头结束
;%00001
;G54
;M03 X8
;G0 G90 ;G17
;G28
;T0 ;[平底]JD-0.50;
G00 X19.573 Y14.351 ;Z10.000
G00 X19.573 Y14.351 ;Z4.900
G01 X19.573 Y14.351 ;Z-0.100F300

;--开启激光-->
;M106 S255; open
G01 Z0 F2000; open
G4 P200; delay 0.2s
G01 F150.0; 设雕刻速度
G01 X19.573 Y15.748 ;Z-0.100 F150.0
G01 X26.177 Y15.748 ;Z-0.100
G00 X26.177 Y15.748 ;Z10.000
;<--关闭激光--
;M106 S0; close
G01 Z1.0 F2000; open
G4 P200 ; delay 0.2s
G01 F2000; 设空载速度
G00 X9.667 Y16.002 ;Z10.000
G00 X9.667 Y16.002 ;Z4.900
G01 X9.667 Y16.002 ;Z-0.100F300

;--开启激光-->
;M106 S255; open
G01 Z0 F2000; open
G4 P200; delay 0.2s
G01 F150.0; 设雕刻速度
G01 X8.143 Y13.970 ;Z-0.100 F150.0
G00 X8.143 Y13.970 ;Z10.000
;<--关闭激光--
;M106 S0; close
G01 Z1.0 F2000; open
G4 P200 ; delay 0.2s
G01 F2000; 设空载速度
G00 X7.889 Y11.049 ;Z10.000
G00 X7.889 Y11.049 ;Z4.900
G01 X7.889 Y11.049 ;Z-0.100F300

;--开启激光-->
;M106 S255; open
G01 Z0 F2000; open
G4 P200; delay 0.2s
G01 F150.0; 设雕刻速度
G01 X9.134 Y11.049 ;Z-0.100 F150.0
G01 X11.064 Y13.589 ;Z-0.100
G00 X11.064 Y13.589 ;Z10.000
;<--关闭激光--
;M106 S0; close
G01 Z1.0 F2000; open
G4 P200 ; delay 0.2s
G01 F2000; 设空载速度
G00 X26.177 Y11.049 ;Z10.000
G00 X26.177 Y11.049 ;Z4.900
G01 X26.177 Y11.049 ;Z-0.100F300

;--开启激光-->
;M106 S255; open
G01 Z0 F2000; open
G4 P200; delay 0.2s
G01 F150.0; 设雕刻速度
G01 X20.335 Y11.049 ;Z-0.100 F150.0
G00 X20.335 Y11.049 ;Z10.000
;<--关闭激光--
;M106 S0; close
G01 Z1.0 F2000; open
G4 P200 ; delay 0.2s
G01 F2000; 设空载速度
G00 X26.177 Y7.747 ;Z10.000
G00 X26.177 Y7.747 ;Z4.900
G01 X26.177 Y7.747 ;Z-0.100F300

;--开启激光-->
;M106 S255; open
G01 Z0 F2000; open
G4 P200; delay 0.2s
G01 F150.0; 设雕刻速度
G01 X19.065 Y7.747 ;Z-0.100 F150.0
G00 X19.065 Y7.747 ;Z10.000
;<--关闭激光--
;M106 S0; close
G01 Z1.0 F2000; open
G4 P200 ; delay 0.2s
G01 F2000; 设空载速度
G00 X11.953 Y10.287 ;Z10.000
G00 X11.953 Y10.287 ;Z4.900
G01 X11.953 Y10.287 ;Z-0.100F300

;--开启激光-->
;M106 S255; open
G01 Z0 F2000; open
G4 P200; delay 0.2s
G01 F150.0; 设雕刻速度
G01 X10.683 Y8.509 ;Z-0.100 F150.0
G00 X10.683 Y8.509 ;Z10.000
;<--关闭激光--
;M106 S0; close
G01 Z1.0 F2000; open
G4 P200 ; delay 0.2s
G01 F2000; 设空载速度
G00 X18.557 Y11.049 ;Z10.000
G00 X18.557 Y11.049 ;Z4.900
G01 X18.557 Y11.049 ;Z-0.100F300

;--开启激光-->
;M106 S255; open
G01 Z0 F2000; open
G4 P200; delay 0.2s
G01 F150.0; 设雕刻速度
G01 X17.033 Y11.049 ;Z-0.100 F150.0
G01 X14.493 Y13.589 ;Z-0.100
G01 X12.715 Y13.589 ;Z-0.100
G00 X12.715 Y13.589 ;Z10.000
;<--关闭激光--
;M106 S0; close
G01 Z1.0 F2000; open
G4 P200 ; delay 0.2s
G01 F2000; 设空载速度
G00 X31.003 Y20.000 ;Z10.000
G00 X31.003 Y20.000 ;Z4.900
G01 X31.003 Y20.000 ;Z-0.100F300

;--开启激光-->
;M106 S255; open
G01 Z0 F2000; open
G4 P200; delay 0.2s
G01 F150.0; 设雕刻速度
G01 X31.003 Y0.000 ;Z-0.100 F150.0
G01 X0.003 Y0.000 ;Z-0.100
G01 X0.003 Y20.000 ;Z-0.100
G01 X31.003 Y20.000 ;Z-0.100
G00 X31.003 Y20.000 ;Z10.000
;<--关闭激光--
;M106 S0; close
G01 Z1.0 F2000; open
G4 P200 ; delay 0.2s
G01 F2000; 设空载速度
;G91 ;G28 M09

G00 x0 y0 

M106 S3; open 1% 
M107; close 
g00 z10 


