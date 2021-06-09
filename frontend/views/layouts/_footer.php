<div class="clear container"></div>


<!--<div id="subscribe">-->
<!--    <form name="subscribe" class="container">-->
<!--        <div class="row">-->
<!--            <div class="subscribe-info col-sm-3 col-md-3">-->
<!--                Подпишитесь на наши новости!<br>Новинки, скидки, предложения!			</div>-->
<!--            <div class="subscribe-input col-sm-6 col-md-6">-->
<!--                <div class="email">-->
<!--                    <input type="text" name="email" value="" placeholder="Введите ваш e-mail" class="form-control">-->
<!--                </div>-->
<!--                <div class="pass">-->
<!--                    <input type="password" name="password" value="" placeholder="Введите ваш пароль" disabled="disabled" class="form-control">-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="subscribe-button col-sm-3 col-md-3">-->
<!--                <button type="button" class="btn btn-block" data-loading-text="Загрузка..."><i class="fa fa-envelope hidden-sm"></i> <span>Оформить подписку</span></button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </form>-->
<!--</div>-->














<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <h5 class="heading"><i class="fa fa-info"></i><span>Информация</span></h5>
                <ul class="list-unstyled">
                    <li><a href="/good/sale"><i class="fa fa-chevron-right"></i>Акции</a></li>
                    <li><a href="/page/contacts"><i class="fa fa-chevron-right"></i>Контакты</a></li>
                    <li><a href="/page/about"><i class="fa fa-chevron-right"></i>О компании</a></li>
                    <li><a href="/page/policy"><i class="fa fa-chevron-right"></i>Политика конфиденциальности</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-3">
                <hr class="visible-xs">
                <h5 class="heading"><i class="fa fa-shield-alt"></i>
                    <span>Служба поддержки</span></h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="/page/support">
                            <i class="fa fa-chevron-right"></i>Служба поддержки</a>
                    </li>
                </ul>
            </div>
            <div class="clearfix visible-sm"></div>
            <div class="col-sm-6 col-md-3">
                <hr class="visible-xs visible-sm">
                <h5 class="heading"><i class="fa fa-thumbtack"></i><span>Дополнительно</span></h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="/page/cooperation"><i class="fa fa-chevron-right"></i>Сотрудничество</a></li>
                    <li>
                        <a href="https://ru.jooble.org/%D1%80%D0%B0%D0%B1%D0%BE%D1%82%D0%B0-%D1%81%D0%B0%D0%B4%D0%BE%D0%B2%D0%BD%D0%B8%D0%BA-%D1%81-%D0%BF%D1%80%D0%BE%D0%B6%D0%B8%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5%D0%BC">							<i class="fa fa-chevron-right"></i>Вакансии для садовников						</a>					</li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-3">
                <hr class="visible-xs visible-sm">
                <h5 class="heading"><i class="fa fa-thumbtack"></i><span>Дополнительно</span></h5>
                <ul class="list-unstyled">
                    <li><a href="/user/default/signup">Регистрация</a></li>
                    <li><a href="/user/default/login">Авторизация</a></li>
                </ul>


            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="socials">
                    <a href="https://vk.com/voodland_com" target="_blank" title=""><i class="fab fa-vk"></i></a>
                    <a href="https://ok.ru/profile/556667576794" target="_blank" title=""><i class="fab fa-odnoklassniki"></i></a>
                    <a href="https://www.instagram.com/voodland_com/" target="_blank" title=""><i class="fab fa-instagram"></i></a>
                    <a href="https://www.facebook.com/voodland" target="_blank" title=""><i class="fab fa-facebook"></i></a>
                </div>
            </div>
            <div class="col-sm-12  col-md-6">
                <hr class="visible-xs visible-sm">
                <div class="payments">
                    <img src="/images/visa.png" alt="visa">
                    <img src="/images/master.png" alt="master">
                    <img src="/images/yandex.png" alt="yandex">
                    <img src="/images/sberbank.png" alt="sberbank">
                    <img src="/images/alfa.png" alt="alfa">
                    <img src="/images/paypal.png" alt="paypal">
                    <img src="/images/vtb24.png" alt="vtb24">
                    <img src="/images/western-union.png" alt="western-union">
                </div>
            </div>
        </div>
    </div>
</footer>




<script>
    $(function() {

        $('#uni-notification .btn-primary').on('click', function() {
            $.ajax({
                url:'index.php?route=extension/module/uni_notification/apply',
                type:'post',
                data:{'flag':true},
                dataType:'json',
                success: function(json) {
                    if(json['success']){
                        notificationClose();
                    }
                }
            });
        });

        $('#uni-notification .btn-default').on('click', function() {
            window.close();
        });

        function notificationClose() {
            $('#uni-notification').addClass('remove');
        }
    });
</script>

<div class="fly_callback" onclick="callback()" title="Заказ звонка" data-toggle="tooltips"><i class="fa fa-phone" aria-hidden="true"></i></div>
