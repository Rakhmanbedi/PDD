@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="card mt-4">
                    <div class="card-header p-3">
                        <h5 class="mb-0">Alerts</h5>
                    </div>
                    <div class="card-body p-3 pb-0">
                        <div class="col-lg-12 col-sm-6 col-12 mt-sm-0 mt-5">
                            <button class="btn bg-gradient-info w-100 mb-3 toast-btn" type="button" data-target="infoToast">Category A1, A, B1</button>
                        </div>

                        <div class="col-lg-12 col-sm-6 col-12 mt-sm-0 mt-5">
                            <a href="{{route('category_b')}}"><button class="btn bg-gradient-info w-100 mb-3 toast-btn" type="button" data-target="infoToast">Category B, BE</button></a>
                        </div>

                        <div class="col-lg-12 col-sm-6 col-12 mt-sm-0 mt-5">
                            <button class="btn bg-gradient-info w-100 mb-3 toast-btn" type="button" data-target="infoToast">Category C1, C</button>
                        </div>

                        <div class="col-lg-12 col-sm-4 col-12 mt-sm-0 mt-5">
                            <button class="btn bg-gradient-info w-100 mb-3 toast-btn" type="button" data-target="infoToast">Category D1, D, TB</button>
                        </div>

                        <div class="col-lg-12 col-sm-4 col-12 mt-sm-0 mt-5">
                            <button class="btn bg-gradient-info w-100 mb-3 toast-btn" type="button" data-target="infoToast">Category C1E, CE, D1E, DE</button>
                        </div>

                        <div class="col-lg-12 col-sm-4 col-12 mt-sm-0 mt-5">
                            <button class="btn bg-gradient-info w-100 mb-6 toast-btn" type="button" data-target="infoToast">Category TM</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
