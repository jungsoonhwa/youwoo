<html>
<head>
<title>�Ϲ� �Խ���</title>
<style>
<!--
td {font-size : 9pt; color:#333333}
A:link {font : 9pt; color : black; text-decoration : none;
font-family : ����; font-size : 9pt;}
A:visited {text-decoration : none; color : #333333; font-size : 9pt;}
A:hover {text-decoration : underline; color : #333333; 
font-size : 9pt;}
-->
</style>
</head>
<body topmargin=0 leftmargin=0 text=#464646>
<center>
<br />
<!-- �Էµ� ���� ���� �������� �ѱ�� ���� FORM�� �����. -->
<? 
	if(!isset($_GET['id'])) die('ERROR : � ���� �������� �� �� �����ϴ�.');
	$id = $_GET['id'];
?>
<form action=delete.php?id=<?=$id?> method=post>
<table width=300 border=0 cellpadding=2 cellspacing=1 bgcolor=#cccccc>
<tr>
	<td height=20 align=center bgcolor=#eeeeee>
		<font color=white><B>�� �� �� ȣ Ȯ ��</B></font>
	</td>
</tr>
<tr>
	<td align=center >
		<font color=white><B>��й�ȣ : </b>
		<INPUT type=password name=pass size=8>
		<INPUT type=submit value="Ȯ ��">
		<INPUT type=button value="�� ��" onclick="history.back(-1)">
	</td>
</tr>
</table>