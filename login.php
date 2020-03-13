<?php

use Google\Cloud\Datastore\DatastoreClient;

session_start();
if($_SERVER["REQUEST_METHOD"] === "POST"){
    
    //sets up database
    $datastore = new DatastoreClient();
    $user1 = $datastore->entity('User', ['id' => 's3656798', 'name' => 'Shahrzad Rafezi', 'password' => 123456]);
    $datastore->insert($user1);

    $id = $_POST['id'];
    $password = $_POST['password'];

    //defines the query
    $query = $datastore->query()
        ->kind('User')
        ->filter('id', '=', $id)
        ->filter('password', '=', $password);
    
    //runs the query
    $result = $datastore->runQuery($query);
    
	//$pdo = new PDO("mysql:dbname=voipData;host=127.0.0.1","root","Cisco99");
	//$q = $pdo->prepare("SELECT * FROM `users` WHERE userName=?");
	//$q->execute([$_POST["userName"]]);0
	//$a = $q->fetch(PDO::FETCH_ASSOC);


	if ($a["id"] != "" && $a["password"] != "" && $a["password"] == $_POST["password"]){
		$_SESSION["loggedIn"]=true;
		$_SESSION["timeout"] = time();
		$_SESSION["userName"]=$_POST["userName"];
		header("Location: ".$a["currentPage"].".php");
	}
    
	else
		$error = "<h3>Incorrect User ID or Password</h3>";
}

else{
	$_SESSION["loggedIn"]=false;
	$_SESSION["userName"]=0;
	$error = "<br/>";
}

?>

<!DOCTYPE html>
<html>

<head>
    <link type="text/css" rel="stylesheet" href="login.css" />
    <title>RSC Subject Selection</title>
</head>

<body>
    <form action="/login" method="post">
        <label for="userid">User ID</label>
        <input type="string" name="userid" id="userid" placeholder="Enter User ID" />
        <br />
        <label for="userid">Password</label>
        <input type="password" name="password" id="password" />
        <br />
        <input type="submit" value="Login" />
    </form>
</body>

</html>