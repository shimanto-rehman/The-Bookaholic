
@extends('layout')

@section('content')
	
	<div class="container search-bar">
		<h3>Select Your Address</h3>

		{!! Form::open(array('method' => 'POST' , 'action' => 'SearchController@postBookList' , 'class' => 'form-horizontal'))!!}

		{{csrf_field()}}
			<div class="row">
				<div class="search-item col-md-offset-2 col-md-3 col-xs-6">
					<h4>District:</h4>
					<select class="form-control district-option " name="dstr">
						<option value="0" {{$selected1 == -1 ? 'selected="selected"' : ''}}>-- Select --</option>

                        {{$id = 0 }}

						@foreach($districts as $disrct)

							<option value="{{++$id}}" {{$selected1 == $id ? 'selected="selected"' : ''}} >{{$disrct}}</option>

						@endforeach

					</select>
				</div>

				<div class="search-item col-md-3 com-md-offset-2 col-xs-6">
					<h4>Area:</h4>
                    <select class="form-control district-option " name="upz">
                        <option value="0" {{$selected2 == -1 ? 'selected="selected"' : ''}}>-- Select --</option>

                        {{$id = 0 }}

                        @foreach($upazila as $upzla)

                            <option value="{{++$id}}" {{$selected2 == $id ? 'selected="selected"' : ''}} >{{$upzla}}</option>

                        @endforeach

                    </select>
				</div>


				{{--<div class="search-item col-md-3 com-md-offset-2 col-xs-6">--}}
					{{--<h4>Category:</h4>--}}
					{{--<select class="form-control upazila-option">--}}
						{{--<option>Programming</option>--}}
						{{--<option>Fiction</option>--}}
						{{--<option>Comics</option>--}}
						{{--<option>Others</option>--}}
					{{--</select>--}}
				{{--</div>--}}
				<div class="search-item col-md-3 col-md-offset-0 col-xs-offset-2 col-xs-8">
					<button class="btn-lg btn-primary">Apply</button>
				</div>
			</div>
		{!! Form::close() !!}
	</div>

	<div class="container search-result-section">

        <div class="row">
            <div class="col-md-12 col-xs-12 section-name-container">
                <h3>Search Results</h3>
            </div>
        </div>

        @if(sizeof($all_books) > 0)
            <div class="row">
                @foreach($all_books as $book)
                    <a href = "{{url("/book/{$book->id}")}}" class="col-md-8 col-md-offset-2 book-container">
                        <div class="col-md-2 book-cover-container">
                            <img src="{{url("images/books/{$book->id}.jpg")}}" height="138px">
                        </div>
                        <div class="col-md-10 book-info-section">
                            <h3>{{$book->name}}</h3>
                            
                            <h4>
                            {{-- <a href="{{url("/profile/{$book->shared_by}")}}">{{$book->shared_by_name}}</a> --}}
                            <small>by {{$book->author}} <strong class="col-xs-offset-1">Shared by {{$book->shared_by_name}}</strong></small>
                            </h4>
                            <div>
                                <p>
                                    {{$book->description}}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="row">
                <div class="alert alert-danger error-msg col-xs-12 col-md-offset-2 col-md-8">
                    <h4 class="text-center">
                        <strong>Oops ! </strong> {{$msg}}
                    </h4>
                </div>
            </div>
        @endif


		</div>

@endsection