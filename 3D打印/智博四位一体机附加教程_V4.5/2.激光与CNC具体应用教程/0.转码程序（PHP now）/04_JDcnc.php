<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<?
$title ="CNC���/�и�/����/���� | JDpaint | �ǲ�3D��ӡ��";
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
document.getElementById('note').innerHTML="��ѡ��������ύ����ͬ������ѡ��ͬ���ߡ�CNC����ѡ��.pptx��"
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
document.getElementById('note').innerHTML="����ʶ��ؼ���=\"[ƽ��]\""
document.getElementById('s11').style.background="#ff9999";
document.getElementById('s21').style.background="#ff9999";
break;
case 2:
document.getElementById('note').innerHTML="����ʶ��ؼ���=\"[��ͷ]\""
document.getElementById('s12').style.background="#ff9999";
break;
case 3:
document.getElementById('note').innerHTML="����ʶ��ؼ���=\"[׶��ƽ��]\""
document.getElementById('s11').style.background="#ff9999";
document.getElementById('s22').style.background="#ff9999";
break;
case 4:
document.getElementById('note').innerHTML="����ʶ��ؼ���=\"[ƽ��]\""
document.getElementById('s11').style.background="#ff9999";
document.getElementById('s31').style.background="#ff9999";
break;
case 5:
document.getElementById('note').innerHTML="����ʶ��ؼ���=\"[׶��ƽ��]\""
document.getElementById('s11').style.background="#ff9999";
document.getElementById('s32').style.background="#ff9999";
break;

}

}


</script>

<div class="wrapper">

<iframe src="navi.htm" style=" width:100%; height:135px" frameborder="no" border="0" scrolling="no" id="f_chat"></iframe>

<?
echo "��ǰת�����Ϊ��", $title ,"��";
?>

<br>��ѵ�·�ļ���JDcnc.nc���ŵ�Ŀ¼ ��\PHPnow-1.5.6\htdocs\��
<hr>

<form>

�µ��ٶ�
<select name="s11" id="s11" style=" width:70px; height:18px; ">
    		<option value="1">1</option> 
		<option value="2" >2</option> 
    		<option value="10" selected="selected" >10</option> 
    		<option value="100" selected="selected" >100</option> 			

</select>

�����ٶ�
<select name="s21" id="s21" style=" width:70px; height:18px; ">
		<option selected="selected" value="0.4" >0.4</option> 
		<option value="1" >1</option> 
    		<option value="2">2</option> 
    		<option value="10">10</option> 
    		<option value="30" >30</option>
    		<option value="50" selected="selected" >50</option> 				
    		<option value="100" >100</option> 			
</select>

�ֵ��ٶ�
<select name="s31" id="s31" style=" width:70px; height:18px; ">
    		<option selected="selected" value="0.4">0.4</option> 
		<option value="1.0" >1.0</option> 
    		<option value="10">10</option> 
    		<option value="30">30</option> 
    		<option value="50" selected="selected" >50</option> 
</select>
<br>

����ٶ�
<select name="s12" id="s12" style=" width:70px; height:18px; ">
    		<option value="1">1</option> 
		<option value="2" >2</option> 
    		<option value="10" selected="selected" >10</option> 

</select>



����ٶ�
<select name="s22" id="s22" style=" width:70px; height:18px; ">
    		<option selected="selected" value="0.4">0.4</option> 
		<option value="1.0" >1.0</option> 
    		<option value="10">10</option> 
    		<option value="30" selected="selected" >30</option> 
</select>


�����ٶ�
<select name="s32" id="s32" style=" width:70px; height:18px; ">
    		<option selected="selected" value="0.4">0.4</option> 
		<option value="1.0" >1.0</option> 
    		<option value="10">10</option> 
    		<option value="30" selected="selected" >30</option> 
</select>

<input type="hidden" name="act" id="act"  value="gcode">

<div id="note">��ѡ��������ύ����ͬ������ѡ��ͬ���ߡ�CNC����ѡ��.pptx��</div>
<hr>

<input type="submit" onclick="javascript:document.getElementById('act').value='kaicao';" value="���߿��۵�·" onmouseover="f_mouseOver(1)" onmouseout="f_mouseOut(1)" >
<input type="submit" onclick="javascript:document.getElementById('act').value='quyu';" value="�������ֵ�̵�· �������̵�·(����/����)" onmouseover="f_mouseOver(3)" onmouseout="f_mouseOut(3)" >
<hr>
<input type="submit" onclick="javascript:document.getElementById('act').value='dakong';" value="��ä�׵�·" onmouseover="f_mouseOver(2)" onmouseout="f_mouseOut(2)" >
<input type="submit" onclick="javascript:document.getElementById('act').value='qumian1';" value="����ֵ�·(����)-1/2" onmouseover="f_mouseOver(4)" onmouseout="f_mouseOut(4)" >
<input type="submit" onclick="javascript:document.getElementById('act').value='qumian2';" value="���澫��·(����)-2/2" onmouseover="f_mouseOver(5)" onmouseout="f_mouseOut(5)" >


<hr>

</form>




<script type="text/javascript" >
//��ס�û����ĵĲ���

