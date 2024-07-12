<!-- resources/views/auth/verify-2fa.blade.php -->

@extends('layouts.user_type.guest')

@section('content')
<title>Verify 2FA Code</title>

<main class="main-content mt-0">
    <section>
        <div class="page-header min-vh-75">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-8">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-info text-gradient">Verify 2FA Code</h3>
                            </div>
                            <div class="card-body">
                                <form role="form" method="POST" action="{{ route('verify.2fa.submit') }}">
                                    @csrf
                                    <label>Enter 2FA Code</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="2fa_code" id="2fa_code" placeholder="2FA Code" aria-label="2FA Code" aria-describedby="2fa-addon">
                                        @error('2fa_code')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Verify 2FA</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="oblique left-2000 right-50 top-60 h-100 d-md-block d-none me-n8">
                            <div class="oblique-image bg-cover left-500 right-100 top-60 h-100 h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/curved-images/logo2.png')"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
