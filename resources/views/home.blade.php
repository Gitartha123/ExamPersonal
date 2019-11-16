@extends('layout/master')
@section('body')

    <div class=" a1-margin a1-container a1-light-gray" >
        @include('layouts.app');
        <form method="post" action="{{route('exam')}}">
            {{ csrf_field() }}
        <div class="a1-row">
            @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h3><strong style="color: red;">ALL THE BEST FOR YOUR EXAMINATION</strong></h3>
                <h4><strong>READ THE FOLLOWING INSTRUCTION CAREFULLY BEFORE STARTING EXAMINATION</strong></h4>
                <input type="text" value='{{ Auth::user()->semester }}' style="display: none;" name="semester">
            <div class="a1-container a1-border a1-round a1-border-black a1-margin">
                <ul style="font-size: 24px; text-align: justify;">
                    <li>Follow each guidelines given by the invigilator</li>
                    <li>Mobile phone is strictly prohibited</li>
                    <li>Read the following questions properly</li>
                </ul>
                <b style="font-family: Segoe UI, Arial, sans-serif; text-align: center">{!! Form::submit('START EXAM',['class'=>"a1-round a1-right a1-red a1-hover-red a1-button a1-block a1-section  a1-ripple a1-padding",'style'=>'width:150px;']) !!}</b>
            </div>
        </div>
    </div>
    </form>
@endsection




