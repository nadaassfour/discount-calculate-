<?php

declare(strict_types=1);

namespace App\Discounts;

use App\Contracts\Discount;

class ConditionalDiscount implements Discount 

{

    private Discount $discount ;

    private float $minimum = 1 ;

    private float $maximum = 100 ;

    public function __construct ( Discount $discount , float $minimum)
    
    {

       $this->minimum = $minimum;
       
       $this->maximum = $maximum;

       $this->discount = $discount;

    }

    public function calculate (float $total ) : float
    
    {
     
        if ($total >= $this->minimum  && $total <= $this->maximum)
            
            {

            return $this->discount->calculate($total);
        }
        
            return $total ;   
    }

}