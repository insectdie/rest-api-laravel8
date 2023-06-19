<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Nationality;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers =  DB::table('customer')
                        ->join('nationality', 'customer.nationality_id', '=', 'nationality.nationality_id')
                        ->select('customer.*', 'nationality.nationality_name', 'nationality.nationality_code')
                        ->get();
        return view('customer.list', [
            'customers' => $customers
        ]);
    }

    public function create()
    {
        $nationalities =  DB::table('nationality')->get();
        return view('customer.create', [
            'nationalities' => $nationalities
        ]);
    }

    public function store(Request $request)
    {
        // Validate the request...
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'dob' => 'required',
            'phone_num' => 'required|max:20',
            'kewarganegaraan_id' => 'required',
            'email' => 'required|email|max:50'
        ]);

        $customer = new Customer;
 
        $customer->cst_name = $request->name;
        $customer->cst_dob = $request->dob;
        $customer->cst_phone_num = $request->phone_num;
        $customer->nationality_id = $request->kewarganegaraan_id;
        $customer->cst_email = $request->email;
 
        $customer->save();
        return redirect('/')->with('success', 'New customer has been added!');
    }

    public function edit(Customer $customer)
    {
        $nationalities =  DB::table('nationality')->get();
        return view('customer.edit', [
            'customer' => $customer,
            'nationalities' => $nationalities
        ]);
    }

    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'dob' => 'required',
            'phone_num' => 'required|max:20',
            'email' => 'required|email|max:50'
        ]);

        DB::table('customer')
              ->where('cst_id', $request->id)
              ->update([
                'cst_name' => $request->name,
                'cst_dob' => $request->dob,
                'cst_phone_num' => $request->phone_num,
                'nationality_id' => $request->kewarganegaraan_id,
                'cst_email' => $request->email,
        ]);
 
        return redirect('/')->with('success', 'Customer '.$request->name.' has been updated!');
    }

    public function destroy(string $id)
    {
        DB::table('family_list')->where('cst_id', '=', $id)->delete();
        DB::table('customer')->where('cst_id', '=', $id)->delete();
        return redirect('/')->with('success', 'Customer has been deleted!');
    }
}