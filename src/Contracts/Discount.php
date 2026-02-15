<?php

declare(strict_types=1);

namespace App\Contracts;


interface Discount 

{

    public function calculate (float $total) : float ;

}








