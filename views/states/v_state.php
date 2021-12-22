<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container px-0">
        <?if(!$state['validate']):?>
            <div class="alert alert-success" role="alert">
                <p>Ваша статья находится на модерации</p>
            </div>
        <?endif;?>
        <div class="row no-gutters">
            <div class="col-md-12 blog-wrap">
                <div class="row no-gutters align-items-center">
                    <div class="col-md-6 img js-fullheight" style="background-image: url(<?=BASE_URL?>assets/images/states/<?=$images[0]['name_image']?>.jpg);"></div>
                    <div class="col-md-6">
                        <div class="text p-md-5 p-4 ftco-animate">
                            <div class="heading">
                                <div class="meta-wrap">
                                    <p class="meta">
                                        <span><i class="icon-calendar mr-2"></i><?=date('d M y', strtotime($state['dt_add']))?></span>
                                        <span><a href="single.html"><i class="icon-folder-o mr-2"></i><?=$state['title_cat']?></a></span>
                                        <span><i class="icon-comment2 mr-2"></i><?=count($comments)?> Comments</span>
                                    </p>
                                </div>
                                <h2 class="mb-5"><?=$state['title_state']?></h2>
                            </div>
                            <div class="icon d-flex align-items-center my-5">
                                <div class="img" style="background-image: url(<?=BASE_URL?>assets/images/users/<?=$state['image_user']?>.jpg);"></div>
                                <div class="position pl-3">
                                    <h4 class="mb-0"><?=$state['login']?></h4>
                                    <span><?=$state['email']?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p><?=$state['text_state']?></p>
                    <a href="<?=BASE_URL?>">Home</a>
                    <?if(isset($user) && $user['id_user'] === $state['id_user']):?>
                        | <a href="<?=BASE_URL?>edit_state/<?=$state['id_state']?>">Redact</a> |
                        <a href="<?=BASE_URL?>delete_state/<?=$state['id_state']?>">Delete</a>
                    <?endif?>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <?foreach ($images as $image):?>
            <div class="col-6">
                <img height="100%" width="100%" src="<?=BASE_URL?>assets/images/states/<?=$image['name_image']?>.jpg" alt="">
            </div>
        <?endforeach;?>
    </div>
</div>
<div class="comments">
    <h3 class="title-comments">Комментарии <?=count($comments)?></h3>
    <ul class="media-list">
        <?foreach ($comments as $comment):?>
        <li class="media">
            <div class="media-left">
                <a href="#">
                    <img class="media-object img-rounded" width="50px" src="<?=BASE_URL?>assets/images/users/<?=$comment['image_user']?>.jpg" alt="<?=$comment['login']?>">
                </a>
            </div>
            <div class="media-body">
                <div class="media-heading">
                    <div class="author"><?=$comment['login']?></div>
                    <div class="metadata">
                        <span class="date"><?=date('d M Y, H:i', strtotime($comment['dt_add']))?></span>
                    </div>
                </div>
                <div class="media-text text-justify"><?=$comment['comment']?></div>
            </div>
        </li>
        <?endforeach;?>
    </ul>
</div>