<?php

declare(strict_types=1);

namespace App\Discounts;

use App\Contracts\Discount ;

class PercentageDiscount implements Discount 

{

    private float $percentage;

    public function __construct (float $percentage)
    
    {

        $this->percentage = $percentage;
    }

    public function calculate (float $total) : float 
    
    {

        return $total - ($total * $this->percentage /100);
    }

}


?>