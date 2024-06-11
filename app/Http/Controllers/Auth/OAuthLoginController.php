<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;
use Illuminate\Support\Facades\Storage;
class OAuthLoginController extends Controller
{
    public function socialLogin($social) {
        return Socialite::driver($social)->redirect();
    }

    public function handleProviderCallback($social) {
        try {
            $userSocial = Socialite::driver($social)->user();
            $twitter_id = $userSocial->id;

            $user = DB::table('users')->where('twitter_id', $twitter_id)->first();

            if(is_null($user)) {
                if (is_null($userSocial->getNickname())) {
                    $userSocialNickName = $userSocial->getName();
                } else {
                    $userSocialNickName = $userSocial->getNickname();
                }

                $userd = User::create([
                    'name' => $userSocialNickName,
                    'email' => $userSocial->getEmail(),
                ]);
             } else {
                 $userd = User::find($user->id);
             }

            if (is_null($userd->twitter_id)) {
                $userd->twitter_id = $userSocial->getId();
                if (is_null($userSocial->getNickname())) {
                    $userd->twitter_name = $userSocial->getName();
                } else {
                    $userd->twitter_name = $userSocial->getNickname();
                }
            }

            $twitter_config = config('twitter');
            $userd->access_token = $twitter_config["access_token"];
            $userd->access_token_secret = $twitter_config["access_token_secret"];

            $userd->save();
            auth()->login($userd, true);
            return redirect()->to('/register');

        } catch (Exception $e) {
            return redirect()->route('/register')->withErrors('ユーザー情報の取得に失敗しました。');
        }
    }
  }
