<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/app/resources/styles/login.css">
    <title>Login</title>
</head>

<body>

    <div class="centerAll">
<img src="/app/resources/images/instashamLogo.png" alt="logo" id="headerLogo">
    <div class="outsidebox">
        <form method="post" action="">
            <input class="usernameStyle loginInput" name="username" type="text" placeholder="Username"><br>
            <input class="passwordStyle loginInput" name="password" type="password" placeholder="Password">
            <input type="submit" class="btn btn-primary" id="loginbtn" value="Login" name="loginSubmit"></input>
             <!-- DISPLAY ERROR MESSAGE -->
             <!-- NEED A BETTER STYLING -->
             <?php if (isset($_GET['error'])){ ?>
            <div class="" style="color:red;" role="alert"><?= $_GET['error']?></div>
            <?php }; ?>
        </form>
    </div>
    <div class="redirectRegister">Don't have an account? <a href="/User/register">Sign up here!</a></div>
    </div>
    <footer>Created by Eris, Jeffrey and Kaolin</footer>
</body>
</html>