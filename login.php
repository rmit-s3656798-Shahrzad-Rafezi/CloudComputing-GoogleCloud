<?php

use Google\Cloud\Datastore\DatastoreClient;

session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){

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

    if ($result){
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            header("location: main.php");
        }
    }
    else
        $error = "<h3>Incorrect User ID or Password</h3>";
}

?>

<!DOCTYPE html>
<html>

<head>
    <link type="text/css" rel="stylesheet" href="login.css" />
    <title>Login Page</title>
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
