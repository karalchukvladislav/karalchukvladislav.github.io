<?php
function logined(){
    global $link;   // вся процедура работает на сессиях. Именно в ней хранятся данные пользователя.
    
if (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') { unset($email);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($email) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
exit ("Вы ввели не всю информацию, венитесь назад и заполните все поля!");
}
//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$email = stripslashes($email);
$email = htmlspecialchars($email);
$password = stripslashes($password);
$password = htmlspecialchars($password);
//удаляем лишние пробелы
$email = trim($email);
$password = trim($password);
// подключаемся к базе
require 'E:\OpenServer\domains\ironcase\includes\app\db.php';// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
$query ="SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($link,$query); //извлекаем из базы все данные о пользователе с введенным логином
$myrow = mysqli_fetch_array($result);
if (empty($myrow['password']))
{
//если пользователя с введенным логином не существует
exit ("Извините, введённый вами логин или пароль неверный.");
}
else {
//если существует, то сверяем пароли
          if ($myrow['password']==$password) {
          //если пароли совпадают, то запускаем пользователю сессию.
          $_SESSION['email']=$myrow['email'];
          $_SESSION['name']=$myrow['name'];
          $_SESSION['surname']=$myrow['surname'];
          $_SESSION['id']=$myrow['id'];
          $_SESSION['buy_id']=0;
          $_SESSION['logged_user'] = $myrow;
          
          }
       else {       
       exit ("Извините, введённый вами логин или пароль неверный.");
	   }
}
}
?>