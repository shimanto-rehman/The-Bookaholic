@extends('layout')

@section('content')

    <div class="container auth-container">
        <div class="col-md-5 form-container">
            <div class="form-icon-container">
            </div>
            <div class="col-md-12 form-label-container">
                <h2 class="text-center">Register</h2>
            </div>
            <div class="col-md-10 col-md-offset-1 error-container">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="text" class="col-md-10 col-md-offset-1 form-item" name="name" onblur="if (this.value == '') {this.value = 'NAME';}" onfocus="this.value = '';" value="NAME">
                    <input type="email" class="col-md-10 col-md-offset-1 form-item" name="email" onblur="if (this.value == '') {this.value = 'EMAIL';}" onfocus="this.value = '';" value="EMAIL">
                    <input type="password" class="col-md-10 col-md-offset-1 form-item" name="password" onblur="if (this.value == '') {this.value = 'PASSWORD';}" onfocus="this.value = '';" value="PASSWORD">
                    <input type="password" class="col-md-10 col-md-offset-1 form-item" name="password_confirmation" onblur="if (this.value == '') {this.value = 'PASSWORD';}" onfocus="this.value = '';" value="PASSWORD">
                    <input type="submit" class="col-md-10 col-md-offset-1 form-item form-submit" value="SUBMIT">
                </form>
            </div>
        </div>
    </div>

@endsection