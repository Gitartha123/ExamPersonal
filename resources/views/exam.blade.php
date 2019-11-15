<?php session_start(); ?>
@extends('layout/master')
@section('body')
    <script language ="javascript" >
        var tim;

        var min = 1 ;
        var sec = 60;
        var f = new Date();
        function f1() {
            f2();
           /* document.getElementById("starttime").innerHTML = "<h3Your started your Exam at</h1> " + f.getHours() + ":" + f.getMinutes();*/


        }
        function f2() {
            if (parseInt(sec) > 0) {
                sec = parseInt(sec) - 1;
                document.getElementById("showtime").innerHTML = "<h3><b class='a1-red ' > Time Left :"+min+" :" + sec+" min</b></h3>";
                tim = setTimeout("f2()", 1000);
            }
            else {
                if (parseInt(sec) == 0) {
                    min = parseInt(min) - 1;
                    if (parseInt(min) == 0) {
                        clearTimeout(tim);
                        location.href = "default5.aspx";
                    }
                    else {
                        sec = 60;
                        document.getElementById("showtime").innerHTML = "Your Left Time  is :" + min + " Minutes ," + sec + " Seconds";
                        tim = setTimeout("f2()", 1000);
                    }
                }

            }
        }
    </script>
    <body onload="f1()">
    <div class=" a1-margin a1-container a1-light-gray" >
         @include('layouts.app')

     <form>
         <div id="starttime"></div><br />
         <div id="endtime"></div><br />
         <div id="showtime"></div>
             @foreach($getquestions as $gq)
                 <table>
                     <tr>
                         <td><h3><b class="a1-left">{{$gq->qno}}.</b></h3></td>
                         <td><h3><b class="a1-left">{{$gq->qtitle}}</b></h3></td>
                     </tr>
                     <p>
             <fieldset id="{{$gq->qno}}">

                     <tr>
                         <td width="30px"><h3><b class="a1-right a1-margin"><input type="radio" name="{{$gq->qno}}" value="{{$gq->option1}}"> {{$gq->option1}}</b></h3></td>
                         <td width="30px"><h3><b class="a1-right a1-margin"><input type="radio" name="{{$gq->qno}}" value="{{$gq->option2}}"> {{$gq->option2}}</b></h3></td>
                     </tr>
                    <tr>
                        <td ><h3><b class="a1-rigt a1-margin"><input type="radio" name="{{$gq->qno}}" value="{{$gq->option3}}"> {{$gq->option3}}</b></h3></td>
                        <td><h3><b class="a1-right a1-margin"><input type="radio" name="{{$gq->qno}}" value="{{$gq->option4}}"> {{$gq->option4}}</b></h3></td>
                    </tr>

             </fieldset>
                 </table>
         @endforeach

                 {!! Form::submit('NEXT',['class'=>"a1-round a1-right a1-hover-red a1-button a1-block a1-section a1-light-gray a1-ripple a1-padding",'style'=>'width:100px;']) !!}
     </form>

    </div>
    </body>
@endsection




