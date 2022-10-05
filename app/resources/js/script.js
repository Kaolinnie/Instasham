function hideMessage() {
    document.getElementById("errorMsg").style.display = "hidden";
        };
setTimeout(hideMessage, 3000,);

setTimeout(function(){
    document.getElementById("passwordError").classList.toggle("hidden");
},2000);

setTimeout(function(){
    document.getElementById("misMatched").classList.toggle("hidden");
},2000);

setTimeout(function(){
    document.getElementById("nameExists").classList.toggle("hidden");
},2000);


