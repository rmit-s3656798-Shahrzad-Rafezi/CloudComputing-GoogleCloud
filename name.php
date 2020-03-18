<?php

$name = $_POST['name'];

if( isset($name) && empty($name) ){
    echo "<h3>name cannot be empty</h3>";
}

elseif ( isset($name) ) {
    $entity['name'] = $name;
    $data_store->update($entity);
    echo "<script type='text/javascript'> window.location='/main'; </script>";
}

?>

<!DOCTYPE html>
<html>

    <head>
        <title>Name Page</title>
    </head>

    <body>

        <h3>Change Your Name Here</h3>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label>Name</label>
            <input type="string" name="name" placeholder="Enter name" />
            <br />
            <input type="submit" value="submit" />
        </form>

    </body>

</html>
