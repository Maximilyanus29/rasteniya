<div class="container">
    <div class="row">
        <div id="content" class="col-sm-12">
<!--            <div id="banner0" class="owl-carousel owl-theme" style="opacity: 1; display: block;">-->
<!--                <div class="owl-wrapper-outer">-->
<!--                    <div class="owl-wrapper" style="width: 4560px; left: 0px; display: block; transition: all 0ms ease 0s; transform: translate3d(0px, 0px, 0px); transform-origin: 570px center; perspective-origin: 570px center;">-->
<!--                        <div class="owl-item" style="width: 1140px;">-->
<!--                            <div class="item">-->
<!--                                <a href="http://stariyoscol.voodland.com/semena/semena-eli-evropeiskoi">-->
<!--                                    <img src="/images/_ели европейской 9000 р.-1600x400.png" alt="Семена ели европейской 9000 р." class="img-responsive">-->
<!--                                </a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="owl-item" style="width: 1140px;">-->
<!--                            <div class="item">-->
<!--                                <a href="http://stariyoscol.voodland.com/semena/semena-sosny-obyknovennoj-">-->
<!--                                    <img src="/images/_сосны обыкновенной 9000 р.-1600x400.png" alt="Семена сосны обыкновенной 9000 р." class="img-responsive">-->
<!--                                </a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->



            <div class="row categorywall covers">
                <?php foreach ($categories as $category) : ?>
                <div class="product-layout-1" style="float:left;width:290px;padding:0 10px">
                    <div class="categorywall_thumbnail product-thumb">
                        <!--noindex-->
                        <div class="image">
                            <a rel="nofollow" href="/category/<?=$category['slug'] ?>">
                                <img class="img-responsive" src="<?= $categoriesAr[$category['id']]->getImage()->getUrl('200x200') ?>" alt="<?=$category['name'] ?> (<?=$category['count'] ?>)"></a>
                        </div><!--/noindex-->
                        <h4 style="padding-left:10px">
                            <a class="category_name" href="/category/<?=$category['slug'] ?>"><?=$category['name'] ?> <?=$category['count'] != 0 ? "(" . $category['count'] . ")" : ""?></a></h4>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>


            <div>
                <p class="MsoNormal" align="center"
                   style="margin-bottom: 6.4pt; text-align: center; line-height: normal;"><b>
                        <span lang="EN-US" style="font-size: 15pt; font-family: Arial, sans-serif;">Voodland</span>
                    </b><b><span style="font-size: 15pt; font-family: Arial, sans-serif;">.</span>
                    </b><b><span lang="EN-US" style="font-size: 15pt; font-family: Arial, sans-serif;">com</span>
                    </b><b><span lang="EN-US" style="font-size: 15pt; font-family: Arial, sans-serif;">&nbsp;</span>
                    </b><b><span style="font-size: 15pt; font-family: Arial, sans-serif;">– выбор и покупка растений от проверенных поставщиков</span>
                    </b></p><p class="MsoNormal" style="margin-bottom: 6.4pt; line-height: normal;"><span style="font-size: 10.5pt; font-family: Arial, sans-serif;">Где купить растения&nbsp;</span>
                    <span style="font-family: Arial, sans-serif; font-size: 14px;">действительно качественные здоровые</span>
                    <span style="font-family: Arial, sans-serif; font-size: 10.5pt;">, при этом выбрав нужный размер самого растения по приемлемой цене? Это волнует каждого покупателя согласитесь? Конечно можно отправиться в питомник, садовый центр или выбрать растения онлайн и купить в интернете или же побывать на специализированных ярмарках и выставках, выбрать и купить понравившееся растение там.</span></p><p class="MsoNormal" style="margin-bottom: 6.4pt; line-height: normal;"><span style="font-size: 10.5pt; font-family: Arial, sans-serif;"><br></span><b><span lang="EN-US" style="font-size: 10.5pt; font-family: Arial, sans-serif;">Voodland</span></b><b><span style="font-size: 10.5pt; font-family: Arial, sans-serif;">.</span></b><b><span lang="EN-US" style="font-size: 10.5pt; font-family: Arial, sans-serif;">com</span></b><b><span lang="EN-US" style="font-size: 10.5pt; font-family: Arial, sans-serif;">&nbsp;</span></b><span style="font-size: 10.5pt; font-family: Arial, sans-serif;">– это платформа созданная для всех кто так или иначе связан с "зеленой индустрией", объединяющая в себе предложения от поставщиков посадочного материала, которых мы в буквальном смысле отбираем прежде чем разметить их предложения на нашем сайте. Мы на собственном опыте, накопленном уже в течение 7-ми лет на рынке дистанционной торговли посадочным материалом, узнали какие вопросы и проблемы волнуют покупателей и поставщиков в "зеленой индустрии" при взаимодействии друг с другом во время продажи/покупки посадочного материала и постарались упростить это самое взаимодействие, забирая на себя риски для сторон.&nbsp;</span><span style="font-family: Arial, sans-serif; font-size: 10.5pt;">Мы продолжаем улучшать наш сервис и критерии отбора для каждого поставщика при этом упрощая процесс формирования и оплаты заказов и их доставку, улучшая качество посадочного материала, который мы предлагаем в каталоге нашего сайта покупателям.&nbsp;</span><span style="font-family: Arial, sans-serif; font-size: 10.5pt;">У нас вы сможете найти, выбрать и купить растения как редкие так и видовые для лесовосстановления и озеленения дворовых и промышленных территорий.</span></p><p class="MsoNormal" style="margin-bottom: 6.4pt; line-height: normal;"><span style="font-family: Arial, sans-serif; color: inherit; font-size: 15px;">Подходя к своему делу ответственно и осознавая хрупкость и уязвимость нашего товара мы знаем как ускорить получение целыми и невредимыми заказов нашими покупателями, обеспечивая постоянно высокое качество посадочного материала, достаточно стабильные рыночные цены и гарантируя отсутствие рисков для каждой из сторон сделки.&nbsp;&nbsp;<br></span><span style="font-family: Arial, sans-serif; font-size: 15px;"><b>Благодарим вас за доверие к нам мы постараемся оправдать ваш выбор!&nbsp;</b></span></p><h1 style="text-align: center;"></h1></div>

        </div>
    </div>


