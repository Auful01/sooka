@extends('app.layout-mobile')

@section('content')
<div class="px-4 mt-4 d-flex ">
    <a href="/mobile/dashboard">
        <span class="material-symbols-outlined my-auto" >
            arrow_back
            </span>
    </a>
    <p class="ms-3 mb-0 fw-bold" style="font-size: 20px">
        Recently Exchanged
    </p>
</div>

<div class="card shadow-none mx-3 rounded-4" style="margin-top: 20px;" >
    <div class="card-body rounded-4" style="height: 750px;">
        <div class="d-flex">
         <span class="material-symbols-outlined">
             history
             </span>
                 History
        </div>

        <div style="overflow-y: auto;max-height:320px;" class="mt-4">
            @foreach ($data as $dt)
            <div class="rounded-3 p-2 mb-3" style="background: #fcfcfc">
                <p>{{$dt['created_at']}}</p>

                <table>
                    <tr>
                        <td>Exchange to</td>
                        <td>: {{$dt['exchange']['name']}}</td>


                    </tr>
                    <tr>
                        <td>Points Used&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>: {{$dt['exchange']['point']}}</td>
                    </tr>
                </table>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
