@extends('layout')

{{--{!! Html::style('css/app.css') !!}--}}

@section('content')
    <div class="container">
        <div class="get-space row add-book-form">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Book</div>

                    <div class="panel-body">
                        {!! Form::open(array('method' => 'POST' , 'action' => 'BookController@postBook' , 'class' => 'form-horizontal' , 'files' => true))!!}

                        {{csrf_field()}}

                        <div class="form-group">
                            <div class="col-md-4 control-label">
                                {{Form::label('name' , 'Book Name :')}}
                            </div>

                            <div class="col-md-6 {{ $errors->has('book_name') ? 'has-error' : '' }}">
                                {{Form::text('name',null,['class' => 'form-control'])}}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>Please Fill Book Name</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 control-label">
                                {{Form::label('author' , 'Author Name :')}}
                            </div>

                            <div class="col-md-6 {{ $errors->has('book_author') ? 'has-error' : '' }}">
                                {{Form::text('author',null,['class' => 'form-control'])}}

                                @if ($errors->has('author'))
                                    <span class="help-block">
                                        <strong>Please Fill Author Name</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 control-label">
                                {{Form::label('description' , 'Book\'s Short Description :')}}
                            </div>

                            <div class="col-md-6">
                                {{Form::textarea('description' , null , ['class' => 'form-control'])}}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 control-label">
                                {!! Form::label('file','Add Image :') !!}
                            </div>

                            <div class="col-md-6">
                                {!! Form::file('file',['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-5">
                                {{Form::submit('Share This Book' , ['class' => 'btn btn-primary'])}}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection