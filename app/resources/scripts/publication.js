$(document).ready(function() {
    publicationFocusId = parseInt($("#publicationFocus").val());
    if(!isNaN(publicationFocusId)) {
        showPublication(publicationFocusId);
    }
});



function showPublication(publication_id) {
    $.ajax({
        url: '/Publication/viewPost/'+publication_id,
        type: 'GET',
        data: { 'publication_id' : publication_id },
        success: function(data) {
            $("body").append(data);
            // view all the comments
            $.ajax({
                type: 'GET',
                url: "/Comment/showComments/"+publication_id,
                data: {'publication_id' : publication_id},
                success: function(data) {
                    $(".commentsDiv").append(data);
                    $(".commentsDiv").scrollTop($(".commentsDiv")[0].scrollHeight);
                }
            });
            $.ajax({
                type: 'GET',
                url: "/Publication/isLiked/"+publication_id,
                data: {'publication_id' : publication_id},
                success: function(data) {
                    $(".likeBtn").append(data);
                }
            });

            // set up the write comment form 

            $("#writeCommentForm").on("submit",function(event){
                var comment = $("#writeComment").val();
                if(comment!=""&&comment!=null){
                    $.ajax({
                        type: "POST",
                        url: "/Comment/writeComment/"+publication_id,
                        data: {'comment' : $("#writeComment").val()},
                        success: function(data) {
                            // remove all comments
                            $(".comment").remove();
                            // set up another ajax call to retrieve all the comments 
                            $.ajax({
                                type: 'GET',
                                url: "/Comment/showComments/"+publication_id,
                                data: {'publication_id' : publication_id},
                                success: function(data) {
                                    $(".commentsDiv").append(data);
                                }
                            });

                            $("#writeComment").val('');
                        }
                    });
                }
                event.preventDefault();
            });


        }
    });
    $("main").addClass("backgroundFilters");
    $("header").addClass("backgroundFilters");
}

function exitPublication() {
    $(".publicationSection").remove();
    $("main").removeClass("backgroundFilters");
    $("header").removeClass("backgroundFilters");
}
function confirmDeletion(publication_id,main) {
    if(confirm("Are you sure that you want to delete this post?")) {
        window.location.href = '/Profile/deletePublication/'+publication_id;
    }
}

function deleteComment(comment_id) {
    if(confirm("Delete comment?")) {
        var publication_id = $("#publication_id").val();
        $.ajax({
            url: '/Comment/deleteComment/'+comment_id,
            type: 'POST',
            data: { 'comment_id' : comment_id },
            success: function() {
                // remove all comments
                $(".comment").remove();
                // set up another ajax call to retrieve all the comments 
                $.ajax({
                    type: 'GET',
                    url: "/Comment/showComments/"+publication_id,
                    data: {'publication_id' : publication_id},
                    success: function(data) {
                        $(".commentsDiv").append(data);
                    }
                });
            }
        });
    }
}
function likePost(publication_id) {
    $.ajax({
        url: '/Publication/likePost/'+publication_id,
        type: 'GET',
        data: { 'publication_id' : publication_id },
        success: function(data) {
            $(".likeBtn").empty();
            $(".likeBtn").append(data);
        }
    });
}

