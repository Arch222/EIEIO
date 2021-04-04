<?php
//Connect to MySQL
require_once "configuration.php";

// Define needed variables.
$email = $password = $confirm_password = "";
$email_error = $password_error = $confirm_password_error = "";

//Ensure required data is posted from the html part of the code
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $temp_email = trim($_POST["email"]);

    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_error = "You did not enter an email!";
    }
    elseif(!filter_var($temp_email,FILTER_VALIDATE_EMAIL)){
        $email_error = "You email-address is invalid. Please try again.";
    }


    else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_error = "This email is already associated with an account!";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Something went wrong. Life is pain.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    //Ensure password is secure
    if(empty(trim($_POST["password"]))){
        $password_error = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 8){
        $password_error = "Password must have at least 8 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_error = "Please confirm your password, ensuring that it matches your orginal password exactly.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_error) && ($password != $confirm_password)){
            $confirm_password_error = "Your passwords did not match!";
        }
    }

    // Check input errorors before inserting in database
    if(empty($email_error) && empty($password_error) && empty($confirm_password_error)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (email, password) VALUES (?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_password);

            // Set parameters
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something just went wrong. No particular reason. Life is pain.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>












<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="maindiv">
      <div class = "smallerdiv">
        <div class = "site-header">
          <span><img src = "Test.PNG" alt = "Logo" style = "width: 200px; height: 200px;"></span>
        </div>
        <h1 class = 'header'>Welcome to Earth Points!</h1>
        <h5 class ' header'> Login in to your account here!</h5>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="divison <?php echo (!empty($email_error)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="email" class="divison" value="<?php echo $email; ?>">
                <span ><?php echo $email_error; ?></span>
            </div>
            <div class="divison <?php echo (!empty($password_error)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="divison" value="<?php echo $password; ?>">
                <span ><?php echo $password_error; ?></span>
            </div>
            <div class="divison <?php echo (!empty($confirm_password_error)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="confirm_password" class="divison" value="<?php echo $confirm_password; ?>">
                <span ><?php echo $confirm_password_error; ?></span>
            </div>
          </div>
            <div class="divison">
                <input type="submit" class="button" value="Create Account">
                <input type="reset" class="button" value="Reset">
            </div>
        </form>
        <h5>Don't have an account? Create one today!</h5>
        <a class = 'button' href = 'createaccount.php'>Create an Account</a>
    <div class = "about">
      <p>This application is creation of the Engineers Interruppting Environmental Injustice, and initially started out as a project as part of the Grand Challenges Program at the Georgia Insituite of Technology.</p>
      <p class = 'ending'> Website and app created/designed by Archie Chaudhury</p>
    </div>
</body>
</html>
