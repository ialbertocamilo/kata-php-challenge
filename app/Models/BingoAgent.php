<?php

namespace App\Models;

class BingoAgent
{
    private CardInterface $card;

    public function getCard(CardInterface $card): CardInterface
    {
        $this->card = $card;
        return $card;
    }

    public function checkFilledCells(CardInterface $card): bool
    {
        return $card->getFilledCells() == 24;
    }

    public function checkIfCorrectFormat(CardInterface $card): bool
    {
        $arr = $card->toArray();
        return $this->checkRow($arr["B"], 1, 15) &&
            $this->checkRow($arr["I"], 16, 30) &&
            $this->checkRow($arr["N"], 31, 45) &&
            $this->checkRow($arr["G"], 46, 60) &&
            $this->checkRow($arr["O"], 61, 75);
    }

    private function checkRow($array, $min, $max): bool
    {
        $filtered=array_diff($array, array(null, 0));
        $minVal = min($filtered);
        $maxVal = max($filtered);
        return ($minVal >= $min && $maxVal <= $max);
    }

    public function checkIfIsWinner(CardInterface $card):bool{
        $array=$card->toArray();

        $numbers     = \App\Models\Generator::generateNumbers(1, 45, 0, 45);
        $arrayValues = array_values($card->toArray());
        $newArray    = [];
        foreach ($arrayValues as $value) {
            if ($value[2] == null)
                unset($value[2]);
            $newArray = array_merge($newArray, $value);
        }
        if (count(array_diff($newArray, $numbers))>0)return false;
        return true;

    }
}
