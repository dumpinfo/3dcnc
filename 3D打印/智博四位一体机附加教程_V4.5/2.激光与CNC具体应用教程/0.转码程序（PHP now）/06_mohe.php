<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<?
$title ="ͨ�ü����տ� | JDpaint | �ǲ�3D��ӡ��";
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


@$file=$_GET["file"];
if(!$file) $file="JDlaser.nc";

?>
<br>��·�ļ� <? echo dirname(__FILE__); ?> \
<input id="filename" name="filename" value="<? echo $file ;?>" style=" width:70px; height:18px; " onchange="document.getElementById('file').value=document.getElementById('filename').value"/>
������.nc��β��
<hr>

<form>

���⹦��
<select name="gonglv" id="gonglv" style=" width:70px; height:18px; ">
    		<option value="26" >10%</option> 
    		<option value="64" >25%</option> 
    		<option value="102" >40%</option> 
    		<option value="127" >50%</option> 
		<option value="153" >60%</option> 
		<option value="204" >80%</option> 
		<option value="255" selected="selected" >100%</option> 
</select>

����ٶ�
<select name="speed" id="speed" style=" width:70px; height:18px; ">
		<option value="50.0" >50</option> 
		<option value="100.0" >100</option> 
    		<option value="150.0" >150</option> 
		<option value="200.0" >200</option> 
		<option value="300.0" >300</option> 
		<option value="500.0" selected="selected" >500</option> 
		<option value="1000.0" >1000</option> 

</select>

��ͷ���Ӷ���
<select name="laser_type" id="laser_type" style=" width:70px; ">
    		<option value="blue">ʮ��</option> 
		<option selected="selected" value="red" >��</option> 
</select>

<input type="hidden" name="act" id="act"  value="gcode">
<input type="hidden" name="file" id="file"  value="<? echo $file ;?>" >

<br>
˵����С���ʼ����̰�ֽʱ������:100%���ٶ�:50, ��ͷ���Ӷ���:ʮ��<br>
��ɫֽ�Լ����ʼ������衰��ͷ���Ӷ�����

<br>
<input type="submit" value="����malin G-code">


</form>

<?
@$power_laser=$_GET["gonglv"];
@$speed_laser=$_GET["speed"];
@$laser_type=$_GET["laser_type"];

if($power_laser&&$speed_laser&&$laser_type){



}
else{
exit("��ѡ��������ύ");
}

$url="JDlaser.nc";
$url=$file;
//2 �����ļ������� file()
$str = file($url); //����2:file() ����
//echo print_r($str)." 2<br>"; //������ݵ�����

date_default_timezone_set("ETC/GMT-8");
echo '<textarea id="pic_code" name="pic_code" style="width:500px; height:500px; ">'."\n";
echo ";----�ǲ���λһ���(LASER START) ". date("Y-m-d H:i:s",time()) ."----\n";

$height_laser="60.0";
//$power_laser="150"; //0 to 255 ,0 is close
//$power_laser="200"; //0 to 255 ,0 is close
//$speed_laser="100.0";
//$speed_laser="150.0";
//$laser_type="red";
//$laser_type="blue";

echo "G21; ��λmm \n";
echo "G90; �������� \n";
echo "M106 S".$power_laser."; ���Լ��� \n";
//echo "G4 P3000 ; ԭ���տ�3s \n";
echo "M107; close \n";
echo ";G28; home \n";

echo "M201 X5000 Y5000\n";



echo ";G92 Z".$height_laser."\n";
echo ";G0 F1000 Z".$height_laser."\n";

echo "G92 X0 Y0; ��ǰ������Ϊԭ��\n";
echo ";�ļ�ͷ����\n";

echo "G00 F1000  G01 F1000 ;���ÿ����ٶ�\n";

$status_on="n";

foreach ($str as $key=>$val){ //$data��������
	//echo "����",$key,"ֵ"; print_r($val); echo "<br>\n";
	$line=$val;
	// ע�͵���������
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
	

	//�������⣬ͣ�٣������ٶ�
	if(strpos($line,"Z-1.0")!==false && $status_on=="n"){
		$line.="\n;--��������-->\n";
		$status_on="y";
		$line.="M106 S".$power_laser."; open\n";
		$line.=";G4 P100; delay 0.1s\n";
		$line.="G01 F". $speed_laser ."; �����ٶ�\n";


	    if($laser_type=="blue"){	
		$line.="G91 \n";
		$line.="G0 x0.1 y0.1 Z0.1\n";
		$line.="G0 x-0.2 y-0.2 Z-0.2 \n";
		$line.="G0 x0.2 y0.2 Z0.1 \n";
		$line.="G4 P500 ;wait 0.5s \n";
		$line.="G0 x-0.2 y-0.2 \n";
		$line.="G0 x0.2 y0.2 \n";
		$line.="G0 x-0.1 y-0.1 \n";
		$line.="G90 \n";

           }


	}


	//�رռ��⣬ͣ�٣������ٶ�
	if( (strpos($line,"Z0.2")!==false || strpos($line,"Z1")!==false || strpos($line,"Z4")!==false) && $status_on=="y"){
		$line.=";<--�رռ���--\n";
		$status_on="n";
		$line.="M106 S0; close\n";
		$line.="G4 P100 ; delay 0.1s\n";
		$line.="G01 F2000; ������ٶ�\n";
	}



	$line=str_replace(";Z-1.000 I","I",$line);

	$line=str_replace("Y-0.00","Y0.00",$line);



/*
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
*/



	echo $line; //echo "<br>\n";

}

echo "\nG00 X0 Y0 \n";
echo "\nM106 S3; open 1% \n";
echo "M107; close \n";

include("end.php"); 
?>


</div>





<script type="text/javascript" >
//��ס�û����ĵĲ���


document.getElementById('gonglv').value="<?echo $power_laser; ?>"
document.getElementById('speed').value="<?echo $speed_laser; ?>"
document.getElementById('laser_type').value="<?echo $laser_type; ?>"
</script>



</body>
</html>



