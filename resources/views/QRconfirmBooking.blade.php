@extends('layouts.user_type.auth')

@section('content')

    
    <head>
        <!-- <script type="text/javascript" src="/assets/js/instascan.min.js"></script> -->
        <script type="text/javascript" src="/assets/js/html5-qrcode.min.js"></script>
        <script src="https://reeteshghimire.com.np/wp-content/uploads/2021/05/html5-qrcode.min_.js"></script>
    </head>


    <div>
    <div class="container-fluid">
        <div class="page-header min-height-100 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="../assets/img/bruce-mars.jpg" alt="..." class="w-100 border-radius-lg shadow-sm">
                        </a>
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                        {{ auth()->user()->name }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                        {{ auth()->user()->role }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;"
                                    role="tab" aria-controls="overview" aria-selected="true">
                                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none"
                                            fill-rule="evenodd">
                                            <g id="Rounded-Icons" transform="translate(-2319.000000, -291.000000)"
                                                fill="#FFFFFF" fill-rule="nonzero">
                                                <g id="Icons-with-opacity"
                                                    transform="translate(1716.000000, 291.000000)">
                                                    <g id="box-3d-50" transform="translate(603.000000, 0.000000)">
                                                        <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z" id="Path"></path>
                                                        <path class="color-background" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z" id="Path" opacity="0.7"></path>
                                                        <path class="color-background" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z" id="Path" opacity="0.7"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ms-1">{{ __('Overview') }}</span>
                                </a>
                            </li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Confirm booking by QR Code') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">

            <div id="qr_confirm" class="min-h-screen ">

              <div class="flex flex-col justify-center items-center">


    @if (!$doneStatus )
    <div id="qr_stuffs" class="flex flex-col justify-center items-center">
        <script>
            function initQR() {
                var resultContainer = document.getElementById('qr-reader-results');
                var lastResult, countResults = 0;

                function onScanSuccess(decodedText, decodedResult) {
                    // alert(decodedText);
                    if (decodedText !== lastResult) {
                        ++countResults;
                        lastResult = decodedText;
                        // Handle on success condition with the decoded message.
                        console.log(`Scan result ${decodedText}`, decodedResult);
                        // change qr-reader-results
                        resultContainer.innerHTML = `<div class="text-xl">Scan result ${decodedText}</div>`;
                        // change user_id
                        document.getElementById('user_id').value = decodedText;
                    }
                }

                var html5QrcodeScanner = new Html5QrcodeScanner(
                    "qr-reader", {
                        fps: 10,
                        qrbox: 250
                    });
                html5QrcodeScanner.render(onScanSuccess);
            }
            window.addEventListener('load', initQR);
        </script>

        <h3 class="text-xl mt-5 mb-5">Scan the user's QR code</h3>
        <div id="qr-reader" style="width:1000px"></div>
        <div id="qr-reader-results" class="m-auto"></div>
        <form action="/qrconfirmbooking" method="POST">
            @csrf
            <input type="hidden" name="user_id" id="user_id" value="">
            <button type="submit" class="btn btn-primary m-auto mt-5">Search</button>
        </form>

    </div>
    @endif

    @if ($doneStatus )
    <div id="user_bookings" class="w-full">
        <div id="table_latest_bookings" class="overflow-x-auto flex justify-center mt-5">
            <div class="flex flex-col gap-5 w-4/5">
                <h5 class="text-xl">Latest Bookings </h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="border">Name</th>
                            <th class="border">Phone</th>
                            <th class="border">Facility</th>
                            <th class="border">Date</th>
                            <th class="border">Time</th>
                            <th class="border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                        <tr>
                            <td class="border">{{$booking->name}}</td>
                            <td class="border">{{$booking->phone}}</td>
                            <td class="border">{{$booking->booked_item}}</td>
                            <td class="border">{{$booking->booking_date}}</td>
                            <td class="border">{{$booking->time}}</td>
                            <td class="border">
                                <form action="/bookings/confirm" method="POST">
                                    @csrf
                                    <input type="hidden" name="booking_id" value="{{$booking->id}}">
                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endif
</div>


</div>
@endsection