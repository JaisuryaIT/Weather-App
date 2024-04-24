@extends('layouts.main')
@push('internalCss')
<style>
</style>
@endpush
@push('bodycontent')
<div id="wrapper">
    <div id="main">
        <div id="caption" class="hidden-xs">
            <h1>Welcome to {{config('app.name')}}</h1>
            <h2>Get your Weather</h2>
        </div>
        <div id="main_container">
            <div id="logo">
                <img src="{{ asset('img/logo.png') }}" width="150" height="100" data-retina="true">
                <h2>Weather App</h2>
            </div>
            <div id="form_container">                
                <div id="top-wizard">
                    <div id="progressbar">
                    </div>
                    <span id="location"></span>
                </div>                    
                <form action="{{ route('getWeather') }}" method="post">
                @csrf
                    <div id="middle-wizard"> 
                        <div class="title">
                            <span>Weather</span>
                            <h3>Enter your Location:</h3>
                        </div>
                        <div class="form-group">
                            <input class="form-control required" type="text" name="location" id="pick_up" placeholder="Enter Location">
                            <i class="icon-target"></i>
                        </div>                     
                    </div>                        
                    <div id="bottom-wizard">
                        <button type="submit" class="submit" style="background-color:#4D4351; color:#F9EAFF; border-radius:1rem; width:157px; height:44px; font-size:22x">Get Weather Details</button>
                    </div>                        
                </form>
            </div>
            <div id="copy">© Weather APP 2024</div>
        </div>
    </div>    
</div>    
<div id="slides">
    <ul class="slides-container">
        <li><img src="{{ asset('img/slide_1.jpg') }}" alt=""></li>
        <li><img src="{{ asset('img/slide_2.jpg') }}" alt=""></li>
        <li><img src="{{ asset('img/slide_3.jpg') }}" alt=""></li>
        <li><img src="{{ asset('img/slide_4.jpg') }}" alt=""></li>
    </ul>
</div>
@endpush
@push('javascript')
<script>
</script>
@endpush
