<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class TesController extends Controller
{
    public function index(){
        return view('test.index');
    }

    public function checkout(Request $request)
    {
        $request->request->add(['total_price' => $request->qty * 10000, 'status' => 'unpaid']);
        $order = order::create($request->all());
    
        // Set your Midtrans Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transactions).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    
        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total_price,
            ),
            'payment_type' => 'gopay',
            'customer_details' => array(
                'first_name' => $request->name,
                'last_name' => '',
                'phone' => $request->phone,
            ),
            'enabled_payments' => array('gopay'), // Enable GoPay payment method
        );
    
        // Generate Snap Token for frontend
        $snapToken = \Midtrans\Snap::getSnapToken($params);
    
        // Charge GoPay
        $gopayParams = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total_price,
            ),
            'payment_type' => 'gopay',
            'gopay' => array(
                'enable_callback' => true,                // optional
                'callback_url' => route('callback'),  // optional
            )
        );
    
        $gopayResponse = \Midtrans\CoreApi::charge($gopayParams);
    
        // You can handle the $gopayResponse as needed (e.g., log or process the response)
    
        return view('test.checkout', compact('snapToken', 'order','gopayResponse'));
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture'){
                $order = Order::find($request->order_id);
                $order -> update(['status'=>'paid']);
            }
        }
    }
}
