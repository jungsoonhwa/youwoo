<?
//������ ���̽� �����ϱ�
include "db_info.php";

# LIST ����
# 1. �� �������� ������ �Խù��� ��
$page_size=10;

# 2. ������ �����⿡ ǥ�õ� �������� ��
$page_list_size = 10;

if (!isset($_GET['no']) || $_GET['no'] < 0) $no=0;
else $no = $_GET['no'];

// �����ͺ��̽����� �������� ù��° ��($no)���� 
// $page_size ��ŭ�� ���� �����´�.
$query = "SELECT * FROM board ORDER BY id DESC LIMIT $no,$page_size";
$result = $mysqli->query($query);

// �� �Խù� �� �� ���Ѵ�.
$result_count = $mysqli->query("SELECT count(*) FROM board");
$result_row	  = $result_count->fetch_row();
$total_row	  = $result_row[0];
//����� ù��° ���� count(*) �� �����.

# �� ������ ���
if ($total_row <= 0) $total_row = 0;
$total_page = ceil($total_row / $page_size);

# ���� ������ ���
$current_page = ceil(($no+1)/$page_size);
?>
<!DOCTYPE html>
<html lang="ko">
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
<!-- �Խù� ����Ʈ�� ���̱� ���� ���̺� -->
<table width=780 border=0 cellpadding=2 cellspacing=1 bgcolor=#cccccc>
<!-- ����Ʈ Ÿ��Ʋ �κ� -->
<tr height=25 bgcolor=#eeeeee>
	<td width=30 align=center><b>��ȣ</b></td>
	<td width=370 align=center><b>�� ��</b></td>
	<td width=50 align=center><b>�۾���</b></td>
	<td width=120 align=center><b>�� ¥</b></td>
	<td width=40 align=center><b>��ȸ��</b></td>
</tr>
<!-- ����Ʈ Ÿ��Ʋ �� -->
<!-- ����Ʈ �κ� ���� -->
<?
while($row= $result->fetch_array())
{
?>
<!-- �� ���� -->
<tr height=25 bgcolor=white>
	<!-- ��ȣ -->
	<td align=center>
		<a href="read.php?id=<?=$row['id']?>&no=<?=$no?>">
		<?=$row['id']?></a>
	</td>
	<!-- ��ȣ �� -->
	<!-- ���� -->
	<td>&nbsp;
		<a href="read.php?id=<?=$row['id']?>&no=<?=$no?>">
		<?=strip_tags($row['title'], '<b><i>');?></a>
	</td>
	<!-- ���� �� -->
	<!-- �̸� -->
	<td align=center>
		<font color=black>
		<a href="mailto:<?=$row['email']?>"><?=$row['name']?></a>
		</font>
	</td>
	<!-- �̸� �� -->
	<!-- ��¥ -->
	<td align=center>
		<font color=black><?=$row['wdate']?></font>
	</td>
	<!-- ��¥ �� -->
	<!-- ��ȸ�� -->
	<td align=center>
		<font color=black><?=$row['view']?></font>
	</td>
	<!-- ��ȸ�� �� -->
</tr>
<!-- �� �� -->
<?
} // end While
//�����ͺ��̽����� ������ ���´�.
$mysqli->close();
?>
</table>
<!-- �Խù� ����Ʈ�� ���̱� ���� ���̺� ��-->
<!-- �������� ǥ���ϱ� ���� ���̺� -->
<table border=0>
<tr>
	<td width=600 height=20 align=center rowspan=4>
	<font color=gray>
	&nbsp;
<?
$start_page = floor(($current_page - 1) / $page_list_size) 
				* $page_list_size + 1;

# ������ ����Ʈ�� ������ �������� �� ��° ���������� ���ϴ� �κ��̴�.
$end_page = $start_page + $page_list_size - 1;

if ($total_page < $end_page) $end_page = $total_page;
if ($start_page >= $page_list_size) {
	# ���� ������ ����Ʈ���� ù ��° ���������� �� ������ �����ϸ� �ȴ�.
	# $page_size �� �����ִ� ������ �۹�ȣ�� ǥ���ϱ� ���ؼ��̴�.

	$prev_list = ($start_page - 2)*$page_size;
	echo "<a href=\"$PHP_SELF?no=$prev_list\">��</a>\n";
}

# ������ ����Ʈ�� ���
for ($i=$start_page;$i <= $end_page;$i++) {
	$page= ($i-1) * $page_size;// ���������� no ������ ��ȯ.
	if ($no!=$page){ //���� �������� �ƴ� ��츸 ��ũ�� ǥ��
		echo "<a href=\"$PHP_SELF?no=$page\">";
	}
	
	echo " $i "; //�������� ǥ��
	
	if ($no!=$page){
		echo "</a>";
	}
}

# ���� ������ ����Ʈ�� �ʿ��Ҷ��� �� �������� ������ ����Ʈ���� Ŭ ���̴�.
# ����Ʈ�� �� �Ѹ��� �� �ѷ��� �������� �������� ���� ��ư�� �ʿ��� ���̴�.
if($total_page > $end_page)
{
	$next_list = $end_page * $page_size;
	echo "<a href=$PHP_SELF?no=$next_list>��</a><p>";
}
?>
	</font>
	</td>
</tr>
</table>
<a href=write.php>�۾���</a>
</center>
</body>
</html>