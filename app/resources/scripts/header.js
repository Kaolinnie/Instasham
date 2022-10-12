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
$("#search_bar").on("input",function() {liveSearch()});

function createPost() {
    $.ajax({
        type: 'GET',
        url: "/Publication/createPost/",
        data: {},
        success: function(data) {
            $("body").append(data);
            console.log("creating event")

            // implement submit action for the form
            $("#createPostForm").on("submit", function(event){publishPost(event)});

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
}

function publishPost(event) {
    var formdata = new FormData();
    var files = $("#post_picture_input")[0].files;
    var caption = $('.captionInput').val();

    if(files.length>0) {
        formdata.append('file',files[0]);
        formdata.append('caption',caption);

        $.ajax({
            url: '/Publication/publishPost',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data) {
                $(".createPostSection").remove();
                $("main").removeClass("backgroundFilters");
                $("header").removeClass("backgroundFilters");
                window.location.href = '/Main/index';
            } 
        });
    } else {
        alert("Please select a file");
    }
    event.preventDefault();
};
function clearSearchBar() {
    $("#search_bar").val("");
    $(".searchOutput").remove();
}

// live search
function liveSearch(){
    var keyword = $("#search_bar").val();
    $(".searchOutput").remove();
    if(keyword=="") return;
    $.ajax({
        url: '/Publication/searchByKeyword',
        type: 'POST',
        data: {'keyword' : keyword},
        success: function(data) {
            var html = $.parseHTML(data);
            var num = $(html).find(".searchPublicationDiv").length;
            if(num==0) return;
            $("body").append(data);
        }
    });
}
function showNotifications() {
    alert('not implemented');
}
function showMessages() {
    alert('not implemented');
}