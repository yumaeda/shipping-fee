<?php
namespace Yumaeda\Tests\Shipping;

use PHPUnit\Framework\TestCase;
use Yumaeda\Shipping\YamatoShippingFee;

class YamatoShippingFeeTest extends TestCase
{
    protected $YamatoShippingFee;
    protected $is_cool = false;
    protected $prefecture = 'TOKYO';

    protected function setup()
    {
        $this->YamatoShippingFee = new YamatoShippingFee($this->prefecture, $this->is_cool);
    }

    protected function setRegionalFees(&$fee)
    {
        $fee->setRegionalFee('HOKKAIDO', 1310);
        $fee->setRegionalFee('TOHOKU', 1010);
        $fee->setRegionalFee('KANTO', 910);
        $fee->setRegionalFee('SHINETSU', 910);
        $fee->setRegionalFee('TOKAI', 910);
        $fee->setRegionalFee('HOKURIKU', 910);
        $fee->setRegionalFee('KANSAI', 1010);
        $fee->setRegionalFee('CYUGOKU', 1110);
        $fee->setRegionalFee('SHIKOKU', 1110);
        $fee->setRegionalFee('KYUSYU', 1310);
        $fee->setRegionalFee('OKINAWA', 2800);
    }

    public function test1BtlUnder15000Yen()
    {
        $this->doTest(9000, 1, 910, 0);
    }

    public function test9BtlUnder15000Yen()
    {
        $this->doTest(9000, 9, 910, 0);
    }

    public function test9BtlOver15000Yen()
    {
        $this->doTest(15000, 9, 0, 0);
    }

    public function test12BtlUnder15000Yen()
    {
        $this->doTest(9000, 12, 910, 0);
    }

    public function test12BtlOver15000Yen()
    {
        $this->doTest(15000, 12, 0, 0);
    }

    protected function doTest($price, $btl_qty, $target_fee, $target_cool_fee)
    {
        $this->YamatoShippingFee->setPurchasePrice($price);
        $this->YamatoShippingFee->setBottleQty($btl_qty);
        $this->setRegionalFees($this->YamatoShippingFee);
        $fee = $this->YamatoShippingFee->calculate();
        $cool_fee = $this->YamatoShippingFee->getRefrigeratedDeliveryFee($btl_qty);

        $this->assertEquals($fee, $target_fee);
        $this->assertEquals($cool_fee, $target_cool_fee);
    }
}

