<html lang="en">
<head>
<?php $this->view('Layout/HeadLinks'); ?>
<link rel="stylesheet" href="/app/resources/styles/profileStyles.css">
<link rel="stylesheet" href="/app/resources/styles/publicationStyles.css">
<title>Profile</title>
</head>
<body>
    <?php $this->view('Layout/Header',$data['userProfile']) ?>
    <main>
        <div class="mainProfile">
            <div class="imgSideDiv">
                <img id="profilePic" src="/images/profiles/<?=$data['profile']->profile_pic?>" alt="">
            </div>
            <div class="rightSideProfile">
                <div class="layer1">
                    <div class="display_name_div"><h2><?=$data['profile']->display_name?></h2></div>
                    <?php 
                        $profile_id = $data['profile']->profile_id;
                        if($profile_id==$_SESSION["profile_id"]) {
                            echo "<div class='layer1_firstInput_div'><a href='/Profile/editProfile'><input type='button' value='Edit profile' id='editProfileBtn'></a></div>";
                            echo "<div class='logoutBtnDiv'><a href='/User/logout' id='logoutBtn'><img src='/app/resources/images/logout.png'/></a></div>";
                        } else {
                            $following = new \app\models\Following();
                            $followCount = $following->get($_SESSION["profile_id"],$profile_id);
                            if($followCount>0) {
                                $followValue = "Following";
                            } else {
                                $followValue = "Follow";
                            }
                            echo "<div class='layer1_firstInput_div'><a href='/Profile/follow/$profile_id'><input type='button' value='$followValue' id='followBtn'></a></div>";
                        }
                    ?>
                </div>
                <div class="layer2">
                    <p><b><?=sizeof($data['posts'])?></b> posts</p>
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
        <?php 
            $this->view('Layout/ProfilePublications',$data["posts"]);
        ?>
    </main>
    <?php 
        $this->view('Layout/Publications_Full',$data["posts"]);
    ?>
    <input type="hidden" id="publicationFocus" value="<?php 
        if(isset($data["publicationFocus"])) {
            echo $data["publicationFocus"];
        }
    ?>">
    <script src="/app/resources/scripts/jquery-3.6.1.js"></script>
    <script src="/app/resources/scripts/publication.js"></script>
</body>
</html>