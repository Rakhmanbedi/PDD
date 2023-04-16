@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Authors table</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <h1>{{$test->header}}</h1>

                        @foreach($test->answer as $b)
                            <form action="{{route('question.check',$b)}}" method="post">
                                @csrf
                                <input type="hidden" name="status" value="{{$b->status}}">
                                <input type="hidden" name="id" value="{{$test->id}}">

                                <button type="submit">{{$b->answer}}</button>
                            </form>

                        @endforeach

                        <a href="{{route('category_b')}}">Next</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
