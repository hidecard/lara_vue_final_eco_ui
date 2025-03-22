<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CheckOutController extends Controller
{
    public function checkoutPage(Request $request)
    {
        // $user = User::with('addresses')->where('id', $request->header('id'))->select('id', 'firstName', 'lastName', 'phone')->get();
        $user = User::where('id', $request->header('id'))->select('id', 'firstName', 'lastName', 'phone')->first();
        $addresses = Address::where('user_id', $request->header('id'))->get();

        $homeAddress = null;
        $officeAddress = null;

        foreach ($addresses as $address) {
            if ($address->address_type === 'home') {
                $homeAddress = $address;
            } elseif ($address->address_type === 'office') {
                $officeAddress = $address;
            }
        }

        return Inertia::render("Frontend/Checkout", ['user' => $user, 'homeAddress' => $homeAddress,
            'officeAddress' => $officeAddress,
        ]);
    }
}
