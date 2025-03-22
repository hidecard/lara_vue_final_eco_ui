<?php

namespace App\Helper;

use App\Models\Invoice;
use App\Models\SslcommerzInfo;
use Illuminate\Support\Facades\Http;

class SSLCOMMERZ
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function InitiatePayment($user, $payable, $tran_id, $products)
    {
        try {
            $ssl = SslcommerzInfo::first();
            $response = Http::asForm()->post($ssl->init_url, [
                "store_id" => $ssl->store_id,
                "store_passwd" => $ssl->store_passwd,
                "total_amount" => $payable,
                "currency" => $ssl->currency,
                "tran_id" => $tran_id,
                "success_url" => "$ssl->success_url?tran_id=$tran_id",
                "fail_url" => "$ssl->fail_url?tran_id=$tran_id",
                "cancel_url" => "$ssl->cancel_url?tran_id=$tran_id",
                "ipn_url" => $ssl->ipn_url,
                "cus_name" => $user->firstName . ' ' . $user->lastName,
                "cus_email" => $user->email,
                "cus_add1" => $user->addresses->first()->address,
                "cus_add2" => $user->addresses->first()->address,
                "cus_city" => $user->addresses->first()->city,
                "cus_state" => "",
                "cus_postcode" => "",
                "cus_country" => $user->addresses->first()->country,
                "cus_phone" => $user->phone,
                "cus_fax" => $user->phone,
                "shipping_method" => "YES",
                "ship_name" => $user->firstName . ' ' . $user->lastName,
                "ship_add1" => $user->addresses->first()->address,
                "ship_add2" => $user->addresses->first()->address,
                "ship_city" => $user->addresses->first()->city,
                "ship_state" => $user->addresses->first()->city,
                "ship_postcode" => "0000",
                "ship_country" => $user->addresses->first()->country,
                "multi_card_name" => "mastercard,visacard",
                "product_name" => $products[0]['name'],
                "product_category" => $products[0]['category'],
                "product_profile" => $products[0]['category'],
            ]);
            return $response->json();
        } catch (\Exception $e) {
            return response()->json('Something Wrong!', 500);
        }

    }

    public static function InitiateSuccess($tran_id): int
    {
        Invoice::where('transaction_id', $tran_id)->update(['payment_status' => 'success']);
        return 1;
    }

    public static function InitiateFail($tran_id): int
    {
        Invoice::where(['transaction_id' => $tran_id, 'val_id' => null])->update(['payment_status' => 'failed', 'order_status' => 'failed']);
        return 1;
    }

    public static function InitiateCancel($tran_id): int
    {
        Invoice::where(['transaction_id' => $tran_id, 'val_id' => null])->update(['payment_status' => 'canceled', 'order_status' => 'canceled']);
        return 1;
    }

    public static function InitiateIPN($tran_id, $status, $val_id): int
    {
        Invoice::where(['transaction_id' => $tran_id])->update(['payment_status' => $status, 'val_id' => $val_id]);
        return 1;
    }
}
