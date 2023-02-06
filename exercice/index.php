<?php 
require 'logic/router.php';

require 'logic/database.php';

if(isset($_GET["route"])){
    
    checkRoute($_GET["route"]);
}else{
  
    checkRoute("");
    
}

// connexion
// if(isset($_POST['user']) && !empty($_POST['user'])&& isset($_POST['pass']) && !empty($_POST['pass'])){
    
//     echo $_POST["user"];
//         $userToCheck = loadUser($_POST['user']);
//         var_dump($_POST);
// }
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
     
     $new = new User($_POST["firstName"],$_POST["lastName"],$_POST["email"],$_POST["pass1"]);
     saveUser($new);
     echo 'tada';
 }
    
}

?> 