<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<?
$title ="油性笔涂鸦| JDpaint | 智博3D打印机";
echo "<title>", $title ,"</title>";
?>

</head>
<body>

<style>
.wrapper { margin:auto; width:560px; background:#fffbf9;}
</style>

<div class="wrapper">

<iframe src="navi.htm" style=" width:100%; height:135px" frameborder="no" border="0" scrolling="no" id="f_chat"></iframe>

<?
echo "当前转码程序为“", $title ,"”";
?>
<br>请把刀路文件“JDlaser.nc”放到目录 “\PHPnow-1.5.6\htdocs\”
<hr>

<form>


绘图速度
<select name="speed" id="speed" style=" width:70px; ">
		<option value="50.0" >50</option> 
		<option value="100.0" >100</option> 
    		<option value="150.0" selected="selected" >150</option> 
		<option value="200.0" >200</option> 
		<option value="500.0" >500</option> 

</select>


<input type="hidden" name="act" id="act"  value="gcode">

<input type="submit" value="生成malin G-code">


</form>

<?

@$speed_laser=$_GET["speed"];

if($speed_laser){



}
else{
exit("请选择参数并提交");
}

$url="JDlaser.nc";

//2 读入文件到数组 file()
$str = file($url); //方法2:file() 读入
//echo print_r($str)." 2<br>"; //输出内容到数组

date_default_timezone_set("ETC/GMT-8");
echo '<textarea id="pic_code" name="pic_code" style="width:500px; height:500px; ">'."\n";
echo ";----油性笔涂鸦（可制作简易PCB）". date("Y-m-d H:i:s",time()) ."----\n";

$height_laser="60.0";
//$power_laser="150"; //0 to 255 ,0 is close
//$power_laser="200"; //0 to 255 ,0 is close
//$speed_laser="100.0";
//$speed_laser="150.0";
//$laser_type="red";
//$laser_type="blue";

echo "G21; 单位mm \n";
echo "G90; 绝对坐标 \n";
//echo "M106 S".$power_laser."; 测试激光 \n";
//echo "G4 P3000 ; 原点烧刻3s \n";
echo "M107; close \n";
echo ";G28; home \n";

echo "G92 Z0 \n";
echo "G0 F1000 Z1 \n";

echo "G92 X0 Y0\n";
echo ";文件头结束\n";

$status_on="n";

foreach ($str as $key=>$val){ //$data是数组名
	//echo "索引",$key,"值"; print_r($val); echo "<br>\n";
	$line=$val;
	// 注释掉多余命令
	$line=str_replace("%",";%",$line);
	$line=str_replace("M03",";M03",$line);
	$line=str_replace("G54",";G54",$line);
	$line=str_replace("G28",";G28",$line);
	$line=str_replace("G91",";G91",$line);
	$line=str_replace("G0 G90 G17",";G0 G90 G17",$line);
	$line=str_replace("G17",";G17",$line);

	$line=str_replace("(",";",$line);
	$line=str_replace(")",";",$line);
	$line=str_replace("T",";T",$line);
	$line=str_replace("Z",";Z",$line);
	

	//开启激光，停顿，设置速度
	if(strpos($line,"Z-0.")!==false && $status_on=="n"){
		$line.="\n;-->涂鸦开始--\n";
		$status_on="y";
		//$line.=";M106 S".$power_laser."; open\n";
		$line.="G01 Z0 F2000; open\n";

		$line.="G4 P200; delay 0.2s\n";
		$line.="G01 F". $speed_laser ."; 设雕刻速度\n";
	}

	if( (strpos($line,"Z0.2")!==false || strpos($line,"Z1")!==false || strpos($line,"Z4")!==false) && $status_on=="y"){
		$line.=";--结束<--\n";
		$status_on="n";
		$line.=";M106 S0; close\n";
		$line.="G01 Z1 F2000; open\n";
		$line.="G4 P200 ; delay 0.2s\n";
		$line.="G01 F2000; 设空载速度\n";
	}



	$line=str_replace("F800"," F".$speed_laser ,$line);
	$line=str_replace(";Z-0.100 I","I",$line);






	echo $line; //echo "<br>\n";

}

echo "\nG00 X0 Y0 \n";
echo "\nM106 S3; open 1% \n";
echo "M107; close \n";
echo "G00 Z10 \n";

include("end.php"); 
?>


</div>





<script type="text/javascript" >
//记住用户更改的参数

document.getElementById('speed').value="<?echo $speed_laser; ?>"

</script>



</body>
</html>
