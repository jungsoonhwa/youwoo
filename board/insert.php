<?
	//������ ���̽� �����ϱ�
	include "db_info.php";

	//�н����� ��ȣȭ �۾�
	$name = strip_tags($_POST['name']);
	$email = strip_tags($_POST['email']);
	$title = strip_tags($_POST['title']);
	$content = strip_tags($_POST['content']);

	$pass = sha1($_POST['pass']);
	

	$query = "INSERT INTO board 
	(id, name, email, pass, title, content,	wdate, ip, view)
	VALUES ('', '$name', '$email', '$pass', '$title', 
	'$content',	now(), '{$_SERVER['REMOTE_ADDR']}', 0)";
	$result=$mysqli->query($query);

	//�����ͺ��̽����� ���� ����
	$mysqli->close();

	// �� �� ������ ��� ����Ʈ��..
	echo ("<meta http-equiv='Refresh' content='1; URL=list.php'>");
?>
<center>
<font size=2>���������� ����Ǿ����ϴ�.</font>