<?php
use Google\Cloud\Datastore\DatastoreClient;

session_start();
if($_SERVER["REQUEST_METHOD"] === "POST")
{
    $datastore = new DatastoreClient();
    $user1 = $datastore->entity('User', [
    'id' => 's3656798',
    'name' => 'Shahrzad Rafezi'
    'password' => 123456
    ]);
    $datastore->insert($user1);

    $id = $_POST['id'];
    $password = $_POST['password'];


    $query = $datastore->query()
        ->kind('User')
        ->filter('id', '=', $id)
        ->filter('password', '=', $password);

    $result = $datastore->runQuery($query);
	//$pdo = new PDO("mysql:dbname=voipData;host=127.0.0.1","root","Cisco99");


	//$q = $pdo->prepare("SELECT * FROM `users` WHERE userName=?");
	//$q->execute([$_POST["userName"]]);0
	//$a = $q->fetch(PDO::FETCH_ASSOC);


	if ($a["id"] != "" && $a["password"] != "" && $a["password"] == $_POST["password"])
	{
		$_SESSION["loggedIn"]=true;
		$_SESSION["timeout"] = time();
		$_SESSION["userName"]=$_POST["userName"];
		header("Location: ".$a["currentPage"].".php");
	}
	else
		$error = "<h3>Incorrect User ID or Password</h3>";
}
else
{
	$_SESSION["loggedIn"]=false;
	$_SESSION["userName"]=0;
	$error = "<br/>";
}
?>
<link type="text/css" rel="stylesheet" href="login.css"/>
<title>RSC Subject Selection</title>
<body>
	<div class="login">
		<form method="post">
			<img class="logo" src="logo.png"/>
			<?php print $error; ?>
			<input name="id" type="text" title="Student ID" placeholder="User ID" />
			<br/>
			<input name="password" type="password" title="Password" placeholder="Password" />
			<br/>
			<button type="submit" class="btn btn-large btn-primary btn-block" value="Login">Login</button>
		</form>
	</div>
</body>
