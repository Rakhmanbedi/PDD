@extends('layouts.app')

@section('content')
    <section class="vh-100">
        <div class="container py-5 h-50">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-md-9 col-lg-7 col-xl-5">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-4">
                            <div class="d-flex text-black">
                                <div class="flex-shrink-0">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                                         alt="Generic placeholder image" class="img-fluid"
                                         style="width: 180px; border-radius: 10px;">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1">{{$user->name}}</h5>
                                    <p class="mb-2 pb-1" style="color: #2b2a2a;">{{$user->email}}</p>
                                    <div class="d-flex justify-content-start rounded-3 p-2 mb-2"
                                         style="background-color: #efefef;">
                                        <div>
                                            <p class="small text-muted mb-1">Articles</p>
                                            <p class="mb-0">41</p>
                                        </div>
                                        <div class="px-3">
                                            <p class="small text-muted mb-1">Followers</p>
                                            <p class="mb-0">976</p>
                                        </div>
                                        <div>
                                            <p class="small text-muted mb-1">Rating</p>
                                            <p class="mb-0">8.5</p>
                                        </div>
                                    </div>
                                    <div class="d-flex pt-1">
                                        <form action="
                                         @if($user->is_active)
                                             {{route('users.ban', $user->id)}}
                                         @else
                                             {{route('users.unban', $user->id)}}
                                         @endif" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn {{$user->is_active ? 'btn btn-outline-primary me-1 flex-grow-1' :'btn btn-outline-success me-1 flex-grow-1'}}" type="submit">
                                                @if($user->is_active)
                                                    {{__('message.Ban')}}

                                                @else
                                                    {{__('message.UnBan')}}
                                                @endif
                                            </button>
                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
