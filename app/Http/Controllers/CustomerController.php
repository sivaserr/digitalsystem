<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customers.customer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Customer();

        $customer->name = $request->input('name');
        $customer->address = $request->input('address');
        $customer->city = $request->input('city');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');

        $customer->save();

        return redirect('customer')->with('customer',$customer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $customers = Customer::all();

        return view('customers.customer')->with('customers',$customers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customerss = Customer::find($id);

        return view('customers.customer_edit')->with('customerss',$customerss);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customerss = Customer::find($id);

        $customerss->name = $request->input('name');
        $customerss->address = $request->input('address');
        $customerss->city = $request->input('city');
        $customerss->email = $request->input('email');
        $customerss->phone = $request->input('phone');

        $customerss->save();

        return redirect('/customer')->with('customerss', $customerss);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customers = Customer::find($id);
        $customers->delete();

        return redirect('/customer')->with('customers' ,$customers);
    }
}
