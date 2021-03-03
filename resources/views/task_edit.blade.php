@extends('layouts.master')
@section('title', 'taskManagerApp')
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
			          <form action="{{ route('tasks.update',$task->id)}}" method="post" enctype="multipart/form-data">
			            @csrf
			            @method('PUT')
			            <div class="form-group">
			              <label for="title">Title</label>
			              <input type="text" class="form-control" name="title" id="title" value="{{$task->title}}">
			            </div>

			            <div class="form-group">
			              <label for="description">Description</label>
			              <textarea name="description" id="description" rows="8" cols="80" class="form-control" placeholder="{{$task->description}}" ></textarea>
			            </div>
			              <p> Assigned on: <strong> {{date('d F Y', strtotime($task->task_date_time))}} at:{{date('g:i A', strtotime($task->task_date_time))}} </strong> </p>
                        <div class="form-group">
			              <label for="task_date_time_chng">Change Assign date and time</label>
			              <input type="datetime-local" class="form-control @error('task_date_time_chng') is-invalid @enderror" name="task_date_time_chng" id="task_date_time_chng" >
			              @error('task_date_time_chng')
							<div class="alert alert-danger">{{ $message }}</div>
						  @enderror
			            </div>
			           
                         <div class="form-group">
						    <label for="is_completed">Completed ?</label>
						    <select class="form-control" name="is_completed" id="is_completed">
						      <option value="1" {{ $task->is_completed==1 ? 'selected' : '' }} >Yes</option>
						      <option {{ $task->is_completed==0 ? 'selected' : '' }}  value="0">No</option>
						      
						    </select>
						  </div>

						  <div class="form-group">
			              <label for="task_image">Add Image</label>

			              <div class="row">
			                <div class="col-md-6">
			                  <input type="file" class="form-control @error('task_image[]') is-invalid @enderror" name="task_image[]" id="task_image" >
			                </div>
			                 @error('task_image[]')
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

			            <p class="text-right"><button  type="submit" class="btn btn-primary">Update the task Task</button></p>
			          </form>
			        </div>
			      </div>
			     <p class="text-right "> <a href="{{route('tasks.index')}}" class="btn btn-success " >Go back</a></p> 
 			</div>
 		</div>
 	</div>
 </section>
<!-- a new task creation  end-->
 @stop