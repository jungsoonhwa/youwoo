<?
	//������ ���̽� �����ϱ�
	include "db_info.php";

	if(!isset($_GET['id'])) die('ERROR : � ���� �������� �� �� �����ϴ�.');
	$id = $_GET['id'];

	// ���� ��й�ȣ�� �����´�.
	$query = "SELECT pass FROM board WHERE id=$id";
	$result=$mysqli->query($query);
	$row= $result->fetch_array();
	

	//�Էµ� ���� ���Ѵ�.
	if (sha1($_POST['pass'])==$row['pass']) { //��й�ȣ�� ��ġ�ϴ� ���

		$name = strip_tags($_POST['name']);
		$email = strip_tags($_POST['email']);
		$title = strip_tags($_POST['title']);
		$content = strip_tags($_POST['content']);

		$query = "UPDATE board SET name='$name', email='$email',
		title='$title', content='$content' WHERE id=$id";
		$result=$mysqli->query($query);
	}
	else { // ��й�ȣ�� ��ġ���� �ʴ� ���
		echo ("
		<script>
		alert('��й�ȣ�� Ʋ���ϴ�.');
		history.go(-1);
		</script>
		");
		exit;
	}

	//�����ͺ��̽����� ���� ����
	$mysqli->close();

	//�����ϱ��� ��� ������ �۷�..
	echo ("<meta http-equiv='Refresh' content='1; URL=read.php?id=$id'>");
?>
<center>
<font size=2>���������� �����Ǿ����ϴ�.</font>