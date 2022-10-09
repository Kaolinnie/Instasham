<!DOCTYPE html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->view('Layout/HeadLinks');?>
    <link rel="stylesheet" href="/app/resources/styles/exploreStyles.css">
    <link rel="stylesheet" href="/app/resources/styles/publicationStyles.css">
    <title>Explore</title>
</head>
<body>
    <?php $this->view('Layout/Header');?>
    <main>
    <div class="publicationsDivision">
            <?php 
                foreach($data as $post) {
                    echo "
                    <section class='publicationDiv'>
                        <div class='imgDiv'><img role='button' onclick='showPublication($post->publication_id)' src='/images/publications/$post->picture'></a></div>
                    </section>
                    ";
                }
            ?>
        </div>
    </main>
</body>
</html>