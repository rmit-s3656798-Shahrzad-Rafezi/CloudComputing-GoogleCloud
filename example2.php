<?php

# Includes the autoloader for libraries installed with composer
require __DIR__ . '/vendor/autoload.php';

use Google\Cloud\Datastore\DatastoreClient;

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    //My Google Cloud Platform project ID
    $projectId = 's3656798-cc2020';

    //Sets up database
    $data_store = new DatastoreClient([
        'keyFilePath' => 's3656798-cc2020-6770f1694940.json',
        'projectId' => $projectId
    ]);

    //The kind for the new entity
    $kind = 'User';

    //The name/ID for the new entity
    $name = 'sampleuser1';

    //The Cloud Datastore key for the new entity
    $userKey = $data_store->key($kind, $name);

    //Creates the new entity
    $entity = $data_store->entity($userKey,
        [
            'id' => 's3656798',
            'name' => 'Shahrzad Rafezi',
            'password' => 123456
        ]
    );

    //saves the entity
    $data_store->upsert($entity);

    //defines the query
    $query = $data_store->gqlQuery("SELECT * FROM User");

    //runs the query
    $result = $data_store->runQuery($query);

    if( isset($_POST['id']) && isset($_POST['password']) && (empty($_POST['password']) || empty($_POST['id'])) ){
        echo "<h3>ID and Password cannot be empty</h3>";
    }

    elseif ( isset($_POST['id']) && isset($_POST['password']) ) {

            if ( empty($result) ) {
                $_SESSION['authenticated'] = true;
                //$_SESSION['id'] = $users['name'];
                echo "<script type='text/javascript'> window.location='/main'; </script>";
            }

        if( !isset($_SESSION['authenticated']) ) {
            echo "<h3>Incorrect Password or ID</h3>";
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
</head>

<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
