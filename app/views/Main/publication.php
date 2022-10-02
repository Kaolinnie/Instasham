<html lang="en">
<head>
<?php $this->view('Layout/HeadLinks'); ?>

<link rel="stylesheet" href="/app/resources/styles/publicationStyles.css">
<link rel="stylesheet" href="/app/resources/styles/all.css">
<title>Post</title>
</head>
<body>
    <?php $this->view('Layout/Header',$data['userProfile']) ?>
    <main>
        <div class="newerPost"></div>
        <?php $this->view('Layout/Publication',$data);?>
        <div class="olderPost"></div>
    </main>
</body>
</html>