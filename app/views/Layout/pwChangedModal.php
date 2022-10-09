<div class="modal fade" id="accessFilterModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <!-- modal header -->
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
      </div>
      <div class="modal-body modal-content">
        <!-- modal content -->
           <input id="old_pass" name="old_password" type="password" placeholder="Old password">
           <br>
           <input id='password' class="passwordStyle loginInput" name="password" type="password" placeholder="New password">
           <br>
           <input id="passwordVerify" class="passwordStyle loginInput" name="passwordVerify" type="password" placeholder="Retype your Password"><br>
           <div id="error" class="invalid_pass"></div>
      </div>
      <div class="modal-footer">
        <button type="submit" id='dismiss_modal' name="changed_password" class="btn btn-secondary">save</button>
      </div>
    </div>
  </div>
</div> 
<?php 
  if(isset($_GET['error'])) { ?>
   <script>
    alert('You\'ve entered a wrong password');
   </script>
 <?php } ?>
     <script>
          let old_pass = document.getElementById('old_pass');
          let new_pass = document.getElementById('password');
          const pwBtn = document.getElementById('changed_password');
          const updateBtn = document.getElementById('update');
          let btn = document.getElementById('dismiss_modal');
          btn.setAttribute("type","submit")
          updateBtn.addEventListener('click', function(){
            old_pass.required = false;
            new_pass.required = false;
          },false);

          pwBtn.addEventListener('click', function(){
            let filterAccessModal = new bootstrap.Modal(document.getElementById('accessFilterModel'), {});
            filterAccessModal.show();
            old_pass.required = true;
            new_pass.required = true;
          }, false);

          const hideModal = document.getElementById('dismiss_modal');
          hideModal.addEventListener('click', function(){
            let filterAccessModal = new bootstrap.Modal(document.getElementById('accessFilterModel'), {});
            let password = document.getElementById('password');
            let confirm_pass = document.getElementById('passwordVerify')
            if(password.value !='' && confirm_pass.value != ''){
              if(password.value == confirm_pass.value ){
                alert('password updated');
                btn.setAttribute("type","submit");
              }else{
                btn.setAttribute("type","button");
                document.getElementById('error').textContent = 'Password does not match!'
              }
            }
          }, false)
      </script>
       