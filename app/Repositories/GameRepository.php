<?php
namespace App\Repositories;

use App\Card;
use App\Repositories\Interfaces\GameRepositoryInterface;

class GameRepository implements GameRepositoryInterface
{
    public function draftCard()
    {
        $selectedCard = session('card');
        $card = null ;
        if (Card::doesntHave('move')->get()->contains($selectedCard)) {
            $card = Card::doesntHave('move')->inRandomOrder()->first();
            $card->move()->create();
        } 
        return $card;
    }

    public function checkGame($card = null)
    {
        $selectedCard = session('card');
        if ($card && $card->id == $selectedCard->id) {
            session(['gameStatus' => true]);
        } 
    }

    public function getPercentage()
    {
        $numberOfDrafts = Card::has('move')->count() ;
        $Percentage =round(100/(52-$numberOfDrafts), 1) ;

        $selectedSuit = session('card')->suit;
        $suitDrafts = Card::has('move')->where('suit', $selectedSuit)->count() ;
        $PercentageSuit = round(100/(13-$suitDrafts), 1) ;
        return [
            'suitPercent' => $PercentageSuit,
            'totalPercent' => $Percentage
        ];
    }
}
