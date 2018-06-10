<?php
namespace Yumaeda\Tests\Shipping;

use PHPUnit\Framework\TestCase;

class ShippingFeeTestBase extends TestCase
{
    protected $is_cool;
    protected $prefecture;

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
}

