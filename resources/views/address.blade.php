@extends('layout')

@section('content')
    <div class="container address-wrapper">

        <div class="row">
            <div class="alert alert-info col-md-offset-2 col-md-8 col-xs-12">
                <h4 class="text-center">
                Your Profile is incomplete. First Complete it, before go to the next page!
                </h4>
            </div>
        </div>

        <div class="get-space address-form-section row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Fill This Form</h4></div>

                    <div class="panel-body">
                        {!! Form::open(array('method' => 'POST' , 'action' => ['InformationCollector@postAddress',Auth::user()->id] , 'class' => 'form-horizontal', 'files' => true))!!}

                        {{csrf_field()}}
                        <div class="row">
                            <div class="search-item col-md-4 col-xs-6">
                                <h4>District:</h4>
                                <select class="form-control district-option " name="dstr">
                                    <option value="0">-- Select --</option>

                                    {{$id = 0 }}

                                    @foreach($districts as $disrct)

                                        <option value="{{++$id}}">{{$disrct}}</option>

                                    @endforeach

                                </select>
                            </div>

                            <div class="search-item col-md-4 col-xs-6">
                                <h4>Area:</h4>
                                <select class="form-control district-option " name="upz">
                                    <option value="0">-- Select --</option>

                                    {{$id = 0 }}

                                    @foreach($upazila as $upzla)

                                        <option value="{{++$id}}">{{$upzla}}</option>

                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2 control-label">
                                {!! Form::label('file','Add Image :') !!}
                            </div>

                            <div class="col-md-6 image-section">
                                {!! Form::file('file',['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="search-item submit-btn col-md-6 col-xs-12">
                            <button class="btn-lg btn-primary">Submit</button>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        @if($alrt == 1)
            <div class="alert alert-warning">
                <strong>Wrong!</strong> Your Given Data Isn't Valid .
            </div>
        @endif

    </div>

@endsection