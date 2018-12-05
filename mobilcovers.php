<?php
require_once '/includes/headerLine.php';
require_once '/includes/header.php';


$_SESSION['total_cost'] = 0;

//$d= var_dump($covers);
$data = $_POST;
 if(isset($data['do_add']) ){
    $id = $data['id_product'];
    $covers = get_covers_by_id($id);
    foreach ($covers as $cover){
        $brand = $cover['brand'];
        $model = $cover['model'];
        $color = $cover['color'];
        $caseType = $cover['caseType'];
        $material = $cover['material'];
        $manufacturer = $cover['manufacturer'];
        $series = $cover['series'];
        $count = 1;
        $price = $cover['price'];
        $email = $_SESSION['email'];
        
        $result =add_order($link,$brand,$model,$color,$caseType,$material,$manufacturer,$series,$count,$price,$email);
        $_SESSION['total_cost'] = $_SESSION['total_cost'] + $price;
    }
}
?>
<?php ?>
<div id="mainContent">
    <?php require_once '/includes/catalogBar.php'; ?>
    <div id="mainContentRight">
        
        <?php $covers = get_covers();
        foreach ($covers as $cover): ?>
        <?php if($_GET['brand'] == $cover['brand']) : ?>
        <div id="cart">
            <table class="product">
                <tr>
                    <td class="picture">                        
                        <a><img src="img/empty.png"> </a>                       
                    </td>
                    <td>
                        <div class="name">
                            <div class="elementName"><?=$cover['caseType']?> для <?=$cover['brand']?>  <?=$cover['model']?>, цвет <?=$cover['color']?></div>
                        </div>
                        <table id="prop">
                            <tr>
                                <td class="cell">
                                    Бренд
                                </td>
                                <td class="cell">
                                    <?=$cover['brand']?>                                
                                </td>
                            </tr>
                            <tr>
                                <td class="cell">
                                    Модель                                
                                </td>
                                <td class="cell">
                                    <?=$cover['model']?>                                
                                </td>
                            </tr>
                            <tr>
                                <td class="cell">
                                    Цвет                                
                                </td>
                                <td class="cell">
                                    <?=$cover['color']?>                                  
                                </td>
                            </tr>
                            <tr>
                                <td class="cell">
                                    Тип чехла                                
                                </td>
                                <td class="cell">
                                    <?=$cover['caseType']?>                                
                                </td>
                            </tr>
                            <tr>
                                <td class="cell">
                                    Материал                                
                                </td>
                                <td class="cell">
                                    <?=$cover['material']?>                              
                                </td>
                            </tr>                                                 
                        </table>
                    </td>
                    <td class="tools">
                        <div>
                            <ul>
                                <li class="price">
                                    <span>Цена: </span><?=$cover['price']?>                                    
                                </li>
                                <li>
                                    <form form action="mobilcovers.php" method="POST">
                                        <input type="hidden" name="id_product" value="<?=$cover['id']?>">
                                        <button type="submit" name="do_add" >Добавить в корзину</button>                                        
                                    </form>                                     
                                </li>
                                <li>
                                    <span>Товар есть в наличии</span>
                                </li>
                            </ul>
                        </div>                        
                    </td>
                </tr>
            </table>
        </div>
        <?php elseif($_GET['brand'] != $cover['brand']) : ?>
        <!--<div id="cart">
            <table class="product">
                <tr>
                    <td class="picture">                        
                        <a><img src="img/exemple.png"> </a>                       
                    </td>
                    <td>
                        <div class="name">
                            <a href="" class="elementName"><?=$cover['caseType']?> для <?=$cover['brand']?>  <?=$cover['model']?>, цвет <?=$cover['color']?></a>
                        </div>
                        <table id="prop">
                            <tr>
                                <td>
                                    Бренд
                                </td>
                                <td>
                                    <?=$cover['brand']?>                                
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Модель                                
                                </td>
                                <td>
                                    <?=$cover['model']?>                                
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    цвет                                
                                </td>
                                <td>
                                    <?=$cover['color']?>                                  
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Тип чехла                                
                                </td>
                                <td>
                                    <?=$cover['caseType']?>                                
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    материал                                
                                </td>
                                <td>
                                    <?=$cover['material']?>                              
                                </td>
                            </tr>                                                 
                        </table>
                    </td>
                    <td class="tools">
                        <div>
                            <ul>
                                <li class="price">
                                    <span>Цена: </span><?=$cover['price']?>                                    
                                </li>
                                <li>
                                    <form form action="mobilcovers.php" method="POST">
                                        <input type="hidden" name="id_product" value="<?=$cover['id']?>">
                                        <button type="submit" name="do_add" >Добавить в корзину</button>                                        
                                    </form>                                     
                                </li>
                                <li>
                                    <span>Товар есть в наличии</span>
                                </li>
                            </ul>
                        </div>                        
                    </td>
                </tr>
            </table>
        </div>-->
        <?php endif; ?>
       <?php endforeach; ?> 
    </div>
</div>
<?php require_once '/includes/footer.php';?>


