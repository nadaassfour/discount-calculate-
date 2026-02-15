<?php

declare(strict_types=1);

namespace App\Cart;

use App\Contracts\Discount;

class Cart 

{
   
    private float $total;

    private Discount $discount;


    public function __construct  (float $total , Discount $discount )
    
    {
     
        $this->total = $total;

        $this->discount = $discount;   
    }

    public function getFinalTotal () : float 
    
    {
       
        return $this->discount->calculate($this->total);
    }

}