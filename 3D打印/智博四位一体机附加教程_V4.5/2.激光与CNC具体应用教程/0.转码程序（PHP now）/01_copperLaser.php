<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<?
$title ="PCB�����տ� | CopperCAM | �ǲ�3D��ӡ��";
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

<br>��ѵ�·�ļ���CopperCAM.iso������ htdocs Ŀ¼��
<hr>


<form>

<!--��·������
<select name="Z1" id="Z1" style=" width:70px; height:18px; ">
    		<option selected="selected" value="0.15">0.15</option> 
		<option value="0.2" >0.2</option> 

</select>
-->
<input type="hidden" name="Z1" id="Z1" value="0.15"/>


<!--������
<select name="Z2" id="Z2" style=" width:70px; height:18px; ">
		<option value="0.3" >0.3</option> 
    		<option value="0.5" selected="selected" >0.5</option> 

</select>; 
-->
<input type="hidden" name="Z2" id="Z2" value="0.5"/>

<!--���ϳ�����
<select name="Z3" id="Z3" style=" width:70px; height:18px; ">
		<option selected="selected" value="0.15" >0.15</option> 
		<option value="0.2" >0.2</option> 
    		<option value="0.3">0.3</option> 
</select>
-->
<input type="hidden" name="Z3" id="Z3" value="0.15"/>

����ٶ�
<select name="speed" id="speed" style=" width:70px; height:18px; ">
    		<option value="50">50</option> 
		<option value="80" >80</option> 
		<option value="100" >100</option> 
		<option value="150" >150</option> 
		<option selected="selected" value="200" >200</option> 
</select>mm/min; 

���⹦��
<select name="power" id="power" style=" width:70px; height:18px; ">
		<option value="30" >30</option> 
		<option value="100" >100</option> 
    		<option value="200">200</option> 
    		<option selected="selected" value="255">255</option> 
</select>/255; 

<input type="hidden" name="act" id="act"  value="gcode">

<br>



<input type="submit" onclick="javascript:document.getElementById('act').value='xianlu';" value="��ʼ��·ת��">
<!--input type="submit" onclick="javascript:document.getElementById('act').value='dakong';" value="�������(CopperCAM2.iso)"-->

</form>



<?
@$Z1=$_GET["Z1"];
@$Z2=$_GET["Z2"];
@$Z3=$_GET["Z3"];
@$speed_work=$_GET["speed"];
@$power=$_GET["power"];
@$act=$_GET["act"];

if($Z1&&$Z2&&$Z3&&$speed_work){
	if($act=="xianlu"){
		$url="CopperCAM.iso";	
	}
	else if($act=="dakong"){
		$url="CopperCAM.iso";
	}


}
else{
	exit("��ѡ��������ύ");
}




//2 �����ļ������� file()
$str = file($url); //����2:file() ����
//echo print_r($str)." 2<br>"; //������ݵ�����

date_default_timezone_set("ETC/GMT-8");
echo '<textarea id="pic_code" name="pic_code" style="width:500px; height:500px; ">'."\n";
echo ";----PCB����(�����տ�V3.0) ". date("Y-m-d H:i:s",time()) ."----\n";


$height_plane=0.0;
$height_work=$height_plane-0.13;
$height_safe=$height_plane+1;

/*
echo ";height_safe is Z" .$height_safe ."mm\n" ;
echo ";height_plane is Z" .$height_plane ."mm\n" ;
echo ";height_work is Z" .$height_work ."mm\n" ;
echo ";speed_work is F" .$speed_work ."\n\n" ;
*/



echo "G92 X0 Y0\n" ;
echo "G21;     metric values \n" ;
echo "G90;     absolute positioning \n" ;
echo "M107;    laser close \n";

echo "\nM106 S100; test and origin of coordinate \n";
echo "G4 P600 ;  wait 0.6s when test \n";
echo "M106 S0;   test end \n";
echo "M220 S100; set speed factor 100% \n";

echo "M117 Laser Working...; \n\n";

