<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Family;
use App\Models\Nationality;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function index(Customer $customer)
    {
        $families =  DB::table('family_list')
                        ->where('cst_id', $customer->cst_id)
                        ->get();
        return view('family.list', [
            'customer' => $customer,
            'families' => $families
        ]);
    }

    public function create(Customer $customer)
    {
        return view('family.create', [
            'customer' => $customer
        ]);
    }

    public function store(Request $request, Customer $customer)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'relasi' => 'required|max:50',
            'dob' => 'required'
        ]);

        $family = new Family;
 
        $family->cst_id = $customer->cst_id;
        $family->fl_name = $request->name;
        $family->fl_relation = $request->relasi;
        $family->fl_dob = $request->dob;
 
        $family->save();
        return redirect('/customer/'.$customer->cst_id.'/family')->with('success', 'New family has been added!');
    }

    public function destroy(string $cst_id, string $fl_id)
    {
        $deleted = DB::table('family_list')
            ->where('cst_id', '=', $cst_id)
            ->where('fl_id', '=', $fl_id)
            ->delete();
        return redirect('/customer/'.$cst_id.'/family')->with('success', 'Family has been deleted!');
    }
}