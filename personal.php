<?php
require_once '/includes/headerLine.php';
require_once '/includes/header.php';

$data =$_POST;

if(isset($data['do_del']) ){
    $id = $data['id_product'];
    $result = del_contract_by_id($id);
}
if(isset($data['do_accept']) ){
    $id = $data['id_product'];
    accept($id);
}
?>

<div id="mainContent">
    <?php require '/includes/catalogBar.php'; ?>
    <div id="mainContentRight">
        <?php if($_SESSION['email']=="admin@gmail.com") :?>
        <div>
            <div><form action="addNewCase.php" method="POST">
                <button type="submit" name="addNewCase" >Добавить чехол</button><br>
                </form>
                <div>                   
        <?php $buys = get_contracts();?>              
        <div id="cartConteiner">
            <table class="bascet_items">
                <tr>
                    <td class="custom">Изображение</td>
                    <td class="custom">Наименование</td>
                    <td class="custom">Количество</td>
                    <td class="custom">Цена</td>
                    <td class="custom">Сумма</td>  
                    <td class="custom">Телефон</td>
                    <td class="custom">Коменнтарий</td> 
                    <td class="custom">Статус</td>
                    <td class="custom">Удалить</td>
                </tr>
                <?php foreach ($buys as $buy): ?>                
                <tr class="table-margin">                                     
                    <td class="picture">                        
                        <a><img src="img/empty.png"></a>                       
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
                            <?=$buy['number']?>
                        </div>                        
                    </td>
                    <td>
                        <div class="name">
                            <?=$buy['comment']?>
                        </div>                        
                    </td>
                    <td>
                        <div class="name">
                             <?php if($buy['accept'] == 0) : ?>
                                <form action="personal.php" method="POST">
                                    <input type="hidden" name="id_product" value="<?=$buy['buy_id']?>">
                                    <button type="submit" name="do_accept" >Одобрить</button>
                                </form>   
                             
                             <?php elseif($buy['accept'] == 1) : ?>
                                <div style="color: green">Одобренно</div>
                                <?php else : ?>
                             <?php endif; ?>
                        </div>                        
                    </td>
                    <td>
                        <div class="name">
                            <form form action="personal.php" method="POST">
                                <input type="hidden" name="id_product" value="<?=$buy['buy_id']?>">
                                <button type="submit" name="do_del" >Удалить</button>                                        
                            </form> 
                        </div>                        
                    </td>
                </tr>                                           
                <?php endforeach; ?>
                
            </table>
                </div>              
        
                </div>
            </div>
        </div>
        
        <?php else: ?>
        <div>                   
        <?php $buys = get_contracts();?>              
        <div id="cartConteiner">
            <table class="bascet_items">
                <tr>
                    <td class="custom">Изображение</td>
                    <td class="custom">Наименование</td>
                    <td class="custom">Количество</td>
                    <td class="custom">Цена</td>
                    <td class="custom">Сумма</td>                    
                    <td class="custom">Статус</td>
                </tr>
                <?php foreach ($buys as $buy): ?>
                <?php if($_SESSION['email'] == $buy['email'] ) : ?>
                <tr class="table-margin">                                     
                    <td class="picture">                        
                        <a><img src="img/empty.png"></a>                       
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
                             <?php if($buy['accept'] == 0){
                                echo '<div style="color: #fce42d">В обработке</div>';   
                             }
                             if($buy['accept'] == 1){
                                echo '<div style="color: green">Одобренно</div>';   
                             }?>
                        </div>                        
                    </td>                                
                </tr>
                <?php// else: ?>
                   <!--<div id="cartConteiner">                        
                        <h1>Список покупок пуст</h1>
                    </div>-->
                <?php endif; ?>                
                <?php endforeach; ?>
                
            </table>
        </div>              
        <?php endif; ?>
        </div>        
    </div>
</div>