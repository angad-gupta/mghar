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

            return redirect()->intended(route('sdashboard'));

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

        return redirect(route('sdashboard'));

    }

    public function updateSubscriberPassword(Request $request){

        $oldPassword = $request->get('old_password');
        $newPassword = $request->get('password');  

        $id = Auth::guard('subscriber')->user()->id;
        $users = Auth::guard('subscriber')->user()->find($id);  

        if (!(Hash::check($oldPassword, $users->password))) {
             alertify('Old Password Do Not Match !')->error();
            return redirect(route('sdashboard'));
        } else {
            $data['password'] = Hash::make($newPassword);
            $this->subscriber->update($id, $data);
             alertify('Password Successfully Updated. Please Login Again!')->success();
        }
        Auth::guard('subscriber')->logout();
        return redirect(route('subscriber-login'));
    }

    public function addToWishlist(Request $request){

        $input = $request->all();

         if (Auth::guard('subscriber')->check()) {

                $id = Auth::guard('subscriber')->user()->id;

                $videoId = $input['video_id'];
                $checkWishlist = $this->subscriber->checkwishlistVideo($videoId);

                if($checkWishlist > 0){
                    alertify('Already Added To your Wishlist.')->error();
                    return redirect()->back();
                }

                $wishlistdata = array(
                    'video_id' => $input['video_id'],
                    'subscriber_id'=> $id
                );

                $this->subscriber->addWishlist($wishlistdata);
                alertify('Added To your Wishlist.')->success();
                return redirect()->back();

         }else{
             alertify('Please Login Before Adding Wishlist.')->error();
            return redirect(route('subscriber-login'));

         }

    }

    public function removeFromWishlist(Request $request){
        $input = $request->all();
        $videoId = $input['video_id'];

        $this->subscriber->removeWishlist($videoId);
        alertify('Removed From your Wishlist.')->success();
        return redirect()->back();
    }

}
