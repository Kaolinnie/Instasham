<div class='comment'>
    <a href='/Profile/viewProfile/<?=$data["commentProfile"]->profile_id?>'><img src='/images/profiles/<?=$data["commentProfile"]->profile_pic?>' class='commentProfile'/></a>
    <a href='/Profile/viewProfile/$commentProfile->profile_id'><h6 class='commentUsername'><?=$data["commentProfile"]->username?></h6></a>
    <p class='commentText'><?=$data["comment"]->comment?></p>
    <?php 
        $comment = $data["comment"];
        if($comment->profile_id==$_SESSION["profile_id"]) {
            echo "<a href='/Profile/removeComment/$comment->comment_id' class='removeCommentBtn'>
            <img src='/app/resources/images/x.png' />
            </a>";
        }
    ?>
    <p class='date_time'><?=$data["comment"]->date_time?></p>
</div>