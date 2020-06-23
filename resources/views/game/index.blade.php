@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center ">
    @if (Session::get('gameStatus') == false)
    <div class="col-3">
        <form method="POST" action="{{ route('draft-card') }}">
            @csrf
            <button class="btn btn-primary" >draft</button>
        </form>
    </div>
    @endif 
    <div class="col-3  mx-5 px-1 border border-dark">
            <h3>{{ Session::get('card')->suit }}{{ Session::get('card')->value }}</h3>
    </div>

    <div class="col-3">
        <a class="btn btn-danger" href="{{route('new-game')}}" >reset</a>
    </div>
    
</div>
    @if (Session::get('gameStatus')== true )
        <div id="win-game">
            <div class="alert m-2 alert-success " role="alert">
                Congratulation u got it 
            </div>
        </div> 
    @endif
@isset($card)
    <div class="row my-2 d-flex justify-content-center">
        <div class=" text-center col-3 mx-5 px-1 ">
            <h3>Drafted Card</h3>
        </div>
        <div class=" text-center col-3 mx-5 px-1 border border-dark">
            <h3>{{ $card->suit }}{{ $card->value }}</h3>
        </div>
    </div>   
@endisset
@if (Session::get('gameStatus') == false)
<div>
    <div class=" text-center m-2 ">
        <div class=" border mx-5 border-dark">
            <h3>Your chance</h3>
            <div class="row">
                <div class="col-6">
                    <p><b>Card from the same Suit</b> : {{$percentage['suitPercent']}} % </p>
                </div>
                <div class="col-6">
                    <p><b>Total </b> : {{$percentage['totalPercent']}} % </p>
                </div>
            </div>       
        </div>
    </div>
    
</div>
@endif

@endsection
