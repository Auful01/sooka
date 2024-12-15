@extends('app.layout-mobile')

@section('content')

    <div class="px-4 mt-4 d-flex ">
        <a href="/mobile/dashboard">
            <span class="material-symbols-outlined my-auto" >
                arrow_back
                </span>
        </a>
        <p class="ms-3 mb-0 fw-bold" style="font-size: 20px">
            Profile
        </p>
    </div>
    <div class="text-center" style="margin-top: 100px;">
        <img src="
       {{asset('images/login/sakoo.png')}}
        " alt="" style="max-height: 200px;">


        <div class="d-flex flex-column align-items-center mx-auto mt-5">
            <div class="mb-5 w-50">
                <h1 class="fw-bold">
                    {{
                        auth()->user()->name
                    }}
            </h1>
                <p>
                    {{
                        auth()->user()->email
                    }}
                </p>
            </div>
            <button class="btn btn-sm btn-primary mb-3 rounded-5 w-50" id="edit-profile">
                Edit Profile
            </button>
            <a href="/mobile/logout" class="btn btn-sm btn-primary rounded-5 w-50">
                Logout
            </a>
        </div>

        {{-- <div class="row justify-content-center">
            <div class="col-6">
            </div>
        </div> --}}
    </div>
@endsection


@push('scripts')
    <script>
        $('#edit-profile').on("click", function () {
            // window.location.href = "/mobile/edit-profile";
            swal({
                title: "Coming Soon",
                text: "This feature is coming soon",
                icon: "info",
                button: "OK",
            })
        })
    </script>
@endpush
