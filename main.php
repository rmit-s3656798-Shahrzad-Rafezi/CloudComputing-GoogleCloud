<?php
session_start();
print "<h3>Welcome {$_SESSION['name']}</h3>";

?>

<!DOCTYPE html>
<html>

    <head>
        <title>Main Page</title>
    </head>

    <body>
        <input type="button" onclick="window.location='/name'" value="Change Name"/>
        <input type="button" onclick="window.location='/password'" value="Change Password"/>
    </body>

</html>
