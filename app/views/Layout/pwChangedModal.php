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
    let not_valid = false;
    </script>
 <?php }else { ?>
  <script>
  not_valid = true;
  </script>
  <?php } ?>
       