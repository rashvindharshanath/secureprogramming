@extends('layouts.user_type.auth')

@section('content')

<style>
    * {
        box-sizing: border-box;
    }

    .row {
        display: flex;
    }

    /* Create three equal columns that sits next to each other */
    .column {
        flex: 33.33%;
        padding: 5px;
    }
</style>
<title>
    Add Facilities
</title>

<head>
    <!-- tailwind -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
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
               
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Add items to facilities') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">

                <form action="/additem" method="POST">
                    @csrf
                    <div class="col-md-6">

                        <div class="form-group">
                            <label class="form-control-label">
                                Item name
                            </label>
                            <input required="true" type="text" name="item_name" id="item_name" placeholder="Item name" class="form-control">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">
                                Picture Link
                            </label>
                            <input required="true" type="text" name="picture_link" id="picture_link" placeholder="Picture link" class="form-control">
                        </div>
                    </div>

                    <div class="form-group mt-6">
                        <button class="btn btn-primary">Submit</button>
                    </div>

            </div>
        </div>
        <div id="available_items" class="
                grid grid-cols-3 gap-4 mt-20 hover:grid-cols-3
                ">
            </form>
        </div>



        <div class="container-fluid py-4">
            <div class="card-body pt-4 p-3 card-header pb-3 px-3 col-auto bg-gray-100"
            style="
            margin-top: -100px;
            "
            >
                <!-- <h6 class="mb-0">{{ __('Available Items') }}</h6> -->
            </div>
            <div class="
                grid
                grid-cols-2
                justify-items-center
            ">

                @foreach ($additems as $additem)

                <div class="card w-96 bg-base-100 shadow-xl image-full mb-3">
                    <figure><img src="{{ $additem->picture_link }}" alt="Shoes" class="
                  w-96
                  h-44
                  object-cover
                  object-center
                  rounded-t-lg
                " /></figure>
                    <div class="card-body">
                        <h2 class="card-title">
                            {{ $additem->item_name }}
                        </h2>
                        <p></p>

                    </div>
                </div>


                @endforeach






            </div>


        </div>
    </div>

    <!-- new card











-->


</div>
</div>
</div>
</div>
@endsection