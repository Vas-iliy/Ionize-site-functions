<?foreach ($articles as $article):?>
    <?if ((!$article['validate'] && $article['id_user'] === $userAuth['id_user']) || $article['validate']):?>
        <div class="col-md-4 d-flex">
            <div class="blog-entry ftco-animate">
                <div class="carousel-blog owl-carousel">
                    <?if($article['name_image']):?>
                    <?foreach ($article['name_image'] as $image):?>
                        <div class="item">
                            <a href="<?=BASE_URL?>state/<?=$article['id_state']?>" class="img" style="background-image: url(<?=BASE_URL?>assets/images/states/<?=$image['name_image']?>.jpg);"></a>
                        </div>
                    <?endforeach;?>
                    <?endif;?>
                </div>
                <div class="text p-4">
                    <? if($article['id_user'] === $userAuth['id_user'] && !$article['validate']):?>
                        <h3>Статья не промадерирована</h3>
                    <?endif;?>
                    <h3 class="mb-2"><a href="<?=BASE_URL?>state/<?=$article['id_state']?>"><?=$article['title_state']?></a></h3>
                    <div class="meta-wrap">
                        <p class="meta">
                            <span><i class="icon-calendar mr-2"></i><?=date('d M y', strtotime($article['dt_add']))?></span>
                            <span><a href="<?=BASE_URL?>category/<?=$article['id_category']?>"><i class="icon-folder-o mr-2"></i><?=$article['title_cat']?></a></span>
                            <span><i class="icon-comment2 mr-2"></i><?=count($article['comments'])?> Comment</span>
                        </p>
                    </div>
                    <p class="mb-4"><?=mb_strimwidth($article['text_state'], 0, 150, '(...)', 'UTF-8')?></p>
                    <p><a href="<?=BASE_URL?>state/<?=$article['id_state']?>" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p>
                </div>
            </div>
        </div>
    <?endif;?>
<?endforeach;?>