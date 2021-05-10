<?php
use yii\widgets\ActiveForm;
?>
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



            <?php $form = ActiveForm::begin([
            'id' => 'checkout-form',
            'action' => '/cart/checkout',
            'options' => ['class' => 'row'],
            ]) ?>




            <div class="col-md-6">
                <div class="user_data row">
                    <div class="col-md-12">
                        <h3 class="heading"><span>Контактные данные</span></h3>
                    </div>
                    <div class="form-group required col-xs-6">
                        <?= $form->field($model, 'name')->textInput(['placeholder'=> 'Ваше имя']) ?>

                    </div>

                    <div class="form-group required  col-xs-6">
                        <?= $form->field($model, 'email')->textInput(['placeholder'=> 'Ваше e-mail']) ?>

                    </div>
                    <div class="form-group required  col-xs-12">
                        <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
                            'mask' => '+7 (999)-999-99-99',
                        ]) ?>
                    </div>


                </div>
                <div class="row ">
                </div>
                <div class="row">
                    <div class="payment_address col-xs-12"><div>
                            <h3 class="heading"><span>Адрес доставки</span></h3>
<!---->
<!--                            <div class="radio">-->
<!--                                <label class="input">-->
<!--                                    <input type="radio" name="address" value="existing" checked="checked" onclick="$('#payment-address-new').hide();"-->
<!--                                           id="payment_address">-->
<!--                                    <span>-->
<!---->
<!--                                    </span>-->
<!--                                    <span>Я хочу использовать существующий адрес</span>-->
<!--                                </label>-->
<!--                            </div>-->
                            <div id="payment-existing">
                                <?= $form->field($model, 'delivery_address')->textInput(['placeholder'=> 'Ваш адрес: город, улица, д, кв']) ?>
                            </div>
<!--                            <div class="radio">-->
<!--                                <label class="input">-->
<!--                                    <input type="radio" name="address" value="new" onclick="$('#payment-address-new').show();" id="new_payment_address">-->
<!--                                    <span></span>-->
<!--                                    <span>Я хочу использовать новый адрес</span>-->
<!--                                </label>-->
<!--                            </div>-->
                            <div class="row">
<!--                                <div id="payment-address-new" style="display:none">-->
<!--                 -->
<!---->
<!--                                    <div class="form-group required  col-md-6">-->
<!--                                        <select name="zone_id" id="input-payment-zone" class="form-control" onchange="update_checkout();">-->
<!--                                            <option value="">Выберете город</option>-->
<!---->
<!--                                            <option value="338">Гомель</option>-->
<!--                                        </select>-->
<!--                                    </div>-->
<!--                                    <div class="form-group required  col-xs-6">-->
<!--                                        <input type="text" name="city" value="Сковородино" placeholder="Город" id="input-payment-city" class="form-control">-->
<!--                                    </div>-->
<!--                                    <div class="form-group hide col-xs-12">-->
<!--                                        <input type="text" name="address_2" value="308000, Белгород, Народный бульвар 101/35, Логоша Сергей Игорьевич" placeholder="Ваш адрес, продолжнение" id="input-payment-address-2" class="form-control">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-xs-12 visible-xs visible-sm" style="height:20px"></div>-->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="shipping_wrap">
                    <h3 class="heading"><span>Cпособы доставки</span></h3>
                    <div class="shipping-method">
                        <div class="radio">
                            <label class="input">
                                <input type="radio" name="CartForm[delivery_method]" value="courier">
                                <span></span>
                                <span><span class="method">Доставка Курьером - Доставка осуществляется собственным курьером интернет-магазина www.voodland.com или работающим по договору с интернет-магазином курьером. Стоимость доставки оговаривается по телефону, указанному в разделе "Контакты".* Стоимость доставки может быть включена в сумму заказа или оплачивается при получении, по договоренности.:</span><span class="method">0.00р.</span></span>
                            </label>
                        </div>
                        <div class="radio">
                            <label class="input">
                                <input type="radio" name="CartForm[delivery_method]" value="pickup" checked>
                                <span></span>
                                <span><span class="method">Самовывоз из магазина:</span><span class="method">0.00р.</span></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="payment_wrap">
                    <h3 class="heading"><span>Cпособы оплаты</span></h3>
                    <div class="payment-method">


                        <div class="radio">
                            <label class="input">
                                <input type="radio" name="CartForm[payment_method]" value="online" checked="checked">
                                <span></span>
                                <span><span class="method"></span>Картой онлайн</span>
                            </label>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-xs-12 visible-md visible-lg" style="height:20px"></div>
            <div class="col-xs-12">
                <h3 class="heading"><span>Комментарий</span></h3>
                <p><textarea name="CartForm[comment]" rows="3" class="form-control"></textarea></p>
            </div>



        <div id="confirm" class="row">
            <div class="total_checkout col-sm-12 col-md-12 text-right">
                <h3 style="margin:10px 0 20px;"><span style="padding:0;color:#777;">Сумма вашего заказа: <span style="padding:0;color:#D9534F;" id="totatotalsum">31213.44р.</span></span></h3>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="buttons clearfix">
                    <div class="radio pull-left hidden-xs">
                        <label class="input">
                            <input type="checkbox" name="CartForm[agreement]" value="1" id="agree">
                            <span></span>
                            <span>Я прочитал(-а) <a href="http://opt.voodland.com/index.php?route=information/information/agree&amp;information_id=5" class="agree"><b>Условия соглашения</b></a> и согласен(-на) с условиями</span>
                        </label>
                    </div>
                    <div class="radio pull-right text-right visible-xs">
                        <label class="input">
                            <input type="checkbox" name="CartForm[agreement]" value="1" id="agree">
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
<?php ActiveForm::end() ?>

<?php else: ?>
    <p style="font-size: 3rem; text-align: center">Корзина пуста</p>
<?php endif; ?>
