This is PHP library for calculating shipping fee based on the regions in Japan.

* This API is experimental and may be removed anytime without any notice.
* The author shall not be held responsible or liable, under any circumstances, for any damages resulting from using this component.

## Installation
1. Add this require line to your `composer.json`:

```
{
    "require": {
        "yumaeda/shipping-fee": "1.0.*"
    }
}
```
2. `composer install` on your terminal.

## How to Use

```
<?php
use Yumaeda\Shipping\YamatoShippingFee;

$prefecture = <Prefecture Key>;             // e.g. 'HOKKAIDO'
$btl_qty    = <Number of bottles>;          // e.g. 12
$is_cool    = <Refrigerated delivery flag>; // e.g. true
$price      = <Total purchanse (JPN)>;      // e.g. 999999

$yamato_fee = new YamatoShippingFee($prefecture, $btl_qty, $is_cool, $price);
$fee = yamato_fee->calculate();
```

## Testing
Not available

## Contributing
Please send a pull request.

## Support
Please send an email to yumaeda@gmail.com.

## Author
Yukitaka Maeda

## Software License
MIT
