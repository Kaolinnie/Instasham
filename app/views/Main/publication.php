<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/app/resources/styles/mainStyles.css">
<link rel="stylesheet" href="/app/resources/styles/publicationStyles.css">
<title>Post</title>
</head>
<body>
    <?php $this->view('Layout/Header',$data['profile']) ?>
    <main>
        <div class="publicationDiv">
            <div class="imgSide">
                <img src="/images/publications/<?=$data['publication']->picture?>" alt="">
            </div>
            <div class="commentSide">
                <div class="commentsDiv">
                    <?php 
                    if(sizeof($data['comments'])>0){
                        foreach ($data['comments'] AS $comment){
                            $commentProfile = $comment->getProfile();
                            echo "
                                <div class='comment'>
                                    <img src='/images/profiles/$commentProfile->profile_pic' class='commentProfile'/>
                                    <h6 class='commentUsername'>$commentProfile->username</h6>
                                    <p class='commentText'>$comment->comment</p>
                                </div>
                            ";
                        }
                    }
                    ?>
                </div>
                <div class="writeComment">
                    <form action="postComment" method="post">
                        <input type="text" name="writeComment" id="writeComment" placeholder="comment...">
                        <input type="image" src="/app/resources/images/dm.png" alt="" class="sendCommentBtn">
                    </form>
                    </div>
            </div>
        </div>
    </main>
</body>
</html>