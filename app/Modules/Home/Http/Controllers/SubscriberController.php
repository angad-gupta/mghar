<?php

namespace App\Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Modules\Subscriber\Repositories\SubscriberInterface;

class SubscriberController extends Controller
{
    protected $subscriber;
    
    public function __construct(SubscriberInterface $subscriber)
    {
        $this->subscriber = $subscriber;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function subscriberAuthenticate(Request $request)
    {
        $data = $request->all('email', 'password'); 

        if (Auth::guard('subscriber')->attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 1])) {

            return redirect()->intended(route('dashboard'));

        } else {
            alertify('You have Enter Wrong Email or Password. Please Try Again !')->error();
            return redirect(route('home'));
        }
    }

    public function subscriberLogout()
    {
        Auth::guard('subscriber')->logout();

        return redirect(route('home'));
    }

    public function dashboard(Request $request){

        $data = $request->all();

        $id = Auth::guard('subscriber')->user()->id;
        $data['subscriber_profile'] = Auth::guard('subscriber')->user()->find($id);

        return view('home::subscriber.dashboard', $data);
    }

   public function subscriberProfileUpdate(Request $request, $id)
    {
        $data = $request->all();

        try {
            $this->subscriber->update($id, $data);
            alertify('Subscriber Profile Updated Successfully')->success();
        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }

        return redirect(route('dashboard'));

    }

    public function updateSubscriberPassword(Request $request){

        $oldPassword = $request->get('old_password');
        $newPassword = $request->get('password');  

        $id = Auth::guard('subscriber')->user()->id;
        $users = Auth::guard('subscriber')->user()->find($id);  

        if (!(Hash::check($oldPassword, $users->password))) {
             alertify('Old Password Do Not Match !')->error();
            return redirect(route('dashboard'));
        } else {
            $data['password'] = Hash::make($newPassword);
            $this->subscriber->update($id, $data);
             alertify('Password Successfully Updated. Please Login Again!')->success();
        }
        Auth::guard('subscriber')->logout();
        return redirect(route('subscriber-login'));
    }

}
