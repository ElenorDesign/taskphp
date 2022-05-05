<?= Extend('header', $Data); ?>
    <div class="container">
        <div class="row rtl">
            <div class="col-12 col-md-8 mt-5 mb-3 card-top ltr">
                <div class="wrapper" id="app">
                    <div class="card-form">
                        <div class="card-list">
                            <div class="card-item" v-bind:class="{ '-active' : isCardFlipped }">
                                <div class="card-item__side -front">
                                    <div class="card-item__focus" v-bind:class="{'-active' : focusElementStyle }" v-bind:style="focusElementStyle" ref="focusElement"></div>
                                    <div class="card-item__cover">
                                        <img src="<?= baseUrl(); ?>assets/img/cartFront.jpg" class="card-item__bg">
                                    </div>
                                    <div class="card-item__wrapper">
                                        <div class="card-item__top">
                                            <img src="<?= baseUrl(); ?>assets/img/barcode.png" class="card-item__chip rounded">
                                            <div class="card-item__type">
                                                <transition name="slide-fade-up">
                                                    <img src="<?= baseUrl(); ?>assets/img/cartLogo.png" alt="" class="card-item__typeImg">
                                                </transition>
                                            </div>
                                        </div>
                                        <label for="cardNumber" class="card-item__number" ref="cardNumber">
                                            <template>
                                            <span v-for="(n, $index) in otherCardMask" :key="$index">
                                                <transition name="slide-fade-up">
                                                    <div class="card-item__numberItem" v-if="$index > 4 && $index < 15 && cardNumber.length > $index && n.trim() !== ''">{{cardNumber[$index]}}</div>
                                                    <div class="card-item__numberItem" :class="{ '-active' : n.trim() === '' }" :key="$index" v-else-if="cardNumber.length > $index">
                                                        {{cardNumber[$index]}}
                                                    </div>
                                                    <div class="card-item__numberItem" :class="{ '-active' : n.trim() === '' }" v-else :key="$index + 1">{{n}}</div>
                                                </transition>
                                            </span>
                                            </template>
                                        </label>
                                        <div class="card-item__content">
                                            <label for="cardName" class="card-item__info" ref="cardName">
                                                <div class="card-item__holder">شماره تلفن</div>
                                                <transition name="slide-fade-up">
                                                    <div class="card-item__name" v-if="cardName.length" key="1">
                                                        <transition-group name="slide-fade-right">
                                                            <span class="card-item__nameItem" v-for="(n, $index) in cardName.replace(/\s\s+/g, ' ')" v-if="$index === $index" v-bind:key="$index + 1">{{n}}</span>
                                                        </transition-group>
                                                    </div>
                                                    <div class="card-item__name" v-else key="2">+98</div>
                                                </transition>
                                            </label>
                                            <div class="card-item__date" ref="cardDate">
                                                <label for="cardMonth" class="card-item__dateTitle text-end">انقضا</label>
                                                <label for="cardYear" class="card-item__dateItem">
                                                    <transition name="slide-fade-up">
                                                        <span v-if="cardYear" v-bind:key="cardYear">{{String(cardYear).slice(2, 4)}}</span>
                                                        <span v-else key="2"> 00 </span>
                                                    </transition>
                                                </label>
                                                <span>/</span>
                                                <label for="cardMonth" class="card-item__dateItem rtl">
                                                    <transition name="slide-fade-up">
                                                        <span v-if="cardMonth" v-bind:key="cardMonth">{{cardMonth}}</span>
                                                        <span v-else key="2"> 00 </span>
                                                    </transition>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-item__side -back">
                                    <div class="card-item__cover">
                                        <img src="<?= baseUrl(); ?>assets/img/cartBack.jpg" class="card-item__bg">
                                    </div>
                                    <div class="card-item__band"></div>
                                    <div class="card-item__cvv">
                                        <div class="card-item__cvvTitle">CVV2</div>
                                        <div class="card-item__cvvBand">
                                        <span v-for="(n, $index) in cardCvv" :key="$index">
                                            *
                                        </span>

                                        </div>
                                        <div class="card-item__type">
                                            <img src="<?= baseUrl(); ?>assets/img/cartLogo.png" class="card-item__typeImg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-form__inner">
                            <form action="<?= baseUrl() ?>verify" method="post">
                                <div class="card-input text-end">
                                    <label for="cardNumber" class="card-input__label">شماره کارت</label>
                                    <input type="text" name="cardNumber" id="cardNumber" class="card-input__input text-center" v-mask="generateCardNumberMask" v-model="cardNumber" v-on:focus="focusInput" v-on:blur="blurInput" data-ref="cardNumber" placeholder="XXXX XXXX XXXX XXXX" minlength="19" maxlength="19" autocomplete="off" required>
                                </div>
                                <div class="card-form__row">
                                    <div class="card-form__col">
                                        <div class="card-form__group">
                                            <label for="cardMonth" class="card-input__label">تاریخ انقضا</label>

                                            <select class="card-input__input -select" name="Year" id="cardYear" v-model="cardYear" v-on:focus="focusInput" v-on:blur="blurInput" data-ref="cardDate" required>
                                                <option value="" disabled selected>سال</option>
                                                <option v-bind:value="$index + minCardYear" v-for="(n, $index) in 11" v-bind:key="n">
                                                    {{$index + minCardYear}}
                                                </option>
                                            </select>
                                            <select class="card-input__input -select" name="Month" id="cardMonth" v-model="cardMonth" v-on:focus="focusInput" v-on:blur="blurInput" data-ref="cardDate" required>
                                                <option value="" disabled selected>ماه</option>
                                                <option v-bind:value="n < 10 ? '0' + n : n" v-for="n in 12" v-bind:disabled="n < minCardMonth" v-bind:key="n">
                                                    {{n < 10 ? '0' + n : n}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-form__col -cvv">
                                        <div class="card-input">
                                            <label for="cardCvv" class="card-input__label">CVV2</label>
                                            <input type="text" class="card-input__input" name="Cvv2" id="cardCvv" v-mask="'####'" maxlength="4" v-model="cardCvv" v-on:focus="flipCard(true)" v-on:blur="flipCard(false)" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-input">
                                    <label for="cardName" class="card-input__label text-end">شماره تلفن</label>
                                    <input type="text" name="Phone" id="cardName" class="card-input__input" v-model="cardName" v-on:focus="focusInput" v-on:blur="blurInput" data-ref="cardName" maxlength="13" autocomplete="off" required>
                                </div>
                                <div class="d-grid gap-2 p-1">
                                    <button type="submit" class="btn btn-lg bg-yellow text-white mt-3 payment-btn btneffect">پرداخت
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card pt-4 pb-3">
                    <div class="card-header text-center pb-3 pt-3">
                        <h1>اطلاعات پرداخت</h1>
                    </div>
                    <div class="bordet-dashed mt-4 mb-4 me-3 ms-3"></div>
                    <div class="card-body pt-4 pb-4 text-center">
                        <div class="siteinfo rtl">
                            <h3>مبلغ قابل پرداخت</h3>
                            <div class="price pt-3 pb-5 mb-4"><?= number_format($Price) ?><span> ریال </span></div>
                            <h3>پذیرنده</h3>
                            <div class="name pt-4 pb-5">پرداخت اشتراک ویژه</div>
                            <div class="bordet-dashed mt-5 mb-4"></div>
                            <div class="order-info text-end">
                                <p>شماره سفارش : <span><?= $OrderNum ?></span></p>
                                <p>نشانی وب سایت : <span><?= $Website ?></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <p class="text-center pb-3"> این فقط یک فرم تست میباشد - از وارد کردن اطلاعات صحیح خودداری نمایید</p>

        </div>
    </div>


<?= Extend('footer'); ?>