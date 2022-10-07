<!DOCTYPE html>
<head>
	<title>Instasham Home</title>
    <?php $this->view('Layout/HeadLinks'); ?>

<link rel="stylesheet" href="/app/resources/styles/indexStyles.css">
<link rel="stylesheet" href="/app/resources/styles/publicationStyles.css">
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
                        <div class='imgDiv'><img role='button' onclick='showPublication($publication->publication_id)' src='/images/publications/$publication->picture'></a></div>
                        <div class='captionDiv'>
                            <a href='/Profile/viewProfile/$profileOfPost->profile_id'><img src='/images/profiles/$profileOfPost->profile_pic'></a>
                            <div class='captionContent'>
                                <a href='/Profile/viewProfile/$profileOfPost->profile_id'><h6 class='displayName'>$profileOfPost->display_name</h6></a>
                                <p class='caption'>$publication->caption</p>
                            </div>
                        </div>
                    </section>
                    ";
                }
            ?>
        </div>
	</main>
    <script src="/app/resources/scripts/publication.js"></script>
</body>
</html>