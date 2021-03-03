@extends('layouts.master')
@section('title', 'taskManagerApp')
@section('link')

<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('jq-plugin/datetimepicker-master/jquery.datetimepicker.css')}}"/ >
@stop
@section('content')
<!-- a new task creation start-->
 <section class="">
 	<div class="container">
 		<div class="row justify-content-center">
 			<div class="col-md-6">
 				
			      <div class="card">
			        <div class="card-header">
			          Add New Task
			        </div>
			        <div class="card-body">
			          <form action="{{ route('tasks.store')}}" method="post" enctype="multipart/form-data">
			            @csrf
			            <div class="form-group">
			              <label for="title">Title</label>
			              <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter your Task title" value="{{ old('title') }}" required >
			              @error('title')
							<div class="alert alert-danger">{{ $message }}</div>
						  @enderror
			            </div>

			            <div class="form-group">
			              <label for="description">Description</label>
			              <textarea name="description" id="description" rows="8" cols="80" class="form-control"></textarea>
			            </div>
                        <div class="form-group">
			              <label for="datetimepicker">Assign date with time</label>
			              <input type="text" class="form-control @error('task_date_time') is-invalid @enderror" name="task_date_time" id="datetimepickers" required >
			              @error('task_date_time')
							<div class="alert alert-danger">{{ $message }}</div>
						  @enderror
			            </div>
			            
						<div class="form-group">
			              <label for="task_image">Image</label>

			              <div class="row">
			                <div class="col-md-6">
			                  <input type="file" class="form-control @error('task_image') is-invalid @enderror" name="task_image[]" id="task_image" >
			                </div>
			                 @error('task_image')
							<div class="alert alert-danger">{{ $message }}</div>
						     @enderror
			                <div class="col-md-6">
			                  <input type="file" class="form-control" name="task_image[]" id="task_image" >
			                </div>
			                <div class="col-md-6">
			                  <input type="file" class="form-control" name="task_image[]" id="task_image" >
			                </div>
			                <div class="col-md-6">
			                  <input type="file" class="form-control" name="task_image[]" id="task_image" >
			                </div>
			     
			              </div>
			            </div>
			            


			           <!--  <div class="form-group">
			              <label for="image">Brand Image (optional)</label>
			              <input type="file" class="form-control" name="image" id="image" >
			            </div>
 -->

			            <p class="text-right"><button  type="submit" class="btn btn-primary">Add new Task</button></p>
			          </form>
			        </div>
			      </div>
 			</div>
 		</div>
 	</div>
 </section>
<!-- a new task creation  end-->
@include('partials.datetime_picker_script')

@stop
