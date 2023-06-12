@extends('layouts.app')

@section('content')
    <section>
        <div class="container py-2">

            <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-11">


                        <div class="card-header d-flex justify-content-between align-items-center p-3">
                            <h5 class="mb-0">{{__('message.Chat')}}</h5>
                            <button type="button" class="btn btn-primary btn-sm back-to-bottom d-flex align-items-center justify-content-center" data-mdb-ripple-color="dark">
                                <span class="material-icons">vertical_align_bottom</span>
                            </button>
{{--                            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="vertical_align_bottom"></i></a>--}}
                        </div>
                        <div class="card-body" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px">
                            @foreach($message as $messages)
                                @if($messages->user_id == $user->id)
                                    <div class="d-flex flex-row justify-content-end mb-1 pt-1">
                                        <div>
                                            <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">{{$messages->message}}
                                            </p>
                                            <span class="badge border-secondary border-1 text-secondary">{{$messages->created_at}}
                                            </span>
                                        </div>
                                    </div>
                                @else
                                    <div class="d-flex flex-row justify-content-start">
                                        <p>{{$messages->user->name}}</p>
                                        <div>
                                            <p class=" p-2 ms-3 mb-1 rounded-3 text-black" style="background-color: lightblue;">{{$messages->message}}</p>
                                            <span class="badge border-secondary border-1 text-black">{{$messages->created_at}}</span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <div class="d-flex flex-row justify-content-start">

                            </div>


                            <div class="divider d-flex align-items-center mb-4">
                                <p class="text-center mx-3 mb-0" style="color: #a2aab7;"></p>
                            </div>



                        <form action="{{route('storeMessage')}}" method="post">
                            @csrf
                            <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp"
                                     alt="avatar 3" style="width: 40px; height: 100%;">
                                <input type="text" name="message" class="form-control form-control-lg" id="exampleFormControlInput1"
                                       placeholder="{{__('message.Type message')}}">
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <a class="ms-1 text-muted" href="#!"><i class="fas fa-paperclip"></i></a>
                                <a class="ms-3 text-muted" href="#!"><i class="fas fa-smile"></i></a>
                                <button class="ms-3 text-muted border-radius-2xl"><i class="fas fa-paper-plane"></i></button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <style>
        #chat2 .form-control {
            border-color: transparent;
        }

        #chat2 .form-control:focus {
            border-color: transparent;
            box-shadow: inset 0px 0px 0px 1px transparent;
        }

        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
    </style>
@endsection
