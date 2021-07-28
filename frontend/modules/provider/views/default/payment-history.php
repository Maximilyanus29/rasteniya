<div class="container">
    <ul class="breadcrumb">
        <li><a href="http://opt.voodland.com/"><i class="fa fa-home"></i></a></li>
        <li><a href="http://opt.voodland.com/index.php?route=account/account">Личный кабинет</a></li>
    </ul>
    <div class="row">									<div id="content" class="col-sm-9">			<h3 class="heading"><span>Моя учетная запись</span></h3>
            <ul class="list-unstyled">
                <li><a href="/user/default/change-user-data">Изменить контактную информацию</a></li>
                <li><a href="/user/default/change-password">Изменить свой пароль</a></li>
            </ul>
            <h3 class="heading"><span>Мои заказы</span></h3>
            <ul class="list-unstyled">
                <li><a href="/user/default/order-history">История заказов</a></li>
                <li><a href="http://opt.voodland.com/index.php?route=account/download">Файлы для скачивания</a></li>
                <!--                <li><a href="http://opt.voodland.com/index.php?route=account/return">Запросы на возврат</a></li>-->
                <li><a href="/user/default/payment-history">История фин. операций</a></li>
            </ul>

        </div>
        <?= $this->render('_aside') ?>
    </div>
</div>