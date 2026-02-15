<?php

declare(strict_types=1);

require 'src/Contracts/Discount.php';

require 'src/Discounts/PercentageDiscount.php';

require 'src/Discounts/FixedDiscount.php';

require 'src/Discounts/ConditionalDiscount.php';

require 'src/Cart/Cart.php';

use App\Discounts\PercentageDiscount;

use App\Discounts\FixedDiscount;

use App\Discounts\ConditionalDiscount;

use App\Cart\Cart;

// ======== percentageDiscount example ================

$total = 200;

$percentage = new PercentageDiscount(20);

$conditional = new ConditionalDiscount($percentage, 200);

$cart = new Cart($total, $conditional);

echo $cart->getFinalTotal(); // 160


 // ======== fixedDiscount example ==============

$amount = new FixedDiscount(50);

$conditional = new ConditionalDiscount($amount, 300);

$cart = new Cart($total, $conditional);

echo $cart->getFinalTotal(); // 200 no discount
