//https://onestepcode.com/style-html-img-file-input/
$("#profile_pic_input").change(function() {
    const props = $("#profile_pic_input").prop('files');
    const file = props[0];
    if (!file) return;
    // Generate img preview
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => {
      $("#newProfilePic").attr("src",reader.result);
    };
    return;
});

// change password script
let old_pass = document.getElementById('old_pass');
let new_pass = document.getElementById('password');
const pwBtn = document.getElementById('changed_password');
const updateBtn = document.getElementById('update');
let btn = document.getElementById('dismiss_modal');
btn.setAttribute("type","submit");
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
  if (not_valid === false){
    if(password.value == confirm_pass.value ){
      alert('password updated');
      btn.setAttribute("type","submit");
      not_valid = true;
    }else{
      btn.setAttribute("type","button");
      document.getElementById('error').textContent = 'Password does not match!'
    }
  
  }else{
    alert("You've entered a wrong password");
  }
}, false)
