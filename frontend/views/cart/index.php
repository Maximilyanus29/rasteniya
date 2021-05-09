<div id="unicheckout" class="checkout_form container">
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumbs">
                <ul class="breadcrumb">
                    <li><a href="http://opt.voodland.com/"><i class="fa fa-home"></i></a></li>
                    <li><a href="http://opt.voodland.com/index.php?route=checkout/uni_unicheckout">Оформление заказа</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="error"></div>
    <h1 class="heading"><span>Оформление заказа</span></h1>
    <div class="row">
        <div class="col-xs-12">
            <div id="unicart">
                <div class="table_wrap">
                    <table class="table table-bordered table-hover table-responsive">
                        <tbody><tr>
                            <td class="image text-center">Изображение</td>
                            <td class="text-left">Название товара</td>
                            <td class="text-left hidden-xs">Код товара</td>
                            <td class="quantity text-left">Количество</td>
                            <td class="text-right hidden-xs">Цена за единицу товара</td>
                            <td class="total text-right">Всего</td>
                            <td class="delete text-center"></td>
                        </tr>
                        <?php if ($cart->getTotalCount() > 0 ) : ?>
                        <?php foreach ($cart->getItemIds() as $item) :
                            $item = $cart->getItem($item);
                            $product = $item->getProduct()
                            ?>
                            <tr data-id="<?= $product->id ?>">
                                <td class="image text-center">
                                    <img src="http://opt.voodland.com/image/cache/catalog/semena/Sosna%20/%20%D1%81%D0%BE%D1%81%D0%BD%D1%8B%20%D1%81%20%D0%BB%D0%BE%D0%B3%D0%BE%203-47x47.png" class="img-thumbnail" title="Семена сосны обыкновенной "></td>
                                <td class="name text-left">
                                    <a href="http://opt.voodland.com/semena/semena-sosny-obyknovennoj-"><?= $product->name ?> </a>
                                    <br><small><?= substr($product->description,0, 18)  ?></small>
                                </td>
                                <td class="text-left hidden-xs"><?= $product->vendor_code ?></td>
                                <td class="quantity text-left">
                                    <div class="input-group">
                                        <input type="text" name="quantity" value="<?= $item->getQuantity() ?>" class="form-control">
                                        <span>
								<i class="fa fa-plus btn btn-default" ></i>
								<i class="fa fa-minus btn btn-default" ></i>
							</span>
                                    </div>
                                </td>
                                <td class="text-right hidden-xs"><?= $product->price ?>р.</td>
                                <td class="total text-right"><?= $product->price * $item->getQuantity() ?>р.</td>
                                <td class="delete text-center">
                                    <button type="button" title="Удалить" >
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>


                        <?php endforeach;?>
                        <?php else: ?>
                        <p>Корзина пуста</p>
                        <?php endif; ?>

                        </tbody>
                    </table>
                </div>
                <table class="total_table">
                    <tbody>
