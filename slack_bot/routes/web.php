<?php

use Illuminate\Support\Facades\Route;
use \Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post("/slack", function (\Illuminate\Http\Request $request) {
    $payload = $request->json();

    if ($payload->get('type') == 'url_verification') {
        return $payload->get('challenge');
    }
});

Route::get('/login/slack', function () {
    return Socialite::with('slack')
    ->scopes(['bot'])
    ->redirect();
});

Route::get('/connect/slack', function (\GuzzleHttp\Client $httpClient) {
    $response = $httpClient->post(
        'https://slack.com/api/oauth.access',
        [
    'headers' => ['Accept' => 'application/json'],
    'form_params' => [
        'client_id' => env('SLACK_KEY'),
        'client_secret' => env('SLACK_SECRET'),
        'code'=>$_GET['code'],
        'redirect_uri'=>env('SLACK_REDIRECT_URI')
    ]
]
    );

    $bot_token = json_decode($response->getBody())->bot->bot_access_token;
    echo "Your bot token is " .$bot_token .".\n";
    echo "Place it inside your env file as SLACK_TOKEN";
});
