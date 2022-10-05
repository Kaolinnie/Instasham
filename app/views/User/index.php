<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/app/resources/styles/login.css">
    <title>Login</title>
</head>

<body>

    <div class="centerAll">
<img src="/app/resources/images/instashamLogo.png" alt="logo" id="headerLogo">
    <div class="outsidebox">
        <form method="post" action="">
            <input class="usernameStyle loginInput" name="username" type="text" placeholder="Username" required value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>"></span><br>
            <input class="passwordStyle loginInput" name="password" type="password" placeholder="Password">
            <!-- DISPLAY ERROR MESSAGE -->
            <!-- NEED A BETTER STYLING -->
            <div id="errorMsg" class="error"><?php if($data) echo $data?></div>
            <input type="submit" class="btn btn-primary" id="loginbtn" value="Login" name="loginSubmit"></input>
         
        </form>
    </div>
    <div class="redirectRegister">Don't have an account? <a href="/User/register">Sign up here!</a></div>
    </div>
    <!--MODEL FOR THE ERROR MSG GOES HERE  -->

<!-- Modal -->
<div class="modal fade" id="accessFilterModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Unauthorized access</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?= $_GET['error'] ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <?php
        if(isset($_GET['error'])){
        ?>
       <script>
            let filterAccessModal = new bootstrap.Modal(document.getElementById('accessFilterModel'), {});
            filterAccessModal.show();
        </script>
        <?php
        }
        ?>
    <footer>Created by Eris, Jeffrey and Kaolin</footer>
    <script src="/app/resources/js/script.js"></script>
</body>
</html>