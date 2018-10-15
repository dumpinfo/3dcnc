<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<?
$title ="CNC雕刻/切割/开槽/浮雕 | JDpaint | 智博3D打印机";
echo "<title>", $title ,"</title>";
?>

</head>
<body>

<style>
.wrapper { margin:auto; width:560px; background:#fffbf9;}
</style>


<script type="text/javascript" >

function f_white(){

document.getElementById('s11').style.background="white";
document.getElementById('s12').style.background="white";
document.getElementById('s21').style.background="white";
document.getElementById('s22').style.background="white";
document.getElementById('s31').style.background="white";
document.getElementById('s32').style.background="white";

}


function f_mouseOut(canshu){
document.getElementById('note').innerHTML="请选择参数并提交；不同功能需选择不同刀具《CNC刀具选择.pptx》"
/*
document.getElementById('s11').style.background="white";
document.getElementById('s12').style.background="white";
document.getElementById('s21').style.background="white";
document.getElementById('s22').style.background="white";
document.getElementById('s31').style.background="white";
document.getElementById('s32').style.background="white";
*/
}

function f_mouseOver(canshu){
f_white()
switch(canshu){
case 1:
document.getElementById('note').innerHTML="刀具识别关键字=\"[平底]\""
document.getElementById('s11').style.background="#ff9999";
document.getElementById('s21').style.background="#ff9999";
break;
case 2:
document.getElementById('note').innerHTML="刀具识别关键字=\"[钻头]\""
document.getElementById('s12').style.background="#ff9999";
break;
case 3:
document.getElementById('note').innerHTML="刀具识别关键字=\"[锥度平底]\""
document.getElementById('s11').style.background="#ff9999";
document.getElementById('s22').style.background="#ff9999";
break;
case 4:
document.getElementById('note').innerHTML="刀具识别关键字=\"[平底]\""
document.getElementById('s11').style.background="#ff9999";
document.getElementById('s31').style.background="#ff9999";
break;
case 5:
document.getElementById('note').innerHTML="刀具识别关键字=\"[锥度平底]\""
document.getElementById('s11').style.background="#ff9999";
document.getElementById('s32').style.background="#ff9999";
break;

}

}


</script>

<div class="wrapper">

<iframe src="navi.htm" style=" width:100%; height:135px" frameborder="no" border="0" scrolling="no" id="f_chat"></iframe>

<?
echo "当前转码程序为“", $title ,"”";
?>

<br>请把刀路文件“JDcnc.nc”放到目录 “\PHPnow-1.5.6\htdocs\”
<hr>

<form>

下刀速度
<select name="s11" id="s11" style=" width:70px; height:18px; ">
    		<option value="1">1</option> 
		<option value="2" >2</option> 
    		<option value="10" selected="selected" >10</option> 
    		<option value="100" selected="selected" >100</option> 			

</select>

开槽速度
<select name="s21" id="s21" style=" width:70px; height:18px; ">
		<option selected="selected" value="0.4" >0.4</option> 
		<option value="1" >1</option> 
    		<option value="2">2</option> 
    		<option value="10">10</option> 
    		<option value="30" >30</option>
    		<option value="50" selected="selected" >50</option> 				
    		<option value="100" >100</option> 			
</select>

粗雕速度
<select name="s31" id="s31" style=" width:70px; height:18px; ">
    		<option selected="selected" value="0.4">0.4</option> 
		<option value="1.0" >1.0</option> 
    		<option value="10">10</option> 
    		<option value="30">30</option> 
    		<option value="50" selected="selected" >50</option> 
</select>
<br>

钻孔速度
<select name="s12" id="s12" style=" width:70px; height:18px; ">
    		<option value="1">1</option> 
		<option value="2" >2</option> 
    		<option value="10" selected="selected" >10</option> 

</select>



雕刻速度
<select name="s22" id="s22" style=" width:70px; height:18px; ">
    		<option selected="selected" value="0.4">0.4</option> 
		<option value="1.0" >1.0</option> 
    		<option value="10">10</option> 
    		<option value="30" selected="selected" >30</option> 
</select>


精雕速度
<select name="s32" id="s32" style=" width:70px; height:18px; ">
    		<option selected="selected" value="0.4">0.4</option> 
		<option value="1.0" >1.0</option> 
    		<option value="10">10</option> 
    		<option value="30" selected="selected" >30</option> 
</select>

<input type="hidden" name="act" id="act"  value="gcode">

<div id="note">请选择参数并提交；不同功能需选择不同刀具《CNC刀具选择.pptx》</div>
<hr>

<input type="submit" onclick="javascript:document.getElementById('act').value='kaicao';" value="单线开槽刀路" onmouseover="f_mouseOver(1)" onmouseout="f_mouseOut(1)" >
<input type="submit" onclick="javascript:document.getElementById('act').value='quyu';" value="单线文字雕刻刀路 或区域雕刻刀路(阴刻/阳刻)" onmouseover="f_mouseOver(3)" onmouseout="f_mouseOut(3)" >
<hr>
<input type="submit" onclick="javascript:document.getElementById('act').value='dakong';" value="钻盲孔刀路" onmouseover="f_mouseOver(2)" onmouseout="f_mouseOut(2)" >
<input type="submit" onclick="javascript:document.getElementById('act').value='qumian1';" value="曲面粗雕刀路(浮雕)-1/2" onmouseover="f_mouseOver(4)" onmouseout="f_mouseOut(4)" >
<input type="submit" onclick="javascript:document.getElementById('act').value='qumian2';" value="曲面精雕刀路(浮雕)-2/2" onmouseover="f_mouseOver(5)" onmouseout="f_mouseOut(5)" >


<hr>

</form>




<script type="text/javascript" >
//记住用户更改的参数

f_white()

</script>




<?
//1.获得参数

@$s11=$_GET["s11"];
@$s12=$_GET["s12"];
@$s21=$_GET["s21"];
@$s22=$_GET["s22"];
@$s31=$_GET["s31"];
@$s32=$_GET["s32"];

@$act=$_GET["act"];

if($s11&&$s12&&$s21&&$s22&&$s31&&$s32&&$act){
	$url="JDcnc.nc";
	if($act=="kaicao") $daoju="[平底]"; //柱刀开槽
	if($act=="dakong") $daoju="[钻头]"; //钻头打孔
	if($act=="quyu") $daoju="[锥度平底]"; //平底尖刀雕刻

	if($act=="qumian1") $daoju="[平底]"; //柱刀粗雕
	if($act=="qumian2") $daoju="[锥度平底]"; //平底尖刀精雕


}
else{
	exit("<!--请选择参数并提交-->");
}



//2 读入文件到数组 file()
$str = file($url); //方法2:file() 读入
//echo print_r($str)." 2<br>"; //输出内容到数组
date_default_timezone_set("ETC/GMT-8");
echo '<textarea id="pic_code" name="pic_code" style="width:500px; height:500px; ">'."\n";
echo ";----智博四位一体机(CNC START) ". date("Y-m-d H:i:s",time()) ."----\n";
echo "G92 X0 Y0; 把当前坐标设为XY坐标零点 \n" ; //当前坐标当成X0，Y0。在精雕软件输出gcode时，把路径的左下角设置为坐标原点。
echo "G92 Z10; 把当前高度设为Z10，即软件中设置的工件表面高度\n"; //当前坐标当成Z10，在精雕软件需要设置工作面为10mm，避免出现负数

echo "G21        ;metric values \n" ;
echo "G90        ;absolute positioning \n" ;
echo "G0 Z15 \n";

echo "cnc Working...; \n\n";

echo "G00 F1000; 空载速度 \n" ; //快速移动的速度

//进入循环对nc代码进行逐行分析以及做相应变换处理
$out="yes";
foreach ($str as $key=>$val){ //$data是数组名
	//echo "索引",$key,"值"; print_r($val); echo "<br>\n";
	$line=$val;

	//通用变换部分
	$line=str_replace("%",";%",$line);
	$line=str_replace("(",";(",$line);
	$line=str_replace(")",";)",$line);
	$line=str_replace("M03",";M03",$line);
	$line=str_replace("M05",";M05",$line);
	$line=str_replace("G54",";G54",$line);
	$line=str_replace("G28",";G28",$line);
	$line=str_replace("G91",";G91",$line);
	$line=str_replace("G0 G90 G17",";G0 G90 G17",$line);
	$line=str_replace("G17",";G17",$line);
	$line=str_replace("G18",";G18",$line);
	$line=str_replace("G19",";G19",$line);
	$line=str_replace("G00","G00 F2000",$line);

	$line=str_replace("T",";T",$line);
	//1.遇到T先统一把暂停输出掉
	if(strpos($line,";T")!==false){
		$out="no";

		//2.再把符合的模块代码打开
		if(strpos($line,$daoju)!==false){
			$out="yes";
			$line=";刀具符合 ".$line ;
		}
		else{
			$line=";刀具不符 ".$line ;
		}

	}


	//3.如果 $out=="no"则直接把这一行注释掉
	if($out=="no"){ 
		$line=";del ".$line ;
		echo $line; //echo "<br>\n";
		continue; //这一行不做进一步的变换处理
	}
	else{

	//符合功能的刀具代码段进行速度替换
	
	//开槽
	if($act=="kaicao"){
		$line=str_replace("F300"," F".$s11,$line);//更改下刀速度
		$line=str_replace("F800"," F".$s21,$line);//更改开槽速度
	}

	//打孔
	if($act=="dakong"){
		$line=str_replace("G01","G01 F".$s12,$line);//更改打孔速度
	}

	//区域阴刻
	if($act=="quyu"){
		$line=str_replace("F300"," F".$s11,$line);//更改下刀速度
		$line=str_replace("F800"," F".$s22,$line);//更改开槽速度


		$line=str_replace("Z10.","Z14.",$line);//更改开槽速度


	}

	//粗雕
	if($act=="qumian1"){
		$line=str_replace("F300"," F".$s11,$line);//更改下刀速度
		$line=str_replace("F800"," F".$s31,$line);//更改粗雕速度
	}

	//精雕
	if($act=="qumian2"){
		$line=str_replace("F300"," F".$s11,$line);//更改下刀速度
		$line=str_replace("F800"," F".$s32,$line);//更改精雕速度
	}


		$line=str_replace("-0.00","0.000",$line);//取消微小负值


	}


	echo $line; //echo "<br>\n";

}

//雕刻结束，XY回到原点，Z回到安全距离Z20，此时距离工件表面为10mm
echo "\n";
echo "G00 X0 Y0 Z20; 抬高刀具以及返回坐标原点 \n";

include("end.php"); 
?>


</div>



<script type="text/javascript" >
//记住用户更改的参数



document.getElementById('s11').value="<?echo $s11; ?>"
document.getElementById('s12').value="<?echo $s12; ?>"
document.getElementById('s21').value="<?echo $s21; ?>"
document.getElementById('s22').value="<?echo $s22; ?>"
document.getElementById('s31').value="<?echo $s31; ?>"
document.getElementById('s32').value="<?echo $s32; ?>"



</script>





</body>
</html>
