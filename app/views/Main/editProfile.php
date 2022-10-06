<html lang="en">
<head>
<?php $this->view('Layout/HeadLinks'); ?>
<link rel="stylesheet" href="/app/resources/styles/editProfileStyles.css">
<title>Edit Profile</title>
</head>
<body>
    <?php $this->view('Layout/Header',$data); ?>
    <main>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="imgSide">
                <div class="currentPic">
                    <label class="currentLabel">Current Profile Picture</label>
                    <img id="profilePic" src="/images/profiles/<?=$data->profile_pic?>">
                </div>
                <div class="newPic">
                    <label class="newLabel">Change Profile Picture</label>
                    <label for="profile_pic_input">
                        <img src="/app/resources/images/image.svg" id="newProfilePic">
                    </label>
                    <input type="file" name="profile_pic" id="profile_pic_input">
                </div>
            </div>
            <div class="rightSideProfile">
                <div class="labelsDiv">
                    <label for="display_name">Display Name</label>
                    <label for="first_name">First Name</label>
                    <label for="middle_name">Middle Name</label>
                    <label for="last_name">Last Name</label>
                    <label for="description">Description</label>
                </div>
                <div class="inputsDiv">
                    <input type="text" name="display_name" value="<?=$data->display_name?>" required maxlength="50">
                    <input type="text" name="first_name" value="<?=$data->first_name?>" required maxlength="50">
                    <input type="text" name="middle_name" value="<?=$data->middle_name?>" placeholder="Optional" maxlength="50">
                    <input type="text" name="last_name" value="<?=$data->last_name?>" required maxlength="50">                
                    <textarea id="description_input" type="textbox" name="description" placeholder="Optional" maxlength="100" rows="4" cols="50"><?=$data->description?></textarea>    
                </div>
                <div class="submitDiv">
                    <input name="action" type="submit" value="Update Profile">
                </div>
                
            </div>
            
        </form>
    </main>
    <script src="/app/resources/scripts/jquery-3.6.1.js"></script>
    <script src="/app/resources/scripts/editProfile.js"></script>
</body>
</html>