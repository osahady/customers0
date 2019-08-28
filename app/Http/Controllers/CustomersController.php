<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Company;
class CustomersController extends Controller
{
    public function list()
    {       
        $activeCustomers = Customer::active()->get();
        $inactiveCustomers = Customer::inactive()->get();
        $companies = Company::all();
       
        return view('internals.customers', compact('activeCustomers', 'inactiveCustomers', 'companies'));
    }//end of function list

    public function store(Request $request)
    {
        $data = request()->validate([
            'company_id' => 'required',
            'name' => 'required|min:3',
            
            'email' => 'required|email',
            'active' => 'required',
            
        ]);
        //dd($data);
        Customer::create($data);
        return back();
    }

    // public function store()
    // {
    //    //dd('hello');
    //     $data = request()->validate([
    //         'company_id'=>'required',
    //         'name'=>'required|min:3',
    //         'email'=> 'required|email',
    //         'active'=>'required',
            
    //     ]);
    //      dd($data);
    //      //Customer::create($data);
    //     $customer = new Customer();
    //     $customer->company_id= request('company');
    //     $customer->name = request('name');
    //     $customer->email = request('email');
    //     $customer->active = request('active');
        
    //     $customer->save();

    //     return back();
    // }
}
