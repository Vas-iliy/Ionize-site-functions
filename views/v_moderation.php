<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container px-0">
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Category</th>
                <th scope="col">Moderate</th>
            </tr>
            </thead>
            <tbody>
            <?foreach ($statesIsModerate as $state): $i=1;?>
            
                <tr>
                    <th scope="row"><?=$i?></th>
                    <td><?=$state['title_state']?></td>
                    <td><?=$state['text_state']?></td>
                    <td><?=$state['title_cat']?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="id_state" value="<?=$state['id_state']?>">
                            <button>Moderate</button>
                        </form>
                    </td>
                </tr>
            <?$i++; endforeach;?>
            </tbody>
        </table>
    </div>
</section>
