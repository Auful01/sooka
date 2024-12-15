@extends('app.layout-mobile')

@section('content')


    <div class="content-wrapper">
        <div style="background: #c6df76; padding-bottom: 10px;padding-top;20px" >
            <table class="w-100" >
                <tr>
                    <td class="text-end pt-3">
                        <div class="me-3">
                            <a href="/mobile/profile">
                                <span class="material-symbols-outlined" style="color: #dd4470; font-size: 40px;">
                                    account_circle
                                    </span>
                            </a>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div style="background: #c6df76;padding-top: 60px;padding-bottom:50px;border-bottom-left-radius: 50px;">
            <table>
                <tr >
                    <td style="width: 100px">
                        <div class="mx-3">
                            <img src="
                            {{asset('images/login/sakoo.png')}}
                            " alt="" class="img-fluid">
                        </div>
                    </td>
                    <td>
                        <div class="bg-white py-2 rounded-3 me-3" >
                            <span >
                                <p class="mx-3">
                                    Did You Know? Improper disposal of E-Waste
            can lead to environmental pollution and the loss
            of valuable materials like metals and plastics.
                                </p>
                            </span>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <table class="w-100" style="margin-top: 30px;">
            <tr>
                <td>
                    <a href="/mobile/points">
                        <div class="card shadow-none  px-3 py-3 shadow-0">
                            <div class="card-body px-3 rounded-4 py-3">
                                <div class="row d-flex">
                                    <div class="col-4">
                                        <span class="material-symbols-outlined" style="font-size: 35px">
                                            account_balance_wallet
                                        </span>
                                    </div>
                                    <div class="col-8 my-auto">
                                        <h3>
                                            {{auth()->user()->point}}
                                        </h3>
                                    </div>
                                </div>
                                <span>
                                    <p>Remaining points</p>
                                </span>
                            </div>
                        </div>
                    </a>
                </td>
                <td>
                    <a href="/mobile/catalogue">
                        <div class="card shadow-none  px-3 py-3">
                            <div class="card-body px-3 rounded-4 py-3">
                                <div class="row d-flex">
                                    <div class="col-4">
                                        <span class="material-symbols-outlined" style="font-size: 35px">
                                            collections_bookmark
                                        </span>
                                    </div>
                                    <div class="col-8 my-auto">
                                        <h3>View</h3>
                                    </div>
                                </div>
                                <span>
                                    <p>Catalogue</p>
                                </span>
                            </div>
                        </div>
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="/mobile/disposed">
                        <div class="card shadow-none  px-3 py-3">
                            <div class="card-body px-3 rounded-4 py-3">
                                <div class="row d-flex">
                                    <div class="col-4">
                                        <span class="material-symbols-outlined" style="font-size: 35px">
                                            recycling
                                        </span>
                                    </div>
                                    <div class="col-8 my-auto">
                                        <h5>Recent</h5>
                                    </div>
                                </div>
                                <span>
                                    <p>Disposed</p>
                                </span>
                            </div>
                        </div>
                    </a>
                </td>
                <td>
                    <a href="/mobile/exchange">
                        <div class="card shadow-none  px-3 py-3">
                            <div class="card-body px-3 rounded-4 py-3">
                                <div class="row d-flex">
                                    <div class="col-4">
                                        <span class="material-symbols-outlined" style="font-size: 35px">
                                            currency_exchange
                                        </span>
                                    </div>
                                    <div class="col-8 my-auto">
                                        <h5>Recent</h5>
                                    </div>
                                </div>
                                <span>
                                    <p>Exchanged</p>
                                </span>
                            </div>
                        </div>
                    </a>
                </td>
            </tr>
        </table>
    </div>

@endsection
