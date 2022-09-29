<div class="publicationDiv">
    <div class="imgSide">
        <img src="/images/publications/<?=$data['publication']->picture?>" alt="">
    </div>
    <div class="commentSide">
        <div class="commentsDiv">
            <?php 
            if(sizeof($data['comments'])>0){
                foreach ($data['comments'] AS $comment){
                    $commentProfile = $comment->getProfile();
                    echo "
                        <div class='comment'>
                            <img src='/images/profiles/$commentProfile->profile_pic' class='commentProfile'/>
                            <h6 class='commentUsername'>$commentProfile->username</h6>
                            <p class='commentText'>$comment->comment</p>
                        </div>
                    ";
                }
            }
            ?>
        </div>
        <div class="writeComment">
            <form action="postComment" method="post">
                <input type="text" name="writeComment" id="writeComment" placeholder="comment...">
                <input type="image" src="/app/resources/images/dm.png" alt="" class="sendCommentBtn">
            </form>
        </div>
    </div>
</div>