<?= Extend('header', $Data); ?>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5">
                <img class="img-fluid transparent-mode mt-5 pt-5" src="<?= baseUrl(); ?>assets/img/error.gif" alt="" width="350">
            </div>
            <div class="col-12 col-md-7">
                <div class="mb-5 pt-4 pb-3">
                    <div class="card rounded card-header text-center pb-3 pt-3">
                        <h1 class="text-danger">پرداخت ناموفق</h1>
                        <p>عملیات با خطا مواجه شده است</p>
                    </div>
                    <div class="bordet-dashed mt-4 mb-4 me-3 ms-3"></div>
                    <div class="card-body pt-4 pb-4 text-center">
                        <div class="siteinfo rtl">
                            <div class="bordet-dashed mt-5 mb-4"></div>
                            <div class="order-info text-end">
                                <p>تاریخ پرداخت : <span><?= $PaymentTime ?> - <?= $PaymentDate ?></span></p>
                                <p>نشانی وب سایت : <span><?= $Website ?></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= Extend('footer'); ?>