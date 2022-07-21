<?php

namespace App\Models;

interface CardInterface{
    public function toArray():array;
    public function getFilledCells():int;
}

