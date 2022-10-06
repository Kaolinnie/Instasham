<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/app/resources/styles/createPost.css">
    <title>Create a Post</title>
</head>
<body>
    <div class="createPostHeader">
        <div class="headerText">
            <img src="app\resources\images\icons8-paper-plane-30.png" alt="">
            New Post:
            <a href=""><img src="app\resources\images\icons8-close-30.png" alt="" class="closeBtn"></a> 
        </div>
    </div>
        <div class="wrapInputs">
            <div class="centerContent">
        <form action="submit" class="createPostForm">
            <div class="iconAdd">
                <!-- Icon add is required div to bundle the input and gif icon-->
                <img src="app\resources\images\icons8-topic.gif" class="ccImage" alt="">
                <input type="input" class="inputTitle" placeholder="Caption">              
            </div>
            <div class="descriptionText">Description</div>
            <textarea class="descriptionInput" name="Text1" cols="60" rows="5"></textarea>
            <input type="file" class="imgBtn"name="uploadfile" id="img" style="display:none;"/><br>
            <label class="labelStyle" for="img">Click me to upload image</label>
        </form>
            </div>
        </div>
    
</body>
</html>