<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Account</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <div class="signup-form">
<form action="" method="post">
    <div class="form-header">
        <h2>Sign Up</h2>
        <p>Fill out this form</p>
    </div>
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="user_name" placeholder="Username"
        autocomplete="off" required>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="user_pass" placeholder="Password"
        autocomplete="off" required>
    </div>
    
    <div class="form-group">
        <label>Email Address</label>
        <input type="email" class="form-control" name="user_email" placeholder="someone@site.com"
        autocomplete="off" required>
    </div>
    <div class="form-group">
        <label>Country</label>
        <select class="form-control" name="user_country" required>
            <option disabled="">Select a Country</option>
            <option>Germany</option>
            <option>France</option>
            <option>Turkey</option>
            <option>Belgium</option>
        </select>
    </div>
    <div class="form-group">
        <label>Gender</label>
        <select class="form-control" name="user_gender" required>
            <option disabled="">Select your Gender</option>
            <option>Male</option>
            <option>Female</option>
            <option>others</option>
        </select>
    </div>
    <div class="form-group">
        <label class="checkbox-inline"><input type="checkbox" required>accept the <a href="#"
        >Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up">Sign Up</button>
    </div>
   <?php include("signup_user.php"); ?>
</form>
<div class="text-center small" style="color: #67428B;">Already have an account? <a href="signin.php">Signin here</a></div>
    </div>
</body>
</html>