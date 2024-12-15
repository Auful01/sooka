@extends('app.layout-mobile')

@section('content')
<div class="px-4 d-flex fixed-top bg-white " style="padding-top: 16px; padding-bottom: 16px;">
    <a href="/mobile/dashboard">
        <span class="material-symbols-outlined my-auto">
            arrow_back
        </span>
    </a>
    <p class="ms-3 mb-0 fw-bold" style="font-size: 20px">
        List Catalogue
    </p>
</div>

<input type="text" id="my-point" value="{{auth()->user()->point}}" hidden>

<div style="margin-top: 70px;">
    <table class="w-100" id="list-catalogue">
        @foreach ($data as $index => $item)
        @if ($index % 2 == 0)
            <tr>
        @endif

        <td style="max-width: 200px; height: 200px; overflow: hidden;">

                <div class="card shadow-none px-3 py-3 h-100  btn-user-exchange" data-id="{{$item->id}}" data-point="{{$item->point}}">
                    <div class="card-body px-3 rounded-4 py-3 d-flex flex-column justify-content-between h-100">
                        <img src="{{ asset('storage/images/exchange/' . $item->image) }}" alt="" class="img-fluid" style="max-height: 100px; object-fit: cover;">
                        <p class="mt-3 mb-0 text-center">{{ $item->point ?? '-' }} points</p>
                    </div>
                </div>
        </td>

        @if ($index % 2 == 1 || $loop->last)
            </tr>
        @endif
    @endforeach

    </table>
</div>
@endsection


@push('scripts')

<script>
    $(document).ready(function() {


        $('body').on('click', '.btn-user-exchange', function() { // Use .on() for event delegation
            if (parseInt($('#my-point').val()) < parseInt($(this).data('point'))) {
                swal({
                    title: "Insufficient Points",
                    text: "You do not have enough points to exchange this item",
                    icon: "error",
                });

            }else{

                swal({
                    title: "Trade Now?",
                    text: "You will exchange this item for 200 points",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Yes, exchange it!',
                    cancelButtonText: 'No, cancel!',
                    showConfirmButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                                url: '/api/user-exchange',
                                type: 'POST',
                                data: {
                                    user_id: {{auth()->user()->id}},
                                    exchange_id: $(this).data('id'),
                                    point: $(this).data('point')
                                },
                                success: function(data) {
                                        swal({
                                            title: "Exchanged!",
                                            text: "You have successfully exchanged the item",
                                            icon: "success",
                                        })

                                }
                            })
                    } else {
                        swal({
                            title: "Cancelled!",
                            text: "You have cancelled the exchange",
                            icon: "error",
                        })
                    }
                });
            }
        });
    });
</script>
@endpush
