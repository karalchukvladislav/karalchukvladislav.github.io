<?php

function insert_user($link, $name, $surname, $email, $password) {

    //$email_chek = mysqli_real_escape_string($link, $email);

    
    //$query = "SELECT * FROM subscribers WHERE email = '$email_chek'";

    //$result = mysqli_query($link, $query);

   // if (mysqli_num_rows($result)) {
        
        $insert_query = "INSERT INTO users (name,surname,email,password) VALUES ('$name', '$surname', '$email', '$password')";
        $result = mysqli_query($link, $insert_query);
        
    //} 
}

function add_case($link, $brand, $model, $color, $caseType, $material, $manufacturer, $series, $count, $price) {



    //2. Если нет, то создаем подписчика с уникальным кодом(неактивным)
    $addCase = "INSERT INTO covers (brand,model,color,caseType,material,manufacturer,series,count,price) VALUES ('$brand','$model','$color','$caseType','$material','$manufacturer','$series','$count','$price')";
    $result = mysqli_query($link, $addCase);
}

function add_order($link, $brand, $model, $color, $caseType, $material, $manufacturer, $series, $count, $price, $email) {

    $addCase = "INSERT INTO buy (brand,model,color,caseType,material,manufacturer,series,count,price,email) VALUES ('$brand','$model','$color','$caseType',"
            . "'$material','$manufacturer','$series','$count','$price','$email')";
    $result = mysqli_query($link, $addCase);
    return $result;
}

function add_contract($link, $brand, $model, $color, $caseType, $material, $manufacturer, $series, $count, $price, $email, $name, $surname, $comment, $number, $buy_id) {

    $addCase = "INSERT INTO contracts (brand,model,color,caseType,material,manufacturer,series,count,price,email,name,surname,comment,number,buy_id) VALUES ('$brand','$model','$color','$caseType',"
            . "'$material','$manufacturer','$series','$count','$price','$email','$name','$surname','$comment','$number','$buy_id')";
    $result = mysqli_query($link, $addCase);
    return $result;
}

function get_buys() {
    global $link;

    $sql = "SELECT * FROM buy";

    $result = mysqli_query($link, $sql);

    $buy = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $buy;
}

function get_contracts() {
    global $link;

    $sql = "SELECT * FROM contracts";

    $result = mysqli_query($link, $sql);

    $buy = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $buy;
}

function get_covers() {
    global $link;

    $sql = "SELECT * FROM covers";

    $result = mysqli_query($link, $sql);

    $cover = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $cover;
}

function get_covers_by_id($id) {
    global $link;

    $sql = "SELECT * FROM covers WHERE id = '$id'";

    $result = mysqli_query($link, $sql);

    $res = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $res;
}

function get_buy_by_id($id) {
    global $link;

    $sql = "SELECT * FROM buy WHERE buy_id = '$id'";

    $result = mysqli_query($link, $sql);



    return $result;
}

function del_order_by_id($buy_id) {
    global $link;
    $sql = "DELETE FROM `buy` WHERE `buy_id` = '$buy_id'";
    mysqli_query($link, $sql);
    return;
}

function del_contract_by_id($buy_id) {
    global $link;
    $sql = "DELETE FROM `contracts` WHERE `buy_id` = '$buy_id'";
    mysqli_query($link, $sql);
    return;
}

function get_email($link, $email) {

    /* $email = mysqli_real_escape_string($link,$email);    
      //1. Проверить если подпищик в базе subscribers
      $query = "SELECT 'email' FROM users ";
      $result = mysqli_query($link, $query);

      $result_array = mysqli_fetch_all($result,MYSQLI_ASSOC);
      foreach ($result_array as $data){
      $email_accept = $data['email'];
      echo var_dump($result);
      return $result; */
    if ($link != null && $email != null) {
        $email = mysqli_real_escape_string($link, $email);

        //1. Проверить если подпищик в базе subscribers 
        $query = "SELECT * FROM users WHERE email = '$email'";

        $result = mysqli_query($link, $query);

        return !mysqli_num_rows($result);
    }
}

function get_password() {
    global $link;
    $password = mysqli_real_escape_string($link, $password);
    //1. Проверить если подпищик в базе subscribers 
    $query = "SELECT * FROM users WHERE password = '$password'";
    $result = mysqli_query($link, $query);
    return !mysqli_num_rows($result);
}

function accept($id) {

    global $link;

    $sql = "UPDATE contracts SET accept = 1 WHERE buy_id = '$id'";

    $result = mysqli_query($link, $sql);
}
