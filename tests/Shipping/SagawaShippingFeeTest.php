<?php
use Yumaeda\Tests\Shipping\ShippingFeeTestBase;
use Yumaeda\Shipping\SagawaShippingFee;

class SagawaCoolShippingFeeTest extends ShippingFeeTestBase
{
    protected function setup()
    {
        $this->is_cool = true;
        $this->prefecture = 'TOKYO';
    }

    public function testShippingFee()
    {
        $btl_qty = 12;
        $price = 1000;
	$target_fee = 910;

        $sagawa_fee = new SagawaShippingFee($this->prefecture, $btl_qty, $this->is_cool, $price);
	$this->setRegionalFees($sagawa_fee);
        $fee = $sagawa_fee->calculate();

        $this->assertEquals($fee, $target_fee);
    }
}

