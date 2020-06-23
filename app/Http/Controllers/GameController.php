<?php

namespace App\Http\Controllers;

use App\Card;
use App\GameMove;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCardRequest;


class GameController extends Controller
{
    public function index()
    {
        // reset gameData from database & session
        GameMove::truncate();
        request()->session()->forget(['gameStatus', 'card']);
        request()->session()->put(['gameStatus' => false]);
        return view('game.home', $this->homeData());       
    }

    public function store(StoreCardRequest $request)
    {
        $cardData= $request->only(['suit','value']);
        
        // git the selected card and put it in the session
        $card = Card::where(['suit'=>$cardData['suit'],'value'=>$cardData['value']])->first();
        $request->session()->put('card', $card);
        return redirect('/game');
    }

    // render the data needed in home page
    private function homeData(){
        $cards = Card::inRandomOrder()->get();
        $suits = ['Clubs' , 'Diamonds','Hearts','Spades'];
        $ranks = array_merge(['Jack','Ace','Queen','King'], range("2", "10"));
        return [
            'cards'=>$cards,
            'suits'=>$suits,
            'ranks'=>$ranks
        ];

    }
}
