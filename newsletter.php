<?php
if (!empty($_POST)){
    $valid=null;
    $error=null;
    $email = $_POST['email'];
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
      $valid = "L'adresse e-mail est valide";
    }else{
      $error ="L'adresse e-mail n'est pas valide";
    }
  }

if(isset($_POST['email'])){

    $test = array();

    $test['email'] = $_POST['email'];

    $js = file_get_contents('text.json');

    $js = json_decode($js,true);

    $js[] = $test;

    $js= json_encode($js);

    file_put_contents('text.json',$js);
}


include "newsletter.phtml";