@extends('app.layout')

@section('content')

         <div class="container d-flex justify-content-center  align-items-center txt-primary" style="height: 100vh; flex-direction: column;">
            <h2 class="fw-bold">Welcome, {{Auth::user()->name}}!</h2>
            <h4>{{Auth::user()->email}}</h4>
            <div class="row d-flex">
                <div class="col-md-6 text-center" style="text-decoration: none">
                    <a href="/category">
                        <img src="{{asset('sakoo/sakoo_machine.png')}}" class="img-fluid" style="max-height: 200px;" alt="">
                        <p class="mt-4 txt-primary">Dispose</p>
                    </a>
                </div>
                <div class="col-md-6 text-center" style="text-decoration: none">
                    <a href="/exchange">
                        <img src="{{asset('sakoo/green_sakoo.png')}}" class="img-fluid" style="max-height: 200px;" alt="">
                        <p class="mt-4 txt-primary">Exchange</p>
                    </a>
                </div>
            </div>

            <div class="text-center">
                <a class="btn bt-primary btn-sm px-4" href="/logout">
                    Logout
                </a>
            </div>
      </div>

@endsection
