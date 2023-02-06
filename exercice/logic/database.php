
<?php 
// getcwd();
    require "models/User.php";



function loadUser(string $email):? User{
    

    $db = new PDO(
    'mysql:host=db.3wa.io;port=3306;dbname=victoroustiakine_phpj7.',
    'victoroustiakine',
    'c6aaac523840dc2129f6449e52582bf0'
);


$query = $db->prepare('SELECT * FROM users WHERE email = :email');

	
	$parameters = [
    'email' => $email,
	];
	
$query->execute($parameters);

$soloUser = $query->fetch(PDO::FETCH_ASSOC);

if($soloUser === false){
    
    return null;
}


$newUser = new User($soloUser["first_name"],$soloUser["last_name"],$soloUser["email"],$soloUser["password"]);
$newUser-> setId($soloUser["id"]);
// var_dump($newUser);

return $newUser;
    
};

function saveUser(User $user): User{
    
        
$db = new PDO(
    'mysql:host=db.3wa.io;port=3306;dbname=victoroustiakine_phpj7.',
    'victoroustiakine',
    'c6aaac523840dc2129f6449e52582bf0'
);
    

$query = $db->prepare('INSERT INTO users VALUES (null, :firstName,:lastName,:email,:password)');

	
	$parameters = [
    'firstName' => $user -> getFirstName(),
    'lastName' => $user -> getLastName(),
    'email' => $user -> getEmail(),
    'password' => $user -> getPassword(),
    
    	];
$query->execute($parameters);
$soloUser = $query->fetchAll(PDO::FETCH_ASSOC);

// var_dump($soloUser);

return loadUser($user -> getEmail());
}

// $userrrr = new User("erfze","zeezrf","vierverfez@free.fr","ergfe");

// $saveResult= saveUser($userrrr);

// var_dump($saveResult);


// $load = loadUser("vicous@free.fr");
// var_dump($load);
// echo "voici le user demandé";
?>

