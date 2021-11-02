<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;


class OauthController
{

    public function callback (Request $request)
    {
        $response =  Http::asForm()->post('https://discord.com/api/oauth2/token', [
            'client_id'=>config('oauth.discord.client_id'),
            'client_secret'=>config('oauth.discord.client_secret'),
            'grant_type'=>'authorization_code',
            'code'=>$request->get('code'),
            'redirect_uri'=>config('oauth.discord.callback_uri'),
        ]);

        /*Может пригодится для рефреша токена*/

//        $refresh =  Http::asForm()->post('https://discord.com/api/oauth2/token', [
//            'client_id'=>config('oauth.discord.client_id'),
//            'client_secret'=>config('oauth.discord.client_secret'),
//            'grant_type'=>'refresh_token',
//            'refresh_token'=>$request->get('refresh_token'),
//        ]);

        $response = $response->body();


        $delete = ['"', '{', '}'];
        $response = str_replace($delete, '', $response);
        $response = str_replace(',', ':', $response);
        $response = explode(':', $response);

        $key = [];
        $value = [];
        $counter = count($response);
        for($a = 0;$counter>=$a;$a++) {
            if(!is_int($a/2)) {
                if (isset($response[$a])) {
                    $value[] = trim($response[$a]);
                }
            } else {
                if (isset($response[$a])) {
                    $key[] = trim($response[$a]);
                }
            }
        }

        $result = array_combine($key, $value);

        $credentials =  Http::withHeaders(['Authorization' => $result['token_type'] . ' ' . $result['access_token']])
            ->get('https://discord.com/api/v8/users/@me', [
        ]);

        $discord_user = User::updateOrCreate([
            'name'=> $credentials->json('username')], [
            'name'=> $credentials->json('username'),
            'password' => password_hash($request->get('password'), 1),
            'remember_token' => md5(Str::random(10)),
        ]);

        Auth::login($discord_user);

        return back();

    }
}
