@extends('app.layout-mobile')

@section('content')

    <style>

        /* .bg-login-green {
            background-color: #c4d581;
            min-height: 800px;
            width: 100%;
            position: absolute;
            bottom: 0;
            z-index: -1;
            border-radius: 8% 8% 0 0;
        } */
    </style>

    <div style="overflow: hidden">
        <div class="px-4 mt-4 d-flex ">
            <a href="/mobile/login">
                <span class="material-symbols-outlined my-auto" >
                    arrow_back
                    </span>
            </a>
        </div>
        <div class="text-center" style="padding-top: 60px">

            <div class="bg-login-green">

            </div>

            <div class="row justify-content-center">
                <div class="col-10">
                    <h1 class="fw-bold my-5 text-start">
                        Sign Up
                    </h1>
                    <div class="form-group text-start">
                        <label for="">Firstname</label>
                        <input type="text" class="form-control cstm-form" placeholder="First Name" id="John">
                    </div>
                    <div class="form-group text-start mt-3">
                        <label for="">Lastname</label>
                        <input type="text" class="form-control cstm-form" placeholder="Last Name" id="John">
                    </div>
                    <div class="form-group text-start mt-3">
                        <label for="">Username</label>
                        <input type="text" class="form-control cstm-form" placeholder="Username" id="john">
                    </div>
                    <div class="form-group text-start mt-3">
                        <label for="">Email</label>
                        <input type="email" class="form-control cstm-form" placeholder="Email" id="john@gmail.com">
                    </div>
                    <div class="form-group text-start my-3">
                        <label for="">Password</label>
                        <input type="password" class="form-control  cstm-form" placeholder="Password" id="password">
                    </div>

                    <button id="login" class="btn w-100 btn-sm bt-primary text-white px-4 rounded-4 mt-5 fw-bold" style="color: #525050">
                        Sign Up
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
