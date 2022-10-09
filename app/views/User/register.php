<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/app/resources/styles/login.css">
    <title>Register</title>
    <script src="/app/resources/scripts/script.js"></script>
</head>
<body>
<div class="centerAll">
<img src="/app/resources/images/instashamLogo.png" alt="logo" id="headerLogo">
    <div class="outsidebox">
        <form action='' method='post'enctype="multipart/form-data">
            <div>
            </div>
            <!-- username and password  -->
            <input class="usernameStyle loginInput" name="username" type="text" required placeholder="Username" value="<?php if(isset($_POST['username'])) echo $_POST['username']?>">
            <br>
            
            
            <input class="passwordStyle loginInput" name="password" type="password" placeholder="Password" required>
            <br>
            
            <input id="passwordVerify" class="passwordStyle loginInput" name="passwordVerify" type="password" placeholder="Retype your Password"><br>
            <span id="errorMsg" class="error hidden"><?php if($data) if(isset($data['username'])) echo $data['username']; ?></span>
            <span id="nameExists" class="error "><?php if($data) if(isset($data['userExist'])) echo $data['userExist']; ?></span>
            <span id="passwordError" class="error "><?php if($data) if(isset($data['password'])) echo $data['password']; ?></span>
            <span id="misMatched" class="error"><?php if($data) if(isset($data['passwordVerify'])) echo $data['passwordVerify']; ?></span>
            <br>         
            <input type="submit" class="btn btn-primary" id="loginbtn" value="Register Now" name="registerSubmit"></input>

        </form>
    </div>
    <div class="redirectRegister">Already have an account? <a href="/User/index">Login Here!</a></div>
    <div class="modal fade" id="accessFilterModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Unauthorized access</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- ADD CAPTCHA HERE  -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
      </div>
    </div>
  </div>
</div>
</div>
    <footer>Created by Eris, Jeffrey and Kaolin</footer>
    
</body>
</html>