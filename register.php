<?php

    require 'includes/app/db.php';
    require_once 'includes/app/function.php';
  if(isset($_POST['email'])){
    $email = trim($_POST['email']);
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $password = $_POST['password'];
    $insert_result = insert_user($link,$name,$surname,$email,$password);
    
    //$head = 'Location: /';      
    //header($head);   
  }
  ?>