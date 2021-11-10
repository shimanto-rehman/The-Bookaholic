@extends('layout')

@section('content')

    <div class="container notification-body">
        <div class="notification-nav-section row">
            <ul class="nav nav-tabs col-md-offset-1 col-md-10">
                <li role="presentation" class="active"><a data-toggle="tab" href="#request">Request</a></li>
                <li role="presentation" class=""><a data-toggle="tab" href="#news">News</a></li>
            </ul>
        </div>

        <div class="tab-content">
            <div id="request" class="container request-section tab-pane fade in active">
                <div class="row">
                    @if(sizeof($types1) > 0)
                        @foreach($types1 as $type1)
                            <div class="{{"notification-bar notification-".$type1->id." unread-notification col-md-offset-1 col-md-10 col-xs-12"}}">
                                <div class="col-md-1 col-xs-2">
                                    <img src="{{url("images/request.png")}}"  height="40px">
                                </div>
                                <div class="col-md-8 col-xs-12 notification-text">
                                    <h5>
                                        <a href="{{url("/profile/{$type1->other_id}")}}">{{$type1->other_name}}</a>
                                        reuqested for
                                        <a href="{{url("/book/{$type1->book_id}")}}">{{$type1->book_name}}</a>
                                    </h5>
                                </div>
                                <div class="col-md-3 col-md-offset-0 col-xs-offset-6 col-xs-6 notification-btn">
                                    <a href="#" onclick="{{ "updateDb(".$type1->id. ",\"" .url("/profile/{$id}/notification/{$type1->other_id}/{$type1->book_id}/2")."\")"}}" class="btn btn-primary btn-success col-md-1">Accept</a>
                                    <a href="#" onclick="{{ "updateDb(".$type1->id. ",\"" .url("/profile/{$id}/notification/{$type1->other_id}/{$type1->book_id}/1")."\")"}}" class="btn btn-primary btn-danger col-md-1">Decline</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-danger error-msg col-xs-12 col-md-offset-2 col-md-8">
                            <h4 class="text-center">
                                <strong>Oops ! </strong> No Notification for You
                            </h4>
                        </div>
                    @endif
                </div>
            </div>

            <div id="news" class="container news-section tab-pane fade in">
                <div class="row">
                    @if(sizeof($types2) > 0)
                        @foreach($types2 as $type2)
                            <div class="notification-bar notification-bar-2 col-md-offset-1 col-md-10 col-xs-12">
                                <div class="col-md-1 col-xs-2">
                                    <img src="{{url("images/accept.png")}}"  height="40px">
                                </div>
                                <div class="col-md-11 col-xs-12 notification-text">
                                    <h5>
                                        <a href="{{url("/profile/{$type2->other_id}")}}">{{$type2->other_name}}</a>
                                        Accepted your request for
                                        <a href="{{url("/book/{$type2->book_id}")}}">{{$type2->book_name}}</a>
                                    </h5>

                                    <h5>Contact with <strong>{{$type2->mail}}</strong></h5>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-danger error-msg col-xs-12 col-md-offset-2 col-md-8">
                            <h4 class="text-center">
                                <strong>Oops ! </strong> No News for You
                            </h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>

        function updateDb(  notification_id, link ){

            //link = "http://localhost/books/public/profile/" + id + "/notification/" + other_id + "/" + book_id + "/2";
            notification_class = ".notification-" + notification_id;
//alert(link);
            $(document).ready(function(){
                $.get(link, function(data, status){

                    if( status == "success")
                    {
                        $(notification_class).fadeOut("slow");
                    }
                    else
                    {

                    }
                });

            });

        }

    </script>

@endsection