<?php session_start(); ?>
<html>
<head>
    <title>Addpaper</title>
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>

<body>
<div class="a1-container a1-card a1-padding-4 a1-center " style="width: 60%; height:auto; overflow:hidden;margin: auto; ">
@include('header')
    <div class="a1-container a1-padding a1-light-gray">
        <table class="a1-table a1-border a1-border-black a1-round">
            <tr>
                <td style="width:30%">
                    <form id="form1" name="form1" method="post" action="{{route('viewquestion')}}">
                        <p>
                           <select class="a1-input a1-border a1-round" name="question">
                               <option>Select Subject</option>
                               @php $subject = DB::table('subject')->pluck("subname","id");@endphp
                               @foreach ($subject as $key => $value)
                                   <option value="{{ $key }}">{{ $value }}</option>

                               @endforeach

                           </select>
                        </p>

                        <p align="right">
                            <input class="a1-btn a1-green a1-round" type="submit" name="submit" id="submit" value="Search">
                        </p>
                    </form>
                </td>
                <td>
                     <div class="a1-container">
                         @foreach($getqno as $g)
                         Class test:{{$g->examid}}
                         Subject Code:{{$g->subcode}}
                         Time:{{$g->time}}
                         <table>
                             <tr>
                                 <td>Qno.</td>
                                 <td></td>
                                 <td></td>
                             </tr>

                         </table>
                         @endforeach
                     </div>
                </td>
            </tr>
        </table>
    </div>
</div>