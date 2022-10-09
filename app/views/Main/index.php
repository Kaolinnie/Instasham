<!DOCTYPE html>
<head>
	<title>Instasham Home</title>
    <?php $this->view('Layout/HeadLinks'); ?>

<link rel="stylesheet" href="/app/resources/styles/indexStyles.css">
<link rel="stylesheet" href="/app/resources/styles/publicationStyles.css">
</head>

<body>
	<?php $this->view('Layout/Header'); ?>
	<main>
        <div class="profilesDiv">
        <?php 
                foreach($data['profiles'] as $p) {
                    $profile_id = $p->profile_id;
                    $profile_pic = $p->profile_pic;
                    echo "
                    <div class='profileDiv'>
                        <a href='/Profile/viewProfile/$profile_id'><img src='/images/profiles/$profile_pic'></a>
                    </div>
                    ";
                }
            ?>
        </div>
	    <div class="publicationsDivision">
            <?php 
                foreach($data['publications'] as $post) {
                    $publication = $post['publication'];
                    $profileOfPost = $post['profile'];
                    echo "
                    <section class='publicationDiv'>
                        <div class='imgDiv'><img role='button' onclick='showPublication($publication->publication_id)' src='/images/publications/$publication->picture'></a></div>
                        <div class='captionDiv'>
                            <a href='/Profile/viewProfile/$profileOfPost->profile_id'><img src='/images/profiles/$profileOfPost->profile_pic'></a>
                            <div class='captionContent'>
                                <a href='/Profile/viewProfile/$profileOfPost->profile_id'><h6 class='displayName'>$profileOfPost->display_name</h6></a>
                                <p class='caption' id='caption_$publication->publication_id'>$publication->caption</p>
                            </div>
                        </div>
                    </section>
                    ";
                }
            ?>
        </div>
	</main>
</body>
</html>