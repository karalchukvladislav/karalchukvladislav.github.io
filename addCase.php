<?php
    require_once 'E:\OpenServer\domains\ironcase\includes\app\db.php';
    require_once 'E:\OpenServer\domains\ironcase\includes\app\function.php';
?>
<?php
if(isset($_POST['brand'])){
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $color = $_POST['color'];
    $caseType = $_POST['caseType'];
    $material = $_POST['material'];
    $manufacturer = $_POST['manufacturer'];
    $series = $_POST['series'];
    $count = $_POST['count'];
    $price = $_POST['price'];  
    
    add_case($link,$brand,$model,$color,$caseType,$material,$manufacturer,$series,$count,$price);
    
    header('Location: /addNewCase.php');
}
 else {
    
     header('Location: /');
    
 }
?>
    
    
   
