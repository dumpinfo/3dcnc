<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<?
$title ="CNC���PCB| CopperCAM | �ǲ�3D��ӡ��";
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
echo "��ǰת�����Ϊ��", $title ,"��";
?>
<br>��ѵ�·�ļ�CopperCAM1.iso��CopperCAM2.iso���� htdocs Ŀ¼��
<hr>

<form>
��·������
<select name="Z1" id="Z1" style=" width:70px; height:18px; ">
    		<option value="0.15">0.15</option> 
		<option value="0.2"selected="selected"  >0.2</option> 

</select>

������
<select name="Z2" id="Z2" style=" width:70px; height:18px; ">
		<option value="0.3" >0.3</option> 
    		<option selected="selected" value="0.5">0.5</option> 

</select>
<br>
���ϳ�����
<select name="Z3" id="Z3" style=" width:70px; height:18px; ">
		<option value="0.15" >0.15</option> 
		<option value="0.2" selected="selected" >0.2</option> 
    		<option value="0.3">0.3</option> 
</select>

��·����ٶ�
<select name="speed" id="speed" style=" width:70px; height:18px; ">
    		<option value="0.4">0.4</option> 
			<option value="1.0" >1.0</option> 
			<option value="50" selected="selected" >50</option> 
</select>

<input type="hidden" name="act" id="act"  value="gcode">

<hr>



<input type="submit" onclick="javascript:document.getElementById('act').value='xianlu';" value="�����·(CopperCAM1.iso)">

<input type="submit" onclick="javascript:document.getElementById('act').value='dakong';" value="�������(CopperCAM2.iso)">

</form>









<?
@$Z1=$_GET["Z1"];
@$Z2=$_GET["Z2"];
@$Z3=$_GET["Z3"];
@$speed_work=$_GET["speed"];
@$act=$_GET["act"];

if($Z1&&$Z2&&$Z3&&$speed_work){
	if($act=="xianlu"){
		$url="CopperCAM1.iso";	
	}
	else if($act=="dakong"){
		$url="CopperCAM2.iso";
	}

 echo "<br>";
}
else{
	exit("��ѡ��������ύ");
}













//2 �����ļ������� file()
$str = file($url); //����2:file() ����
//echo print_r($str)." 2<br>"; //������ݵ�����

date_default_timezone_set("ETC/GMT-8");
echo '<textarea id="pic_code" name="pic_code" style="width:500px; height:500px; ">'."\n";
echo ";----PCB����(CNC���) ". date("Y-m-d H:i:s",time()) ."----\n";


//$height_laser="60.0";
//$power_laser="255"; //0 to 255 ,0 is close

$height_plane=0.0;
$height_work=$height_plane-0.13;
$height_safe=$height_plane+1;
//$speed_work=0.4;

//echo "M106 S".$power_laser."; open 100% \n";
//echo "M107; close \n";
//echo "G28; home \n";
//echo "G0 F500 Z".$height_laser."\n";

echo ";height_safe is Z" .$height_safe ."mm\n" ;
echo ";height_plane is Z" .$height_plane ."mm\n" ;
echo ";height_work is Z" .$height_work ."mm\n" ;
echo ";speed_work is F" .$speed_work ."\n" ;

echo "G92 X0 Y0 Z0 \n" ;
echo "G21        ;metric values \n" ;
echo "G90        ;absolute positioning \n" ;

echo "cnc Working...; \n\n";

foreach ($str as $key=>$val){ //$data��������
	//echo "����",$key,"ֵ"; print_r($val); echo "<br>\n";
	$line=$val;
	$line=str_replace("%",";%",$line);
	$line=str_replace("(",";",$line);
	$line=str_replace(")",";",$line);
	$line=str_replace("M03",";M03",$line);
	$line=str_replace("M05",";M05",$line);

	$line=str_replace("T3",";T3",$line);
	$line=str_replace("T2",";T2",$line);
	$line=str_replace("T1",";T1",$line);


	$line=str_replace("G00 G90",";G00 G90",$line);
	$line=str_replace("G00 F3000",";G00 F3000",$line);



	
	if(strpos($line,"G00 Z2")!==false){
		$line="\nG00 Z1.0 F40; begin \n"; //�յ�����̧��,Ҫ����ϳ����Ȼ���������
		$line.="G00 F500 \n";
	}



	if($line==";T1 M06\r\n"){
		$line=";T1 M06 ;xi lianlu xian dingwei\n";
		$line.="G00 Z1.0 F40 ;dingwei kong\n";
		$line.="G00 F500 \n";
		$line.="G00 X0.1 Y0.1 \n";
		$line.="G00 X0 Y0 \n";
		$line.="G00 Z0.1 F50 \n";
		$line.="G01 F2 Z-0.2 \n";
		$line.="G4 P500 ;wait 0.5s \n";

	}

	if($line==";T3 M06\r\n"){
		$line=";T1 M06 ;xibian xian suo mada\n";
		$line.="G00 Z1.0 F40 ;taigao\n";
		$line.="G00 F500 \n";
		$line.="G00 X0.1 Y0.1 \n";
		$line.="G00 X0 Y0 \n";
		$line.="G00 Z0 F50 \n";

	}

	if($line=="G00 Z0\r\n"){
		$line="G00 Z0.1 F50 \n";
	}




	$line=str_replace("G01 F1 ","G01 F4 ",$line); //����1��ƽ�׼⵶�µ��ٶȣ�������3������ϳ���µ��ٶȣ�
	$line=str_replace("G01 F2 ","G01 F2 ",$line); //����2����ͷ�µ��ٶȣ��Լ���ֱ�����ٶȣ�
	$line=str_replace("G01 F6 ","G01 F".$speed_work." ",$line); //����1��ƽ�׼⵶����ٶȣ�
	$line=str_replace("G01 F300 ","G01 F".$speed_work." ",$line); //����3������ϳ���и��ٶȣ�

	$line=str_replace("Z-1.1","Z-".$Z2,$line); //������
	$line=str_replace("Z-0.9","Z-".$Z3,$line); //���Ԥ�����
	$line=str_replace("Z-0.13","Z-".$Z1." \nG4 P500 ;wait 0.5s \n",$line); //������



	if(strpos($line,"G01 Z0.6")!==false){
	//	$line="G01 Z".($height_work+0.5)." F100.0 ;Penetrate \n";
	//	$line.="G01 Z".($height_work+0.1)." F50.0 ;Penetrate \n";
	//	$line.="G01 Z".$height_work." F2 ;Penetrate \n\n";
	//	$line.="G4 P1000 ;wait 0.5s \n";
	}

	//$line=str_replace("M5",";M5",$line);

	$line=str_replace("M02",";M02",$line);

	//$line=str_replace("G00","G00 f500",$line);

	//$line=str_replace("F400.0","F".$speed_work,$line);
	//$line=str_replace("Z0.600000","Z".$height_work,$line);
	//$line=str_replace("Z1.250000","Z".$height_safe,$line);

	echo $line; //echo "<br>\n";

}

echo "\n";
echo "G00 X0 Y0 Z10 \n";
//echo "M02 \n";


//echo "\nM106 S3; open 1% \n";
//echo "M107; close \n";
		$line="\n";
		$line.="G01 Z".($height_work+0.5)." F100.0 ;Penetrate \n";
		$line.="G01 Z".($height_plane)." F20.0 ;Penetrate \n";


//echo $line; 


echo "\n".'</textarea>';


?>