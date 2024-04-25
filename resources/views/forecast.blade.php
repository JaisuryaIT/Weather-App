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
            <h2>Weather Details</h2>
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
                <div id="middle-wizard">
  <div class="title">
    <h3>Weather Forecast:</h3>
    <p>{{ session('success') }}</p> </div>

  <table class="weather-table">
    <thead>
      <tr>
        <th>Data</th>
        <th style="text-align: center;">Value</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Location</td>
        <td style="text-align: right;">{{ $weatherdata['location']['name'] }}, {{ $weatherdata['location']['region'] }}</td>
      </tr>
      <tr>
        <td>Country</td>
        <td style="text-align: right;">{{ $weatherdata['location']['country'] }}</td>
      </tr>
      <tr>
        <td>Last Updated</td>
        <td style="text-align: right;">{{ $weatherdata['current']['last_updated'] }}</td>
      </tr>
      <tr>
        <td>Temperature (&#8451;)</td>
        <td style="text-align: right;">{{ $weatherdata['current']['temp_c'] }}</td>
      </tr>
      <tr>
        <td>Temperature (&#8457;)</td>
        <td style="text-align: right;">{{ $weatherdata['current']['temp_f'] }}</td>
      </tr>
      <tr>
        <td>Condition</td>
        <td style="text-align: right;">{{ $weatherdata['current']['condition']['text'] }}</td> </tr>
      <tr>
        <td>Wind Speed (km/h)</td>
        <td style="text-align: right;">{{ $weatherdata['current']['wind_kph'] }}</td>
      </tr>
      <tr>
        <td>Wind Direction</td>
        <td style="text-align: right;">{{ $weatherdata['current']['wind_dir'] }}</td>
      </tr>
      <tr>
        <td>Pressure (mb)</td>
        <td style="text-align: right;">{{ $weatherdata['current']['pressure_mb'] }}</td>
      </tr>
      <tr>
        <td>Humidity (%)</td>
        <td style="text-align: right;">{{ $weatherdata['current']['humidity'] }}</td>
      </tr>
      <tr>
        <td>Cloud Cover (%)</td>
        <td style="text-align: right;">{{ $weatherdata['current']['cloud'] }}</td>
      </tr>
      <tr>
        <td>Feels Like (&#8451;)</td>
        <td style="text-align: right;">{{ $weatherdata['current']['feelslike_c'] }}</td>
      </tr>
      </tbody>
  </table>
</div>                       
                    <div id="bottom-wizard">
                        <button type="submit" class="submit" onclick="window.location.href='/'" style="background-color:#4D4351; color:#F9EAFF; border-radius:1rem; width:107px; height:44px; font-size:25px">Back</button>
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
        <li><img src="{{ asset('img/slide_4.jpg') }}" alt=""></li>
        <li><img src="{{ asset('img/slide_3.jpg') }}" alt=""></li>
    </ul>
</div>
@endpush
@push('javascript')
<script>
</script>
@endpush
