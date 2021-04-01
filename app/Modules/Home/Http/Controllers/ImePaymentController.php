<?php

namespace App\Modules\Home\Http\Controllers;

use App\Modules\Subscriber\Entities\ImeTransaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use GuzzleHttp\Client as GuzzleClient;

class ImePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('home::index');
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

    public function imePay(Request $request)
    {
        $data['tranAmount'] = $request->amount;
        $data['refId'] = "Ref-" . time();
        $resp = $this->getImePayToken($data['tranAmount'], $data['refId']);
        $response = json_decode($resp);
        $all = [];
        $all['token_id'] = $response->TokenId;
        $all['merchant_code'] = "GHAR";
        $all['amount'] = $response->Amount;
        $all['reference_id'] = $response->RefId;

        ImeTransaction::create($all);

        $data['tokenId'] = $response->TokenId;


        return view('home::imepay', $data);
    }

    protected function getImePayToken($amount, $refId)
    {
        $url = "https://stg.imepay.com.np:7979/api/Web/GetToken";
        $data = [];
        $data['MerchantCode'] = "GHAR";
        $data['Amount'] = $amount;
        $data['RefId'] = $refId;
        $postData = json_encode($data);
        $header_apiuser = $this->getApiUser();
        $header_module = $this->getModule();
        $resp = $this->getResponseUrl($url, $postData, $header_apiuser, $header_module);
        return $resp;
    }

    protected function getResponseUrl($url, $postData, $header_apiuser, $header_module)
    {

        $headers = [
            'Authorization' => 'Basic ' . $header_apiuser,
            'Module'        => $header_module,
            'Accept'        => 'application/json',
        ];
        $client = new GuzzleClient([
            'headers' => $headers
        ]);

        $r = $client->request('POST', $url, [
            'body' => $postData
        ]);
        $response = $r->getBody()->getContents();

        return $response;
    }

    protected function getApiUser()
    {
        $apiuser = "ghar:";
        $header_apiuser = base64_encode($apiuser);
        return $header_apiuser;
    }

    protected function getModule()
    {
        $module = "GHAR";
        $header_module = base64_encode($module);
        return $header_module;
    }


    public function imePayStatus()
    {
        $resp = file_get_contents('php://input');
        $arr = [];
        (parse_str($resp, $arr));
        $responseCode = $arr['ResponseCode'];
        switch ($responseCode) {
            case 0:
                $refId = $arr['RefId'];
                $msisdn = $arr['Msisdn'];
                $transactionId = $arr['TransactionId'];

                // update ime pay database with transactionId and msisdn
                $all['transaction_id'] = $transactionId;
                $all['wallet_id'] = $msisdn;

                $result = ImeTransaction::where('reference_id', $arr['RefId'])->first();
                $test = $result->update($all);

                return $this->verifyImePay($msisdn, $transactionId, $refId);
                break;
            case 1:
                return redirect()->route('home');
                break;
            case 2:
                return redirect()->route('home');
                break;
            case 3:
                return redirect()->route('home');
                break;
            default:
                return redirect()->route('home');
                break;
        }
    }


    public function verifyImePay($msisdn, $transactionId, $refId)
    {
        $header_apiuser = $this->getApiUser();
        $header_module = $this->getModule();
        $url = "https://stg.imepay.com.np:7979/api/Web/Confirm";
        $data = [];
        $data['TransactionId'] = $transactionId;
        $data['MerchantCode'] = "GHAR";
        $data['Msisdn'] = $msisdn;
        $data['RefId'] = $refId;
        $postData = json_encode($data);
        $resp = $this->getResponseUrl($url, $postData, $header_apiuser, $header_module);

        $response = json_decode($resp);
        $responseCode = $response->ResponseCode;

        switch ($responseCode) {
            case 0:
                return $this->imePayVerify();
                break;
            case 1:
                return redirect()->route('home');
                break;
            case 2:
                return redirect()->route('home');
                break;
            default:
                return redirect()->route('home');
                break;
        }
    }

    public function imePayVerify()
    {
        alertify('Package Subscribed Successfully')->success();

        return redirect(route('sdashboard'));
    }
}
