<?php
require_once '/includes/headerLine.php';
require_once '/includes/header.php';
$data=$_POST;
if(isset($data['do_accept']) ){
    $_SESSION['buy_id'] = $data['id_product'];  
}
$id = $_SESSION['buy_id'];
if(isset($data['do_contract']))
{   
       
    $res = get_buy_by_id($id);
    
    
    foreach ($res as $buy){
        $buy_id =$_SESSION['buy_id'];
        $brand = $buy['brand'];
        $model = $buy['model'];
        $color = $buy['color'];
        $caseType = $buy['caseType'];
        $material = $buy['material'];
        $manufacturer = $buy['manufacturer'];
        $series = $buy['series'];
        $count = 1;
        $price = $buy['price'];
        $email = $_SESSION['email'];
        $name = $_SESSION['name'];
        $surname = $_SESSION['surname'];
        $number = $data['number'];
        $comment = $data['comment'];
        $result = add_contract($link,$brand,$model,$color,$caseType,$material,$manufacturer,$series,$count,$price,$email,$name,$surname,$comment,$number,$buy_id);
        del_order_by_id($id);
        
    }      
}
?>
<div id="mainContent">
    <?php require '/includes/catalogBar.php'; ?>
    <div id="mainContentRight">
        <div id="basket">
        <form action="cart_accept.php" method="POST">
            <div class="product-section">Данные для оформления заказа</div>            
            <div class="section-content">
                <div>Телефон</div>
                <input type="text" name="number">                
                <!--<p><input type="radio" name="answer" value="1">ТРЦ "Березки"<Br>
                <input type="radio" name="answer" value="2">ТЦ "Пассаж"</p> -->                       
                <p>Комментарий<Br>
                <textarea name="comment" cols="40" rows="3"></textarea></p>
                
            </div>                     
            <button type="submit" name="do_contract"  >Оформить заказ</button>
        </form>        
        </div>    
    </div>
</div>
<?php require_once '/includes/footer.php';?>