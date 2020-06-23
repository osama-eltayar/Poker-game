@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('start-game') }}">
    @csrf
    <div class="row">
        <div class="col-md-5">
             <select name="suit" class="custom-select">
                <option disabled selected>choose Suit</option>
                @foreach ($suits as $suit)
                    <option value="{{$suit[0]}}">{{$suit}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-5">
            <select name="value" class="custom-select">
                <option  disabled selected>choose Rank</option>
                @foreach ($ranks as $rank)
                    <option value="{{ is_string($rank) ? $rank[0] : $rank }}">{{$rank}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2" >
             <button class="btn btn-primary">Start Game</button>
        </div>
    </div>
   

   
</form>
<div class="row">
    @foreach($cards as $card)
        <div class="col-2 m-2 p-2 border border-dark">
            <h3>{{ $card->suit }}{{ $card->value }}</h3>
        </div>

    @endforeach
</div>

@endsection
