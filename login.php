<?php

# Includes the autoloader for libraries installed with composer
require __DIR__ . '/vendor/autoload.php';

use Google\Cloud\Datastore\DatastoreClient;

session_start();

    //My Google Cloud Platform project ID
    $projectId = 's3656798-cc2020';

    //Sets up database
    $data_store = new DatastoreClient([
        'keyFilePath' => 's3656798-cc2020-6770f1694940.json',
        'projectId' => $projectId
    ]);


    $id = $_POST['id'];
    $password = (int)$_POST['password'];

    if( isset($id) && isset($password) && (empty($id) || empty($password)) ){
        echo "<h3>ID and Password cannot be empty</h3>";
    }
    elseif ( isset($id) && isset($password) ) {

        $key = $data_store->key('User', $id);
        $entity  = $data_store->lookup($key);

        if ( !is_null($entity) && $password == $entity['password'] ) {

            $_SESSION['authenticated'] = $id;
            $_SESSION['name'] = $entity['name'];
            header('Location: /main');
            die();
        }
        if( is_null($entity) && $password != $entity['password'] ) {
            echo "<h3>Incorrect Password or ID</h3>";
        }
    }

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
</head>

<body>
    <form action="#" method="post">
        <label>User ID</label>
        <input type="string" name="id" placeholder="Enter User ID" />
        <br />
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter Password" />
        <br />
        <input type="submit" value="Login" />
    </form>
</body>

</html>
