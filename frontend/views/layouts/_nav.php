<nav id="top">
    <div class="container">
        <div class="pull-right">
            <div id="account" class="btn-group">
                <button class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-user"></i>
                    <span class="hidden-xs">Личный кабинет</span>
                    <i class="fa fa-caret-down"></i>
                </button>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="http://voodland.com/index.php?route=account/register">Регистрация</a></li>
                    <li><a href="http://voodland.com/index.php?route=account/login">Авторизация</a></li>
                </ul>
            </div>
        </div>
        <div class="pull-right">
            <form action="http://voodland.com/index.php?route=common/language/language" method="post"
                  enctype="multipart/form-data" id="language">
                <div class="btn-group">
                    <button class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-globe" aria-hidden="true" title="Russian"></i>
                        <span class="hidden-xs">Язык</span> <i class="fa fa-caret-down"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a data-code="ru-ru"><img src="/images/ru-ru.png" alt="Russian" title="Russian">Russian</a>
                        </li>
                        <li>
                            <a data-code="en-gb"><img src="/images/en-gb.png" alt="English" title="English">English</a>
                        </li>
                    </ul>
                </div>
                <input type="hidden" name="code" value="">
                <input type="hidden" name="redirect" value="http://voodland.com/">
            </form>
        </div>
        <div class="pull-right">
            <form action="http://voodland.com/index.php?route=common/currency/currency" method="post"
                  enctype="multipart/form-data" id="currency">
                <div class="btn-group">
                    <button class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                        <span>р.</span>
                        <span class="hidden-xs">Валюта</span> <i class="fa fa-caret-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a data-code="EUR">€ Euro</a></li>
                        <li><a data-code="GBP">£ Pound Sterling</a></li>
                        <li><a data-code="USD">$ US Dollar</a></li>
                        <li><a data-code="RUB">р. Рубль</a></li>
                    </ul>
                </div>
                <input type="hidden" name="code" value="">
                <input type="hidden" name="redirect" value="http://voodland.com/">
            </form>
        </div>
        <div id="top-links" class="hidden-xs hidden-sm">
            <ul>
                <li>
                    <div class="prmn-cmngr">
                        <div class="prmn-cmngr__content">
                            <div class="prmn-cmngr__title">
                                <span class="prmn-cmngr__title-text"></span>
                                <a class="prmn-cmngr__city">
                                    <span class="glyphicon glyphicon-map-marker fa fa-map-marker"></span>
                                    <span class="prmn-cmngr__city-name">Ростов-на-Дону</span>
                                </a>
                            </div>
                            <div class="prmn-cmngr__confirm" style="display: none;">
                                Ваш город — <span class="prmn-cmngr__confirm-city">Ростов-на-Дону</span>?
                                <div class="prmn-cmngr__confirm-btns">
                                    <input class="prmn-cmngr__confirm-btn btn btn-primary" value="Да" type="button"
                                           data-value="yes" data-redirect="http://opt.voodland.com/">
                                    <input class="prmn-cmngr__confirm-btn btn" value="Нет" type="button"
                                           data-value="no">
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li><a href="http://voodland.com/o-kompanii" title="О компании">О компании</a></li>
                <li><a href="http://voodland.com/index.php?route=information/information&amp;information_id=5"
                       title="Условия соглашения">Условия соглашения</a></li>
                <li><a href="http://opt.voodland.com/" title="Купить оптом">Купить оптом</a></li>
                <li><a href="http://voodland.com/index.php?route=blog/latest" title="Статьи">Статьи</a></li>

            </ul>
        </div>
        <div id="top-links2" class="btn-group pull-left visible-xs visible-sm">
            <button class="btn btn-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-info"></i> <i
                        class="fa fa-caret-down"></i></button>
        </div>
    </div>
</nav>