@extends('layout')

@section('content')
    
    <div class="slider-section">
        <div class="container">
            <div class="col-md-offset-8 col-md-3">
                <a class="subtle-button btn-lg text-center custom-btn" href="{{ url('share-book') }}">Share Books</a>
                <a class="subtle-button btn-lg custom-btn text-center" href="{{ url('search-page') }}">Borrow Books</a>
            </div>
        </div>
    </div>

    <div class="">
        <div class="container headline-container">
            <h1 class="text-center">How It Works</h1>
            <div class="headline-border col-md-offset-5"></div>
        </div>
        <div class="container middle-container">
            <div class="timeline-border">
                
            </div>
            <div class="col-md-8 col-md-offset-2 full-box-container">
                <div class="col-md-6 box-icon-contaier box-icon-1">
                    
                </div>
                <div class="col-md-6 box-text-container">
                    <h2 class="text-left">Share Books with Others</h2>
                    <p class="text-left">Here you can post your books which you wanted to share. People in your area will contact with you if he interested to borrow your book.</p>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2 full-box-container">
                <div class="col-md-6 box-text-container">
                    <h2 class="text-left">Find Your Favorite Books</h2>
                    <p class="text-left">Here you can search for books in your area. If you able to find your desired book then you can borrow it if the owner accept your book request.</p>
                </div>
                <div class="col-md-6 box-icon-contaier box-icon-2">
                    
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2 full-box-container">
                <div class="col-md-6 box-icon-contaier box-icon-3">
                    
                </div>
                <div class="col-md-6 box-text-container">
                    <h2 class="text-left">Reliable Platform</h2>
                    <p class="text-left">Our goal is to bring book lovers from all over the Bangladesh in one Platform, where they can share their books among them. Sharing and borrowing books from our site is safe. More features will be added in future.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="team-section">
        <div class="container team-container">
            <div class="team-headline-container text-center">
                <h3>Meet The Team</h3>
            </div>
            <div class="member-container">
                <img class="img-circle member-img" src="{{url("images/shahriar.jpg")}}" height="150px">
                <h4 class="text-center member-name">Moudud Khan Shahriar</h4>
                <h5 class="text-center member-position">CEO, Books</h5>
                <h5 class="text-center member-inst">CSE, SUST</h5>
            </div>
            <div class="member-container">
                <img class="img-circle member-img" src="{{url("images/nazim.jpg")}}" height="150px">
                <h4 class="text-center member-name">Md. Nazim Uddin</h4>
                <h5 class="text-center member-position">CTO, Books</h5>
                <h5 class="text-center member-inst">CSE, SUST</h5>
            </div>
        </div>
    </div>

@endsection