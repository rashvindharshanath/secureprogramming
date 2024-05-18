@extends('layouts.user_type.auth')

@section('content')
<title>
  Bookings
</title>

<head>
  <!-- tailwind -->
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

@if(Auth::user()->role == 'user')


<style>
  * {
    box-sizing: border-box;
  }

  .row {
    display: flex;
  }

  /* Grid with 3 columns */
  .column {
    flex: 33.33%;
    padding: 5px;
  }
</style>

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
       
      </div>
    </div>
  </div>
  <div class="container-fluid py-4">
    <div class="card">
      <div class="card-header pb-0 px-3">
        <h6 class="mb-0">{{ __('Book an item') }}</h6>
      </div>
      <div class="card-body pt-4 p-3">
        <div class="flex flex-col items-center mt-4 min-h-screen overflow-auto">
          <h3 class="text-4xl text-center font-bold text-gray-800">Book a facility</h3>
          <div id="item_available_list">
            <h4 class="text-2xl text-center font-bold text-gray-800 mb-5">Available Items</h4>
            <div class="
                grid
                grid-cols-2
                gap-4    
            ">
              @foreach ($items as $item)
              <div class="card w-96 bg-base-100 shadow-xl image-full mb-3">
                <figure><img src="{{ $item->picture_link }}" alt="Shoes"
                class="
                  w-96
                  h-44
                  object-cover
                  object-center
                  rounded-t-lg
                "
                /></figure>
                <div class="card-body">
                  <h2 class="card-title">
                    {{ $item->item_name }}
                  </h2>
                  <p>Book now!</p>
                  <div class="card-actions justify-end
                  float-right
                  ">
                  <button onclick="window.location.href='/addbooking?item_name={{ $item->item_name }}&item_picture={{ $item->picture_link }}'" class="btn btn-primary">Book Now</button>
                  </div>
                </div>
              </div>

              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

  @if(Auth::user()->role == 'admin')

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
                  <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;" role="tab" aria-controls="overview" aria-selected="true">
                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Rounded-Icons" transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                            <g id="box-3d-50" transform="translate(603.000000, 0.000000)">
                              <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z" id="Path"></path>
                              <path class="color-background" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z" id="Path" opacity="0.7"></path>
                              <path class="color-background" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z" id="Path" opacity="0.7"></path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>
                    <span class="ms-1">{{ __('Bookings') }}</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0">
                <h6>Bookings</h6>
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Item</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Time</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($bookings as $booking)
                      <!--Name -->
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{$booking->name}}</h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          <!-- Phone -->
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{$booking->phone}}</h6>
                            </div>
                          </div>
                        </td>
                        <!-- Item -->
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{$booking->booked_item}}</h6>
                            </div>
                          </div>
                        </td>

                        <!-- Date -->

                        <td>
                          <div class="d-flex px-1 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{$booking->booking_date}}</h6>
                            </div>
                          </div>
                        </td>


                        <!-- Time -->

                        <td>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{$booking->time}}</h6>
                            </div>
                          </div>
                        </td>
                        @endforeach
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
        @endsection