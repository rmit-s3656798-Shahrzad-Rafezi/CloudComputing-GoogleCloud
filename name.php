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

$name = $_POST['name'];

if( isset($name) && empty($name) ){
    echo "<h3>Name cannot be empty</h3>";
}

elseif ( isset($name) ) {

    $key = $data_store->key('User', $_SESSION['authenticated']);
    $entity  = $data_store->lookup($key);

    if( !is_null($entity) ){
        $entity['name'] = $name;
        $_SESSION['name'] = $_POST['name'];

        $data_store->update($entity);
        header('Location: /main');
        die();
    }
}

?>

<!DOCTYPE html>
<html>

    <head>
        <title>Name Page</title>
    </head>

    <body>

        <h3>Change Your Name Here</h3>

        <form action="#" method="post">
            <label>Name</label>
            <input type="string" name="name" placeholder="Enter new name" />
            <br />
            <input type="submit" value="submit" />
        </form>

    </body>

</html>
