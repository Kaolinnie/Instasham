
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