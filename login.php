<?php

/*

# Instantiates a client
$datastore = new DatastoreClient([
    'projectId' => $projectId
]);

# The kind for the new entity
$kind = 'Task';

# The name/ID for the new entity
$name = 'sampletask1';

# The Cloud Datastore key for the new entity
$taskKey = $datastore->key($kind, $name);

# Prepares the new entity
$task = $datastore->entity($taskKey, ['description' => 'Buy milk']);

# Saves the entity
$datastore->upsert($task);

echo 'Saved ' . $task->key() . ': ' . $task['description'] . PHP_EOL;
*/

# Includes the autoloader for libraries installed with composer
require __DIR__ . '/vendor/autoload.php';

use Google\Cloud\Datastore\DatastoreClient;

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    # Your Google Cloud Platform project ID
    $projectId = 's3656798-cc2020';

    //sets up database
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

    $id = $_POST['id'];
    $password = $_POST['password'];

//defines the query
    //$query = $data_store->gqlQuery("SELECT * FROM User WHERE id = '$id' and password = '$password' ");

    $query = $data_store->gqlQuery("SELECT * FROM User");

    $result = $data_store->runQuery($query);

//runs the query
    //$result = $data_store->runQuery($query);

        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            header("location: main.php");
        }
        else
            $error = "<h3>Incorrect User ID or Password</h3>";
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="userid">User ID</label>
        <input type="string" name="id" placeholder="Enter User ID" />
        <br />
        <label for="userid">Password</label>
        <input type="password" name="password" placeholder="Enter User ID" />
        <br />
        <input type="submit" value="Login" />
    </form>
</body>

</html>
