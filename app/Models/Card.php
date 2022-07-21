<?php

namespace App\Models;


class Card implements CardInterface
{

    protected array $grid;
    private         $max_rows = 5;

    public function __construct()
    {
        $this->grid = [
            "B" => Generator::generateRows(1, 15),
            "I" => Generator::generateRows(16, 30),
            "N" => Generator::generateRows(31, 45, true),
            "G" => Generator::generateRows(46, 60),
            "O" => Generator::generateRows(61, 75),
        ];

    }

    public function __toString()
    {
        printf("La carta es: ");
        return print_r($this->grid);
    }

    public function checkIfValuesNotRepeat($array): bool
    {
        return count(array_unique($array)) == count($array);
    }

    public function toArray(): array
    {
        return $this->grid;
    }

    public function getFilledCells(): int
    {
        $sum = 0;

        foreach ($this->grid as $item) {
            $sum += count($item);
            if (array_search(null, $item)) $sum -= 1;
        }
        return $sum;
    }
}
