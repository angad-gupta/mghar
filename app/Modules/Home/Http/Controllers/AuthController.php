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
        $this->subscriber = $subscriber;
    }
    
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    { 
        $getInfo = Socialite::driver($provider)->user();  
        $user = $this->createUser($getInfo, $provider); 
        Auth::guard('subscriber')->login($user);

        return redirect()->intended(route('home'));
    }

    function createUser($getInfo, $provider)
    {
        $subscriberInfo = $this->subscriber->checkProviderId($getInfo->id);  
        if (!$subscriberInfo) {

            $subscriberData = array(
                'username' => $getInfo->name,
                'full_name' => $getInfo->name,
                'email' => $getInfo->email,
                'is_external_authenticate' => '1',
                'status' => '1',
                'email_verified' => '1',
                'user_type' =>'subscriber',
                'provider' => $provider,
                'provider_id' => $getInfo->id,
                'registered_ip'=> \Request::ip()
            );

            $subscriberInfo = $this->subscriber->save($subscriberData);

        }
        return $subscriberInfo;
    }
}

