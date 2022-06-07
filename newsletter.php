<?php
if (!empty($_POST)){ // est ce qu'on a des données( validation du formulaire)
  $valid=null;
  $error=null;
  $email = $_POST['email']; // récupération de d'adresse email 
  if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){ // verifier si le champ n'est pas vide et si le format de l'adresse email est valide 

    $valid = "L'adresse e-mail est valide";

    $test = array();
    $found=false;
    $test['email'] = $email;
    $js = file_get_contents('text.json');
    $js = json_decode($js,true);
    if(!$js){
      $js=[];
    }
      foreach($js as $currentEmail){
          if($currentEmail['email'] ==$email){  
            $found=true;
          break;
          }
        }
          if($found){
            $valid="l'adresse email existe déjà ";
          }else {
            $js = file_get_contents('text.json');
            $js = json_decode($js,true);
            $js[] = $test;
            $js= json_encode($js);
            file_put_contents('text.json',$js);
          }
          }
          
   else{
   $error ="L'adresse e-mail n'est pas valide";
}
}




  
    


include "newsletter.phtml";