<?php
require_once '/includes/headerLine.php';
require_once '/includes/header.php';
$data =$_POST;
if(isset($data['do_del']) ){
    $id = $data['id_product'];
    $result = del_order_by_id($id);
}

?>

<div id="mainContent">
    <?php require '/includes/catalogBar.php'; ?>    
    <div id="mainContentRight">
        <?php if(isset($_SESSION['logged_user']) ) : ?>        
        <?php $buys = get_buys();?>             
        <div id="cartConteiner">
            <table class="bascet_items">
                <tr>
                    <td class="custom">Изображение</td>
                    <td class="custom">Наименование</td>
                    <td class="custom">Количество</td>
                    <td class="custom">Цена</td>
                    <td class="custom">Сумма</td>
                    <td class="custom">Удалить</td>
                    <td class="custom">Купить</td>
                </tr>
                <?php foreach ($buys as $buy): ?>
                    <?php if($_SESSION['email'] == $buy['email'] ) : ?>
                <tr class="table-margin">                                     
                    <td class="picture">                        
                        <a><img src="img/empty.png"> </a>                       
                    </td>
                    <td>
                        <div class="name">
                            <?=$buy['caseType']?> для <?=$buy['brand']?>  <?=$buy['model']?>, цвет <?=$buy['color']?>
                        </div>                        
                    </td>
                    <td>
                        <div class="name">
                            <?=$buy['count']?>
                        </div>                        
                    </td>
                    <td>
                        <div class="name">
                            <?=$buy['price']?>
                        </div>                        
                    </td>
                    <td>
                        <div class="name">
                            <?=$buy['count']*$buy['price']?>
                        </div>                        
                    </td>
                    <td>
                        <div class="name">
                            <form form action="cart.php" method="POST">
                                <input type="hidden" name="id_product" value="<?=$buy['buy_id']?>">
                                <button type="submit" name="do_del" >Удалить</button>                                        
                            </form> 
                        </div>                        
                    </td>
                    <td>
                        <div class="name">
                            <form action="cart_accept.php" method="POST">
                                <input type="hidden" name="id_product" value="<?=$buy['buy_id']?>">
                        <button type="submit" name="do_accept" >Купить</button>
                    </form> 
                        </div>                        
                    </td>
                    
                </tr>
                    <?php// else : ?>
                <!--<div id="cartConteiner">                        
                    <h1>Корзина пуста</h1>
                </div>-->
                
                    <?php endif; ?>
                
                <?php endforeach; ?>
                
            </table>
        </div>
        
        <?php else: ?>
        <div id="cartConteiner">
            <h1>Вы не авторизированны </h1>
        </div>
        <?php endif; ?>
    </div>    
</div>
<?php require_once '/includes/footer.php';?>


