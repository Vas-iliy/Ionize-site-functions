<a href="<?=BASE_URL?>" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
<aside id="colorlib-aside" role="complementary" class="js-fullheight img" style="background-image: url(<?=BASE_URL?>assets/images/sidebar-bg.jpg);">
    <h1 id="colorlib-logo" class="mb-4"><a href="">ionize</a></h1>
    <nav id="colorlib-main-menu" role="navigation">
        <ul>
            <li <?if(BASE_URL === $_SERVER['REQUEST_URI']):?> class="colorlib-active"<?endif;?>><a href="<?=BASE_URL?>">Home</a></li>
            <?foreach ($categories as $category):?>
                <li <?if($_SESSION['category'] === $category['title_cat']) {echo 'class="colorlib-active"';}?>><a href="<?=BASE_URL?>category/<?=$category['id_category']?>"><?=$category['title_cat']?></a></li>
            <?endforeach;?>
        </ul>
    </nav>
    <div class="colorlib-footer">
        <?if(isset($userAuth)):?>
        <div class="mb-4">
            <?if($userAuth['role'] === 'admin'):?>
                <h3><a href="<?=BASE_URL?>moderation">State Moderate</a></h3>
                <h3><a href="<?=BASE_URL?>new_category">New Category</a></h3>
            <?endif;?>
            <h3><a href="<?=BASE_URL?>new_state">New State</a></h3>
            <h3><a href="<?=BASE_URL?>logout">Logout</a></h3>
        </div>
        <?else:?>
        <div class="mb-4">
            <h3><a href="<?=BASE_URL?>login">Login</a></h3>
        </div>
        <?endif;?>
    </div>
</aside>