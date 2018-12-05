<?php
require_once '/includes/app/db.php';
require_once '/includes/headerLine.php';
require_once '/includes/header.php';
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
        
        $result = add_order($link,$brand,$model,$color,$caseType,$material,$manufacturer,$series,$count,$price,$email);
        
    }
}
?>
<div class="wrapper">    
    <div id="mainContent">
        <div id="mainMenu">
            <div class="dropdown">
                <button class="mainmenubtn">Главное меню</button>
                <div class="dropdown-child">
                    <a href="#">Подраздел 1</a>
                    <a href="#">Подраздел 2</a>
                    <a href="#">Подраздел 3</a>
                    <a href="#">Подраздел 4</a>
                    <a href="#">Подраздел 5</a>
                </div>
            </div>
        </div>
        <div class="slider" id="main-slider">
	<div class="slider-wrapper">
            <div class="slide" id="slide-1" ><img src="/img/1.png"></div>
            <div class="slide" id="slide-2" ><img src="/img/2.jpg"></div>
            <div class="slide" id="slide-3" ><img src="/img/3.jpg"></div>
	</div>
	<div class="slider-nav">
		<button class="slider-previous">Previous</button>
		<button class="slider-next">Next</button>
	</div>
	<div class="slider-pagination">
		<a href="#slide-1">1</a>
		<a href="#slide-2">2</a>
		<a href="#slide-3">3</a>
	</div>
</div>       
    </div>
</div>
<?php //require_once '/includes/footer.php';?>




