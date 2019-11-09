@extends('layout/master')
@section('body')

    <div class=" a1-margin a1-container a1-light-gray" >
        @include('layouts.app');
     <form>
             @foreach($getquestions as $gq)
                <h3><b class="a1-left">{{$gq->qno}}.</b></h3>
                <h3><b class="a1-left">{{$gq->qtitle}}</b></h3><br>
             <fieldset id="group1">
                <h3><b class="a1-left"><input type="radio" name="group1" value="{{$gq->option1}}"> {{$gq->option1}}</b></h3><br>
                <h3><b class="a1-left"><input type="radio" name="group1" value="{{$gq->option2}}"> {{$gq->option2}}</b></h3><br>
                <h3><b class="a1-left"><input type="radio" name="group1" value="{{$gq->option3}}"> {{$gq->option3}}</b></h3><br>
                <h3><b class="a1-left"><input type="radio" name="group1" value="{{$gq->option4}}"> {{$gq->option4}}</b></h3><br>
             </fieldset>
         @endforeach
     </form>

    </div>

@endsection




