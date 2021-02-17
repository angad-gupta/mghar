<?php

namespace App\Modules\Subscription\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use App\Modules\Subscription\Repositories\SubscriptionInterface;

class SubscriptionController extends Controller
{
     protected $subscription;
    
    public function __construct(SubscriptionInterface $subscription)
    {
        $this->subscription = $subscription;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        
        $data['subscription'] = $this->subscription->findAll(); 
        $data['subscription_payment'] = $this->subscription->findPayment(); 
        if ($data['subscription']->total() > 0) {
            return view('subscription::subscription.edit-package',$data);
        } else {
            return view('subscription::subscription.index');
        }
    }

    public function appendPackage(Request $request){
         
         $data = view('subscription::subscription.partial.add-more-package')->render();
         return response()->json(['options'=>$data]);
        
    } 
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('subscription::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
       $data  = $request->all();  

    try{ 

            $subsription_title = $data['subsription_title'];
            $countname = sizeof($subsription_title);
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['subsription_title'][$i]){

                         $packageData['subsription_title'] = $data['subsription_title'][$i];
                         $packageData['is_one_month'] = $data['is_one_month'][$i];
                         $packageData['one_month_feature'] = $data['one_month_feature'][$i];
                         $packageData['is_three_month'] = $data['is_three_month'][$i];
                         $packageData['three_month_feature'] = $data['three_month_feature'][$i];
                         $packageData['is_six_month'] = $data['is_six_month'][$i];
                         $packageData['six_month_feature'] = $data['six_month_feature'][$i];
                         $packageData['is_one_year'] = $data['is_one_year'][$i];
                         $packageData['one_year_feature'] = $data['one_year_feature'][$i];

                         $this->subscription->save($packageData);
                    }
                }

            $paymentData = array(
                'one_month_payment' => $data['one_month_payment'],
                'three_month_payment' => $data['three_month_payment'],
                'six_month_payment' => $data['six_month_payment'],
                'one_year_payment' => $data['one_year_payment'],
            );    
             $this->subscription->savePayment($paymentData);
      
        alertify()->success('Subscription Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('subscription.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('subscription::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('subscription::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request)
    {
        $data  = $request->all();

    try{ 

           DB::table('subscriptions')->truncate();
           DB::table('subscription_payments')->truncate();

            $subsription_title = $data['subsription_title'];
            $countname = sizeof($subsription_title);
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['subsription_title'][$i]){

                         $packageData['subsription_title'] = $data['subsription_title'][$i];
                         $packageData['is_one_month'] = $data['is_one_month'][$i];
                         $packageData['one_month_feature'] = $data['one_month_feature'][$i];
                         $packageData['is_three_month'] = $data['is_three_month'][$i];
                         $packageData['three_month_feature'] = $data['three_month_feature'][$i];
                         $packageData['is_six_month'] = $data['is_six_month'][$i];
                         $packageData['six_month_feature'] = $data['six_month_feature'][$i];
                         $packageData['is_one_year'] = $data['is_one_year'][$i];
                         $packageData['one_year_feature'] = $data['one_year_feature'][$i];

                         $this->subscription->save($packageData);
                    }
                }

            $paymentData = array(
                'one_month_payment' => $data['one_month_payment'],
                'three_month_payment' => $data['three_month_payment'],
                'six_month_payment' => $data['six_month_payment'],
                'one_year_payment' => $data['one_year_payment'],
            );    
            
            $this->subscription->savePayment($paymentData);
   
        alertify()->success('Subscription Updated Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('subscription.index'));

    }

}
