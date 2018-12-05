<?php
require_once '/includes/app/db.php';
require_once '/includes/app/function.php';
require_once '/logined.php';
$data =$_POST;
if( isset($data['do_login']) ){
    logined();
    header('Location: /');  
    
}
require_once '/includes/headerLine.php';
require_once '/includes/header.php';
?>
<div id="mainContent">
    <?php require_once '/includes/catalogBar.php'; ?>
    <div id="mainContentRight" >
        <form action="login.php" method="POST">
            <h1 style="color: #db891e;">Вход</h1>
            <table >
                    <tbody>
                        <tr style="padding-bottom: 25px;">
                            <td style="color: #db891e;">Email:</td>
                            <td>
                                <input type="email" name="email" value="<?php echo $data['email']; ?>" class="" placeholder="email" required >
                            </td>
                        </tr>
                        <tr style="margin-bottom: 25px;">
                            <td style="color: #db891e;">Password:</td>
                            <td>
                                <input type="password" name="password" value="" class="" placeholder="password" required >
                            </td>
                        </tr>
                        </tbody>
                    <tfoot>
                        <tr>
                            <td>
                                <button type="submit" name="do_login" class="button">Войти</button>
                            </td>
                        </tr>
                    </tfoot>       
                </table>
        </form>
    </div>
</div>
<?php require_once '/includes/footer.php';?>