<?php

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

$password = $_POST['old_password'];

if( isset( $password ) && empty( $password ) ){
    echo "<h3>password cannot be empty</h3>";
}

elseif( isset($password) ){

    $key = $data_store->key('User', $_SESSION['authenticated']);
    $entity  = $data_store->lookup($key);

    if( !is_null($entity) ){
        if( $password == $entity['password']){

            $entity['password'] = (int)$_POST['new_password'];
            $data_store->update($entity);

            header('Location: /.*');
            die();
        }
        elseif ( $password != $entity['password'] ) {
            echo "<h3>Incorrect Password</h3>";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Password Page</title>
</head>

<body>

<h3>Change Your Password Here</h3>

<form action="#" method="post">
    <label>Old Password</label>
    <input type="password" name="old_password" placeholder="Enter Old password" />
    <br />
    <label>New Password</label>
    <input type="password" name="new_password" placeholder="Enter New password" />
    <br />
    <input type="submit" value="submit" />
</form>

</body>

</html>
