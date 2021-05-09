<div class="row">
    <div class="col-sm-12">
        Импорт товаров
        <form action="/provider/default/import" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=Yii::$app->request->getCsrfToken(); ?>" />

            <input type="file" name="goods">
        <input type="submit">
        </form>



    </div>
</div>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Имя</th>
        <th scope="col">Фамилия</th>
        <th scope="col">Username</th>
        <th scope="col">url</th>
    </tr>
    </thead>
    <tbody>

        <?php foreach ($model as $good) : ?>
            <tr  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                <th scope="row" ><?= $good->id ?></th>

                <td><?= $good->name ?></td>
                <td><?= $good->description ?></td>
                <td><?= $good->id ?></td>
                <td><?= $good->slug  ?></td>




            </tr>


        <?php endforeach; ?>


    </tbody>
</table>