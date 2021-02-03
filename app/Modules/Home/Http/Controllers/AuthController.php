<?php

namespace App\Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Socialite;

use Illuminate\Support\Facades\Auth;
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

        try{
            $getInfo = Socialite::driver($provider)->user();  
            
            $user = $this->createUser($getInfo, $provider); 
            Auth::guard('subscriber')->login($user);
            return redirect()->intended(route('dashboard'));

        } catch (\Exception $e) {
             alertify('Something went wrong or You have rejected the app!')->error();
            return redirect(route('home'));
        }

    }

    function createUser($getInfo, $provider)
    {
        $subscriberInfo = $this->subscriber->checkProviderId($getInfo->id);  
        if (!$subscriberInfo) {

            $email = ($getInfo->email == null) ? $getInfo->id.'@gmail.com' : $getInfo->email;

            $subscriberData = array(
                'username' => $getInfo->name,
                'full_name' => $getInfo->name,
                'email' => $email,
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

