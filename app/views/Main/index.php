<html>
<head>
	<title>Instasham Home</title>
    <?php $this->view('Layout/HeadLinks'); ?>

<link rel="stylesheet" href="/app/resources/styles/indexStyles.css">
</head>

<body>
	<?php $this->view('Layout/Header',$data['profile']); ?>
	<main>
	<div class="publicationsDivision">
            <?php 
                foreach($data['publications'] as $post) {
                    $publication = $post['publication'];
                    $profileOfPost = $post['profile'];
                    echo "
                    <section class='publicationDiv'>
                        <img src='/images/publications/$publication->picture'></a>
                        <div class='captionDiv'>
                            <a href='/Profile/viewProfile/$profileOfPost->profile_id/-1'><img src='/images/profiles/$profileOfPost->profile_pic'></a>
                            <div class='captionContent'>
                                <a href='/Profile/viewProfile/$profileOfPost->profile_id/-1'><h6 class='displayName'>$profileOfPost->display_name</h6></a>
                                <p class='caption'>$publication->caption</p>
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