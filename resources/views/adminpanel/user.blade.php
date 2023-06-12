@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">{{__('message.Users_table')}} </h6>
                    </div>
                </div>
                <form action="{{route('user.search')}}" method="GET">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center mt-2 m-xxl-3">
                        <div class="input-group input-group-outline">
                            <label class="form-label">{{__('message.Type_here')}}</label>
                            <input type="text" name="search" class="form-control">
                        </div>
                    </div>
                </form>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{__('message.Users')}}</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{__('message.Role')}}</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{__('message.status')}}</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{__('message.Employed')}}</th>
                                <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{__('message.Edit')}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            @for($i = 0; $i < count($users); $i++)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$users[$i]->name}}</h6>
                                            <p class="text-xs text-secondary mb-0">{{$users[$i]->email}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{$users[$i]->role->name}}</p>

                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="badge badge-sm bg-gradient-success">{{__('message.Online')}}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{$users[$i]->created_at}}</span>
                                </td>
                                <td class="align-middle">


                                    <a href="{{route('user.edit',$users[$i]->id)}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        {{__('message.Edit')}}
                                    </a>
                                </td>
                                <td>
                                    <form action="
                                         @if($users[$i]->is_active)
                                             {{route('users.ban', $users[$i]->id)}}
                                         @else
                                             {{route('users.unban', $users[$i]->id)}}
                                         @endif" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn {{$users[$i]->is_active ? 'btn-danger' :'btn-success'}}" type="submit">
                                            @if($users[$i]->is_active)
                                                {{__('message.Ban')}}
                                            @else
                                                {{__('message.UnBan')}}
                                            @endif
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
