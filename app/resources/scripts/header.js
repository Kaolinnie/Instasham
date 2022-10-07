$("#post_picture_input").change(function() {
    const props = $("#post_picture_input").prop('files');
    const file = props[0];
    if (!file) return;
    // Generate img preview
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => {
      $("#newPostImage").attr("src",reader.result);
    };
    return;
});
function createPost() {
    $.ajax({
        type: 'GET',
        url: "/Publication/createPost/",
        data: {},
        success: function(data) {
            $("body").append(data);
        }
    });
    $("main").addClass("backgroundFilters");
    $("header").addClass("backgroundFilters");
}
function exitCreatePost() {
    if(confirm("Discard your changes?")){
        $(".createPostSection").remove();
        $("main").removeClass("backgroundFilters");
        $("header").removeClass("backgroundFilters");
    }
    // use ajax call to retrieve form data and send to /Publication/publishPost
    // reference publication.js line 38 for this
}
