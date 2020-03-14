<?php

use Google\Cloud\Datastore\DatastoreClient;

session_start();
if($_SERVER["REQUEST_METHOD"] === "POST"){

    //sets up database
    $data_store = new DatastoreClient();
    $user1 = $data_store->entity('User', ['id' => 's3656798', 'name' => 'Shahrzad Rafezi', 'password' => 123456]);
    $data_store->insert($user1);

    $id = $_POST['id'];
    $password = $_POST['password'];

    //defines the query
    $query = $data_store->query()
        ->kind('User')
        ->filter('id', '=', $id)
        ->filter('password', '=', $password);

    //runs the query
    $result = $data_store->runQuery($query);

	//$pdo = new PDO("mysql:dbname=voipData;host=127.0.0.1","root","Cisco99");
	//$q = $pdo->prepare("SELECT * FROM `users` WHERE userName=?");
	//$q->execute([$_POST["userName"]]);0
	//$a = $q->fetch(PDO::FETCH_ASSOC);


	if ($result){
//		$_SESSION["loggedIn"]=true;
//		$_SESSION["timeout"] = time();
//		$_SESSION["userName"]=$_POST["userName"];
//		header("Location: ".$a["currentPage"].".php");
        $complete = "<h3>You have logged in!</h3>";
        return $complete;
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
