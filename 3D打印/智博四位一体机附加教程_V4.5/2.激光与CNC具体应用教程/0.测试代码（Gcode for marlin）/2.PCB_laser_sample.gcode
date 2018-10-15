G92 x0 y0 z0 
G21;     metric values 
G90;     absolute positioning 
M107;    laser close 

M106 S100; test and origin of coordinate 
G4 P600 ;  wait 0.6s when test 
M106 S0;   test end 

;智博3D打印之PCB激光雕刻

; CopperCAM 3 - 25/09/2008 / ISO-Mill Output ;
; H:\0_ARDUINO\线路雕刻\CopperCAM.iso created 04/09/2015 at 17:14 ;
; Workpiece dimensions: 49.06 x 27.8 x 1.1 mm ;
;G00 G90 G94 G71 G40 G54 G80

;功能切换->线路烧刻; T4 M06
;M03 S8000
;G00 F800

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X9.12 Y14.29

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X9.1 Y14.46
G01 X9.05 Y14.62
G01 X8.97 Y14.77
G01 X8.87 Y14.91
G01 X8.73 Y15.01
G01 X8.58 Y15.09
G01 X8.42 Y15.14
G01 X8.25 Y15.16
G01 X8.08 Y15.14
G01 X7.92 Y15.09
G01 X7.77 Y15.01
G01 X7.63 Y14.91
G01 X7.53 Y14.77
G01 X7.45 Y14.62
G01 X7.4 Y14.46
G01 X7.38 Y14.29
G01 X7.4 Y14.12
G01 X7.45 Y13.96
G01 X7.53 Y13.81
G01 X7.63 Y13.67
G01 X7.77 Y13.57
G01 X7.92 Y13.49
G01 X8.08 Y13.44
G01 X8.25 Y13.42
G01 X8.42 Y13.44
G01 X8.58 Y13.49
G01 X8.73 Y13.57
G01 X8.87 Y13.67
G01 X8.97 Y13.81
G01 X9.05 Y13.96
G01 X9.1 Y14.12
G01 X9.12 Y14.29

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X13.69 Y15.94

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 Y20.25
G01 X12.17
G01 Y15.33
G01 X12.33
G01 X12.41 Y15.2
G01 X12.55 Y15.11
G01 X12.72 Y15.08
G01 X14.25
G01 X14.42 Y15.11
G01 X14.56 Y15.2
G01 X14.64 Y15.33
G01 X14.82
G01 Y20.25
G01 X13.68

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X13.76 Y20.17

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 Y15.94
G01 X13.61
G01 Y20.17
G01 X12.25
G01 Y15.41
G01 X12.31
G01 X12.32 Y15.34
G01 X12.41 Y15.2
G01 X12.55 Y15.11
G01 X12.72 Y15.08
G01 X14.25
G01 X14.42 Y15.11
G01 X14.56 Y15.2
G01 X14.65 Y15.34
G01 X14.66 Y15.41
G01 X14.74
G01 Y20.17
G01 X13.76

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X13.83 Y20.1

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 Y15.87
G01 X13.54
G01 Y20.1
G01 X12.32
G01 Y15.48
G01 X12.37
G01 X12.39 Y15.37
G01 X12.47 Y15.26
G01 X12.58 Y15.18
G01 X12.72 Y15.15
G01 X14.25
G01 X14.39 Y15.18
G01 X14.5 Y15.26
G01 X14.58 Y15.37
G01 X14.6 Y15.48
G01 X14.67
G01 Y20.1
G01 X13.83

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X15.86

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X15.87 Y21.25
G01 X18.71
G01 X18.7 Y20.1
G01 X18.63
G01 Y15.48
G01 X19.47
G01 Y20.1
G01 X19.42
G01 X19.43 Y21.25
G01 X19.85
G01 X19.86 Y20.1
G01 X19.83
G01 Y15.48
G01 X20.67
G01 Y20.1
G01 X20.58
G01 X20.57 Y21.25
G01 X30.83
G01 X37.58 Y12.13
G01 X37.62 Y12.09
G01 X37.73 Y12.01
G01 X37.87 Y11.98
G01 X42.11
G01 Y10.19
G01 X46.33
G01 Y12.81
G01 X42.11
G01 Y12.7
G01 X38.05
G01 X31.3 Y21.82
G01 X31.26 Y21.86
G01 X31.15 Y21.94
G01 X31.01 Y21.97
G01 X20.21
G01 X19.07
G01 X15.52
G01 X15.38 Y21.94
G01 X15.27 Y21.86
G01 X15.19 Y21.75
G01 X15.16 Y21.62
G01 X15.14 Y20.1
G01 X15.03
G01 Y15.48
G01 X15.87
G01 Y20.1
G01 X15.86

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X15.93 Y20.17

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X15.95 Y21.18
G01 X18.63
G01 X18.63 Y20.17
G01 X18.56
G01 Y15.41
G01 X19.54
G01 Y20.17
G01 X19.5
G01 X19.5 Y21.18
G01 X19.78
G01 X19.79 Y20.17
G01 X19.76
G01 Y15.41
G01 X20.74
G01 Y20.17
G01 X20.66
G01 X20.65 Y21.18
G01 X30.79
G01 X37.52 Y12.08
G01 X37.56 Y12.03
G01 X37.7 Y11.94
G01 X37.87 Y11.91
G01 X42.04
G01 Y10.12
G01 X46.4
G01 Y12.88
G01 X42.04
G01 Y12.77
G01 X38.09
G01 X31.36 Y21.87
G01 X31.32 Y21.92
G01 X31.18 Y22.01
G01 X31.01 Y22.04
G01 X20.21
G01 X19.07
G01 X15.52
G01 X15.35 Y22.01
G01 X15.21 Y21.92
G01 X15.12 Y21.78
G01 X15.09 Y21.62
G01 X15.06 Y20.17
G01 X14.96
G01 Y15.41
G01 X15.94
G01 Y20.17
G01 X15.93

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X15.93 Y20.25

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X15.95 Y21.18
G01 X18.63
G01 X18.63 Y20.25
G01 X18.48
G01 Y15.33
G01 X19.62
G01 Y20.25
G01 X19.5
G01 X19.5 Y21.18
G01 X19.78
G01 X19.79 Y20.25
G01 X19.68
G01 Y15.33
G01 X20.82
G01 Y20.25
G01 X20.66
G01 X20.65 Y21.18
G01 X30.79
G01 X37.52 Y12.08
G01 X37.56 Y12.03
G01 X37.7 Y11.94
G01 X37.87 Y11.91
G01 X41.96
G01 Y10.04
G01 X46.48
G01 Y12.96
G01 X41.96
G01 Y12.77
G01 X38.09
G01 X31.36 Y21.87
G01 X31.32 Y21.92
G01 X31.18 Y22.01
G01 X31.01 Y22.04
G01 X20.21
G01 X19.07
G01 X15.52
G01 X15.35 Y22.01
G01 X15.21 Y21.92
G01 X15.12 Y21.78
G01 X15.09 Y21.62
G01 X15.06 Y20.25
G01 X14.88
G01 Y15.33
G01 X16.02
G01 Y20.25
G01 X15.93

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X17.07 Y20.1

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X16.23
G01 Y15.48
G01 X17.07
G01 Y20.1

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X17.14 Y20.17

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X16.16
G01 Y15.41
G01 X17.14
G01 Y20.17

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X17.22 Y20.25

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X16.08
G01 Y15.33
G01 X17.22
G01 Y20.25

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X18.27 Y20.1

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X17.43
G01 Y15.48
G01 X18.27
G01 Y20.1

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X18.34 Y20.17

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X17.36
G01 Y15.41
G01 X18.34
G01 Y20.17

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X18.42 Y20.25

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X17.28
G01 Y15.33
G01 X18.42
G01 Y20.25

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X23.4 Y15.41

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X23.34 Y7.38
G01 X23.37 Y7.21
G01 X23.41 Y7.14
G01 X24.74 Y5.09
G01 Y4.5
G01 X24.01
G01 Y1.64
G01 X26.33
G01 Y4.5
G01 X25.6
G01 Y5.22
G01 X25.57 Y5.39
G01 X25.53 Y5.46
G01 X24.2 Y7.51
G01 X24.27 Y15.41
G01 X24.34
G01 Y20.17
G01 X23.36
G01 Y15.41
G01 X23.4

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X23.4 Y15.33

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X23.34 Y7.38
G01 X23.37 Y7.21
G01 X23.41 Y7.14
G01 X24.74 Y5.09
G01 Y4.58
G01 X23.94
G01 Y1.56
G01 X26.4
G01 Y4.58
G01 X25.6
G01 Y5.22
G01 X25.57 Y5.39
G01 X25.53 Y5.46
G01 X24.2 Y7.51
G01 X24.27 Y15.33
G01 X24.42
G01 Y20.25
G01 X23.28
G01 Y15.33
G01 X23.4

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X23.48 Y15.48

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X23.41 Y7.38
G01 X23.44 Y7.24
G01 X23.47 Y7.18
G01 X24.81 Y5.11
G01 Y4.43
G01 X24.08
G01 Y1.71
G01 X26.25
G01 Y4.43
G01 X25.53
G01 Y5.22
G01 X25.5 Y5.36
G01 X25.47 Y5.42
G01 X24.13 Y7.49
G01 X24.2 Y15.48
G01 X24.27
G01 Y20.1
G01 X23.43
G01 Y15.48
G01 X23.48

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X26.82 Y15.33

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X26.61
G01 Y11.21
G01 X30.61 Y5.47
G01 X30.65 Y5.39
G01 X30.68 Y5.22
G01 Y4.58
G01 X31.48
G01 Y1.56
G01 X29.02
G01 Y4.58
G01 X29.82
G01 Y5.08
G01 X25.82 Y10.82
G01 X25.78 Y10.9
G01 X25.87 Y10.76
G01 X25.78 Y10.9
G01 X25.75 Y11.07
G01 Y15.33
G01 X25.68
G01 Y20.25
G01 X26.82

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X27.38 Y13.09

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X27.46 Y12.98

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X27.4 Y12.92

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X27.31 Y13.06

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X27.4 Y12.92

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X25.85 Y10.93

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X25.88 Y10.86
G01 X29.89 Y5.11
G01 Y4.43
G01 X29.17
G01 Y1.71
G01 X31.33
G01 Y4.43
G01 X30.61
G01 Y5.22
G01 X30.58 Y5.36
G01 X30.55 Y5.43
G01 X26.54 Y11.18
G01 Y15.48
G01 X26.67
G01 Y20.1
G01 X25.83
G01 Y16.96
G01 X25.82 Y16.91
G01 Y11.07
G01 X25.85 Y10.93
G01 X25.93 Y10.82

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X25.87 Y10.76

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X25.78 Y10.9
G01 X25.75 Y11.07
G01 Y16.91
G01 X25.76 Y16.96
G01 Y20.17
G01 X26.74
G01 Y15.41
G01 X26.61
G01 Y11.21
G01 X30.61 Y5.47
G01 X30.65 Y5.39
G01 X30.68 Y5.22
G01 Y4.5
G01 X31.41
G01 Y1.64
G01 X29.09
G01 Y4.5
G01 X29.82
G01 Y5.08
G01 X25.82 Y10.82
G01 X25.78 Y10.9

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X23.44 Y7.24

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X23.52 Y7.13

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X23.46 Y7.07

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X23.37 Y7.21

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X23.46 Y7.07

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X21.91 Y7.26

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X21.88 Y7.1
G01 X21.84 Y7.03
G01 X21.79 Y6.95

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X21.84 Y7.03
G01 X21.88 Y7.1
G01 X21.91 Y7.26

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X21.84 Y7.26

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X21.81 Y7.12
G01 X21.78 Y7.07
G01 X21.74 Y7.01

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X19.84 Y5.6

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X19.79 Y5.54
G01 X19.8 Y5.56
G01 X21.12 Y7.38
G01 X21.1 Y15.48
G01 X21.03
G01 Y20.1
G01 X21.87
G01 Y15.48
G01 X21.82
G01 X21.84 Y7.26
G01 X21.78 Y7.07
G01 X21.77 Y7.05
G01 X20.45 Y5.23
G01 Y4.43
G01 X21.17
G01 Y1.71
G01 X19.01
G01 Y4.43
G01 X19.73
G01 Y5.35
G01 X19.76 Y5.49
G01 X19.79 Y5.54
G01 X19.73 Y5.35

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X19.66

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X19.73 Y5.58
G01 X19.69 Y5.52
G01 X19.66 Y5.35
G01 Y4.5
G01 X18.93
G01 Y1.64
G01 X21.25
G01 Y4.5
G01 X20.52
G01 Y5.21
G01 X21.83 Y7
G01 X21.84 Y7.03
G01 X21.91 Y7.26
G01 X21.89 Y15.41
G01 X21.94
G01 Y20.17
G01 X20.96
G01 Y15.41
G01 X21.02
G01 X21.05 Y7.4
G01 X19.74 Y5.61
G01 X19.73 Y5.58
G01 X19.78 Y5.66

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X19.73 Y5.58
G01 X19.74 Y5.61
G01 X21.05 Y7.4
G01 X21.02 Y15.33
G01 X20.88
G01 Y20.25
G01 X22.02
G01 Y15.33
G01 X21.89
G01 X21.91 Y7.26
G01 X21.84 Y7.03
G01 X21.83 Y7
G01 X20.52 Y5.21
G01 Y4.58
G01 X21.32
G01 Y1.56
G01 X18.86
G01 Y4.58
G01 X19.66
G01 Y5.35
G01 X19.69 Y5.52
G01 X19.73 Y5.58
G01 X19.66 Y5.35

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X22.2 Y4.58

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X21.4
G01 Y1.56
G01 X23.86
G01 Y4.58
G01 X23.07
G01 X23.08 Y15.33
G01 X23.22
G01 Y20.25
G01 X22.08
G01 Y15.33
G01 X22.21
G01 X22.2 Y4.58

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X22.2 Y4.5

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X21.47
G01 Y1.64
G01 X23.79
G01 Y4.5
G01 X23.07
G01 X23.08 Y15.41
G01 X23.14
G01 Y20.17
G01 X22.16
G01 Y15.41
G01 X22.21
G01 X22.2 Y4.5

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X22.27 Y4.43

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X21.55
G01 Y1.71
G01 X23.72
G01 Y4.43
G01 X22.99
G01 X23.01 Y15.48
G01 X23.07
G01 Y20.1
G01 X22.23
G01 Y15.48
G01 X22.29
G01 X22.27 Y4.43

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X25.42 Y5.47

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X25.5 Y5.36

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X25.57 Y5.39

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X25.48 Y5.53

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X25.57 Y5.39

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X27.28 Y4.58

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X26.48
G01 Y1.56
G01 X28.94
G01 Y4.58
G01 X28.14
G01 Y5.1
G01 X28.11 Y5.27
G01 X28.08 Y5.33
G01 X25.48 Y9.41
G01 Y15.33
G01 X25.62
G01 Y20.25
G01 X24.48
G01 Y15.33
G01 X24.62
G01 Y9.28
G01 X24.65 Y9.11
G01 X24.68 Y9.05
G01 X27.28 Y4.97
G01 Y4.58

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 Y4.5

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X26.55
G01 Y1.64
G01 X28.87
G01 Y4.5
G01 X28.14
G01 Y5.1
G01 X28.11 Y5.27
G01 X28.08 Y5.33
G01 X25.48 Y9.41
G01 Y15.41
G01 X25.54
G01 Y20.17
G01 X24.56
G01 Y15.41
G01 X24.62
G01 Y9.28
G01 X24.65 Y9.11
G01 X24.68 Y9.05
G01 X27.28 Y4.97
G01 Y4.5

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X27.35 Y4.43

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X26.62
G01 Y1.71
G01 X28.79
G01 Y4.43
G01 X28.07
G01 Y5.1
G01 X28.04 Y5.24
G01 X28.01 Y5.29
G01 X25.41 Y9.38
G01 Y15.48
G01 X25.47
G01 Y20.1
G01 X24.63
G01 Y15.48
G01 X24.69
G01 Y9.28
G01 X24.72 Y9.14
G01 X24.75 Y9.09
G01 X27.35 Y5
G01 Y4.43

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X30.5 Y5.47

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X30.58 Y5.36

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X30.65 Y5.39

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X30.56 Y5.53

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X30.65 Y5.39

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X32.36 Y4.58

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X31.56
G01 Y1.56
G01 X34.02
G01 Y4.58
G01 X33.22
G01 Y5.56
G01 X40.42
G01 Y3.64
G01 X42.94
G01 Y6.56
G01 X40.42
G01 Y6.42
G01 X33.02
G01 X28.14 Y13.37
G01 Y15.33
G01 X28.34
G01 Y20.25
G01 X26.82
G01 Y15.33
G01 X27.28
G01 Y13.23
G01 X27.31 Y13.06
G01 X27.35 Y12.98
G01 X32.36 Y5.85
G01 Y4.58

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 Y4.5

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X31.63
G01 Y1.64
G01 X33.95
G01 Y4.5
G01 X33.22
G01 Y5.56
G01 X40.5
G01 Y3.72
G01 X42.86
G01 Y6.48
G01 X40.5
G01 Y6.42
G01 X33.02
G01 X28.14 Y13.37
G01 Y15.41
G01 X28.26
G01 Y20.17
G01 X26.9
G01 Y15.41
G01 X27.28
G01 Y13.23
G01 X27.31 Y13.06
G01 X27.35 Y12.98
G01 X32.36 Y5.85
G01 Y4.5

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X32.43 Y4.43

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X31.71
G01 Y1.71
G01 X33.88
G01 Y4.43
G01 X33.15
G01 Y5.63
G01 X40.57
G01 Y3.79
G01 X42.79
G01 Y6.41
G01 X40.57
G01 Y6.35
G01 X32.98
G01 X28.07 Y13.34
G01 Y15.48
G01 X28.19
G01 Y20.1
G01 X26.97
G01 Y15.48
G01 X27.35
G01 Y13.23
G01 X27.38 Y13.09
G01 X27.42 Y13.02
G01 X32.43 Y5.88
G01 Y4.43

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X36.41 Y2.54

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 Y4.43
G01 X34.24
G01 Y1.71
G01 X36.41
G01 Y1.82
G01 X43.2
G01 X43.34 Y1.85
G01 X43.4 Y1.88
G01 X46.27 Y3.79
G01 X47.67
G01 Y6.41
G01 X45.45
G01 Y4.11
G01 X43.09 Y2.54
G01 X36.41

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X36.49 Y2.61

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 Y4.5
G01 X34.17
G01 Y1.64
G01 X36.49
G01 Y1.75
G01 X43.2
G01 X43.37 Y1.78
G01 X43.44 Y1.82
G01 X46.29 Y3.72
G01 X47.74
G01 Y6.48
G01 X45.38
G01 Y4.15
G01 X43.07 Y2.61
G01 X36.49

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X36.56

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 Y4.58
G01 X34.1
G01 Y1.56
G01 X36.56
G01 Y1.75
G01 X43.2
G01 X43.37 Y1.78
G01 X43.44 Y1.82
G01 X46.18 Y3.64
G01 X47.82
G01 Y6.56
G01 X45.3
G01 Y4.1
G01 X43.07 Y2.61
G01 X36.56

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X43.34 Y1.85

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X43.45 Y1.93

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X43.51 Y1.87

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X43.37 Y1.78

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X43.51 Y1.87

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X11.27 Y3.03

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
;G01 F4 Z-0.15
G01 F80 X11.25 Y3.2
G01 X11.2 Y3.36
G01 X11.12 Y3.51
G01 X11.02 Y3.65
G01 X10.88 Y3.75
G01 X10.73 Y3.83
G01 X10.57 Y3.88
G01 X10.4 Y3.9
G01 X10.23 Y3.88
G01 X10.07 Y3.83
G01 X9.92 Y3.75
G01 X9.78 Y3.65
G01 X9.68 Y3.51
G01 X9.6 Y3.36
G01 X9.55 Y3.2
G01 X9.53 Y3.03
G01 X9.55 Y2.86
G01 X9.6 Y2.7
G01 X9.68 Y2.55
G01 X9.78 Y2.41
G01 X9.92 Y2.31
G01 X10.07 Y2.23
G01 X10.23 Y2.18
G01 X10.4 Y2.16
G01 X10.57 Y2.18
G01 X10.73 Y2.23
G01 X10.88 Y2.31
G01 X11.02 Y2.41
G01 X11.12 Y2.55
G01 X11.2 Y2.7
G01 X11.25 Y2.86
G01 X11.27 Y3.03

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
;M05

