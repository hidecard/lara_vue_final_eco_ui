<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class UserProfileController extends Controller
{
    public function userAddress()
    {
        $addresses = Address::where('user_id', request()->header('id'))->get();

        $homeAddress = null;
        $officeAddress = null;

        foreach ($addresses as $address) {
            if ($address->address_type === 'home') {
                $homeAddress = $address;
            } elseif ($address->address_type === 'office') {
                $officeAddress = $address;
            }
        }

        return Inertia::render("Frontend/Profile/UserAddress", ['homeAddress' => $homeAddress,
            'officeAddress' => $officeAddress,
        ]);
    }

    public function userAddressUpdate(Request $request)
    {
        $validatedRequest = $request->validate([
            'country' => 'required|max:20',
            'city' => 'required|max:20',
            'district' => 'required|max:20',
            'address' => 'required|max:20',
            'address_type' => 'required|in:home,office',
            'is_default' => 'required|boolean',
        ]);

        $checkIfExisted = Address::where('user_id', $request->header('id'))->where('address_type', $request->address_type)->first();
        if ($checkIfExisted) {
            $checkIfExisted->country = request()->country;
            $checkIfExisted->city = request()->city;
            $checkIfExisted->district = request()->district;
            $checkIfExisted->address = request()->address;
            $checkIfExisted->address_type = request()->address_type;
            $checkIfExisted->is_default = request()->is_default;

            if ($checkIfExisted->isDirty()) {
                $checkIfExisted->save();
            }
            return back();
        } else {
            $validatedRequest['user_id'] = $request->header('id');
            Address::create($validatedRequest);
            return back();
        }

    }

    public function updateDefaultAddress(Request $request)
    {
        $addresses = Address::where('user_id', $request->header('id'))->get();

        foreach ($addresses as $address) {
            $address->is_default = $address->is_default ? 0 : 1;
            $address->save();
        }

        return back();
    }

    public function deleteAddress(Request $request)
    {
        $address = Address::where('user_id', $request->header('id'))->where('id', $request->id)->first();
        if ($address) {
            $address->delete();
            return back();
        } else {
            return back()->withErrors(['message' => 'Address not found!']);
        }
    }

    public function userOrders()
    {
        $orders = Invoice::with(['invoiceOrders.product:id,name,image'])
            ->where('user_id', request()->header('id'))
            ->select('id', 'total', 'transaction_id', 'order_status', 'created_at')
            ->orderByDesc('id')->get();

        // dd($orders[0]->invoiceOrders[0]->product->name);

        return Inertia::render('Frontend/Profile/ProfileOrders', ['orders' => $orders]);
    }
    public function userInfo(Request $request)
    {

        return Inertia::render('Frontend/Profile/ProfileSetting');
    }

    public function updateProfileInfo()
    {
        $user_id = request()->header('id');
        $validatedRequest = request()->validate([
            'firstName' => 'required|between:4,20',
            'lastName' => 'between:4,10',
            'email' => 'required|email',
            'phone' => 'required|digits:11|numeric',
            Rule::unique('users', 'email')->ignore($user_id),
        ]);
        try {
            $user = User::find($user_id);
            $user->fill($validatedRequest);
            if ($user->isDirty()) {
                $user->save();
                return back();
            } else {
                return back()->withErrors(['message' => 'No changes made!']);
            }

        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Something Wrong!']);
        }

    }

    public function updateProfilePasswd()
    {
        $user_id = request()->header('id');
        $validatedRequest = request()->validate([
            'currentPass' => 'required',
            'newPass' => 'required|min:8',
        ]);

        try {
            $user = User::find($user_id);
            if ($user->password == $validatedRequest['currentPass']) {
                $user->password = $validatedRequest['newPass'];
                $user->save();
                return back();
            } else {
                return back()->withErrors(['message' => 'Password validation failed']);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Something Wrong!']);
        }
    }

    public function profileDelete()
    {
        $user_id = request()->header('id');
        try {
            $user = User::find($user_id);
            if ($user->password == request()->input('password')) {
                $user->delete();
                return redirect()->route('index')->cookie('token', '', -1);
            } else {
                return back()->withErrors(['message' => 'Password validation failed']);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Something Wrong!']);
        }
    }
}
