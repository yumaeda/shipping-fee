<?php
namespace Yumaeda\Tests\Shipping;

use Yumaeda\Shipping\YamatoShippingFee;

/**
 * Test class for validating Yamato's shipping fee for Okinawa (Cool)
 */
class YamatoOkinawaCoolShippingFeeTest extends YamatoShippingFeeTest
{
    protected function setup()
    {
        $this->is_cool = true;
        $this->prefecture = 'OKINAWA';

        parent::setup();
    }

    /**
     * @access public
     * @return void
     * @covers YamatoShippingFee::calculate
    */
    public function test1BtlUnder15000Yen()
    {
        $this->doTest(9000, 1, 2800, 300);
    }

    /**
     * @access public
     * @return void
     * @covers YamatoShippingFee::calculate
    */
    public function test9BtlUnder15000Yen()
    {
        $this->doTest(9000, 9, 2800, 300);
    }

    /**
     * @access public
     * @return void
     * @covers YamatoShippingFee::calculate
    */
    public function test9BtlOver15000Yen()
    {
        $this->doTest(15000, 9, 1890, 300);
    }

    /**
     * @access public
     * @return void
     * @covers YamatoShippingFee::calculate
    */
    public function test12BtlUnder15000Yen()
    {
        $this->doTest(9000, 12, 5600, 600);
    }

    /**
     * @access public
     * @return void
     * @covers YamatoShippingFee::calculate
    */
    public function test12BtlOver15000Yen()
    {
        $this->doTest(15000, 12, 4690, 600);
    }
}