;功能切换->板边烧刻; T3 M06
;M03 S8000
;G00 F800
;G01 F4 Z-0.15
G01 F80 X49.06
G01 Y27.8
G01 X0
G01 Y0

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
;M05

;功能切换->过孔烧刻; T2 M06
;M03 S8000
;G00 F800

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X8.25 Y14.29

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
G4 P200 ;wait 0.2s when open1 
G01 F50 Z-0.5

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X10.4 Y3.03

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
G4 P200 ;wait 0.2s when open1 
G01 F50 Z-0.5

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X20.09 Y3.07

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
G4 P200 ;wait 0.2s when open1 
G01 F50 Z-0.5

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X22.63

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
G4 P200 ;wait 0.2s when open1 
G01 F50 Z-0.5

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X25.17

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
G4 P200 ;wait 0.2s when open1 
G01 F50 Z-0.5

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X27.71

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
G4 P200 ;wait 0.2s when open1 
G01 F50 Z-0.5

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X30.25

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
G4 P200 ;wait 0.2s when open1 
G01 F50 Z-0.5

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X32.79

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
G4 P200 ;wait 0.2s when open1 
G01 F50 Z-0.5

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X35.33

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
G4 P200 ;wait 0.2s when open1 
G01 F50 Z-0.5

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
G00 X26.75 Y14.29

;G01 Z0 F50; start new
M106 S255; open 100% 
G4 P200;   wait 0.2s when open2 
G4 P200 ;wait 0.2s when open1 
G01 F50 Z-0.5

;G00 Z1.0 F40; lift up
G01 F50 Z0 
M106 S0;    close 
G4 P500 ;   wait 0.5s when close 
G00 F800 ;  空载运行速度 
;M05
;M02
;%

;finish
M106 S3;   open 1% 
M107;      close 
G00 x0 y0; return origin
