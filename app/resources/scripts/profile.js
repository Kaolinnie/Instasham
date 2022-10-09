function openView(viewName) {
    $(".profileView").css("display","none");
    if(viewName=="publications") {
        $("#publications").css("display","grid");
        $(".publicationsButton").addClass("active");
        $(".commentsButton").removeClass("active");

    } else {
        $("#comments").css("display","flex");
        $(".commentsButton").addClass("active");
        $(".publicationsButton").removeClass("active");
    }
}