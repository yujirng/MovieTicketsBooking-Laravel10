@extends('layouts.app.main')
@section('content')
    <div class="container-fluid mt-5 mb-5 px-lg-5">
        <div class="row">
            <div class="col-lg-11 offset-1">
                <h2 class="part-line ml-lg-4">User Information</h2>
            </div>
        </div>

        <div class="row">
            <div class="offset-xl-1 col-xl-10">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
            </div>
        </div>
        <div class="row my-5">
            <div class="offset-xl-1 col-xl-3 px-xl-4">
                <div class="card border-0 shadow-lg mb-4 px-xl-4">
                    <img src="{{ Storage::url($user->image) }}" alt="User Image"
                        class="card-img-top rounded-circle mx-auto d-block mt-3"
                        style="width: 250px; height: 250px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h3 class="card-title mt-1">{{ $user->name }}</h3>
                        {{-- <p class="card-text text-muted text-uppercase">{{ '@' . $user->name }}</p> --}}
                        <ul class="list-unstyled text-left">
                            <hr>
                            <li class="d-flex justify-content-between"><span><strong>Hotline:</strong> 1900 ...</span> <i
                                    class="fa fa-angle-right"></i></li>
                            <hr>
                            <li class="d-flex justify-content-between"><span><strong>Email:</strong>
                                    support@azircinema.com</span>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <hr>
                            <li class="d-flex justify-content-between"><span><strong>Q&A</strong></span> <i
                                    class="fa fa-angle-right"></i></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">

                @include('partials.profile-navbar')

                @yield('section')
            </div>
        </div>
    </div>

    @yield('article')
@endsection
