
@extends('layout')

@section('content')

	<div class="container book-header-section">
		<div class="row">
			<img src="{{url("images/books/{$data->id}.jpg")}}" class="col-md-3 img-thumbnail">
			<div class="col-md-8 book-intro-section">
				<h3>{{$data->book_name}}</h3>
				<h4><small>by {{$data->book_author}}</small></h4>
				<h5>Category: Programming</h5>
			</div>
		</div>
	</div>
	<div class="container book-description-container">
		<p>
			{{$data->description}}
		</p>
	</div>

	@if($data->is_owner == false)
	
	
		<div class="container shared-section">
			<h4>Shared by <a href="{{url("/profile/{$data->user_id}")}}" class="">{{$data->user_name}}</a></h4>
			<div>
				@if($data->is_requested == 0)
					<a href="{{url("/book/{$data->id}/{$data->user_id}")}}" class="request-btn">Request for This Book</a>
				@else
					<a href="" class="request-btn">Requested</a>
				@endif
			</div>
		</div>
	

	@else
	<div class="container book-edit-section">
		<h3 class="text-center">Change Book Status</h3>
		<div class="row">
			{!! Form::open(array('method' => 'POST' , 'action' => ['BookController@postChange' , $data->id])) !!}
				<div class="col-md-4 col-md-offset-4">
				    <label class="radio-inline">
				      	<input type="radio" name="optradio" value="1" {{$data->status == 1 ? 'checked' : ''}}>Available
				    </label>
				    <label class="radio-inline">
				      	<input type="radio" name="optradio" value="2" {{$data->status == 0 ? 'checked' : ''}}>Not Available
				    </label>
				    <label class="radio-inline">
				      	<input type="radio" name="optradio" value="3">Delete
				    </label>
			    </div>
			    {{--<input type="submit" value="Submit" class="btn btn-primary">--}}
			{!! Form::submit('submit' , ['class' => 'btn btn-primary']) !!}
			{!! Form::close() !!}
		</div>
	</div>
{{--
		<div class="container shared-section">
			<div>
				--}}{{--<a href="#" class="request-btn">Delete</a>--}}{{--
				{!! Form::open(array('method' => 'DELETE' , 'action' => ['BookController@destroy' , $data->id])) !!}
				{!! Form::submit('DELETE' , ['class' => 'request-btn']) !!}
				{!! Form::close() !!}
			</div>
		</div>
--}}
	@endif

@endsection