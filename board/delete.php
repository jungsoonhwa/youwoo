<?
//������ ���̽� �����ϱ�
include "db_info.php";

if(!isset($_GET['id'])) die('ERROR : � ���� �������� �� �� �����ϴ�.');
$id = $_GET['id'];

$result=$mysqli->query("SELECT pass FROM board WHERE id=$id");
$row = $result->fetch_array();

if (sha1($_POST['pass'])==$row['pass'] )
{
	$query = "DELETE FROM board WHERE id=$id ";
	$result=$mysqli->query($query);
}
else
{
	echo ("
	<script>
	alert('��й�ȣ�� Ʋ���ϴ�.');
	history.go(-1);
	</script>
	");
	exit;
}
?>
<center>
<meta http-equiv='Refresh' content='1; URL=list.php'>
<FONT size=2 >�����Ǿ����ϴ�.</font>