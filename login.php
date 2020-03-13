<!DOCTYPE html>
<html>

<title>Account Creation</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><style>
    body {font-family: "Roboto", sans-serif}
    .w3-bar-block .w3-bar-item{padding:32px;font-weight:bold}
</style>

<body>

    <header class="w3-container w3-teal">
        <h1>RTTC </h1>
    </header>

    <nav class="w3-sidebar w3-bar-block w3-collapse w3-animate-left w3-card" style="z-index:3;width:250px;" id="mySidebar">
        <a class="w3-bar-item w3-button w3-border-bottom w3-large" href="#"><img src="nginx-logo.png" style="width:80%;"></a>
        <a class="w3-bar-item w3-button w3-hide-large w3-large" href="javascript:void(0)" onclick="w3_close()">Close <i class="fa fa-remove"></i></a>
        <a class="w3-bar-item w3-button w3-teal" href="index.html">Home</a>
        <a class="w3-bar-item w3-button w3-teal" href="LoginPage.php">Login</a>
    </nav>

    <div class="w3-main" style="margin-left:250px;">

        <form class="w3-container w3-card-4" method="POST">

            <p>
                <input name="username" class="w3-input" type="text" style="width:90%" required>
                <label>Name</label></p>
            <p>
                <input name="password" class="w3-input" type="password" style="width:90%" required>
                <label>Password</label></p>

            <p>
                <input id="milk" class="w3-check" type="checkbox" checked="checked">
                <label>Stay logged in</label></p>

            <p>
                <button class="w3-button w3-section w3-teal w3-ripple"> Log in </button></p>

        </form>

    </div>
</body>
<script>
    // Open and close the sidebar on medium and small screens
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }
    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }

    // Change style of top container on scroll
    window.onscroll = function() {myFunction()};
    function myFunction() {
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            document.getElementById("myTop").classList.add("w3-card-4", "w3-animate-opacity");
            document.getElementById("myIntro").classList.add("w3-show-inline-block");
        } else {
            document.getElementById("myIntro").classList.remove("w3-show-inline-block");
            document.getElementById("myTop").classList.remove("w3-card-4", "w3-animate-opacity");
        }
    }

    // Accordions
    function myAccordion(id) {
        var x = document.getElementById(id);
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
            x.previousElementSibling.className += " w3-theme";
        } else {
            x.className = x.className.replace("w3-show", "");
            x.previousElementSibling.className =
                x.previousElementSibling.className.replace(" w3-theme", "");
        }
    }
</script>
</body>
</html>
