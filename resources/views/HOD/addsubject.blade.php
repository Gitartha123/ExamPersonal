<?php session_start(); ?>
<html>
<head>
    <title>Addsubject</title>
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <!--Selected value inserted to text box-->

</head>

<body>
<div class="a1-container a1-card a1-padding-4 a1-center " style="width: 60%; height:auto; overflow:hidden;margin: auto; ">
    @include('header')
    <div class="a1-row a1-center a1-red a1-margin"><b><h3>ADD SUBJECT</h3></b></div>
    <div class="a1-container a1-padding-4 a1-margin " >
        <table class="a1-table" >
            <form method="post" action="{{ route('postvalue') }}">
                {{ csrf_field() }}
                <tr>
                    <td>
                        {!! Form::label('subcode','Subject Name:') !!}
                    </td>
                    <td>
                        <input type="text" name="subname" id="subname" class="form-control" style="width: 100%" placeholder="Enter Subject ">
                    </td>
                </tr>
                <tr>
                    <td>
                        {!! Form::label('subcode','Subject Code:') !!}
                    </td>
                    <td>
                        <input type="text" name="sub_code" id="sub_code" class="form-control" style="width: 100%"  placeholder="Enter Subject code">
                    </td>
                </tr>

                <tr>
                    <td>
                        {!! Form::label('Semester','Select Semester:') !!}
                    </td>
                    <td>
                        <select name="semester" class="form-control " style="width:100%"  id="semester">
                            <option value="">--Select Semester--</option>
                            @php $semester = DB::table('semester')->pluck("semester","id");@endphp
                            @foreach ($semester as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        &nbsp;
                    </td>
                    <td>
                        {!! Form::submit('SAVE',['class'=>"a1-round a1-right a1-hover-red a1-button a1-block a1-section a1-light-gray a1-ripple a1-padding",'style'=>'width:100px;']) !!}
                    </td>
                </tr>
            </form>
        </table>
    </div>
</div>
</body>
</html>




