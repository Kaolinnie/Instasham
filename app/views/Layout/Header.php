<?php 
    $profile = new \app\models\Profile();
    $profile = $profile->get($_SESSION['profile_id']);
?>
<header>
    <a href="/Main/index">
        <img src="/app/resources/images/instashamLogo.png" alt="logo" id="headerLogo">
    </a>
        <div class="searchBar">
        <input type="text" name="search_bar" id="search_bar" placeholder="Search">
        <img src="/app/resources/images/clear.png" alt="" class="clearButton" onclick="clearSearchBar()">
    </div>
    <ul class="tabLinks">
        <li class="tabLink homeLink">
            <a href="/Main/index">
                <img src="/app/resources/images/home.png" alt="">
            </a>
        </li>
        <li class="tabLink messengerLink">
            <a href="/Message/messages">
                <img src="/app/resources/images/dm.png" alt="">
            </a>
        </li>
        <li class="tabLink createPostLink">
            <img id="createPostImg" src="/app/resources/images/add.png" onclick="createPost()" alt="">
        </li>
        <li class="tabLink exploreLink">
            <a href="/Main/explore">
                <img src="/app/resources/images/explore.png" alt="">
            </a>
        </li>
        <li class="tabLink notificationsLink">
            <a href="">
                <img src="/app/resources/images/heart.png" alt="">
            </a>
        </li>
        <li class="tabLink profileLink">
            <a href="/Profile/viewProfile/<?=$profile->profile_id?>">
                <img src="/images/profiles/<?=$profile->profile_pic?>" alt="">
            </a>
        </li>
    </ul>
</header>
<script src="/app/resources/scripts/header.js"></script>