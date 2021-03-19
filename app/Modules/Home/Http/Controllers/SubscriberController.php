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
            return redirect(route('subscriber-login'));
        }
    }

    public function subscriberLogout()
    {
        Auth::guard('subscriber')->logout();

        return redirect(route('home'));
    }

    public function dashboard(Request $request)
    {

        $data = $request->all();

        $id = Auth::guard('subscriber')->user()->id;
        $data['subscriber_profile'] = Auth::guard('subscriber')->user()->find($id);
        $data['subscriber_plan'] = $this->subscriber->getSubscriberPlan($id);
        $data['subscriber_member'] = $this->subscriber->getMembershipDate($id);
        $data['subscriber_purchase_history'] = $this->subscriber->getSubscriberPurchase($id);

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

    public function updateSubscriberPassword(Request $request)
    {

        $oldPassword = $request->get('old_password');
        $newPassword = $request->get('password');
        $confirmPassword = $request->get('c_password');

        $id = Auth::guard('subscriber')->user()->id;
        $users = Auth::guard('subscriber')->user()->find($id);

        if ($newPassword !== $confirmPassword) {
            alertify('New Password Do Not Match !')->error();
            return redirect(route('sdashboard'));
        }

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

    public function addToWishlist(Request $request)
    {

        $input = $request->all();

        if (Auth::guard('subscriber')->check()) {

            $id = Auth::guard('subscriber')->user()->id;

            $videoId = $input['video_id'];
            $checkWishlist = $this->subscriber->checkwishlistVideo($videoId);

            if ($checkWishlist > 0) {
                alertify('Already Added To your Wishlist.')->error();
                return redirect()->back();
            }

            $wishlistdata = array(
                'video_id' => $input['video_id'],
                'subscriber_id' => $id
            );

            $this->subscriber->addWishlist($wishlistdata);
            alertify('Added To your Wishlist.')->success();
            return redirect()->back();
        } else {
            alertify('Please Login Before Adding Wishlist.')->error();
            return redirect(route('subscriber-login'));
        }
    }

    public function removeFromWishlist(Request $request)
    {
        $input = $request->all();
        $videoId = $input['video_id'];

        $this->subscriber->removeWishlist($videoId);
        alertify('Removed From your Wishlist.')->success();
        return redirect()->back();
    }

    public function PaymentVerification(Request $request)
    {

        $data = $request->all();

        $id = Auth::guard('subscriber')->user()->id;

        $amount = $data['amount'];
        $subscribe_type = $data['product_identity'];
        $plan = $data['product_name'];

        $planCheck = $this->subscriber->getSubscriberPlan($id);

        $now = date('Y-m-d');

        if ($planCheck) {

            $strtdate = strtotime($planCheck->end_date);

            //Main Purpose to Check Plan is: whether plan is already taken or not.. if taken. then .. all subsriber id status will expire and create new plan
            $updatePlan = array(
                'status' => 'expired'
            );
            $this->subscriber->updatePlanStatus($id, $updatePlan);

            $updatePayment = array(
                'status' => 'expired'
            );
            $this->subscriber->updatePaymentStatus($id, $updatePayment);
        } else {

            $strtdate = strtotime($now);
        }

        $start_date = date('Y-m-d');

        if ($plan == 'one_month') {
            $end_date =  date("Y-m-d", strtotime("+1 month", $strtdate));
        } else if ($plan == 'three_month') {
            $end_date =  date("Y-m-d", strtotime("+3 months", $strtdate));
        } else if ($plan == 'six_month') {
            $end_date =  date("Y-m-d", strtotime("+6 months", $strtdate));
        } else {
            $end_date =  date("Y-m-d", strtotime("+1 year", $strtdate));
        }

        //If Plancheck is EMPTY, insert new data on plan and payment
        $planData = array(
            'subscriber_id' => $id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'plan' => $plan,
            'date' => date('Y-m-d'),
            'status' => 'active'
        );
        $this->subscriber->insertPlanData($planData);

        $paymentData = array(
            'subscriber_id' => $id,
            'plan' => $plan,
            'payment_date' => date('Y-m-d'),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'payment_method' => 'Khalti',
            'total_amount' => $amount,
            'type' => $subscribe_type,
            'status' => 'active'
        );
        $this->subscriber->insertPaymentData($paymentData);

        echo 1;
    }
}
