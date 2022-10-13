<div class='comment'>
    <a href='/Profile/viewProfile/<?=$data["commentProfile"]->profile_id?>'><img src='/images/profiles/<?=$data["commentProfile"]->profile_pic?>' class='commentProfile'/></a>
    <a href='/Profile/viewProfile/$commentProfile->profile_id'><h6 class='commentUsername'><?=$data["commentProfile"]->username?></h6></a>
    <p class='commentText commentText_<?=$data["comment"]->comment_id?>'><?=$data["comment"]->comment?></p>
    <input type='text' value='<?=$data["comment"]->comment?>' class='editCommentInput comment_<?=$data["comment"]->comment_id?>' style='display:none'>
    <div class="commentActions">
        <?php 
            $comment = $data["comment"];
            if($comment->profile_id==$_SESSION["profile_id"]) {
                echo "<a type='submit' onclick='editComment($comment->comment_id)' class='editCommentBtn'>
                <img src='/app/resources/images/edit.png' />
                </a>";
                echo "<a type='submit' onclick='deleteComment($comment->comment_id)' class='removeCommentBtn'>
                        <img src='/app/resources/images/delete.png' />
                    </a>";
            }
        ?>
    </div>
    <p class='date_time'><?=$data["comment"]->date_time?></p>
</div>