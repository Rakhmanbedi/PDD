@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('add_answer.store')}}" method="post">
                @csrf
                <div class="form-group shadow-info border-radius-lg mb-3">
                    <label for="exampleFormControlSelect1">Questions select</label>
                    <select name="test_id" class="form-control" id="exampleFormControlSelect1">
                        <option  selected > Выберте вапрос</option>
                        @foreach($all as $test)
                            @if(\App\Models\Answer::where('test_id',$test->id)->first() == False)
                               <option value="{{$test->id}}">{{$test->header}}</option>
                            @endif
                        @endforeach

                    </select>
                </div>
                <div class="form-group shadow-info border-radius-lg mb-3">
                        <div class="form-check">
                            <input style="border-radius: 50%" class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                <input style="border-radius: 13%" type="text " name="answer1" placeholder="answer number 1">
                            </label>
                        </div>
                        <div class="form-check">
                            <input  style="border-radius: 50%" class="form-check-input" type="checkbox" value="" id="defaultCheck2" disabled>
                            <label class="form-check-label" for="defaultCheck2">
                                <input style="border-radius: 13%" type="text " name="answer2" placeholder="answer number 2">
                            </label>
                        </div>
                        <div class="form-check">
                            <input style="border-radius: 50%" class="form-check-input" type="checkbox" value="" id="defaultCheck2" disabled>
                            <label class="form-check-label" for="defaultCheck2">
                                <input style="border-radius: 15%" type="text " name="answer3" placeholder="answer number 3">
                            </label>
                        </div>
                        <div class="form-check">
                            <input style="border-radius: 50%" class="form-check-input" type="checkbox" value="" id="defaultCheck2" disabled>
                            <label class="form-check-label" for="defaultCheck2">
                                <input style="border-radius:15%" type="text " name="answer4" placeholder="answer number 4">
                            </label>
                        </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-danger"> ADD +</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
