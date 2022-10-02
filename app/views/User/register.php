<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/app/resources/styles/login.css">
    <title>Register</title>
</head>
<body>
<div class="centerAll">
<img src="/app/resources/images/instashamLogo.png" alt="logo" id="headerLogo">
    <div class="outsidebox">
        <form action='' method='post'enctype="multipart/form-data" >
            <input type="text" class="loginINput" name="display_name" placeholder="Display name"><br>
            <input type="text" class="loginINput" name="first_name" placeholder="First Name"><br>
            <input type="text" class="loginINput" name="middle_name" placeholder="Middle Name"><br>
            <input type="text" class="loginINput" name="last_name" placeholder="Last Name"><br>
            <label for="">Insert profile pic<input type="file" name="profile_pic" placeholder="Insert profile pic"></label><br>
            <div>
            <label for="bio">Description</label><br>
            <textarea id="bio" name="description" placeholder="Tell us about yourself"></textarea><br>
            </div>
            <input class="usernameStyle loginInput" name="username" type="text" placeholder="Username"><br>
            <input class="passwordStyle loginInput" name="password" type="password" placeholder="Password"><br>
            <input class="passwordStyle loginInput" name="passwordVerify" type="password" placeholder="Confirm your Password">
            <!-- DISPLAY ERROR MESSAGE -->
            <!-- NEED A BETTER STYLING -->
            <?php if (isset($_GET['error'])){ ?>
            <div class="" style="color:red;" role="alert"><?= $_GET['error']?></div>
            <?php }; ?>
            <input type="submit" class="btn btn-primary" id="loginbtn" value="Register Now" name="registerSubmit"></input>
        </form>
    </div>
    
    <div class="redirectRegister">Already have an account? <a href="/User/index">Login Here!</a></div>
    <!-- DISPLAY ERROR MESSAGE -->
</div>
    <footer>Created by Eris, Jeffrey and Kaolin</footer>
</body>
</html>