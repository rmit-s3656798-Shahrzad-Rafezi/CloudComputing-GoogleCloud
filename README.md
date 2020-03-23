# CloudComputing-A1-Task2

Create a Google app using your knowledge in Google app engine for PHP in Lab 3 or for Python in Lab 2 which will have following components and functions:

   1. Create three entities in Google datastore (Namespace: default, Kind: user), which contain the following properties and values. (1 mark)

        | id (Type: Key) | name (Type: String) | password (Type: Integer) |
        | -------------- |:-------------------:| ------------------------:|
        | s3######       | Firstname Lastname  |          123456          |
        | s3######1      | Firstname Lastname A|          234567          |
        | s3######2      | Firstname Lastname B|          345678          |
                     
   2. login.php (2 marks)
   
        A login page that contains a user id field, a password field, a “Log In” button. When user clicks the “Log in” button, it will validate if the user entered credentials match with the information stored in the datastore.
        
        • If the user credential is invalid, the login page will display “User id or password is invalid”. (1 mark)
        
        • If the user credential is valid, it will be redirected to main.php. (1 mark)

   3. main.php (2 marks)
   
      The main page contains two buttons “Change Name” and “Change Password”.
      
      • The main page shows the user name. (1 mark)
      
      • If user clicks the “Change Name” button, it will be redirected to the name.php; if user clicks the “Change
        Password” button, it will be redirected to the password.php. (1 mark)

   4. name.php (2 marks)
   
        The name page contains a username field and a “Change” button, where user needs to enter a new user name.
        
        • Once user clicks the “Change” button, it will validate whether the entered user name is empty. If the user name is
        empty, it will display “User name cannot be empty ”. (1 mark)
        
        • If the user name is not empty, it will update the corresponding entity in Datastore and be redirected to main.php,
        where the user name on main.php will also be updated. (1 mark)

   5. password.php (2 marks)
   
        The password page contains an old password field, a new password field and a “Change” button, where user needs to enter both the old password and a new password.
        
        • If user clicks the “Change” button, it will validate whether the entered old password matches with the
        information stored datastore. If the old password is incorrect, it will display “User password is incorrect”. (1 mark)
        
        • If the old password is correct, it will update the password property for the corresponding entity with the new
        password and be redirected to login.php, where user can login with the new password. (1 mark)
        
Link to the app engine https://s3656798-cc2020.appspot.com
