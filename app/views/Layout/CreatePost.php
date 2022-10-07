<section class="createPostSection">
    <div class="createPostHeader">
        <img src="/app/resources/images/icons8-paper-plane-30.png" alt="">
        <img src="/app/resources/images/exit.png" alt="" class="closeBtn" onclick="exitCreatePost()">
    </div>
    <div class="wrapInputs">
        <div class="centerImage">
            <label for="post_picture_input" class="newPostLabel">
                <img src="/app/resources/images/image.svg" id="newPostImage">
            </label>
        </div>
        <form action="" id="createPostForm" method="post" enctype="multipart/form-data">
            <div class="captionInputDiv">
                <img src="/app/resources/images/caption.png" class="ccImage" alt="">
                <textarea class="captionInput" name="captionInput"></textarea>
                <input type="file" class="imgBtn" name="uploadfile" id="post_picture_input" style="display:none;"/><br>            
            </div>
            <input id="createPostSubmitButton" type="submit" value="Publish">
        </form>
    </div>
</section>
<script src="/app/resources/scripts/header.js"></script>