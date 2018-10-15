<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<?
$title ="Cura Gcode首层优化 | Cura | 智博3D打印机";
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
echo "☆ 当前转码程序为“", $title ,"”";
$dir=dirname(__FILE__);//这里输入其它路径
?>
<br>☆ 请把待优化gcode文件放到目录<font color="red"> <? echo $dir; ?> </font>
<br>☆ 首层有SKIRT,WALL-INNER,WALL-OUTER,SKIN四部分组成，
<br>☆ 对这四部分高度以及速度比率进行细分调整优化首层质量调整打印速度。
<form>

☆ 首层高度细分：
Skirt<input type="text" name="h1" id="h1"  value="0.05" style=" width:30px; " >
Wall-in<input type="text" name="h2" id="h2"  value="0.10" style=" width:30px; " >
Wall-out<input type="text" name="h3" id="h3"  value="0.15" style=" width:30px; " >
Skin<input type="text" name="h4" id="h4"  value="0.20"  style=" width:30px; " >

<br>
☆ 速度细分设置： 
首层Wall速度=<input type="text" name="s1" id="s1"  value="100"  style=" width:30px; " >%，
整体速度比率=<input type="text" name="s2" id="s2"  value="150"  style=" width:30px; " >%

<br>
☆ <font color="blue"> 完成后是否删除原文件：</font>

<select name="del" id="del" style=" width:70px; height:18px; " >
    		<option selected="selected" value="yes">yes</option> 
		<option value="no" >no</option> 

</select>

<input type="hidden" name="act" id="act"  value="gcode">
<input type="submit" value="开始优化">
<br>




</form>


<?

//PHP遍历文件夹下所有文件
$handle=opendir($dir.".");
//定义用于存储文件名的数组
$renwu="no";
while (false !== ($file = readdir($handle)))
{
	if ($file != "." && $file != ".." && strpos($file ,".gcode")!==false) {


		//读出第一行
		$str = file_get_contents($file); //方法1:file_get_contents() 读入
		if(strpos($str,"首层高度细分调整")!==false){
				echo "——>将忽略gcode文件：", $file, " （已优化过）\n<br>"; //输出文件名
		}
		else{
				echo "——>将优化gcode文件：", $file, " （待优化）\n<br>"; //输出文件名
				$renwu="yes";
				break;//退出循环
		}



	}
}
closedir($handle);

?>





<?
@$act=$_GET["act"];
@$del=$_GET["del"];

@$h1=$_GET["h1"];
@$h2=$_GET["h2"];
@$h3=$_GET["h3"];
@$h4=$_GET["h4"];

@$s1=$_GET["s1"];
@$s2=$_GET["s2"];


if(!$act){
$del="yes";

$h1="0.15";
$h2="0.15";
$h3="0.20";
$h4="0.20";

$s1="100";
$s2="120";
//$s2="100";
//$s2="150";

}
?>



<script type="text/javascript" >
//记住用户更改的参数
document.getElementById('del').value="<?echo $del; ?>"

document.getElementById('h1').value="<?echo $h1; ?>"
document.getElementById('h2').value="<?echo $h2; ?>"
document.getElementById('h3').value="<?echo $h3; ?>"
document.getElementById('h4').value="<?echo $h4; ?>"

document.getElementById('s1').value="<?echo $s1; ?>"
document.getElementById('s2').value="<?echo $s2; ?>"

</script>






<?
if($act&&$del&&$renwu=="yes" ){

}
elseif($renwu=="yes"){

	exit("请提交，开始优化");
}
else{
	exit("未找到Gcode文件! ");
}


$url="1.gcode";
$url=$file;
//2 读入文件到数组 file()
$str = file($url); //方法2:file() 读入
//echo print_r($str)." 2<br>"; //输出内容到数组

echo "<span id=\"xiaoxi\" >正在计算中，请稍候。。。</span><br>";
echo '<textarea id="pic_code" name="pic_code" style="width:500px; height:500px; ">'."\n";
date_default_timezone_set("ETC/GMT-8");

echo ";首层高度细分调整，速度细分调整。". date("Y-m-d H:i:s",time()) ."\n";


$line_last="";
$line_no="0";
foreach ($str as $key=>$val){ //$data是数组名
	//echo "索引",$key,"值"; print_r($val); echo "<br>\n";
	//$line_last=$val;
	$line=$val;

	//温度细分
	if(strpos($line,"M109")!==false ){
		//$line="M109 S220; zhibo\n";
	}


	//高度信息细分，此处取消高度，方便着床。
	if(strpos($line_last,"M107")!==false ){
		//$line=str_replace("Z0.200",";Z0.200 zhibo",$line);
	}
	//SKIRT时首层高度0.05mm，速度100%
	if($line_no=="0" && strpos($line_last,"SKIRT")!==false){
		//$line="G0 Z0.050; zhibo\n".$line;
		$line="G0 Z".$h1."0; Z0.050 zhibo\n".$line;
		//$line = $line . "M220 S100; set speed factor 100% zhibo\n";
		$line = $line . "M220 S".$s1."; set speed factor 100% zhibo\n";

	}
	//WALL-INNER时首层高度0.10mm，速度100%，关闭风扇
	if($line_no=="0" && strpos($line_last,"WALL-INNER")!==false){
		//$line="G0 Z0.100; zhibo\n".$line;
		$line="G0 Z".$h2."0; Z0.100 zhibo\n".$line;
		//$line = $line . "M220 S100;  set speed factor 100% zhibo\n";
		$line = $line . "M220 S".$s1."; set speed factor 100% zhibo\n";
		$line = $line . "M107; fan stop zhibo\n";
	}
	//WALL-OUTER时首层高度0.15mm，速度120%
	if($line_no=="0" && strpos($line_last,"WALL-OUTER")!==false){
		//$line="G0 Z0.150; zhibo\n".$line;
		$line="G0 Z".$h3."0; Z0.150 zhibo\n".$line;
		//$line = $line . "M220 S150;  set speed factor 150% zhibo\n";
		$line = $line . "M220 S".$s2."; set speed factor 150% zhibo\n";
	}
	//SKIN时首层高度恢复为0.20mm，速度120%，开启风扇
	if($line_no=="0" && strpos($line_last,"SKIN")!==false){
		//$line="G0 Z0.200; zhibo\n".$line;
		$line="G0 Z".$h4."0; Z0.200 zhibo\n".$line;
		//$line = $line . "M220 S150;  set speed factor 150% zhibo\n";
		$line = $line . "M220 S".$s2."; set speed factor 150% zhibo\n";
		$line = $line . "M106 S200; fan start zhibo\n";

	}
	//判断首层已经结束
	//从第一层开始，加速为120%
	if(strpos($line_last,"LAYER:1")!==false && $line_no=="0"){
		$line_no="1";
		//$line = $line . "M220 S150;  set speed factor 120% zhibo\n";
		//$line = $line . ";M109 S215;  set temperature again zhibo\n";
	}

	//首层开始前，清洁喷嘴
	//智博配置文件头部代码已经包含清洁路径
	if(strpos($line,"LAYER:0")!==false){
		//$line = $line . "G0 Z0.200;  clean penzui pass paper zhibo\n";
	}




	echo $line; 

	$line_last=$val;

}

echo "\n".'</textarea>';



if( $del=="yes"){

	unlink( $url );

}

?>

</div>

<script type="text/javascript" >
//记住用户更改的参数
document.getElementById('xiaoxi').innerHTML=" 以下为优化后的Gcode，请全部拷贝出来（Ctrl+A，Ctrl+C）";

</script>


</body>
</html>


