$(document).ready(function() {
    var publicationID = $("#publicationFocus").val();

    if(publicationID>=0) {
        showPublication(publicationID);
    }
});


function showPublication(publication_id) {
    $("main").css("filter","blur(13px)");
    $("header").css("filter","blur(13px)");
    $("main").css("pointer-events","none");
    $("header").css("pointer-events","none");
    $("main").css("user-select","none");
    $("header").css("user-select","none");
    $(".publicationSection").removeClass("focusPublicationSection");
    $("#publication_"+publication_id).addClass("focusPublicationSection");
}
function exitPublication() {
    $("main").css("filter","none");
    $("header").css("filter","none");
    $("main").css("pointer-events","all");
    $("header").css("pointer-events","all");
    $("main").css("user-select","all");
    $("header").css("user-select","all");
    $(".publicationSection").removeClass("focusPublicationSection");
}

function confirmDeletion(publication_id) {
    if(confirm("Are you sure that you want to delete this post?")) {
        window.location.href = '/Profile/deletePublication/'+publication_id;
    }
}