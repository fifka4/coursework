<?php
	session_start();
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db_name = 'reg';
	$link = mysqli_connect($host, $user, $password, $db_name);
	mysqli_query($link, "SET NAMES 'utf8'");
	?>
<!DOCTYPE html>
<html lang='ru'>
<head>
    <meta charset='utf-8'>
    <title>Регистрация</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body> 



<div>
<div>
 <h1>Зарегистрируйтесь</h1>
<form action="" method="post" name="registerform">
	<p><label>ФИО<br>
		<input name="u_name"="20" type="text" value=""></label></p> 
		<p><label>Логин<br>
		<input name="u_name"="20" type="text" value=""></label></p> 

		<p><label>Еmail:<br>
		<input name="u_email" size="30" type="email"></label></p>
		<p><label>Пароль:<br>
		<input name="u_pass" size="30" type="password"></label></p>
		<p><label>Повтор пароля:<br>
		<input name="u_pass" size="30" type="password"></label></p>
		<p><input name="register" type="submit" value="Регистрация"></p>
<p><a href="log.php">Уже зарегистрированы?</a></p>
 </form>
</div>
</div>


	
<?php include("header.php"); ?>
<?php
if(isset($_POST["register"])){
if(!empty($_POST['u_name']) && !empty($_POST['u_nicename']) && !empty($_POST['u_email']) && !empty($_POST['u_pass'])) {
 $connect = mysqli_connect('localhost', 'root', '', 'site');
 $name = mysqli_real_escape_string($connect,$_POST['u_name']);
 $nicename = mysqli_real_escape_string($connect,$_POST['u_nicename']);
 $email = mysqli_real_escape_string($connect,$_POST['u_email']);
 $pass = mysqli_real_escape_string($connect,$_POST['u_pass']);
 $query = mysqli_query($connect,"SELECT * FROM `useri` WHERE nicename ='{$nicename}'");
 $numr = mysqli_num_rows($query);
 if($numr==0)
 {
 $sql_q = "INSERT INTO `useri`
 (name,nicename,email,pass)
 VALUES('{$name}','{$nicename}', '${email}', '{$pass}')";
 $res = mysqli_query($connect,$sql_q);
 if($res){
 echo "Аккаунт успешно создан";
 }
 else {
 echo "Не удалось добавить информацию";
 }
 }
else {
 echo "Этот ник занятый. Попробуйте другой!";
 }
}else {
 //$info = "Все поля обязательны для заполнения!";
 echo "Все поля обязательны для заполнения!";
}
}
?>
</body>

</html>