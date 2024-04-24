<?php

namespace App\Http\Controllers;

use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;
use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WeatherController extends Controller
{
    private function sendEmail($to, $subject, $content)
    {
        Mail::raw($content, function ($message) use ($to, $subject) {
            $message->to($to)
                ->subject($subject);
        });
    }
    private function composeEmail($weatherData)
    {
        $prompt = "Compose an informative email without subject providing a daily weather forecast for the location " . $weatherData['location']['name'] . ", " . $weatherData['location']['region'] . ", " . $weatherData['location']['country'] . ". Include the following details:";
        $prompt .= "Greeting: use Good morning or afternoon or evening according to the time given as " . date("F j, Y", strtotime($weatherData['location']['localtime'])) . "\n\n";
        $prompt .= "Introduction: Start the email by expressing goodwill towards the recipient in a professional manner and mention the commitment to providing accurate weather updates.\n\n";
        $prompt .= "Weather Summary: Provide the current weather conditions as of the local time" . $weatherData['location']['localtime'] . " (" . $weatherData['location']['tz_id'] . " Timezone), including:\n\n";
        $prompt .= "The temperature is " . $weatherData['current']['temp_c'] . "°C (" . $weatherData['current']['temp_f'] . "°F) with a feels-like temperature of " . $weatherData['current']['feelslike_c'] . "°C (" . $weatherData['current']['feelslike_f'] . "°F). Wind speed is at " . $weatherData['current']['wind_kph'] . " kmph (" . $weatherData['current']['wind_mph'] . " mph) coming from the " . $weatherData['current']['wind_dir'] . " direction, with gusts reaching " . $weatherData['current']['gust_kph'] . " kmph (" . $weatherData['current']['gust_mph'] . " mph). The atmospheric pressure stands at " . $weatherData['current']['pressure_mb'] . " mb (" . $weatherData['current']['pressure_in'] . " inHg), with humidity at " . $weatherData['current']['humidity'] . "%. Precipitation and cloud cover are both at " . $weatherData['current']['precip_mm'] . " mm and " . $weatherData['current']['cloud'] . "%, respectively, providing clear visibility at " . $weatherData['current']['vis_km'] . " km (" . $weatherData['current']['vis_miles'] . " miles). The UV index is " . $weatherData['current']['uv'] . ".\n\n";
        $prompt .= "Encouragement: Encourage the recipient to plan their day accordingly based on the forecast.\n\n Closing: Conclude the email with warm regards and your name.";
        $prompt .= "We encourage you to plan your day accordingly based on this forecast. Should you have any questions or require further assistance, please do not hesitate to contact us.\n\n";
        $prompt .= "Thank you for allowing us to serve you, and we wish you a pleasant and safe day ahead.\n\n";
        $prompt .= "Ensure that the provided weather data is accurately incorporated into the email from"." Jaisurya"." to".auth()->user()->name;
        $prompt .= "Don't Give any subject, start with greeting and give it in a html convertable format like that it is attractive while seeing it on mail using all the details given above and also used for showing it in blade template of laravel";
        $client = new Client(env('GEMINI_API_KEY'));
        $response = $client->geminiPro()->generateContent(new TextPart($prompt));
        $messageText = "";
        if (isset($response->candidates[0]->content->parts[0])) {
        $messageText = $response->candidates[0]->content->parts[0]->text;
        }
        return $messageText;
    }
    public function result(){
        $weatherdata = session('content');
        return view('forecast',compact('weatherdata'))->with('success','Email sent Successfully.');
    }
    public function getWeather(Request $request)
    {
        $weatherApiUrl = 'http://api.weatherapi.com/v1/current.json';
        $apiKey = env('WEATHER_API_KEY');
        $location = strtolower($request->location);
        $client = new GuzzleHttpClient();
        $response = $client->request('GET', $weatherApiUrl, [
            'query' => [
                'key' => $apiKey,
                'q' => $location
            ]
        ]);
        $weatherData = json_decode($response->getBody(), true);
        $subject = "Daily Weather Forecast for " . $weatherData['location']['name'] . ", " . $weatherData['location']['region'] . ", " . $weatherData['location']['country'] . " at " . date("F j, Y H:i", strtotime($weatherData['location']['localtime'])). " From ".config('app.name');
        $content = $this->composeEmail($weatherData);
        $this->sendEmail((auth()->user()->email), $subject, $content);
        session(['content' => $weatherData]);
        return redirect(route('result'));
    }
}





