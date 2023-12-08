<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Review;

class TesController extends Controller
{
    public function index(){
        return view('test.index');
    }

    public function order(string $id)
    {
        $comic = Comic::find($id);

        // Calculate average stars for each comic
        $average_stars = Review::select('comic_id', \DB::raw('avg(stars) as average_stars'))
            ->groupBy('comic_id')
            ->pluck('average_stars', 'comic_id');

        // Attach the average stars to each comic
        $comic->each(function ($comic) use ($average_stars) {
            $comic->average_stars = $average_stars[$comic->id] ?? 0;
        });
        
        return view('test.order', compact('comic'));
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
