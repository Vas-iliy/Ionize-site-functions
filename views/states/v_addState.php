<div class="container">
    <?if($articleErrors):?>
        <div class="errors">
            <?foreach ($articleErrors as $error):?>
                <div class="alert alert-danger" role="alert">
                    <?=$error?>
                </div>
            <?endforeach;?>
        </div>
    <?endif;?>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleFormControlInput1">Title Article</label>
            <input type="text" name="title_state" class="form-control" value="<?=$fields['title_state']?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Category</label>
            <select class="form-control" name="id_category">
                <?foreach ($categories as $category):?>
                    <option value="<?=$category['id_category']?>"><?=$category['title_cat']?></option>
                <?endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Text Article</label>
            <textarea class="form-control" rows="3" name="text_state"><?=$fields['text_state']?></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Image</label>
            <input type="file" name="images[]" class="form-control-file" multiple>
        </div>
        <div class="form-group">
            <div class="container">
                <div class="row">
                    <?if($images):?>
                    <?foreach ($images as $image):?>
                        <div class="col-4">
                            <img class="card-img-top" height="90%" src="<?=BASE_URL?>assets/images/states/<?=$image['name_image']?>.jpg" width="10px" alt="Card image cap">
                            Insert:<input type="checkbox" value="<?=$image['name_image']?>" name="images[]">
                        </div>
                    <?endforeach;?>
                    <?endif;?>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
