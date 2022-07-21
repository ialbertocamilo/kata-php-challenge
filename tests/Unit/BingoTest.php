<?php

use App\Models\BingoAgent;
use App\Models\Card;
use PHPUnit\Framework\TestCase;

//use Tests\TestCase;

class BingoTest extends TestCase
{

    public function test_card_has_correct_format()
    {

        $card   = new Card();
        $caller = new BingoAgent();

        $this->assertTrue($caller->checkIfCorrectFormat($card), 'Card has correct format');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_card_is_valid()
    {

        $card   = new Card();
        $caller = new BingoAgent();

//        fwrite(STDERR, print_r($card->getFilledCells(), TRUE));
        $this->assertTrue($caller->checkFilledCells($card), 'Card is filled with 24 numbers');
    }

    public function testIfWinnerOrLoser()
    {
        $card   = new Card();
        $caller = new BingoAgent();

        $caller->checkIfIsWinner($card) ?
            $this->assertTrue($caller->checkIfIsWinner($card), "The player wins!") :
            $this->assertFalse($caller->checkIfIsWinner($card), "The player lost");;


    }
}