</div>



<div class="custom_footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <img src="/images/_без названия.png" title="Voodland.com" alt="Voodland.com" class="logo img-responsive">  Выбор и покупка растений от проверенных поставщиков.</div>
            <div class="col-sm-3">
                <ul class="list-unstyled">
                    <li><i class="fa fa-phone"></i> +7 (930) 086-74-11</li>      <li><i class="fa fa-envelope"></i> mail@voodland.com</li>  <li><i class="fa fa-home"></i> Россия, Белгородская область,  г. Старый Оскол, улица 8 Марта, 63; </li>    <li class="footer-time"><i class="fa fa-clock-o fa-lg"></i> </li>
                    <li>ежедневно с 10:00 до 20:00 </li>
                    <li class="social">
                        <a target="_blank" href="https://vk.com/voodland_com"><i class="fa fa-vk"></i></a>	   <a target="_blank" href="https://www.facebook.com/groups/voodland/"><i class="fa fa-facebook"></i></a>	   <a target="_blank" href="https://plus.google.com/u/0/113864339348089920891/"><i class="fa fa-google-plus"></i></a>	   <a target="_blank" href="https://www.youtube.com/channel/UCa4vUA3Sd3fGJhD8_Bwsz8w"><i class="fa fa-youtube"></i></a>	     </li>
                </ul>
            </div>
            <div class="col-sm-6">
                <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A3f6037a1333a2c3c4069f55fab86fb419d2601a76c6dea3fe2a5c468d3296af7&amp;source=constructor" width="500" height="400" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>