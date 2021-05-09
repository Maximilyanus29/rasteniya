<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Имя</th>
        <th scope="col">Фамилия</th>
        <th scope="col">Username</th>
    </tr>
    </thead>
    <tbody>

        <?php foreach ($model as $order) : ?>
            <tr  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                <th scope="row" ><?= $order->id ?></th>

                <td><?= $order->discount_price ?></td>
                <td><?= $order->delivery_price ?></td>
                <td><?= $order->total_price ?></td>




            </tr>

            <tr  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

            <td colspan="4">

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <?php foreach ($model as $order) : ?>
                    <div class="card-body">
                      CПисок заказанных товаров
                    </div>
                    <?php endforeach; ?>
                </div>


            </td>




            </tr>
        <?php endforeach; ?>


    <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
    </tr>
    <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
    </tr>
    </tbody>
</table>