echo ";�ǲ�3D��ӡ֮PCB������\n\n";
$speed_tmp="1.0";
$dongzuo="";

foreach ($str as $key=>$val){ //$data��������
	//echo "����",$key,"ֵ"; print_r($val); echo "<br>\n";
	$line=$val;

	//ȥ������ָ��
	$line=str_replace("%",";%",$line);
	$line=str_replace("(",";",$line);
	$line=str_replace(")",";",$line);

	$line=str_replace("M02",";M02",$line);
	$line=str_replace("M03",";M03",$line);
	$line=str_replace("M05",";M05",$line);
	$line=str_replace("G00 F",";G00 F",$line);
	$line=str_replace("G00 G","; G00 G",$line);

	//�жϹ���
	$line=str_replace("T3","\n;�����л�->����տ�; T3",$line);
	$line=str_replace("T4","\n;�����л�->��·�տ�; T4",$line);
	$line=str_replace("T2","\n;�����л�->�����տ�; T2",$line);
	$line=str_replace("T5","\n;�����л�->������; T5",$line);


	//�����ٶ�
	if(strpos($line,"->����տ�")!==false){
		$dongzuo="";
		//$line="G00 Z0.1 F50 \n";
		$line.="G0 X0 Y0 \n";
		$line.="\n;open laser\n";
		$line.= "M106 S".$power."; open 100% \n";
		$line.= "G4 P200 ;wait 0.2s when open3 \n";
		$speed_tmp=$speed_work;
		//$speed_tmp="1.1";
	}
	else if(strpos($line,"->��·�տ�")!==false){
		$dongzuo="";
		$speed_tmp=$speed_work;
		//$speed_tmp="1.2";
	}
	else if(strpos($line,"->�����տ�")!==false){
		$dongzuo="kong";
		$line.=";***************************************\n\n�����л�->�����տ�\n\n;***************************************\n";
		$speed_tmp=$speed_work;
		//$speed_tmp="1.3";
	}
	else if(strpos($line,"->������")!==false){
		$dongzuo="";
		$line.="M220 S150; set speed factor 150%\n";
		$speed_tmp=$speed_work;
		//$speed_tmp="1.4";
	}
	//ȥ�����õ�Z����
	else if(strpos($line,"Z")!==false && strpos($line,";")!==0){
		$line=";".$line; 
	}


	//�滻�ٶ�
	//$line=str_replace("G01 F","G01 F".$speed_tmp." ",$line); //ϳ��ߣ��и�ٶ�
	$line = preg_replace("/^G(.+?)F.+?\s/", "G$1F".$speed_tmp." ", $line);


	//�رռ���
	if(strpos($line,"G00 Z2")!==false){
		$line="\n;close laser\n";
		$line.=";G00 Z1.0; lift up\n"; //�յ�����̧��,Ҫ����ϳ����Ȼ���������
		$line.="M106 S0;    close \n";
		$line.="G4 P500 ;   wait 0.5s when close \n";
		$line.="G00 F800 ;  ���������ٶ� \n";
	}

	//��������
	if(strpos($line,"G00 Z0\r\n")!==false){
		$line="\n;open laser\n";
		$line.=";G01 Z0 F50; start new\n";
		$line.= "M106 S".$power."; open 100% \n";
		$line.= "G4 P200;   wait 0.2s when open2 \n";
		if($dongzuo=="kong")$line.="G91\nG00 Z1\nG00 Z-1\nG90\n"; //�յ�����̧��,Ҫ����ϳ����Ȼ���������
	}


	echo $line; //echo "<br>\n";

}



echo "\n\n;finish\n";
echo "M106 S3;   open 1% \n";
echo "M107;      close \n";
echo "G00 X0 Y0; return origin\n";

include("end.php"); 
?>




</div>



<script type="text/javascript" >
//��ס�û����ĵĲ���


document.getElementById('speed').value="<?echo $speed_work; ?>"
document.getElementById('power').value="<?echo $power; ?>"
</script>





</body>
</html>