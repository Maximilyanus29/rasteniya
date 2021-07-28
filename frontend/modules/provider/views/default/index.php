
<!--<h3 class="heading"><span>Моя учетная запись</span></h3>
<ul class="list-unstyled">
    <li><a href="/user/default/change-user-data">Изменить контактную информацию</a></li>
    <li><a href="/user/default/change-password">Изменить свой пароль</a></li>
</ul>-->
<h3 class="heading"><span>Мои заказы</span></h3>
<ul class="list-unstyled">
    <li><a href="/provider/default/order-list">История заказов</a></li>
    <!--                <li><a href="http://opt.voodland.com/index.php?route=account/return">Запросы на возврат</a></li>-->
<!--    <li><a href="/user/default/payment-history">История фин. операций</a></li>-->
</ul>

<?php if (!empty(Yii::$app->user->identity->provider)) : ?>
    <h3 class="heading"><span>Мои Магазин</span></h3>
    <ul class="list-unstyled">
        <li><a href="/user/shop/good-list">Мои товары</a></li>
    </ul>
<?php endif; ?>

