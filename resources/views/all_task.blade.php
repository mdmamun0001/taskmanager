@extends('layouts.master')
@section('title', 'taskManagerApp')
@section('content')

<!-- all task display start-->
 <section class="">
 	<div class="container-fluid">
 		<div class="row justify-content-center">
 			<div class="col-md-10">
 				@include('partials.message')
 				<h3 class="text-center"> Your all task </h3>
 				<table class="table table-striped table-hover">
				  <thead>
				    <tr>
				      <th scope="col">SL</th>
				      <th scope="col">Title</th>
				      <th scope="col">Assigned date</th>
				      <th scope="col">Assigned Time</th>
				      <th scope="col">Completed</th>
				      <th scope="col">Action</th>

				    </tr>
				  </thead>
				  <tbody>

				  	@foreach( $tasks as $task)
				    <tr>
				      <th scope="row">{{ $loop->index+1 }} </th>
				      <td>{{$task->title}}</td>
				      <td>{{date('d F Y', strtotime($task->task_date_time))}}</td>
				      <td>{{date('g:i A', strtotime($task->task_date_time))}}
				      </td>
				      <td>
				      	@if($task->is_completed)
                           <button type="button" class="btn btn-success">Yes</button>
				      	@else
                           <button type="button" class="btn btn-danger">No</button>
				      	@endif
				      </td>
				      <td> <a href="{{ route('tasks.show',$task->id)}}" class="btn btn-info" > View </a> 
				      	
				      	<a href="{{route('tasks.edit',$task->id)}}" class="btn btn-info" > Edit </a> 
				      	
				      	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletemodal_{{$task->id}}">Delete</button>
                         
                         <!-- modal for delete -->
                         <div class="modal fade" id="deletemodal_{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							       
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							        Are you sure?
							      </div>
							      <div class="modal-footer">
							        <form action="{{ route('tasks.delete',$task->id)}}" method="post">
							        	@csrf
			                            @method('delete')
							        	<button class="btn btn-danger" type="submit">Delete</button>
							        </form>

							      </div>
							    </div>
							  </div>
							</div>

				      </td>
				    </tr>
				    @endforeach
				  </tbody>
				</table>

				<h3 class="text-right"> <a href="{{ route('tasks.create')}}" class="btn btn-primary"> Add new Task</a> </h3>
 			</div>
 		</div>
 	</div>
 </section>
<!-- all task display end-->
  

<!--   important method time formating -->
<!-- \Carbon\Carbon::createFromFormat('H:i:s',$task->task_date_time)->format('g:i A')
				      	date('g:i A', strtotime($task->task_date_time)) -->
<!-- date('d F Y', strtotime($task->task_date_time)) -->



@stop