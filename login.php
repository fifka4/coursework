<?php 
session_start();
header("refresh:5;url = index.html");
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Вход на сайт</title>
	<meta charset="utf-8">
</head>
<body>
	<br>

<?php 
require_once("MyShopDB.php");
$login = $_POST['login'];
$password = $_POST['password'];
echo "Вы входите под учетной записью пользователя:", $login, "<br>";

if(($login) &&($password))
{
$query = "SELECT * FROM authors WHERE login = '$login' AND password = '$password'";
$send_query = mysqli_query($link, $query);
$user_array = mysqli_fetch_array($send_query);
$login = $user_array['login'];
$rights = $user_array['rights'];
$count = mysqli_num_rows($send_query);
if ($count > 0)
{
$_SESSION['login'] = $login;
$_SESSION['rights'] = $rights;

echo 'Вход на сайт автоматически осуществится через 5 секунд или нажмите <a href="index.html">сюда</a>.';
 }
else
{
echo 'Извините, не удалось войти на аккаунт. Попробуйте позже или свяжитесь с нами <a href="email.php">тут</a>.';
}
}
?>
<a href="index.html">На главную</a>
</body>
</html>