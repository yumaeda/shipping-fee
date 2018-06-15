<?php
/**
 * Test class for validating Yamato's shipping fee for Hokkaido
 */
class YamatoHokkaidoShippingFeeTest extends Yumaeda\Tests\Shipping\YamatoShippingFeeTest
{
    protected function setup()
    {
        $this->is_cool = false;
        $this->prefecture = 'HOKKAIDO';

        parent::setup();
    }

    public function test1BtlUnder15000Yen()
    {
        $this->doTest(9000, 1, 1310, 0);
    }

    public function test9BtlUnder15000Yen()
    {
        $this->doTest(9000, 9, 1310, 0);
    }

    public function test9BtlOver15000Yen()
    {
        $this->doTest(15000, 9, 400, 0);
    }

    public function test12BtlUnder15000Yen()
    {
        $this->doTest(9000, 12, 1310, 0);
    }

    public function test12BtlOver15000Yen()
    {
        $this->doTest(15000, 12, 400, 0);
    }
}

