<section class="searchOutput">
    <div class="searchPublicationsDivision">
        <?php 
            foreach($data as $post) {
                $publication = $post['publication'];
                $profileOfPost = $post['profile'];
                echo "
                <section class='searchPublicationDiv'>
                    <div class='searchImgDiv'><img role='button' onclick='showPublication($publication->publication_id)' src='/images/publications/$publication->picture'></a></div>
                    <div class='searchCaptionDiv'>
                        <a href='/Profile/viewProfile/$profileOfPost->profile_id'><img src='/images/profiles/$profileOfPost->profile_pic'></a>
                        <div class='searchCaptionContent'>
                            <a href='/Profile/viewProfile/$profileOfPost->profile_id'><h6 class='searchDisplayName'>$profileOfPost->display_name</h6></a>
                            <p class='searchCaption' id='caption_$publication->publication_id'>$publication->caption</p>
                        </div>
                    </div>
                </section>
                ";
            }
        ?>
    </div>
</section>