<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<?
$title ="Cura Gcode�ײ��Ż� | Cura | �ǲ�3D��ӡ��";
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
echo "�� ��ǰת�����Ϊ��", $title ,"��";
$dir=dirname(__FILE__);//������������·��
?>
<br>�� ��Ѵ��Ż�gcode�ļ��ŵ�Ŀ¼<font color="red"> <? echo $dir; ?> </font>
<br>�� �ײ���SKIRT,WALL-INNER,WALL-OUTER,SKIN�Ĳ�����ɣ�
<br>�� �����Ĳ��ָ߶��Լ��ٶȱ��ʽ���ϸ�ֵ����Ż��ײ�����������ӡ�ٶȡ�
<form>

�� �ײ�߶�ϸ�֣�
Skirt<input type="text" name="h1" id="h1"  value="0.05" style=" width:30px; " >
Wall-in<input type="text" name="h2" id="h2"  value="0.10" style=" width:30px; " >
Wall-out<input type="text" name="h3" id="h3"  value="0.15" style=" width:30px; " >
Skin<input type="text" name="h4" id="h4"  value="0.20"  style=" width:30px; " >

<br>
�� �ٶ�ϸ�����ã� 
�ײ�Wall�ٶ�=<input type="text" name="s1" id="s1"  value="100"  style=" width:30px; " >%��
�����ٶȱ���=<input type="text" name="s2" id="s2"  value="150"  style=" width:30px; " >%

<br>
�� <font color="blue"> ��ɺ��Ƿ�ɾ��ԭ�ļ���</font>

<select name="del" id="del" style=" width:70px; height:18px; " >
    		<option selected="selected" value="yes">yes</option> 
		<option value="no" >no</option> 

</select>

<input type="hidden" name="act" id="act"  value="gcode">
<input type="submit" value="��ʼ�Ż�">
<br>




</form>


<?

//PHP�����ļ����������ļ�
$handle=opendir($dir.".");
//�������ڴ洢�ļ���������
$renwu="no";
while (false !== ($file = readdir($handle)))
{
	if ($file != "." && $file != ".." && strpos($file ,".gcode")!==false) {


		//������һ��
		$str = file_get_contents($file); //����1:file_get_contents() ����
		if(strpos($str,"�ײ�߶�ϸ�ֵ���")!==false){
				echo "����>������gcode�ļ���", $file, " �����Ż�����\n<br>"; //����ļ���
		}
		else{
				echo "����>���Ż�gcode�ļ���", $file, " �����Ż���\n<br>"; //����ļ���
				$renwu="yes";
				break;//�˳�ѭ��
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
//��ס�û����ĵĲ���
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

	exit("���ύ����ʼ�Ż�");
}
else{
	exit("δ�ҵ�Gcode�ļ�! ");
}


$url="1.gcode";
$url=$file;
//2 �����ļ������� file()
$str = file($url); //����2:file() ����
//echo print_r($str)." 2<br>"; //������ݵ�����

echo "<span id=\"xiaoxi\" >���ڼ����У����Ժ򡣡���</span><br>";
echo '<textarea id="pic_code" name="pic_code" style="width:500px; height:500px; ">'."\n";
date_default_timezone_set("ETC/GMT-8");

echo ";�ײ�߶�ϸ�ֵ������ٶ�ϸ�ֵ�����". date("Y-m-d H:i:s",time()) ."\n";


$line_last="";
$line_no="0";
foreach ($str as $key=>$val){ //$data��������
	//echo "����",$key,"ֵ"; print_r($val); echo "<br>\n";
	//$line_last=$val;
	$line=$val;

	//�¶�ϸ��
	if(strpos($line,"M109")!==false ){
		//$line="M109 S220; zhibo\n";
	}


	//�߶���Ϣϸ�֣��˴�ȡ���߶ȣ������Ŵ���
	if(strpos($line_last,"M107")!==false ){
		//$line=str_replace("Z0.200",";Z0.200 zhibo",$line);
	}
	//SKIRTʱ�ײ�߶�0.05mm���ٶ�100%
	if($line_no=="0" && strpos($line_last,"SKIRT")!==false){
		//$line="G0 Z0.050; zhibo\n".$line;
		$line="G0 Z".$h1."0; Z0.050 zhibo\n".$line;
		//$line = $line . "M220 S100; set speed factor 100% zhibo\n";
		$line = $line . "M220 S".$s1."; set speed factor 100% zhibo\n";

	}
	//WALL-INNERʱ�ײ�߶�0.10mm���ٶ�100%���رշ���
	if($line_no=="0" && strpos($line_last,"WALL-INNER")!==false){
		//$line="G0 Z0.100; zhibo\n".$line;
		$line="G0 Z".$h2."0; Z0.100 zhibo\n".$line;
		//$line = $line . "M220 S100;  set speed factor 100% zhibo\n";
		$line = $line . "M220 S".$s1."; set speed factor 100% zhibo\n";
		$line = $line . "M107; fan stop zhibo\n";
	}
	//WALL-OUTERʱ�ײ�߶�0.15mm���ٶ�120%
	if($line_no=="0" && strpos($line_last,"WALL-OUTER")!==false){
		//$line="G0 Z0.150; zhibo\n".$line;
		$line="G0 Z".$h3."0; Z0.150 zhibo\n".$line;
		//$line = $line . "M220 S150;  set speed factor 150% zhibo\n";
		$line = $line . "M220 S".$s2."; set speed factor 150% zhibo\n";
	}
	//SKINʱ�ײ�߶Ȼָ�Ϊ0.20mm���ٶ�120%����������
	if($line_no=="0" && strpos($line_last,"SKIN")!==false){
		//$line="G0 Z0.200; zhibo\n".$line;
		$line="G0 Z".$h4."0; Z0.200 zhibo\n".$line;
		//$line = $line . "M220 S150;  set speed factor 150% zhibo\n";
		$line = $line . "M220 S".$s2."; set speed factor 150% zhibo\n";
		$line = $line . "M106 S200; fan start zhibo\n";

	}
	//�ж��ײ��Ѿ�����
	//�ӵ�һ�㿪ʼ������Ϊ120%
	if(strpos($line_last,"LAYER:1")!==false && $line_no=="0"){
		$line_no="1";
		//$line = $line . "M220 S150;  set speed factor 120% zhibo\n";
		//$line = $line . ";M109 S215;  set temperature again zhibo\n";
	}

	//�ײ㿪ʼǰ���������
	//�ǲ������ļ�ͷ�������Ѿ��������·��
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
//��ס�û����ĵĲ���
document.getElementById('xiaoxi').innerHTML=" ����Ϊ�Ż����Gcode����ȫ������������Ctrl+A��Ctrl+C��";

</script>


</body>
</html>


