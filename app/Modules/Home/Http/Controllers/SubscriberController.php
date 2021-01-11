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

            return redirect()->intended(route('home'));

        } else {
            // Flash('Invalid Credentials')->warning();
            $logindata['message'] = "You have Enter Wrong Email or Password. Please Try Again !";
            return redirect(route('home',$logindata));
        }
    }

    public function subscriberLogout()
    {
        Auth::guard('subscriber')->logout();

        return redirect(route('home'));
    }

    public function dashboard(){

    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('home::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('home::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('home::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
