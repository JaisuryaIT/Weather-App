@extends('layouts.main')
@section('title','Sign Up')
@push('internalCss')
<style>
</style>
@endpush
@push('bodycontent')
<div id="wrapper">
    <div id="main">
        <div id="caption" class="hidden-xs">
            <h1>Welcome to {{config('app.name')}}</h1>
            <h2>Get Your Account Signed in</h2>
        </div>
        <div id="main_container">
            <div id="logo">
                <img src="{{ asset('img/logo.png') }}" width="150" height="100" data-retina="true">
                <h2>Weather App</h2>
            </div>
            <nav>
            <ul class="menu">
                <span style="color:#F9EAFF; margin-right:2%;">Already Have an Account!</span>
                <li><a href="\login" style="background-color:#F9EAFF; color:#4D4351; border-radius:2.5rem;">Login</a></li>
            </ul>
            </nav>
            <div id="form_container">                
                <div id="top-wizard">
                    <div id="progressbar">
                    </div>
                    <span id="location"></span>
                </div>                    
                <form action="/register" method="post">
                @csrf
                    <div id="middle-wizard"> 
                        <div class="title">
                            <span>Sign Up</span>
                            <h3>Enter your Details</h3>
                        </div>
                        <div class="form-group">
                            <input class="form-control required" type="text" name="name" placeholder="Username">
                            <i class="icon-user"></i>
                        </div>
                        <div class="form-group">
                            <input class="form-control required" type="email" name="email" placeholder="Email Address">
                            <i class="icon-envelope"></i>
                        </div>
                        <div class="form-group">
                            <input class="form-control required" type="password" name="password" placeholder="Password">
                            <i class="icon-lock"></i>
                        </div>                   
                    </div>                        
                    <div id="bottom-wizard">
                        <button type="submit" class="submit" style="background-color:#4D4351; color:#F9EAFF; border-radius:0.5rem; width:93px; height:41px; font-size:19px">Sign Up</button>
                    </div>                        
                </form>
            </div>
            <div id="copy">© Weather APP 2024</div>
        </div>
    </div>    
</div>    
<div id="slides">
    <ul class="slides-container">
        <li><img src="{{ asset('img/slide_4.jpg') }}" alt=""></li>
        <li><img src="{{ asset('img/slide_1.jpg') }}" alt=""></li>
        <li><img src="{{ asset('img/slide_2.jpg') }}" alt=""></li>
        <li><img src="{{ asset('img/slide_3.jpg') }}" alt=""></li>
    </ul>
</div>
@endpush
@push('javascript')
<script>
</script>
@endpush
