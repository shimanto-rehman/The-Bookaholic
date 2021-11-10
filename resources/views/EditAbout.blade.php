@extends('layout')

@section('content')
    <div class="container">
        <div class="get-space row edit-about-section">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit About</div>

                    <div class="panel-body">
                        {!! Form::open(array('method' => 'POST' , 'action' => ['ProfileController@postAbout',Auth::user()->id]  , 'class' => 'form-horizontal'))!!}

                        {{csrf_field()}}

                        <div class="form-group">
                            <div class="col-md-4 control-label">
                                {{Form::label('institution' , 'Studies at :')}}
                            </div>

                            <div class="col-md-6">
                                {{Form::text('institution',null,['class' => 'form-control'])}}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 control-label">
                                {{Form::label('address' , 'Address :')}}
                            </div>

                            <div class="col-md-6">
                                {{Form::text('address',null,['class' => 'form-control'])}}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-5">
                                {{Form::submit('Save' , ['class' => 'btn btn-primary'])}}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection