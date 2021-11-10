@extends('layout')

@section('content')

	<div class="profile-section">
		<div class="cover-container">

		</div>

		<div class="container-fluid about-me-section">
			<div class="container">
				<img src="{{url("images/profile/{$user->id}.jpg")}}" class="img-circle profile-pic">
				<h3 class="text-center profile-name">{{$user->name}}</h3>
				<h5 class="text-center profile-addrs">{{$user->upazila}}, {{$user->district}}</h5>
			</div>
		</div>

		<div class="container profile-body">
			<div class="profile-nav-section row">
				<ul class="nav nav-tabs col-md-offset-1 col-md-10">
					<li role="presentation" class="active"><a data-toggle="tab" href="#books">Shared Books</a></li>
					<li role="presentation" class=""><a data-toggle="tab" href="#about">About</a></li>
				</ul>
			</div>

			<div class="tab-content">
				<div id="books" class="container book-section tab-pane fade in active">
					<!--
                        <div class="col-xs-12 section-name-container">
                            <h3>Shared Books</h3>
                        </div>
                    -->
					<div class="row">
						@if(sizeof($books) > 0)
							<div class="row">
								@foreach($books as $book)
									<a href = "{{url("/book/{$book->id}")}}" class="col-md-8 col-md-offset-2 book-container">
										<div class="col-md-2 book-cover-container">
											<img src="{{url("images/books/{$book->id}.jpg")}}" height="138px">
										</div>
										<div class="col-md-10 book-info-section">
											<h3>{{$book->name}}</h3>
											<h4><small>by {{$book->author}}</small></h4>
											<div>
												<p>
													{{$book->description}}
												</p>
											</div>
										</div>
									</a>
								@endforeach

								{{--<div class="pagination"> {{ $books->links() }} </div>--}}
							</div>
						@else
							<div class="row">
								<div class="alert alert-danger error-msg col-xs-12 col-md-offset-2 col-md-8">
									<h4 class="text-center">
										<strong> Nothing to Show. </strong>
									</h4>
								</div>
							</div>
						@endif
					</div>

					{{--<div class="container pagination-section" style="width: 260px;">--}}
						{{--<nav aria-label="Page navigation">--}}
							{{--<ul class="pagination">--}}
								{{--<li>--}}
									{{--<a href="#" aria-label="Previous">--}}
										{{--<span aria-hidden="true">&laquo;</span>--}}
									{{--</a>--}}
								{{--</li>--}}
								{{--<li class="active"><a href="#">1</a></li>--}}
								{{--<li><a href="#">2</a></li>--}}
								{{--<li><a href="#">3</a></li>--}}
								{{--<li><a href="#">4</a></li>--}}
								{{--<li><a href="#">5</a></li>--}}
								{{--<li>--}}
									{{--<a href="#" aria-label="Next">--}}
										{{--<span aria-hidden="true">&raquo;</span>--}}
									{{--</a>--}}
								{{--</li>--}}
								{{--{{$user->books->link()}}--}}
							{{--</ul>--}}
						{{--</nav>--}}
					{{--</div>--}}
				</div>

				<div id="about" class="container tab-pane fade">
					<div class="container">
						<div class="info-section col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
							<address class="text-center">
								<strong>Studies at : </strong> {{$user->studies}}
							</address>

							<address class="text-center">
								<strong>Address: </strong> {{$user->d_address}}
							</address>
						</div>
					</div>

					@if(Auth::user()->id == $user->id)

						<div class="text-center">
							<a href="{{url("/profile/{$user->id}/about")}}" class="btn btn-primary">Edit</a>
						</div>

					@endif

				</div>
			</div>
		</div>

	</div>

@endsection