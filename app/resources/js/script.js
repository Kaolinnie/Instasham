function hideMessage() {
    document.getElementById("errorMsg").style.display = "none";
        };
setTimeout(hideMessage, 3000,);

setTimeout(function(){
    document.getElementById("passwordError").style.display = "none"
},3000);

setTimeout(function(){
    document.getElementById("misMatched").style.display = "none"
},3000);

setTimeout(function(){
    document.getElementById("nameExists").style.display = "none"
},4000);


