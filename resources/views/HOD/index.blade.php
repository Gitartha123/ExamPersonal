@extends('layout/master')
@section('body')
    <div class=" a1-margin a1-container a1-light-gray" >
        @include('layouts.app');
        <div class="a1-row">
            <div class="a1-half a1-border a1-padding">
                <div class="a1-card " style="width: 200px; height: 200px;">
                    <img src="resources/views/image/subject.png" style="width: 200px; height: 200px;">
                </div>
                <a href="{{route('Addsubject')}}" class="a1-button a1-hover-red a1-margin a1-center">Add Subject</a>
            </div>

            <div class="a1-half a1-border a1-padding">
                <div class="a1-card" style="width: 200px; height: 200px;">
                    <img src="resources/views/image/english-subject-png-english-2246.png" style="width: 200px; height: 200px;">
                </div>
                <a class="a1-button a1-hover-red a1-margin a1-center" >View Subject</a>
            </div>
        </div>


        <div class="a1-row">
            <div class="a1-half a1-border a1-padding">
                <div class="a1-card" style="width: 200px; height: 200px;">
                    <img src="resources/views/image/107700372-exam-vector-icon-isolated-on-transparent-background-exam-logo-concept.jpg" style="width: 200px; height: 200px;">
                </div>
                <a href="{{route('AddExam')}}" class="a1-button a1-hover-red a1-margin a1-center">Add Exam</a>
            </div>

            <div class="a1-half a1-border a1-padding">
                <div class="a1-card " style="width: 200px; height: 200px;">
                    <img src="resources/views/image/mock_exam_542660.png" style="width: 200px; height: 200px;">
                </div>
                <button  class="a1-button a1-hover-red a1-margin a1-center">View Exam</button>
            </div>
        </div>
    </div>
@endsection