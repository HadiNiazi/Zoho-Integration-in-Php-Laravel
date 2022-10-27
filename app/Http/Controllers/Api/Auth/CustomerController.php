<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CustomerController extends Controller
{
    public function index()
    {
        $accessToken = $this->getAccessToken();
        $customers = null;
        $response = Http::withHeaders(['Authorization' => 'Zoho-oauthtoken '. $accessToken])->get('https://subscriptions.zoho.com/api/v1/customers');
        if($response->successful()){
            $customers = json_decode($response, true);
            $customers = $customers['customers'];
        }
        return view('api.auth.customers.index', ['customers' => $customers]);
    }
    public function create()
    {
        return view('api.auth.customers.create');
    }
    public function store(Request $request)
    {
        $accessToken = $this->getAccessToken();

        Http::withHeaders(['Authorization' => 'Zoho-oauthtoken '. $accessToken])->post('https://subscriptions.zoho.com/api/v1/customers', [
            'display_name' => $request->name,
            'email' => $request->email
        ]);

        return to_route('customers.index');
    }
    public function show($customerId)
    {
        $accessToken = $this->getAccessToken();
        if($customerId){
            $response = Http::withHeaders(['Authorization' => 'Zoho-oauthtoken '. $accessToken])->get('https://subscriptions.zoho.com/api/v1/customers/'. $customerId);
            if($response->successful()){
                $customer = json_decode($response, true);
                $customer = $customer['customer'];
            }
        }

        return view('api.auth.customers.show', ['customer' => $customer]);
    }
    public function edit($customerId)
    {
        $accessToken = $this->getAccessToken();
        if($customerId){
            $response = Http::withHeaders(['Authorization' => 'Zoho-oauthtoken '. $accessToken])->get('https://subscriptions.zoho.com/api/v1/customers/'. $customerId);
            if($response->successful()){
                $customer = json_decode($response, true);
                $customer = $customer['customer'];
            }
        }
        return view('api.auth.customers.edit', ['customer' => $customer]);
    }
    public function update(Request $request)
    {
        $accessToken = $this->getAccessToken();
        $customerId = $request->customer_id;
        Http::withHeaders(['Authorization' => 'Zoho-oauthtoken '. $accessToken])->put('https://subscriptions.zoho.com/api/v1/customers/'. $customerId, [
            'display_name' => $request->name,
            'email' => $request->email,
        ]);
        return to_route('customers.index');
    }
    public function destroy(Request $request, $customerId)
    {
        $accessToken = $this->getAccessToken();
        $response = Http::withHeaders(['Authorization' => 'Zoho-oauthtoken '. $accessToken])->delete('https://subscriptions.zoho.com/api/v1/customers/'. $customerId);
        if($response['code'] === 3000){
            $request->session()->flash('alert-danger', 'You can not delete this customer becuase it is associated with
            other documents');
        }
        return to_route('customers.index');
    }
    private function getAccessToken()
    {
        $clientId = '1000.7NYR9OHM30TYLCJVZZVR5OBLONUNJZ';
        $clientSecret = '637717cd996e2443be169f6f728f05a4a5eb304ba1';
        $refreshToken = '1000.cd749025e9c3dba32c8105266f65bcfb.8c2af17b425bb595f92e93d4776981d4';
        $grant_type = 'refresh_token';

        $response = Http::post('https://accounts.zoho.com/oauth/v2/token?refresh_token='.$refreshToken.'&client_id='.$clientId.'&client_secret='.$clientSecret .'&grant_type='. $grant_type);
        $response = json_decode($response)->access_token;
        return $response;

    }
}
