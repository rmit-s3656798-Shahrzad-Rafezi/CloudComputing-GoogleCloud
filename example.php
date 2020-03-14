<?php


# Includes the autoloader for libraries installed with composer
require __DIR__ . '/vendor/autoload.php';

use Google\Cloud\Datastore\DatastoreClient;

try
{
	//////////////////////
	// Setup
	/////////////////////
	
	
	# Your Google Cloud Platform project ID
	$projectId = 's3656798-cc2020';

	//sets up database
	$data_store = new DatastoreClient([
		'keyFilePath' => 's3656798-cc2020-6770f1694940.json',
		'projectId' => $projectId
	]);

	//////////////////////
	// INSERT/UPDATE/UPSERT
	/////////////////////
	
	//The kind for the new entity
	$kind = 'User';

	//The name/ID for the new entity
	$name = 'sparc';

	//The Cloud Datastore key for the new entity
	$userKey = $data_store->key($kind, $name);

	//Prepares the new entity
	$user1= $data_store->entity($userKey, ['id' => 'UltraSPARC T2', 'name' => 'Enterprise T5220', 'password' => 12345678]);

	//saves the entity
	//$data_store->upsert($user1);


	//////////////////////
	// Select
	/////////////////////

	$query = $data_store->query()->kind('User');

	$query = $data_store->gqlQuery("SELECT * FROM User");

	$result = $data_store->runQuery($query);

	foreach ($result as $index => $user)
	{
		print $user["id"] . ", " . $user["name"] . ", " . $user["password"] . "<br/>";
	}
}
catch (Exception $e)
{
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

?>
