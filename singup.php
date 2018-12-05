<?php
//Строки require_once подключают файлы с функциями и организовывают подключение к базе данных  
require_once '/includes/app/db.php';
require_once '/includes/app/function.php';

//Здесь идет обработка данных из формы
$data = $_POST;
if( isset($data['do_signup'])){ //проверка на нажатие кнопки формы
    $errors = array();
    if( $data['password_r'] != $data['password']){
        $errors[]='повторный пароль введён не верно!';
    }
    
    $email = trim($data['email']);
    
    $db = get_email($link,$email);//получение email'ов из базы данных 
    if($db!=$data['email']){
        $errors[]='Пользователь с таким email уже есть';
    }    
    if(empty($errors)){
        // регистрация
        require 'register.php';
        echo '<div style="color: green;">Вы успешно зарегистрировались</div><hr>';
    }
    else {
        echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
    }      
}
require_once '/includes/headerLine.php';
require_once '/includes/header.php';
?>
<div id="mainContent">
    <?php require_once '/includes/catalogBar.php'; ?>    
    <div id="mainContentRight">
        <div id="register">
            <form action="/singup.php" method="POST">
                <h1>Регистрация</h1>
                <table>
                    <tbody>
                        <tr>
                            <td>Имя:</td>
                            <td>
                                <input type="text" name="name" value="<?php echo $data['name']; ?>" class="" placeholder="Имя" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Фамилию:</td>
                            <td>
                                <input type="text" name="surname" value="<?php echo $data['surname']; ?>" class="" placeholder="Фамилия" required>
                            </td>
                        </tr>                    
                        <tr>
                            <td>Email:</td>
                            <td>
                                <input type="email" name="email" value="<?php echo $data['email']; ?> " class="" placeholder="Введите ваш Email" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Пароль:</td>
                            <td>
                                <input type="password" name="password" value="<?php echo $data['password']; ?>" class="" placeholder="Пароль" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Повторите пароль:</td>
                            <td>
                                <input type="password" name="password_r" value="" class="" placeholder="Повторите пароль" required>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>
                                <button type="submit" name="do_signup">Зарегистрироваться</button>
                            </td>
                        </tr>
                    </tfoot>         
                    
                </table>
                
            </form>
        </div>
    </div>
</div>
<?php require_once '/includes/footer.php';?>