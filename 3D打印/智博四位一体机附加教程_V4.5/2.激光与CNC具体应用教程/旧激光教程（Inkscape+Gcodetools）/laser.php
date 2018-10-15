<form>

激光功率
<select name="gonglv" id="gonglv" style=" width:70px; height:18px; ">
    		<option value="150">150</option> 
		<option selected="selected" value="200" >200</option> 
</select>

雕刻速度
<select name="speed" id="speed" style=" width:70px; height:18px; ">
    		<option selected="selected" value="150.0">150</option> 
		<option value="200.0" >200</option> 
		<option value="100.0" >100</option> 
		<option value="50.0" >50</option> 
</select>

起头模式
<select name="laser_type" id="laser_type" style=" width:70px; height:18px; ">
    		<option selected="selected" value="blue">白纸</option> 
		<option value="red" >有色纸</option> 
</select>

<input type="hidden" name="act" id="act"  value="gcode">
<br>
<input type="submit" value="生成malin G-code">


</form>

<?
@$power_laser=$_GET["gonglv"];
@$speed_laser=$_GET["speed"];
@$laser_type=$_GET["laser_type"];

if($power_laser&&$speed_laser&&$laser_type){



}
else{
exit("请选择参数并提交");
}

$url="output_0001.ngc";

//2 读入文件到数组 file()
$str = file($url); //方法2:file() 读入
//echo print_r($str)." 2<br>"; //输出内容到数组


echo '<textarea id="pic_code" name="pic_code" style="width:400px; height:500px; ">'."\n";

$height_laser="60.0";
//$power_laser="150"; //0 to 255 ,0 is close
//$power_laser="200"; //0 to 255 ,0 is close
//$speed_laser="100.0";
//$speed_laser="150.0";
//$laser_type="red";
//$laser_type="blue";

echo "G21; mm \n";
echo "G90; mm \n";
echo "M106 S".$power_laser."; open 100% \n";
//echo "G4 P3000 ;preheat 3s \n";
echo "M107; close \n";
echo ";G28; home \n";

echo "G92 Z".$height_laser."\n";

echo ";G0 F1000 Z".$height_laser."\n";

echo "G92 X0 Y0\n";


foreach ($str as $key=>$val){ //$data是数组名
	//echo "索引",$key,"值"; print_r($val); echo "<br>\n";
	$line=$val;
	$line=str_replace("%",";%",$line);
	$line=str_replace("M3",";M3",$line);
	$line=str_replace("(",";",$line);
	$line=str_replace(")",";",$line);
	
	if(strpos($line,"G00 Z42.2")!==false){
		$line="M107; close laser \n";
	}

	if(strpos($line,"G01 Z41.9")!==false){

	    if($laser_type=="blue"){		
		$line.="M106 S".$power_laser."; open 100% \n";
		//$line.="M106 S255; open 100% \n";
		$line.="G4 P200 ;wait 0.2s \n";
		$line.="G91 \n";
		//$line.="G0 x0.1 Z0.1 f20 \n";
		//$line.="G0 x-0.2 Z-0.2 \n";
		//$line.="G0 x0.2 Z0.2 \n";
		//$line.="G0 x-0.1 Z-0.2 \n";
		$line.="G0 x0.1 y0.1 f50 Z0.1\n";
		$line.="G0 x-0.2 y-0.2 Z-0.2 \n";
		$line.="G0 x0.2 y0.2 Z0.1 \n";
		$line.="G4 P500 ;wait 0.5s \n";
		$line.="G0 x-0.2 y-0.2 F0.5 \n";
		$line.="G0 x0.2 y0.2 \n";
		$line.="G0 x-0.1 y-0.1 \n";
		$line.="G90 \n";
		$line.="G0 F".$speed_laser." \n";
		$line.="M106 S".$power_laser."; open 100% \n";
	    }
	    else{
		$line.="M106 S".$power_laser."; open 100% \n";
		$line.="G4 P200 ;wait 0.5s \n";
	    }





	}

	$line=str_replace("M5",";M5",$line);

	$line=str_replace("M2",";M2",$line);

	$line=str_replace("G00","G00 f1000",$line);
	$line=str_replace("F400.0","F".$speed_laser,$line);


	$line=str_replace("Z41.9","Z".$height_laser,$line);

	echo $line; //echo "<br>\n";

}

echo "\nM106 S3; open 1% \n";
echo "M107; close \n";

echo "\n".'</textarea>';


?>