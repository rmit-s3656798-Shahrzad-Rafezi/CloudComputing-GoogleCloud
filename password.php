<?php

$password = $_POST['old_password'];

if( isset($password ) && empty($password ) ){
    echo "<h3>password cannot be empty</h3>";
}

//will have to a query to look into database to see if the old password exists. if yes, then update the password.
elseif ( isset($password ) ) {
    $entity['password'] = $_POST['new_password'];
    $data_store->update($entity);
    echo "<script type='text/javascript'> window.location='/login'; </script>";
}

?>

<!DOCTYPE html>
<html>

    <head>
        <title>Main Page</title>
    </head>

    <body>
        <h3>Success Password Page!</h3>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label>Old Password</label>
            <input type="string" name="old_password" placeholder="Enter Old password" />
            <label>New Password</label>
            <input type="string" name="new_password" placeholder="Enter Old password" />
            <input type="submit" value="submit" />
        </form>

    </body>

</html>
