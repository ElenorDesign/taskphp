<?php
/********** TaskPHP ***********
-------- ElenorFreamwork -------
#/Code by Amin.sh - May 2022/#
 *****************************/

class Main extends Opration
{
    private $Price = 10000;
    private $Website = 'TestWebsite.com';

    public function __construct()
    {
        $this->autoLoad('Models', 'Main');
    }

    public function index()
    {
        $Data = [
            'Title' => 'پرداخت حق عضویت',
            'Price' => $this->Price,

            'Page' => 'Home',
            'HeaderClass' => 'header',
        ];

        $this->loadView('home', $Data);
    }

    public function payment()
    {
        session_start();
        $OrderNum = orderNumberGeneretor();
        $_SESSION['OrderNum'] = $OrderNum;

        $Data = [
            'Title' => 'پرداخت صورت حساب',
            'OrderNum' => $OrderNum,
            'Website' => $this->Website,
            'Price' => $this->Price,

            'Page' => 'Payment',
            'HeaderClass' => 'header header-payment',
        ];

        $this->loadView('payment', $Data);
    }

    public function verify()
    {
        //Safe POST Data
        $POST = POST_DATA();

        //Required Fileds
        $RequiredFileds = array(
            'cardNumber' => @is($POST['cardNumber']),
            'Cvv2' => @is($POST['Cvv2']),
        );

        #validation Required Methods
        $Required = required($RequiredFileds);

        !$Required['status'] and $this->verifyError();

        /**** Verify OK ****/
        $OrderNum = $_SESSION['OrderNum'];
        session_destroy();

        $Data = [
            'Title' => 'ترامنش موفق',
            'PaymentDate' => jdate('Y/m/d'),
            'PaymentTime' => jdate('H:i:s'),
            'OrderNum' => $OrderNum,
            'Website' => $this->Website,

            'Page' => 'Verify',
            'HeaderClass' => 'header header-verify',
        ];

        $this->loadView('verify', $Data);
    }

    public function verifyError()
    {
        $Data = [
            'Title' => 'ترامنش ناموفق',
            'PaymentDate' => jdate('Y/m/d'),
            'PaymentTime' => jdate('H:i:s'),
            'Website' => $this->Website,

            'Page' => 'Verify',
            'HeaderClass' => 'header header-error',
        ];

        $this->loadView('verify_error', $Data);
        die;
    }
}

$CL_Main = new Main();
