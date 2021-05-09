<div class="row">
    <div class="col-xs-12"><hr></div>
    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 hidden-xs">
        <div class="btn-group">
        </div>
    </div>

    <div class="col-xs-6 col-sm-5 col-md-4 col-lg-4 col-md-offset-2 col-lg-offset-3 text-right">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-sort"></i><span class="hidden-xs hidden-sm hidden-md">Сортировка:</span></span>
            <select id="input-sort" class="form-control" onchange="sort(this);">

                <option value="price" <?= ($searchModel->sort == 'price') && (empty($searchModel->order)) ? 'selected' : ''?> >По умолчанию</option>
                <option value="name" <?= ($searchModel->sort == 'name')  ? 'selected' : ''?>>Название (А - Я)</option>
                <option value="-name" <?= ($searchModel->sort == '-name') ? 'selected' : ''?>>Название (Я - А)</option>
                <option value="price" <?= ($searchModel->sort == 'price')  ? 'selected' : ''?>>Цена (низкая &gt; высокая)</option>
                <option value="-price" <?= ($searchModel->sort == '-price') ? 'selected' : ''?>>Цена (высокая &gt; низкая)</option>
                <option value="-rating" <?= ($searchModel->sort == '-rating') ? 'selected' : ''?>>Рейтинг (начиная с высокого)</option>
                <option value="rating" <?= ($searchModel->sort == 'rating') ? 'selected' : ''?>>Рейтинг (начиная с низкого)</option>
                <option value="vendor_code" <?= ($searchModel->sort == 'vendor_code') ? 'selected' : ''?>>Код Товара (А - Я)</option>
                <option value="-vendor_code" <?= ($searchModel->sort == '-vendor_code') ? 'selected' : ''?>>Код Товара (Я - А)</option>
            </select>
        </div>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 text-right">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-eye"></i><span class="hidden-xs hidden-sm hidden-md">Показать:</span></span>
            <select id="input-limit" class="form-control" onchange="pagination(this)">
                <option value="15" <?= intval($searchModel->limit) == 15 ? 'selected' : ''?>>15</option>
                <option value="25" <?=intval($searchModel->limit) == 25 ? 'selected' : ''?>>25</option>
                <option value="50" <?=intval($searchModel->limit) == 50 ? 'selected' : ''?>>50</option>
                <option value="75" <?=intval($searchModel->limit) == 75 ? 'selected' : ''?>>75</option>
                <option value="100" <?=intval($searchModel->limit) == 100 ? 'selected' : ''?>>100</option>
            </select>
        </div>
    </div>
    <div class="col-xs-12"><hr></div>
</div>