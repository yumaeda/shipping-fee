<?php
namespace Yumaeda\Tests\Shipping;

use Yumaeda\Shipping\YamatoShippingFee;

/**
 * Test class for validating Yamato's shipping fee for Okayama
 */
class YamatoOkayamaShippingFeeTest extends YamatoShippingFeeTest
{
    protected function setup()
    {
        $this->is_cool = false;
        $this->prefecture = 'OKAYAMA';

        parent::setup();
    }

    /**
     * @access public
     * @return void
     * @covers YamatoShippingFee::calculate
    */
    public function test1BtlUnder15000Yen()
    {
        $this->doTest(9000, 1, 1110, 0);
    }

    /**
     * @access public
     * @return void
     * @covers YamatoShippingFee::calculate
    */
    public function test9BtlUnder15000Yen()
    {
        $this->doTest(9000, 9, 1110, 0);
    }

    /**
     * @access public
     * @return void
     * @covers YamatoShippingFee::calculate
    */
    public function test9BtlOver15000Yen()
    {
        $this->doTest(15000, 9, 0, 0);
    }

    /**
     * @access public
     * @return void
     * @covers YamatoShippingFee::calculate
    */
    public function test12BtlUnder15000Yen()
    {
        $this->doTest(9000, 12, 1110, 0);
    }

    /**
     * @access public
     * @return void
     * @covers YamatoShippingFee::calculate
    */
    public function test12BtlOver15000Yen()
    {
        $this->doTest(15000, 12, 0, 0);
    }
}

