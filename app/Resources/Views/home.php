<?= Extend('header', $Data); ?>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 mt-5 mb-5 card-top">
                <div class="card card-vip pt-4 pb-3">
                    <div class="card-header text-center pb-3 pt-3">
                        <h1>پرداخت <span class="color-yellow">حق عضویت</span> استفاده از سامانه</h1>
                    </div>
                    <div class="card-body pt-4 pb-4 text-center">
                        <p>
                            جهت استفاده از سامانه لازم است
                        </p>
                        <p>
                            با پرداخت مبلغ
                            <span class="badg rounded-pill bg-blue text-white pt-1 pe-3 ps-3 me-1 ms-1"><?= Rial2Toman($Price) ?> تومان</span>
                            برای یک ماه در سامانه عضو شوید
                        </p>
                        <div class="bordet-dashed mt-5 mb-3 me-3 ms-3"></div>
                        <div class="d-grid gap-2 p-4">
                            <a href="<?= baseUrl(); ?>payment" class="btn btn-lg bg-yellow text-white mt-3 payment-btn btneffect">پرداخت
                                حق
                                عضویت</a>
                        </div>
                    </div>
                </div>
                <div class="card-bdot">
                    <img src="<?= baseUrl(); ?>assets/img/bd.png" alt="" width="120">
                </div>
            </div>
            <div class="col-12 col-md-6 rtl pe-md-5">
                <img class="img-fluid payment-img" src="<?= baseUrl(); ?>assets/img/card-pay.gif" alt="">
            </div>
        </div>
    </div>
<?= Extend('footer'); ?>