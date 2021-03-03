@extends('layouts.master')
@section('title', 'taskManagerApp')
@section('content')

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
           <div class="card-header">
            <h3 class="text-center"> Task: {{$task->title}}</h3>
           </div>
           <div class="card-body">
            
                     <p>Description: {{$task->description}}</p>
                     <h6> Assigned On : {{ date('d F Y', strtotime($task->task_date_time))}} At:{{ date('g:i A', strtotime($task->task_date_time))}}</h6>

                    <p>
                      @if($task->is_completed)
                      <button class="btn btn-success">Your task is Completed</button>
                      @else
                      <button class="btn btn-danger">Your task is Incompleted</button>
                      @endif

                    </p>
                   
                    
                    <div class="row">
                      @foreach($images as $image)
                      <div class="col-md-4">
                        <img class="img-fluid" style=" height: 250px;" src="{{ asset('images/'.$image->image)}}">
                      </div>
                      @endforeach
                    </div>

            <p class="text-right"><a href="{{route('tasks.index')}}" class="btn btn-primary">Go back</a></p>
           </div>
        </div>
      </div>
    </div>
  </div>
  @stop