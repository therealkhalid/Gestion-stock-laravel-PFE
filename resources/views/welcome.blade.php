
@extends('layouts.app')
@section('title')
    Welcome | Laravel Employes-App
@endsection
@section('content')
<div class="container">
    <div class="row my-5">
        <div class="col-md-6 mx-auto">
            <div class="card ">
                <div class="card-header bg-success" style="--bs-bg-opacity: .6;">
                    <h3 class="p-2 text-center text-white"><i class="fa fa-home me-2 text-primary"></i>WELCOME BACK<i class="fa fa-home ms-2 text-primary"></i></h3>
                </div>
                <div class="card-body">
                    @guest
                    <a href="{{url('/login')}}" class="btn btn-outline-primary w-100">
                        Login
                    </a> 
                    @endguest
                    @auth
                    {{-- {{$test=Auth::user()->name}} --}}
                    <a href="{{route('home.'.Auth::user()->role)}}" class="btn btn-outline-primary w-100">
                        Home
                    </a> 
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection