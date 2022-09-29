<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/app/resources/styles/mainStyles.css">
<link rel="stylesheet" href="/app/resources/styles/profileStyles.css">
<title>Profile</title>
</head>
<body>
    <?php $this->view('Layout/Header',$data['profile']) ?>
    <main>
        <div class="mainProfile">
            <img id="profilePic" src="/images/profiles/<?=$data['profile']->profile_pic?>" alt="">
            <div class="rightSideProfile">
                <div class="layer1">
                    <h2><?=$data['profile']->display_name?></h2>
                    <input type="button" value="Edit profile" id="editProfileBtn">
                </div>
                <div class="layer2">
                    <p><b><?=sizeof($data['publications'])?></b> posts</p>
                    <p><b><?=sizeof($data['followers'])?></b> followers</p>
                    <p><b><?=sizeof($data['following'])?></b> following</p>
                </div>
                <div class="layer3">
                    <p><?=$data['profile']->first_name?> <?=$data['profile']->last_name?></p>
                </div>
                <div class="layer4">
                    <p><?=$data['profile']->description?></p>
                </div>
            </div>
        </div>
        <hr class="solid">
        <div class="publicationsDiv">
            <?php 
                $user_id = $data['profile']->user_id;
                foreach($data['publications'] as $post) {
                    echo "
                    <div class='publicationDiv'>
                        <a href='/Publication/viewPublication/$user_id/$post->publication_id'><img src='/images/publications/$post->picture'></a>
                    </div>
                    ";
                }
            
            ?>
        </div>
    </main>
</body>
</html>