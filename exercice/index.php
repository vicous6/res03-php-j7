<?php 
session_start();

require 'logic/router.php';

require 'logic/database.php';



// inscription

if(isset($_POST['firstName']) && !empty($_POST['firstName'])
&& isset($_POST['lastName']) && !empty($_POST['lastName'])
&& isset($_POST['email']) && !empty($_POST['email'])
&& isset($_POST['pass1']) && !empty($_POST['pass1'])
&& isset($_POST['pass2']) && !empty($_POST['pass2'])

){
 
 if(loadUser($_POST['email'])!==null){
     
    echo "email deja utilisé";
 }else if ($_POST['pass1'] !== $_POST['pass2']){
     echo "les mots de pass ne coresspondent pas";
 }else{
     $hash =  password_hash($_POST['pass1'], PASSWORD_DEFAULT);

     $new = new User($_POST["firstName"],$_POST["lastName"],$_POST["email"],$hash);
     saveUser($new);
     echo 'tada';
 }
    
}
// else if(empty($_POST['pass2'])||empty($_POST['pass1'])||empty($_POST['email'])||empty($_POST['lastName'])||empty($_POST['firstName'])){
    
//     echo "un des champs est vide ";
// }


// connexion
if(isset($_POST['user']) && !empty($_POST['user'])&& isset($_POST['pass']) && !empty($_POST['pass'])){
    
    
        $userToCheck = loadUser($_POST['user']);
        $bddHash = $userToCheck -> getPassword();
        $loginHash = $_POST['pass'];
        
        
        
      $check = password_verify($loginHash,$bddHash);
        
        if ($check === true ){
            
            
        $_SESSION['status'] = true;
        $_SESSION['userId'] = $userToCheck->getId();
        $_GET['route'] = "mon-compte";
        var_dump($_SESSION);
        }

        
     
}
if(isset($_GET["route"])){
    
    checkRoute($_GET["route"]);
}else{
  
    checkRoute("");
    
}

?> 