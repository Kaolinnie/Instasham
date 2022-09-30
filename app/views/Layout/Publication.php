<div class="publicationDiv">
            <div class="imgSide">
                <img src="/images/publications/<?=$data['publication']->picture?>" alt="">
            </div>
            <div class="commentSide">
                <div class="captionDiv">
                    <h6 class="displayName"><?=$data['profile']->display_name?></h6>
                    <p class="caption"><?=$data['publication']->caption?></p>
                </div>
                <hr>
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
                                    <a href='/Publication/removeComment/$comment->comment_id' class='removeCommentBtn'>
                                        <img src='/app/resources/images/x.png' />
                                    </a>
                                    <p class='date_time'>$comment->date_time</p>
                                </div>
                            ";
                        }
                    }
                    ?>
                </div>
                <div class="writeComment">
                    <a href="/Publication/like" class="likeBtn">
                        <img src="/app/resources/images/<?=$data['like']?>" alt="" />
                    </a>
                    <form action='' method="post">
                        <input type="text" name="writeComment" id="writeComment" placeholder="comment...">
                        <button type="submit" name='action' class="sendCommentBtn">
                            <img src="/app/resources/images/dm.png" alt="" />
                        </button>
                    </form>
                </div>
            </div>
        </div>