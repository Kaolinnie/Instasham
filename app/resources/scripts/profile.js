function openView(viewName) {
    $(".profileView").css("display","none");
    if(viewName=="publications") {
        $("#publications").css("display","grid");
    } else {
        $("#comments").css("display","flex");
    }
}