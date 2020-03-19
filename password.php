<?php

$password = $_POST['old_password'];

if( isset($password ) && empty($password ) ){
    echo "<h3>password cannot be empty</h3>";
}

//will have to do a query to look into database to see if the old password exists. if yes, then update the password.
elseif ( isset($password ) ) {
    foreach ($result as $properties => $users) {
        if ( $password == $users['password'] ){
            $entity['password'] = $_POST['new_password'];
            $data_store->update($entity);
            echo "<script type='text/javascript'> window.location='/login'; </script>";
        }
    }
    if( $password != $users['password'] ) {
        echo "<h3>Incorrect Password</h3>";
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

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label>Old Password</label>
            <input type="string" name="old_password" placeholder="Enter Old password" />
            <br />
            <label>New Password</label>
            <input type="string" name="new_password" placeholder="Enter Old password" />
            <br />
            <input type="submit" value="submit" />
        </form>

    </body>

</html>
