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

<body>
<center>
<br />
<?
	//������ ���̽� �����ϱ�
	include "db_info.php";
	
	if (!isset($_GET['id'])) die('ERROR : �������� ǥ���ϱ� ���� ������ �����մϴ�.');
	$id = (int)$_GET['id'];
	$no =0;
	if(isset($_GET['no'])) $no = (int)$_GET['no'];

	// �� ���� ��������
	$result=$mysqli->query("SELECT * FROM board WHERE id=$id");
	$row=$result->fetch_array();
?>
<table width=780 border=0 cellpadding=2 cellspacing=1 bgcolor=#cccccc>
<tr>
	<td height=20 colspan=4 align=center bgcolor=#eeeeee>
		<B><?=$row['title']?></B>
	</td>
</tr>
<tr>
	<td width=50 height=20 align=center bgcolor=#EEEEEE>�۾���</td>
	<td	width=240 bgcolor=white><?=$row['name']?></td>
	<td width=50 height=20 align=center bgcolor=#EEEEEE>�̸���</td>
	<td	width=240 bgcolor=white><?=$row['email']?></td>
</tr>
<tr>
	<td width=50 height=20 align=center bgcolor=#EEEEEE>
	��&nbsp;&nbsp;&nbsp;¥</td><td width=240
	bgcolor=white><?=$row['wdate']?></td>
	<td width=50 height=20 align=center bgcolor=#EEEEEE>��ȸ��</td>
	<td	width=240 bgcolor=white><?=$row['view']?></td>
</tr>
<tr height=150>
	<td bgcolor=white colspan=4 valign=top>
		<table width=95% height=95% border=0 cellpadding=5>
		<tr><td>
		<pre><?=$row['content']?></pre>
		</td></tr>
		</table>
	</td>
</tr>
<!-- ��Ÿ ��ư �� -->
<tr>
	<td colspan=4 bgcolor=#eeeeee>
	<table width=100%>
		<tr>
			<td width=200 align=left height=20>
				<a href=list.php?no=<?=$no?>>
				[��Ϻ���]</a>
				<a href=write.php>
				[�۾���]</a>
				<a href=edit.php?id=<?=$id?>>
				[����]</a>
				<a href=predel.php?id=<?=$id?>>
				[����]</a>
			</td>
			<!-- ��Ÿ ��ư �� -->
			<!-- ���� ���� ǥ�� -->
			<td align=right>
<?
	// ���� �ۺ��� id ���� ū �� �� ���� ���� ���� �����´�. 
	// �� �ٷ� ���� ��
	$result_pid = $mysqli->query("SELECT id FROM board WHERE id > $id LIMIT 1");
	$prev_id = $result_pid->fetch_array();

	if ($prev_id['id']) // ���� ���� ���� ���
	{
		echo "<a href=read.php?id=$prev_id[id]>[����]</a>";
	}
	else
	{
		echo "<font color=grey>[����]</font>";
	}

	$result_nid = $mysqli->query("SELECT id FROM board WHERE id < $id ORDER BY id DESC LIMIT 1");
	$next_id = $result_nid->fetch_array();

	if ($next_id['id'])
	{
		echo "<a href=read.php?id={$next_id['id']}>[����]</a>";
	}
	else
	{
		echo "<font color=grey>[����]</font>";
	}
?>
			</td>
		</tr>
	</table>
	</b></font>
	</td>
</tr>
</table>
</center>
</body>
</html>
<?
	// ��ȸ�� ������Ʈ
	$result=$mysqli->query("UPDATE board SET view=view+1 WHERE id=$id");
	$mysqli->close();
?>