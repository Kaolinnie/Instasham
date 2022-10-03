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