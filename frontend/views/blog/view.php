<div class="container" itemscope="" itemtype="http://schema.org/Article">
    <ul class="breadcrumb ">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li><a href="/blog">Статьи</a></li>
        <li><a href="/blog/<?= $article->slug ?>"><?= $article->name ?></a></li>
    </ul>
    <div class="row">
        <?= $this->render('_aside') ?>

        <div id="content" class="blog_article col-sm-8 col-md-8 col-lg-9">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="heading"><span itemprop="headline"><?= $article->name ?></span></h1>
                    <div class="article row">
                        <div class="col-xs-12" style="margin-bottom:20px;">
                            <div class="row" style="margin:0;">
                                <div class="description">
                                    <div itemprop="articleBody">
                                        <p><?= $article->text ?></p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 text-left">
                                    <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"
                                            charset="utf-8"></script>
                                    <script type="text/javascript" src="//yastatic.net/share2/share.js"
                                            charset="utf-8"></script>
                                    <div class="ya-share2 ya-share2_inited"
                                         data-services="vkontakte,facebook,odnoklassniki,gplus,twitter,viber,whatsapp"
                                         data-counter="">
                                        <div class="ya-share2__container ya-share2__container_size_m ya-share2__container_color-scheme_normal ya-share2__container_shape_normal">
                                            <ul class="ya-share2__list ya-share2__list_direction_horizontal">
                                                <li class="ya-share2__item ya-share2__item_service_vkontakte"><a
                                                            class="ya-share2__link"
                                                            href="https://vk.com/share.php?url=http%3A%2F%2Fopt.voodland.com%2Fblog-voodland%2Fpomogite-nam-stat-luchshe%2521%2521%2521&amp;title=%D0%9E%D0%BF%D1%80%D0%BE%D1%81&amp;utm_source=share2"
                                                            rel="nofollow noopener" target="_blank"
                                                            title="ВКонтакте"><span class="ya-share2__badge"><span
                                                                    class="ya-share2__icon"></span></span><span
                                                                class="ya-share2__title">ВКонтакте</span></a></li>
                                                <li class="ya-share2__item ya-share2__item_service_facebook"><a
                                                            class="ya-share2__link"
                                                            href="https://www.facebook.com/sharer.php?src=sp&amp;u=http%3A%2F%2Fopt.voodland.com%2Fblog-voodland%2Fpomogite-nam-stat-luchshe%2521%2521%2521&amp;title=%D0%9E%D0%BF%D1%80%D0%BE%D1%81&amp;utm_source=share2"
                                                            rel="nofollow noopener" target="_blank"
                                                            title="Facebook"><span class="ya-share2__badge"><span
                                                                    class="ya-share2__icon"></span></span><span
                                                                class="ya-share2__title">Facebook</span></a></li>
                                                <li class="ya-share2__item ya-share2__item_service_odnoklassniki"><a
                                                            class="ya-share2__link"
                                                            href="https://connect.ok.ru/offer?url=http%3A%2F%2Fopt.voodland.com%2Fblog-voodland%2Fpomogite-nam-stat-luchshe%2521%2521%2521&amp;title=%D0%9E%D0%BF%D1%80%D0%BE%D1%81&amp;utm_source=share2"
                                                            rel="nofollow noopener" target="_blank"
                                                            title="Одноклассники"><span class="ya-share2__badge"><span
                                                                    class="ya-share2__icon"></span></span><span
                                                                class="ya-share2__title">Одноклассники</span></a></li>
                                                <li class="ya-share2__item ya-share2__item_service_twitter"><a
                                                            class="ya-share2__link"
                                                            href="https://twitter.com/intent/tweet?text=%D0%9E%D0%BF%D1%80%D0%BE%D1%81&amp;url=http%3A%2F%2Fopt.voodland.com%2Fblog-voodland%2Fpomogite-nam-stat-luchshe%2521%2521%2521&amp;utm_source=share2"
                                                            rel="nofollow noopener" target="_blank"
                                                            title="Twitter"><span class="ya-share2__badge"><span
                                                                    class="ya-share2__icon"></span></span><span
                                                                class="ya-share2__title">Twitter</span></a></li>
                                                <li class="ya-share2__item ya-share2__item_service_viber"><a
                                                            class="ya-share2__link"
                                                            href="viber://forward?text=%D0%9E%D0%BF%D1%80%D0%BE%D1%81%20http%3A%2F%2Fopt.voodland.com%2Fblog-voodland%2Fpomogite-nam-stat-luchshe%2521%2521%2521&amp;utm_source=share2"
                                                            rel="nofollow" target="_blank" title="Viber"><span
                                                                class="ya-share2__badge"><span
                                                                    class="ya-share2__icon"></span></span><span
                                                                class="ya-share2__title">Viber</span></a></li>
                                                <li class="ya-share2__item ya-share2__item_service_whatsapp"><a
                                                            class="ya-share2__link"
                                                            href="https://api.whatsapp.com/send?text=%D0%9E%D0%BF%D1%80%D0%BE%D1%81%20http%3A%2F%2Fopt.voodland.com%2Fblog-voodland%2Fpomogite-nam-stat-luchshe%2521%2521%2521&amp;utm_source=share2"
                                                            rel="nofollow noopener" target="_blank"
                                                            title="WhatsApp"><span class="ya-share2__badge"><span
                                                                    class="ya-share2__icon"></span></span><span
                                                                class="ya-share2__title">WhatsApp</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="posted col-xs-12 col-sm-6 text-right"></div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12" style="margin-bottom:20px;">
                            <h3 class="heading">
                                <span>Написать отзыв</span></h3>
                            <div id="review">
                                <table class="review_list table table-striped table-bordered">
                                    <tbody>
                                    <tr>
                                        <td style="width:30%;"><i class="fa fa-user" aria-hidden="true"></i><span
                                                    itemprop="creator">Денис</span></td>
                                        <td style="width:30%;">
                                            <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            </div>
                                        </td>
                                        <td class="text-right">13.02.2019</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div class="comment">
                                                Все хорошо,в хотелось бы дополнительно с приобретенной покупкой получить
                                                консультации (разовые-бесплатные) по условиям посадки и по условиям
                                                содержания дальнейшего-хотя бы краткие(на почту.консультаци останется ,
                                                не забудется ).Спасибо
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="text-right"></div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary" onclick="$('#form-review').slideToggle();">Написать
                                    отзыв
                                </button>
                            </div>
                            <form class="form-horizontal" id="form-review">
                                <div class="rev_form well well-sm">
                                    <div class="form-group required">
                                        <div class="col-sm-12">
                                            <label class="control-label" for="input-name">Ваше Имя:</label>
                                            <input type="text" name="name" value="" id="input-name"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="col-sm-12">
                                            <label class="control-label" for="input-review">Ваш отзыв:</label>
                                            <textarea name="text" rows="5" id="input-review"
                                                      class="form-control"></textarea>
                                            <div class="help-block"><span style="color: #FF0000;">Внимание:</span> HTML
                                                не поддерживается! Используйте обычный текст.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="col-sm-12">
                                            <label class="control-label">Оценка:</label>
                                            <div class="review_star">
                                                <input type="radio" name="rating" value="1">
                                                <input type="radio" name="rating" value="2">
                                                <input type="radio" name="rating" value="3">
                                                <input type="radio" name="rating" value="4">
                                                <input type="radio" name="rating" value="5">
                                                <div class="stars">
                                                    <i class="far fa-star"></i><i class="far fa-star"></i><i
                                                            class="far fa-star"></i><i class="far fa-star"></i><i
                                                            class="far fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right clearfix">
                                        <button type="button" id="button-review" data-loading-text="Загрузка..."
                                                class="btn btn-primary">Написать отзыв
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>