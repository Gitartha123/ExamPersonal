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
        <div class="a1-row a1-center a1-red a1-margin">
                <b><h3>Class Test :@foreach ($exam as $e)<?= $e; ?> @endforeach</h3></b>
            <p>
                <b><h4>Subject code :@foreach ($subject as $e)<?= $e; ?> @endforeach</h4></b>
            </p>
        </div>
    <div class="a1-container a1-padding-4 a1-margin " >
        <form method="post" action="{{route('q')}}">
            @csrf
            @foreach ($qno as $e)
                       <table>
                           <tr>
                               <td>Qno:</td>
                               <td>
                                   <input type="text" class="form-control a1-center" name="qno" value="<?= $e; ?>" style="width:80px;" readonly="true" required>
                               </td>
                               <td>&nbsp;</td>
                               <td>&nbsp;</td>
                               <td>&nbsp;</td>
                               <td>&nbsp;</td>
                               <td>Total Marks:</td>
                               <td>
                                   @foreach($total as $e)
                                       <input type="text" class="form-control a1-center" name="total" value="<?= $e; ?>" style="width:80px;"readonly>
                                       @endforeach
                               </td>
                               <td>/</td>
                               <td>
                                   @foreach($totalmarks as $e)
                                       <input type="text" value="{{$e->totalmarks}}" class="form-control" name="totalmarks"style="width:80px;"readonly>
                                       @endforeach
                               </td>
                           </tr>
                       </table>
                        @endforeach
            @foreach ($semester as $e)
                <input type="text" name="semid" value="<?= $e; ?>" style="display: none;">
            @endforeach
            @foreach ($subject as $e)
                <input type="text" name="subcode" value="<?= $e; ?>" style="display: none;">
            @endforeach
            @foreach ($exam as $e)
                <input type="text" name="examid" value="<?= $e; ?>" style="display: none;">
            @endforeach
            @foreach ($qtype as $e)
                <input type="text" name="qtype" value="<?= $e; ?>" style="display: none;">
            @endforeach
            @foreach ($noq as $e)
                <input type="text" name="noq" value="<?= $e; ?>" style="display: none;">
            @endforeach
            <table class="a1-table">
                {{ csrf_field() }}

                <tr>
                    <td>
                        {!! Form::textarea('question','',['class'=>'form-control','placeholder'=>'Write a question','style'=>'height:100px;']) !!}
                    </td>
                </tr>
            </table>
            <table class="a1-table">
                <tr>
                    <td>
                        {!! Form::label('Option 1:','','noq') !!}
                    </td>
                    <td>
                        {!! Form::text('option1','',['class'=>'form-control']) !!}
                    </td>
                    <td>
                        {!! Form::label('Option 2:','','noq') !!}
                    </td>
                    <td>
                        {!! Form::text('option2','',['class'=>'form-control']) !!}
                    </td>
                </tr>
                <tr>
                    <td class="a1-left">
                        {!! Form::label('Option 3:','','noq') !!}
                    </td>
                    <td>
                        {!! Form::text('option3','',['class'=>'form-control']) !!}
                    </td>

                    <td>
                        {!! Form::label('Option 4:','','option4') !!}
                    </td>
                    <td>
                        {!! Form::text('option4','',['class'=>'form-control']) !!}
                    </td>
                </tr>
                <tr>
                    <td>
                        {!! Form::label('Select Correct Option:','','coption') !!}
                    </td>
                    <td>
                        <select name="coption" id="" class="form-control">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                            <option>Option 4</option>
                        </select>
                    </td>
                    <td>
                        {!! Form::label('Marks:','','option4') !!}
                    </td>
                    <td>
                        @foreach($mark as $e)
                        <input type="text" class="form-control a1-center" name="mark" value="0" style="width:80px;">
                        @endforeach
                    </td>
                </tr>
            </table>
            <table class="a1-table">
                <tr>
                    <td>
                        &nbsp;
                    </td>
                    <td>
                        {!! Form::submit('NEXT',['class'=>"a1-round a1-right a1-hover-red a1-button a1-block a1-section a1-light-gray a1-ripple a1-padding",'style'=>'width:100px;']) !!}
                    </td>
                </tr>
            </table>
            </form>
    </div>
</div>
</body>
</html>







