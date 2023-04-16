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

                        <form class="m-lg-6" action="{{route('profilestore')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-12 shadow-info border-radius-lg">
                                    <input name="email" type="email" class="form-control ">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-12 shadow-info border-radius-lg">
                                    <input name="name" type="name" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Number</label>
                                <div class="col-sm-12 shadow-info border-radius-lg">
                                    <input type="number" name="mobile" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">social</label>
                                <div class="col-sm-12 shadow-info border-radius-lg">
                                    <input name="social" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">social</label>
                                <div class="col-sm-12 shadow-info border-radius-lg">
                                    <input name="img" class="form-control" type="file" id="formFile">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">information</label>
                                <div class="col-sm-12 shadow-info border-radius-lg">
                                    <textarea name="information"  class="form-control" style="height: 100px"></textarea>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Submit Button</label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

            </div>
        </div>
    </div>
@endsection
