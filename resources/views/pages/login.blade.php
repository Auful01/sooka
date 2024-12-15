@extends('app.layout-admin')

@section('content')

    <div class="row d-flex">
        <div class="col-md-6">
            <div class="container d-flex justify-content-center " style="height: 100vh;width:500px; flex-direction: column;">
                <div class="mb-4">
                    <div class="row d-flex">
                        <div class="col-auto">
                            <h1 class="fw-bold mt-3">Login</h1>
                            <small >
                                <i>
                                    Please enter your username and password to login
                                </i>
                            </small>
                        </div>
                        <div class="col-2">
                            <img src="{{asset('images/login/sakoo.png')}}" style="max-height: 100px;max-width: 100px" alt="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control cstm-form" placeholder="Username" id="username">
                </div>
                <div class="form-group mt-4">
                    <input type="password" class="form-control  cstm-form" placeholder="Password" id="password">
                </div>

                <button id="login" class="btn btn-sm bt-accent px-4 rounded-4 mt-4 fw-bold" style="color: #525050">
                    Login
                </button>

                <div class="mt-4">
                    <small>
                        <a href="signup" class="txt-primary">Dont have any account?</a>
                    </small>
                </div>
            </div>
        </div>
        <div class="col-md-6 bg-overlay" style="background-image: url('{{asset('images/login/background.png')}}');background-size: cover;">
                <div class="bg-white rounded position-absolute" style="z-index: 2;top: 50%;left:50%;transform: translate(-50%, -50%);">
                    <img src="{{asset('images/login/qr.png')}}" style="height: 400px" alt="">
                    <p class="text-center fw-bold txt-primary mb-5" style="font-size: 25px">
                        Scan QR for SAKOO app
                    </p>
                </div>
        </div>
    </div>

@endsection


@push('scripts')
    <script>

        $('#login').on("click", function () {
            $.ajax({
                url: '/api/login',
                type: 'POST',
                data: {
                    username: $("#username").val(),
                    password: $("#password").val()
                },
                success: function (data) {
                    // console.log(data);
                    if (data.status == 'success') {
                        swal({
                            title: "Success",
                            text: data.message,
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        })

                        setTimeout(() => {
                            // Set the cookie using a library like js-cookie or the native `document.cookie`
                            const date = new Date();
                            date.setTime(date.getTime() + (data.expires_in)); // 1 hour in milliseconds
                            document.cookie = `token=${data.access_token}; path=/; expires=${date.toUTCString()}; secure; samesite=strict;`;

                            if (data.role == 1) {
                                window.location.href = "/admin/dashboard";
                            } else {
                                window.location.href = "/dashboard";
                            }
                        }, 1500);
                    } else {
                        swal({
                            title: "Error",
                            text: data.message,
                            icon: "error",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                },
                error: function (error) {
                    console.log(error);
                    swal({
                        title: "Error",
                        text: "Invalid username or password",
                        icon: "error",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            })
        })
    </script>

@endpush
