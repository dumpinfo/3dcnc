G01 Z0 ;move to z0.0mm
M806 Z-0.03 ; 归零偏移量相比于上次减少0.03mm，下次执行G28 Z时生效
G92 Z-0.03 ; 当前坐标设为-0.03mm，此行以及以下用于预览偏移量减少0.03mm的效果
;G28 Z ;归零（光电传感处）
G01 Z-0.2 ;向下移动0.17mm到Z:-0.2mm
G01 Z0 ;向上0.2mm返回Z:0mm，
M84 ;release steppers



