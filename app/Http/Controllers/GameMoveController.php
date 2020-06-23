<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\GameRepositoryInterface;

class GameMoveController extends Controller
{
    public function __invoke(GameRepositoryInterface $gameRepo)
    {
        // draft card if user ask
        $card = request()->isMethod('post') 
            ? $gameRepo->draftCard()
            : null;

        //check game status
        $gameRepo->checkGame($card);

        // git the percantage of win
        $percentage = $gameRepo->getPercentage();
        
        return view('game.index', [
            'card' => $card,
            'percentage'=>$percentage
        ]);
    }
}
