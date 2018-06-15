<?php
/**
 * Test class for validating Yamato's shipping fee for Kyoto (Cool)
 */
class YamatoKyotoCoolShippingFeeTest extends Yumaeda\Tests\Shipping\YamatoShippingFeeTest
{
    protected function setup()
    {
        $this->is_cool = true;
        $this->prefecture = 'KYOTO';

        parent::setup();
    }

    public function test1BtlUnder15000Yen()
    {
        $this->doTest(9000, 1, 1010, 300);
    }

    public function test9BtlUnder15000Yen()
    {
        $this->doTest(9000, 9, 1010, 300);
    }

    public function test9BtlOver15000Yen()
    {
        $this->doTest(15000, 9, 0, 300);
    }

    public function test12BtlUnder15000Yen()
    {
        $this->doTest(9000, 12, 2020, 600);
    }

    public function test12BtlOver15000Yen()
    {
        $this->doTest(15000, 12, 1010, 600);
    }
}

