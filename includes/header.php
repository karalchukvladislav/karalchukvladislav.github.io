<?php
    require 'includes/app/db.php';
    require_once 'includes/app/function.php';
    session_start();
?>
<div id="header">
    <div class="wrapper">
        <div id="headerLeft">
            <a href="/" id="logo"><img src="img/logo1.png" alt="IRONCASE.by - магазин аксессуаров для мобильных телефонов" title=""></a>
        </div>
        <div id="headerRight">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <span class="telephone">+375 29 <em>177 20 03</em></span>
                        </td>
                        <td>
                            <span class="telephone">+375 33 <em>697 20 03</em></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php if (isset($_SESSION['logged_user'])) : ?>
                                <span class="hidden-a auth-span"><a href="personal.php">Личный кабинет</a></span> | <span class="hidden-a auth-span"><a href="/logout.php">выйти</a></span>
                            <?php else: ?>
                                <span  class="hidden-a auth-span"><a href="login.php">Вход</a></span> | <span  class="hidden-a auth-span"><a href="singup.php">Регистрация</a></span>
                            <?php endif; ?>
                        </td>
                        <td>Обратная связь</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>