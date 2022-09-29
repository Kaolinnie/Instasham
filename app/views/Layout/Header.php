<header>
    <div id="headerContainer">
        <img src="/app/resources/images/instashamLogo.png" alt="logo" id="headerLogo">
        <div class="searchBar">
            <input type="text" name="search_bar" id="search_bar" placeholder="Search">
            <img src="/app/resources/images/clear.png" alt="" class="clearButton">
        </div>
        <div class="tabLinks">
            <div class="tabLink homeLink">
                <a href="/Main/index/<?=$data->profile_id?>">
                    <img src="/app/resources/images/home.png" alt="">
                </a>
            </div>
            <div class="tabLink messengerLink">
                <a href="">
                    <img src="/app/resources/images/dm.png" alt="">
                </a>
            </div>
            <div class="tabLink createPostLink">
                <a href="">
                    <img src="/app/resources/images/add.png" alt="">
                </a>
            </div>
            <div class="tabLink exploreLink">
                <a href="">
                    <img src="/app/resources/images/explore.png" alt="">
                </a>
            </div>
            <div class="tabLink notificationsLink">
                <a href="">
                    <img src="/app/resources/images/heart.png" alt="">
                </a>
            </div>
            <div class="tabLink profileLink">
                <a href="/Profile/index/<?=$data->profile_id ?>">
                    <img src="/images/profiles/<?=$data->profile_pic?>" alt="">
                </a>
            </div>
        </div>
    </div>
</header>