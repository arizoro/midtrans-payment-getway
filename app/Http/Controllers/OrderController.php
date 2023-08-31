<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $harga = [
        'iphone' => 12000000,
        'samsung' => 8000000,
        'oppo' => 3000000
    ];

    public function index(){
        return view('index', [
            'harga' => $this->harga
        ]);
    }

    public function checkout(Request $request){
        $harga = $this->harga;
        $request->request->add(['total_price' => $request->qty * $harga['iphone'],'status' => 'unpaid' ]);

        $order = Order::create($request->all());

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
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
            'customer_details' => array(
                'first_name' => $request->name,
                'last_name' => '',
                'phone' => $request->phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('checkout',compact('snapToken','order'));
    }

    public function callBack(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hased = hash('sha512',$request->order_id.$request->status_code.$request->gross_amount.$serverKey);

        if($hased == $request->signature_key){
            if($request->transaction_status == 'capture'){
                $order = Order::find($request->order_id);
                $order->update(['status' => 'paid']);
            }

            if($request->transaction_status == 'settlement'){
                $order = Order::find($request->order_id);
                $order->update(['status' => 'paid']);
            }

        }
    }

    public function invoice ($id)
    {
        $order = Order::find($id);
        return view('invoice',compact('order'));
    }

}
