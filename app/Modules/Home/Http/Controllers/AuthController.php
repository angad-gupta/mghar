<?php

namespace App\Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Socialite;

use App\Modules\Subscriber\Repositories\SubscriberInterface;

class AuthController extends Controller
{
    protected $subscriber;
    
    public function __construct(SubscriberInterface $subscriber)
    {
        $this->video = $video;
        $this->genre = $genre;
        $this->blog = $blog;
        $this->subscriber = $subscriber;
        $this->khelaujuhari = $khelaujuhari;
        $this->banner = $banner;
    }
    
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->user();
        $user = $this->createUser($getInfo, $provider);
        auth()->login($user);

        return redirect()->intended(route('home'));
    }

    function createUser($getInfo, $provider)
    {
        $user = $this->subscriber->checkProviderId('provider_id',$getInfo->id);  
        if (!$user) {
            $user = User::create([
                'username' => $getInfo->name,
                'full_name' => $getInfo->name,
                'email' => $getInfo->email,
                'is_external_authenticate' => '1',
                'status' => '1',
                'email_verified' => '1',
                'user_type' =>'subscriber',
                'registered_ip'=> \Request::ip()
                'provider' => $provider,
                'provider_id' => $getInfo->id
            ]);
        }
        return $user;
    }
}

