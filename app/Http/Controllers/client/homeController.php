<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\question;
use App\User;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public  function  index()
    {
        $users = User::Where('group_id', '=', '2')->count();

        $count_telecome = file_get_contents('http://localhost:80/billingCorporation/public/api/archivedTelecomeBill/count?searsh=all');
        $count_telecome = json_decode($count_telecome, true);
        $count_telecome = $count_telecome['count'];

        $count_water = file_get_contents('http://localhost:80/billingCorporation/public/api/archivedWaterBill/count?searsh=all');
        $count_water = json_decode($count_water, true);
        $count_water = $count_water['count'];

        $count_electricty = file_get_contents('http://localhost:80/billingCorporation/public/api/archivedElectricityBill/count?searsh=all');
        $count_electricty = json_decode($count_electricty, true);
        $count_electricty = $count_electricty['count'];

        $count_total = $count_electricty + $count_water + $count_telecome;
        return view('client.client', compact('users', 'count_total'));
    } //end index
    public function telecome(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|numeric'
        ]);

        $phone_number = $request->phone_number;
        $data = file_get_contents('http://localhost:80/billingCorporation/public/api/newTelecomeBill?searsh=' . $phone_number);
        $data = json_decode($data);
        $bills = $data->data;

        if ($bills == "@lang('site.num_bill')") {
            $dataar = file_get_contents('http://localhost:80/billingCorporation/public/api/archivedTelecomeBill?searsh=' . $phone_number);
            $dataar = json_decode($dataar);
            $billsar = $dataar->data;
            if ($billsar == "@lang('site.num_bill')") {
                return view('error.4042');
            }
        }
        return view('client.bill.yourBills', compact('bills'));
    } //end telecome
    public function water(Request $request)
    {
        $request->validate([
            'counter_number' => 'required|numeric'
        ]);

        $counter_number = $request->counter_number;

        $data = file_get_contents('http://localhost:80/billingCorporation/public/api/newWaterBill?searsh=' . $counter_number);
        $data = json_decode($data);
        $bills = $data->data;
        if ($bills == "@lang('site.num_bill')") {
            $dataar = file_get_contents('http://localhost:80/billingCorporation/public/api/archivedWaterBill?searsh=' . $counter_number);
            $dataar = json_decode($dataar);
            $billsar = $dataar->data;
            if ($billsar == "@lang('site.num_bill')") {
                return view('error.4042');
            }
        }
        return view('client.bill.yourBills', compact('bills'));
    } //end water
    public function electricity(Request $request)
    {

        $request->validate([
            'hour_number' => 'required|numeric'
        ]);

        $hour_number = $request->hour_number;
        $data = file_get_contents('http://localhost:80/billingCorporation/public/api/newElectricityBill?searsh=' . $hour_number);
        $data = json_decode($data);
        $bills = $data->data;
        if ($bills == "@lang('site.num_bill')") {
            $dataar = file_get_contents('http://localhost:80/billingCorporation/public/api/archivedElectricityBill?searsh=' . $hour_number);
            $dataar = json_decode($dataar);
            $billsar = $dataar->data;
            if ($billsar == "@lang('site.num_bill')") {
                return view('error.4042');
            }
        }
        return view('client.bill.yourBills', compact('bills'));
    } //end electricity
}
