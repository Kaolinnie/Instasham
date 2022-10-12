<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/app/resources/styles/login.css">
    <title>Login</title>
    <script src="/app/resources/scripts/script.js"></script>
</head>

<body>

    <div class="centerAll">
<img src="/app/resources/images/instashamLogo.png" alt="logo" id="headerLogo">
    <div class="outsidebox">
        <form method="post" action="">
            <input class="usernameStyle loginInput" name="username" type="text" placeholder="Username" required value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>"></span><br>
            <input class="passwordStyle loginInput" name="password" type="password" placeholder="Password">
            <div id="errorMsg" class="error"><?php if($data) echo $data?></div>
            <input type="submit" class="btn btn-primary" id="loginbtn" value="Login" name="loginSubmit"></input>
        </form>
    </div>
    <div class="redirectRegister">Don't have an account? <a href="/User/register">Sign up here!</a></div>
    </div>

<!-- Modal -->
<?php $this->view('Layout/accessFilterModal')?>
    <footer>Created by Eris, Jeffrey and Kaolin</footer>
    
</body>
</html>