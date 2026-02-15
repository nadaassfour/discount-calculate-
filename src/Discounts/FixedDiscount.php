<?php

declare(strict_types=1);

namespace App\Discounts;

use App\Contracts\Discount;

class FixedDiscount implements Discount 

{
   
    private float $amount;

    public function __construct (float $amount)
    
    {
     
         $this->amount = $amount;
   
    }

    public function calculate (float $total) : float 
    
    {
       
        return $total - $this->amount;
    }

}


?>