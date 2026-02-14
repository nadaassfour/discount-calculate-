<?php

interface Discount {

    public function calculate (float $total) : float ;

}

class PercentageDiscount implements Discount {

    private float $percentage;

    public function __construct (float $percentage){

        $this->percentage = $percentage;
    }

    public function calculate (float $total) : float {

        return $total - ($total * $this->percentage /100);
    }

}

class FixedDiscount implements Discount {
   
    private float $amount;

    public function __construct (float $amount){
     
         $this->amount = $amount;
   
    }

    public function calculate (float $total) : float {
       
        return $total - $this->amount;
    }
}

class ConditionalDiscount implements Discount {

    private Discount $discount ;

    private float $minimum ;

    public function __construct ( Discount $discount , float $minimum){

       $this->minimum = $minimum;
       
       $this->discount = $discount;

    }

    public function calculate (float $total ) : float{
     
        if ($total >= $this->minimum ){

            return $this->discount->calculate($total);
        }
        
            return $total ;   
        }

}

class Cart {
   
    private float $total;

    private Discount $discount;


    public function __construct  (float $total , Discount $discount ){
     
        $this->total = $total;

        $this->discount = $discount;   
    }

    public function getFinalTotal () : float {
       
        return $this->discount->calculate($this->total);
    }
}


$total = 200 ; 

$percentage = new PercentageDiscount (20);

$conditional = new ConditionalDiscount ($percentage , 200) ;

$cart = new Cart ($total , $conditional );

echo $cart->getFinalTotal(); // = 160

$amount = new FixedDiscount (50);

$conditional = new ConditionalDiscount ($amount , 300) ;

$cart = new Cart ($total , $conditional );

echo $cart->getFinalTotal(); // = 200 no discount 
