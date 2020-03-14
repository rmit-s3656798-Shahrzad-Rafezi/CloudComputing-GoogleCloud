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

    //Prepares the new entity
    $user1= $data_store->entity($userKey, ['id' => 's3656798', 'name' => 'Shahrzad Rafezi', 'password' => 123456]);

    //saves the entity
    $data_store->upsert($user1);

    //defines the query
    $query = $data_store->gqlQuery("SELECT * FROM User");

    //runs the query
    $result = $data_store->runQuery($query);


    foreach ($result as $index => $user) {
        if($user['id'] == $_POST['id'] && $user['password'] == $_POST['password']) {
            header("location:main");
        }
        else
            print "<h3>Incorrect User ID or Password</h3>";
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
