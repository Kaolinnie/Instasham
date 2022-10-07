<section class='publicationSection' id='publication_<?=$data['post']->publication_id?>'>
    <div class='imgSide'>
        <img src='/images/publications/<?=$data['post']->picture?>' alt=''>
        <div class='captionDiv'>
            <img src='/images/profiles/<?=$data['profile']->profile_pic?>' alt=''>
            <div class='captionContent'>
                <h6 class='displayName'><?=$data['profile']->display_name?></h6>
                <p class='caption'><?=$data['post']->caption?></p>
            </div>
        </div>
    </div>
                
    <div class='commentSide'>
        <div class='commentsDiv'>

        </div>
        <div class='writeComment'>
            <a onclick='likePost(<?=$data["post"]->publication_id?>)' class='likeBtn'>
                
            </a>
            <form action='' id='writeCommentForm' method='post'>
                <input type='text' name='writeComment' id='writeComment' placeholder='comment...'>
                <button type='submit' name='sendComment' class='sendCommentBtn'>
                    <img src='/app/resources/images/dm.png' alt='' />
                </button>
            </form>
        </div>
    </div>
    <img class='exitPublicationBtn' role='button' src='/app/resources/images/exit.png' alt='' onclick='exitPublication()'>
    <?php
    $post_id = $data['post']->publication_id;
        if($_SESSION['profile_id']==$data['profile']->profile_id) {
            echo "<img class='deletePublicationBtn' role='button' onclick='confirmDeletion($post_id)' src='/app/resources/images/delete.png'>";
        }
    ?>
    <input type="hidden" id="publication_id" value="<?=$data['post']->publication_id?>">
</section>
<div class="modal fade" id="editComment" tabindex="-1" role="dialog" aria-labelledby="editCommentLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCommentLabel">Edit comment</h5>
            </div>
        <div class="modal-body">
            <input type="text" name="commentInput" id="commentInput" value="">
            <input type="hidden" id="hiddenCommentId">
        </div>
            <div class="modal-footer">
                <button id="updateCommentBtn" type="button" class="btn btn-primary" onclick="updateComment()">Update</button>
            </div>
        </div>
    </div>
</div>