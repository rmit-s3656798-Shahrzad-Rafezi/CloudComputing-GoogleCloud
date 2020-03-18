<?php

$name = $_POST['name'];

if( isset($name) && empty($name) ){
    echo "<h3>name cannot be empty</h3>";
}

elseif ( isset($name) ) {
    $entity['name'] = $name;
    $data_store->update($entity);
}

?>

<!DOCTYPE html>
<html>

    <head>
        <title>Name Page</title>
    </head>

    <body>

        <h3>Success Name Page!</h3>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label>Name</label>
            <input type="string" name="name" placeholder="Enter name" />
            <input type="submit" value="submit" />
        </form>

    </body>

</html>
