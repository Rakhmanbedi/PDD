@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('add_questions.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group shadow-info border-radius-lg mb-3" style="align-content: center">
                    <input name="video" type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="form-group shadow-info border-radius-lg mb-3 " style="align-content: center">
                   <input type="text" class="form-control" name="header" placeholder="  Question">
                </div>
                <div class="form-group shadow-info border-radius-lg mb-3" style="align-content: center">
                    <textarea name="description" class="form-control shadow-info border-radius-lg" placeholder="  Description"></textarea>
                </div>
                <label for="categoryInput" class="form-label" >Select</label>
                <select class="form-select @error('category_id') is-invalid @enderror" id="categoryInput" name="category_id" >
                    @foreach($categories as $cat)
                        <option  value="{{$cat->id}}">{{$cat->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-outline-primary">Add +</button>

            </form>
        </div>
    </div>

@endsection
