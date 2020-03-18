<?php
session_start();

?>

<!DOCTYPE html>
<html>

    <head>
        <title>Main Page</title>
    </head>

    <body>
        <h3>Welcome!</h3>
        <input type="button" onclick="window.location='/name'" value="Change Name"/>
        <input type="button" onclick="window.location='/password'" value="Change Password"/>
    </body>

</html>
