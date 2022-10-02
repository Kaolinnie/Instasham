<section class="publicationSection" id="publication_<?=$data['publication']->publication_id?>">
    <div class="imgSide">
        <img src="/images/publications/<?=$data['publication']->picture?>" alt="">
        <div class="captionDiv">
            <img src="/images/profiles/<?=$data['profile']->profile_pic?>" alt="">
            <div class="captionContent">
                <h6 class="displayName"><?=$data['profile']->display_name?></h6>
                <p class="caption"><?=$data['publication']->caption?></p>
            </div>
        </div>
    </div>
    
    <div class="commentSide">
        <div class="commentsDiv">
            <?php 
            if(sizeof($data['comments'])>0){
                foreach ($data['comments'] AS $comment){
                    $commentProfile = $comment->getProfile();
                    $this->view('Layout/Comment',["comment"=>$comment,"commentProfile"=>$commentProfile]);
                }
            }
            ?>
        </div>
        <div class="writeComment">
            <a href="/Profile/like/<?=$data["publication"]->publication_id?>" class="likeBtn">
                <img src="/app/resources/images/<?=$data['like']?>" alt="" />
            </a>
            <form action='' method="post">
                <input type="hidden" name="publication_id" value="<?= $data['publication']->publication_id ?>">
                <input type="text" name="writeComment" id="writeComment" placeholder="comment...">
                <button type="submit" name='action' class="sendCommentBtn">
                    <img src="/app/resources/images/dm.png" alt="" />
                </button>
            </form>
        </div>
    </div>
    <img class="exitPublicationBtn" role="button" src="/app/resources/images/exit.png" alt="" onclick="exitPublication()">
    <?php 
        $profileId = $_SESSION["profile_id"];
        $publication_id = $data['publication']->publication_id;
        if($profileId==$data["profile"]->profile_id) {
            echo "<img class='deletePublicationBtn' role='button' onclick='confirmDeletion($publication_id)' src='/app/resources/images/delete.png'>";
        }
    ?>
    
</section>