f_white()

</script>




<?
//1.��ò���

@$s11=$_GET["s11"];
@$s12=$_GET["s12"];
@$s21=$_GET["s21"];
@$s22=$_GET["s22"];
@$s31=$_GET["s31"];
@$s32=$_GET["s32"];

@$act=$_GET["act"];

if($s11&&$s12&&$s21&&$s22&&$s31&&$s32&&$act){
	$url="JDcnc.nc";
	if($act=="kaicao") $daoju="[ƽ��]"; //��������
	if($act=="dakong") $daoju="[��ͷ]"; //��ͷ���
	if($act=="quyu") $daoju="[׶��ƽ��]"; //ƽ�׼⵶���

	if($act=="qumian1") $daoju="[ƽ��]"; //�����ֵ�
	if($act=="qumian2") $daoju="[׶��ƽ��]"; //ƽ�׼⵶����


}
else{
	exit("<!--��ѡ��������ύ-->");
}



//2 �����ļ������� file()
$str = file($url); //����2:file() ����
//echo print_r($str)." 2<br>"; //������ݵ�����
date_default_timezone_set("ETC/GMT-8");
echo '<textarea id="pic_code" name="pic_code" style="width:500px; height:500px; ">'."\n";
echo ";----�ǲ���λһ���(CNC START) ". date("Y-m-d H:i:s",time()) ."----\n";
echo "G92 X0 Y0; �ѵ�ǰ������ΪXY������� \n" ; //��ǰ���굱��X0��Y0���ھ���������gcodeʱ����·�������½�����Ϊ����ԭ�㡣
echo "G92 Z10; �ѵ�ǰ�߶���ΪZ10������������õĹ�������߶�\n"; //��ǰ���굱��Z10���ھ��������Ҫ���ù�����Ϊ10mm��������ָ���

echo "G21        ;metric values \n" ;
echo "G90        ;absolute positioning \n" ;
echo "G0 Z15 \n";

echo "cnc Working...; \n\n";

echo "G00 F1000; �����ٶ� \n" ; //�����ƶ����ٶ�

//����ѭ����nc����������з����Լ�����Ӧ�任����
$out="yes";
foreach ($str as $key=>$val){ //$data��������
	//echo "����",$key,"ֵ"; print_r($val); echo "<br>\n";
	$line=$val;

	//ͨ�ñ任����
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
	//1.����T��ͳһ����ͣ�����
	if(strpos($line,";T")!==false){
		$out="no";

		//2.�ٰѷ��ϵ�ģ������
		if(strpos($line,$daoju)!==false){
			$out="yes";
			$line=";���߷��� ".$line ;
		}
		else{
			$line=";���߲��� ".$line ;
		}

	}


	//3.��� $out=="no"��ֱ�Ӱ���һ��ע�͵�
	if($out=="no"){ 
		$line=";del ".$line ;
		echo $line; //echo "<br>\n";
		continue; //��һ�в�����һ���ı任����
	}
	else{

	//���Ϲ��ܵĵ��ߴ���ν����ٶ��滻
	
	//����
	if($act=="kaicao"){
		$line=str_replace("F300"," F".$s11,$line);//�����µ��ٶ�
		$line=str_replace("F800"," F".$s21,$line);//���Ŀ����ٶ�
	}

	//���
	if($act=="dakong"){
		$line=str_replace("G01","G01 F".$s12,$line);//���Ĵ���ٶ�
	}

	//��������
	if($act=="quyu"){
		$line=str_replace("F300"," F".$s11,$line);//�����µ��ٶ�
		$line=str_replace("F800"," F".$s22,$line);//���Ŀ����ٶ�


		$line=str_replace("Z10.","Z14.",$line);//���Ŀ����ٶ�


	}

	//�ֵ�
	if($act=="qumian1"){
		$line=str_replace("F300"," F".$s11,$line);//�����µ��ٶ�
		$line=str_replace("F800"," F".$s31,$line);//���Ĵֵ��ٶ�
	}

	//����
	if($act=="qumian2"){
		$line=str_replace("F300"," F".$s11,$line);//�����µ��ٶ�
		$line=str_replace("F800"," F".$s32,$line);//���ľ����ٶ�
	}


		$line=str_replace("-0.00","0.000",$line);//ȡ��΢С��ֵ


	}


	echo $line; //echo "<br>\n";

}

//��̽�����XY�ص�ԭ�㣬Z�ص���ȫ����Z20����ʱ���빤������Ϊ10mm
echo "\n";
echo "G00 X0 Y0 Z20; ̧�ߵ����Լ���������ԭ�� \n";

include("end.php"); 
?>


</div>



<script type="text/javascript" >
//��ס�û����ĵĲ���



document.getElementById('s11').value="<?echo $s11; ?>"
document.getElementById('s12').value="<?echo $s12; ?>"
document.getElementById('s21').value="<?echo $s21; ?>"
document.getElementById('s22').value="<?echo $s22; ?>"
document.getElementById('s31').value="<?echo $s31; ?>"
document.getElementById('s32').value="<?echo $s32; ?>"



</script>





</body>
</html>
