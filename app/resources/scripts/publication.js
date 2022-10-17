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
                    console.log(data);

                    if(data==="t") {
                        console.log("is liked!");
                        $(".likeImg").removeClass("notLiked");
                    } else {
                        console.log("is not liked!");

                        $(".likeImg").addClass("notLiked");
                    }
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
function confirmDeletion(publication_id) {
    if(confirm("Are you sure that you want to delete this post?")) {
        window.location.href = '/Publication/deletePublication/'+publication_id;
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
        success: function() {
            $(".likeImg").toggleClass("notLiked");
        }
    });
}




function editPost(publication_id) {
    $(".postCaption").css("display","none");
    $(".editCaptionInput").css("display","initial");
    $(".editCaptionInput").on("keypress",function(e){
        if(e.which==13) {
            $.ajax({
                type: 'POST',
                url: "/Publication/updateCaption/"+publication_id,
                data: {'caption':$(".editCaptionInput").val()},
                success: function(data) {
                    $(".postCaption").text($(".editCaptionInput").val());
                    $(".postCaption").css("display","initial");
                    $(".editCaptionInput").css("display","none");
                    $("#caption_"+data).text($(".editCaptionInput").val());
                }
            });
        }
    });

}

function editComment(comment_id) {
    $(".commentText_"+comment_id).css("display","none");
    $(".comment_"+comment_id).css("display","initial");
    $(".comment_"+comment_id).on("keypress",function(e){
        if(e.which==13) {
            $.ajax({
                type: 'POST',
                url: "/Comment/editComment/"+comment_id,
                data: {'comment':$(".comment_"+comment_id).val()},
                success: function() {
                    $(".commentText_"+comment_id).text($(".comment_"+comment_id).val());
                    $(".commentText_"+comment_id).css("display","initial");
                    $(".comment_"+comment_id).css("display","none");
                }
            });
        }
    });
}

// live search
