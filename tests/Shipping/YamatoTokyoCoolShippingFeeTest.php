<?php
use Yumaeda\Tests\Shipping\ShippingFeeTestBase;
use Yumaeda\Shipping\YamatoShippingFee;

class YamatoTokyoCoolShippingFeeTest extends ShippingFeeTestBase
{
    protected function setup()
    {
        $this->is_cool = true;
        $this->prefecture = 'TOKYO';
    }

    public function test1BtlUnder15000Yen()
    {
        $btl_qty = 1;
        $price = 9000;
	$target_fee = 910;
	$target_cool_fee = 300;

        $yamato_fee = new YamatoShippingFee($this->prefecture, $btl_qty, $this->is_cool, $price);
	$this->setRegionalFees($yamato_fee);
        $fee = $yamato_fee->calculate();
	$cool_fee = $yamato_fee->getRefrigeratedDeliveryFee($btl_qty);

        $this->assertEquals($fee, $target_fee);
        $this->assertEquals($cool_fee, $target_cool_fee);
    }

    public function test9BtlUnder15000Yen()
    {
        $btl_qty = 9;
        $price = 9000;
	$target_fee = 910;
	$target_cool_fee = 300;

        $yamato_fee = new YamatoShippingFee($this->prefecture, $btl_qty, $this->is_cool, $price);
	$this->setRegionalFees($yamato_fee);
        $fee = $yamato_fee->calculate();
	$cool_fee = $yamato_fee->getRefrigeratedDeliveryFee($btl_qty);

        $this->assertEquals($fee, $target_fee);
        $this->assertEquals($cool_fee, $target_cool_fee);
    }

    public function test9BtlOver15000Yen()
    {
        $btl_qty = 9;
        $price = 15000;
	$target_fee = 0;
	$target_cool_fee = 300;

        $yamato_fee = new YamatoShippingFee($this->prefecture, $btl_qty, $this->is_cool, $price);
	$this->setRegionalFees($yamato_fee);
        $fee = $yamato_fee->calculate();
	$cool_fee = $yamato_fee->getRefrigeratedDeliveryFee($btl_qty);

        $this->assertEquals($fee, $target_fee);
        $this->assertEquals($cool_fee, $target_cool_fee);
    }

    public function test12BtlUnder15000Yen()
    {
        $btl_qty = 12;
        $price = 9000;
	$target_fee = 1820;
	$target_cool_fee = 600;

        $yamato_fee = new YamatoShippingFee($this->prefecture, $btl_qty, $this->is_cool, $price);
	$this->setRegionalFees($yamato_fee);
        $fee = $yamato_fee->calculate();
	$cool_fee = $yamato_fee->getRefrigeratedDeliveryFee($btl_qty);

        $this->assertEquals($fee, $target_fee);
        $this->assertEquals($cool_fee, $target_cool_fee);
    }

    public function test12BtlOver15000Yen()
    {
        $btl_qty = 12;
        $price = 15000;
	$target_fee = 910;
	$target_cool_fee = 600;

        $yamato_fee = new YamatoShippingFee($this->prefecture, $btl_qty, $this->is_cool, $price);
	$this->setRegionalFees($yamato_fee);
        $fee = $yamato_fee->calculate();
	$cool_fee = $yamato_fee->getRefrigeratedDeliveryFee($btl_qty);

        $this->assertEquals($fee, $target_fee);
        $this->assertEquals($cool_fee, $target_cool_fee);
    }
}

