@extends('layouts.app')

@section('content')

    @if (session('sms'))
        <div class="alert alert-success" role="alert">
            {{ session('sms') }}
        </div>
    @endif


    <body>



    <!-- Page content-->
    @can('view', $test)
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <h3>{{$test->header}}</h3>
                    @isset($count)
                        <span>Дұрыс жауап саны: {{ $count }}</span>
                    @endisset
                    <article>

                        <figure class="mb-4"><img class="img-fluid rounded width-100" src="{{$test->video}}" alt="..." /></figure>

                    </article>

                </div>
                <!-- Side widgets-->
                <div class="col-lg-4 mt-5">
                    <!-- Search widget-->
                    {{--                <div class="card mt-5">--}}
                    {{--                    <div class="card-body">--}}
                    @foreach($test->answer as $b)
                        <form action="{{route('question.check',$b->id)}}" method="post">
                            @csrf
                            <input type="hidden" name="status" value="{{$b->status}}">
                            <input type="hidden" name="id" value="{{$test->id}}">

                            <button type="submit" onclick="document.getElementById('demo').style.display='block'" class="btn btn-primary">{{$b->answer}}</button>
                            {{--                                @if()--}}
                            {{--                                    --}}
                            {{--                                @endif--}}

                        </form>
                    @endforeach

                    <p style="display:none" id="demo">{{$test->description}}</p>
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--                <!-- Categories widget-->--}}
                    {{--                <div class="card mb-4">--}}
                    {{--                    <div class="card-header">Categories</div>--}}
                    {{--                    <div class="card-body">--}}
                    {{--                        <div class="row">--}}
                    {{--                            <div class="col-sm-6">--}}
                    {{--                                <ul class="list-unstyled mb-0">--}}
                    {{--                                    <li><a href="#!">Web Design</a></li>--}}
                    {{--                                    <li><a href="#!">HTML</a></li>--}}
                    {{--                                    <li><a href="#!">Freebies</a></li>--}}
                    {{--                                </ul>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="col-sm-6">--}}
                    {{--                                <ul class="list-unstyled mb-0">--}}
                    {{--                                    <li><a href="#!">JavaScript</a></li>--}}
                    {{--                                    <li><a href="#!">CSS</a></li>--}}
                    {{--                                    <li><a href="#!">Tutorials</a></li>--}}
                    {{--                                </ul>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    <a class="btn btn-outline-primary mt-2" href="{{route('category_b')}}">Next</a>
                    <div class="mx-auto pb-10 w-4/5">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    @else
        <h1 class="text-center" style="margin-top: 200px">Вам недоступен этот тест</h1>
        <form action="{{ route('cart.store', $test->category_id) }}" style="display: flex; justify-content: center" method="post">
            @csrf
            <button class="btn btn-primary">Купить тест</button>
        </form>
    @endcan

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    </body>


{{--    <div class="row">--}}
{{--        <div class="col-12">--}}
{{--            <div class="card my-4">--}}
{{--                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">--}}
{{--                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">--}}
{{--                        <h6 class="text-white text-capitalize ps-3">Authors table</h6>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-body px-0 pb-2">--}}
{{--                    <div class="table-responsive p-0">--}}
{{--                        <h1>{{$test->header}}</h1>--}}
{{--                        <div class="col-lg-7">--}}
{{--                            <div class="ratio ratio-16x9">--}}
{{--                                <iframe--}}
{{--                                    class="shadow-1-strong rounded width-100"--}}
{{--                                    src="{{$test->video}}"--}}
{{--                                    title="YouTube video"--}}
{{--                 >                   allowfullscreen--}}
{{--                                ></iframe>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="d-flex justify-content-between">--}}
{{--                        @foreach($test->answer as $b)--}}
{{--                            <form action="{{route('question.check',$b->id)}}" method="post">--}}
{{--                                @csrf--}}
{{--                                <input type="hidden" name="status" value="{{$b->status}}">--}}
{{--                                <input type="hidden" name="id" value="{{$test->id}}">--}}

{{--                                    <button type="submit" class="btn btn-primary">{{$b->answer}}</button>--}}
{{--                            </form>--}}
{{--                        @endforeach--}}
{{--                        </div>--}}
{{--                        <div class="card mb-3">--}}
{{--                            <div class="row g-0">--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <div class="col-lg-7">--}}
{{--                                        <div class="ratio ratio-16x9">--}}
{{--                                            <img--}}
{{--                                                class="shadow-1-strong rounded width-100"--}}
{{--                                                src="{{$test->video}}"--}}
{{--                                                title="YouTube video"--}}
{{--                                            >                   allowfullscreen--}}
{{--                                                ></img>--}}
{{--                                        </div>--}}
{{--                                    </div>                                </div>--}}
{{--                                <div class="col-md-8">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <h1>{{$test->header}}</h1>--}}
{{--                                        <p>{{$test->description}}</p>--}}


{{--                                        <div class="d-flex justify-content-sm-between">--}}

{{--                                        @foreach($test->answer as $b)--}}
{{--                                                <form action="{{route('question.check',$b->id)}}" method="post">--}}
{{--                                                    @csrf--}}
{{--                                                    <input type="hidden" name="status" value="{{$b->status}}">--}}
{{--                                                    <input type="hidden" name="id" value="{{$test->id}}">--}}

{{--                                                    <button type="submit" class="btn btn-primary">{{$b->answer}}</button>--}}
{{--                                                </form>--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="mx-auto pb-10 w-4/5">--}}
{{--                            {{ $posts }}--}}
{{--                        </div>--}}


{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