<!--                    <tr>-->
<!--                        <td colspan="6" class="text-right  hidden-xs">Вес товаров в корзине: </td>-->
<!--                        <td colspan="3" class="text-right  visible-xs">Вес товаров в корзине: </td>-->
<!--                        <td>3000.00кг</td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td colspan="6" class="text-right  hidden-xs">Итого:</td>-->
<!--                        <td colspan="3" class="text-right  visible-xs">Итого:</td>-->
<!--                        <td class="text-right">31213.44р.</td>-->
<!--                    </tr>-->
                        <tr class="delivery">
                            <td colspan="6" class="text-right  hidden-xs">Доставка Курьером - Доставка осуществляется собственным курьером интернет-магазина www.voodland.com или работающим по договору с интернет-магазином курьером. Стоимость доставки оговаривается по телефону, указанному в разделе "Контакты".* Стоимость доставки может быть включена в сумму заказа или оплачивается при получении, по договоренности.:</td>
                            <td colspan="3" class="text-right  visible-xs">Доставка Курьером - Доставка осуществляется собственным курьером интернет-магазина www.voodland.com или работающим по договору с интернет-магазином курьером. Стоимость доставки оговаривается по телефону, указанному в разделе "Контакты".* Стоимость доставки может быть включена в сумму заказа или оплачивается при получении, по договоренности.:</td>
                            <td class="text-right">0.00р.</td>
                        </tr>
                        <tr class="total">
                            <td colspan="6" class="text-right  hidden-xs">Всего:</td>
                            <td colspan="3" class="text-right  visible-xs">Всего:</td>
                            <td class="text-right"><?= $cart->getTotalCost() ?>р.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="checkout_data">
        <form id="user" class="row">
            <div class="col-md-6">
                <div class="user_data row">
                    <div class="col-md-12">
                        <h3 class="heading"><span>Контактные данные</span></h3>
                    </div>
                    <div class="form-group required col-xs-6">
                        <input type="text" name="firstname" value="csdfghj" placeholder="Ваше имя" class="form-control">
                    </div>
                    <div class="form-group required hide col-xs-6">
                        <input type="text" name="lastname" value="resrgdhtfjyghj" placeholder="Ваша фамилия" class="form-control">
                    </div>
                    <div class="form-group required  col-xs-6">
                        <input type="email" name="email" value="admin@admin.adminsa" placeholder="Ваш e-mail" class="form-control">
                    </div>
                    <div class="form-group required  col-xs-12">
                        <input type="tel" name="telephone" value="2235467543" placeholder="Контактный телефон" class="form-control">
                    </div>

                    <input type="hidden" name="fax" value="">
                </div>
                <div class="row ">
                </div>
                <div class="row">
                    <div class="payment_address col-xs-12"><div>
                            <h3 class="heading"><span>Адрес доставки</span></h3>

                            <div class="radio">
                                <label class="input"><input type="radio" name="address" value="existing" checked="checked" onclick="$('#payment-address-new').hide();" id="payment_address"><span></span><span>Я хочу использовать существующий адрес</span></label>
                            </div>
                            <div id="payment-existing">
                                <select name="address_id" class="form-control">
                                    <option value="126" selected="selected">csdfghj resrgdhtfjyghj, asgdhfdgf, Сковородино, Брест, Белоруссия (Беларусь)</option>
                                </select>
                            </div>
                            <div class="radio">
                                <label class="input"><input type="radio" name="address" value="new" onclick="$('#payment-address-new').show();" id="new_payment_address"><span></span><span>Я хочу использовать новый адрес</span></label>
                            </div>
                            <div class="row">
                                <div id="payment-address-new" style="display:none">
                                    <input type="hidden" name="company" value="">
                                    <input type="hidden" name="company_id" value="">
                                    <input type="hidden" name="tax_id" value="">

                                    <div class="form-group required  col-md-6">
                                        <select name="zone_id" id="input-payment-zone" class="form-control" onchange="update_checkout();">
                                            <option value=""></option>

                                            <option value="338">Гомель</option>
                                        </select>
                                    </div>
                                    <div class="form-group required  col-xs-6">
                                        <input type="text" name="city" value="Сковородино" placeholder="Город" id="input-payment-city" class="form-control">
                                    </div>
                                    <div class="form-group required  col-xs-6">
                                        <input type="text" name="postcode" value="" placeholder="Индекс" id="input-payment-postcode" class="form-control">
                                    </div>
                                    <div class="address form-group hide col-xs-12">
                                        <input type="text" name="address_1" value="asgdhfdgf" placeholder="Ваш адрес" id="input-payment-address-1" class="form-control">
                                    </div>
                                    <div class="form-group hide col-xs-12">
                                        <input type="text" name="address_2" value="308000, Белгород, Народный бульвар 101/35, Логоша Сергей Игорьевич" placeholder="Ваш адрес, продолжнение" id="input-payment-address-2" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 visible-xs visible-sm" style="height:20px"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="shipping_wrap"><h3 class="heading"><span>Cпособы доставки</span></h3>
                    <div class="shipping-method">
                        <div class="radio">
                            <label class="input">
                                <input type="radio" name="shipping_method" value="xshipping.xshipping1" id="xshipping.xshipping1" checked="checked">
                                <span></span>
                                <span><span class="method">Доставка Курьером - Доставка осуществляется собственным курьером интернет-магазина www.voodland.com или работающим по договору с интернет-магазином курьером. Стоимость доставки оговаривается по телефону, указанному в разделе "Контакты".* Стоимость доставки может быть включена в сумму заказа или оплачивается при получении, по договоренности.:</span><span class="method">0.00р.</span></span>
                            </label>
                        </div>
                        <div class="radio">
                            <label class="input">
                                <input type="radio" name="shipping_method" value="xshipping.xshipping2" id="xshipping.xshipping2">
                                <span></span>
                                <span><span class="method">Попутный груз- Доставка осуществляется попутным автотранспортом. Сроки доставки и оплата при выборе данного вида доставки оговариваются дополнительно с сотрудниками нашей компании по телефону и почте указанными в разделе "Контакты".* Оплата за доставку производится при получении заказа или включается в сумму заказа по договоренности.:</span><span class="method">0.00р.</span></span>
                            </label>
                        </div>
                        <div class="radio">
                            <label class="input">
                                <input type="radio" name="shipping_method" value="xshipping.xshipping3" id="xshipping.xshipping3">
                                <span></span>
                                <span><span class="method">Доставка транспортной компанией- Доставка заказов осуществляется ТК "ПЭК». Точная стоимость доставки будет известна непосредственно после отправки заказа. Доставка производится до терминала ТК, если он есть в Вашем городе или осуществляется по указанному Вами адресу, до порога входной двери, либо до первого непреодолимого препятствия. * Доставка оплачивается при получении заказа, согласно тарифам перевозчика. Стоимость доставки до терминала ТК:</span><span class="method">100.00р.</span></span>
                            </label>
                        </div>
                        <div class="radio">
                            <label class="input">
                                <input type="radio" name="shipping_method" value="xshipping.xshipping5" id="xshipping.xshipping5">
                                <span></span>
                                <span><span class="method">EMS- При выборе данного вида доставки есть ограничения по весу - (до 31,5 кг) и размерам: высота - (до 1 м), ширина - (до 1м). Просим Вас учитывать размеры растений, которые мы можем отправить почтой! При отправке данным способом предусмотрена дополнительная плата - 100 рублей при высоте растений до 50 см и 150 рублей при высоте растений от 50 до 100 см (стоимость тары и доставка до почтового отделения), которая будет включена в сумму заказа. После того как нам поступит Ваш заказ мы проверим возможность доставки почтой растений, которые Вы выбрали, рассчитаем стоимость услуги и ответим, сообщим Вам в течение 2-х дней.* Расходы на пересылку включаются в наложенный платеж. Стоимость доставки заказа в отделение EMS:</span><span class="method">100.00р.</span></span>
                            </label>
                        </div>
                        <div class="radio">
                            <label class="input">
                                <input type="radio" name="shipping_method" value="xshipping.xshipping6" id="xshipping.xshipping6">
                                <span></span>
                                <span><span class="method">Доставка транспортной компанией- Доставка заказов осуществляется ТК "DPD". Точная стоимость доставки будет известна непосредственно после отправки заказа. Доставка производится до терминала транспортной компании, если он есть в Вашем городе или осуществляется по указанному Вами адресу, до порога входной двери, либо до первого непреодолимого препятствия. * Доставка оплачивается при получении заказа, согласно тарифам перевозчика. Стоимость доставки до терминала транспортной компании:</span><span class="method">100.00р.</span></span>
                            </label>
                        </div>
                        <div class="radio">
                            <label class="input">
                                <input type="radio" name="shipping_method" value="xshipping.xshipping7" id="xshipping.xshipping7">
                                <span></span>
                                <span><span class="method">Доставка транспортной компанией- Доставка заказов осуществляется ТК "КИТ". Точная стоимость доставки будет известна непосредственно после отправки заказа. Доставка производится до терминала транспортной компании, если он есть в Вашем городе или осуществляется по указанному Вами адресу, до порога входной двери, либо до первого непреодолимого препятствия. * Доставка оплачивается при получении заказа, согласно тарифам перевозчика. Стоимость доставки до терминала ТК (транспортная компания находится в другом городе):</span><span class="method">400.00р.</span></span>
                            </label>
                        </div>
                        <div class="radio">
                            <label class="input">
                                <input type="radio" name="shipping_method" value="xshipping.xshipping8" id="xshipping.xshipping8">
                                <span></span>
                                <span><span class="method">Доставка транспортной компанией- Доставка заказов осуществляется ТК "Энергия". Точная стоимость доставки будет известна непосредственно после отправки заказа. Доставка производится до терминала транспортной компании, если он есть в Вашем городе или осуществляется по указанному Вами адресу, до порога входной двери, либо до первого непреодолимого препятствия. * Доставка оплачивается при получении заказа, согласно тарифам перевозчика. Стоимость доставки до терминала ТК (транспортная компания находится в другом городе):</span><span class="method">400.00р.</span></span>
                            </label>
                        </div>
                        <div class="radio">
                            <label class="input">
                                <input type="radio" name="shipping_method" value="xshipping.xshipping9" id="xshipping.xshipping9">
                                <span></span>
                                <span><span class="method">Доставка заказов осуществляется курьерской службой "СДЭК». Точная стоимость доставки будет известна непосредственно после отправки заказа. Доставка производится до склада курьерской службы, если он есть в Вашем городе или осуществляется по указанному Вами адресу, до порога входной двери, либо до первого непреодолимого препятствия. * Доставка оплачивается при получении заказа, согласно тарифам курьерской службы: http://www.edostavka.ru. :</span><span class="method">0.00р.</span></span>
                            </label>
                        </div>
                        <div class="radio">
                            <label class="input">
                                <input type="radio" name="shipping_method" value="pickup.pickup" id="pickup.pickup">
                                <span></span>
                                <span><span class="method">Самовывоз из магазина:</span><span class="method">0.00р.</span></span>
                            </label>
                        </div>
                    </div></div>
                <div class="payment_wrap"><h3 class="heading"><span>Cпособы оплаты</span></h3>
                    <div class="payment-method">
                        <div class="alert alert-warning"><i class="fa fa-exclamation-circle"></i> Оплата по данному адресу невозможна. Пожалуйста, <a href="http://opt.voodland.com/contacts/">свяжитесь с нами</a> для решения этого вопроса!</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 visible-md visible-lg" style="height:20px"></div>
            <div class="col-xs-12">
                <h3 class="heading"><span>Комментарий</span></h3>
                <p><textarea name="comment" rows="3" class="form-control"></textarea></p>
            </div>
        </form>
        <div id="confirm" class="row">
            <div class="total_checkout col-sm-12 col-md-12 text-right">
                <h3 style="margin:10px 0 20px;"><span style="padding:0;color:#777;">Сумма вашего заказа: <span style="padding:0;color:#D9534F;" id="totatotalsum">31213.44р.</span></span></h3>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="buttons clearfix">
                    <div class="radio pull-left hidden-xs">
                        <label class="input">
                            <input type="checkbox" name="agree" value="1" id="agree">
                            <span></span>
                            <span>Я прочитал(-а) <a href="http://opt.voodland.com/index.php?route=information/information/agree&amp;information_id=5" class="agree"><b>Условия соглашения</b></a> и согласен(-на) с условиями</span>
                        </label>
                    </div>
                    <div class="radio pull-right text-right visible-xs">
                        <label class="input">
                            <input type="checkbox" name="agree" value="1" id="agree">
                            <span></span>
                            <span>Я прочитал(-а) <a href="http://opt.voodland.com/index.php?route=information/information/agree&amp;information_id=5" class="agree"><b>Условия соглашения</b></a> и согласен(-на) с условиями</span>
                        </label>
                        <hr>
                    </div>
                    <div class="pull-right">
                        <button data-loading-text="Загрузка..." id="confirm_checkout" class="btn btn-primary">Все данные верны, оформить заказ</button>
                    </div>
                </div>
                <div class="payment"></div>
            </div>
        </div>
        <div class="related_after"></div>
    </div>
</div>