<section class='publicationSection' id='publication_<?=$data['post']->publication_id?>'>
    <div class='imgSide'>
        <img src='/images/publications/<?=$data['post']->picture?>' alt=''>
        <div class='captionDiv'>
            <img src='/images/profiles/<?=$data['profile']->profile_pic?>' alt=''>
            <div class='captionContent'>
                <h6 class='displayName'><?=$data['profile']->display_name?></h6>
                <p class='postCaption'><?=$data['post']->caption?></p>
                <textarea class="editCaptionInput" style="display:none"><?=$data['post']->caption?></textarea>
            </div>
        </div>
    </div>
                
    <div class='commentSide'>
        <div class='commentsDiv'>

        </div>
        <div class='writeComment'>
            <a onclick='likePost(<?=$data["post"]->publication_id?>)' class='likeBtn'>
                <img src="/app/resources/images/heart_full.png" alt="" class='likeImg notLiked'>
            </a>
            <form action='' id='writeCommentForm' method='post'>
                <input type='text' name='writeComment' id='writeComment' placeholder='comment...'>
                <button type='submit' name='sendComment' class='sendCommentBtn'>
                    <img src='/app/resources/images/dm.png' alt='' />
                </button>
            </form>
        </div>
    </div>
    <div class="buttons">
        <?php
        $post_id = $data['post']->publication_id;
            if($_SESSION['profile_id']==$data['profile']->profile_id) {
                echo "<img class='postAction' role='button' onclick='editPost($post_id)' src='/app/resources/images/edit.png'>";
                echo "<img class='postAction' role='button' onclick='confirmDeletion($post_id)' src='/app/resources/images/delete.png'>";
            }
        ?>
        <img class='postAction' role='button' src='/app/resources/images/exit.png' onclick='exitPublication()'>
    </div>
    <input type="hidden" id="publication_id" value="<?=$data['post']->publication_id?>">
</section>