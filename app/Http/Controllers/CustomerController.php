<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Dealer;
use App\Customer;
use Session;
use Carbon;

class CustomerController extends Controller
{
    private $rules = [
            'line_id'           => 'required|integer',
            'customer_name'     => 'required|max:255',
            'address'           => 'required|max:255',
            'city'              => 'required|max:255',
            'dealer_id'         => 'required|integer'
            ];

    public function index(Request $request)
    {
        $customers = Customer::where('status','=',1)->where(function($query) use ($request)
        {
            //Filter by Keyword Enter
            if(($term = $request->get('term')))
            {
                $query->orWhere('line_id', 'like', '%'.$term.'%');
                $query->orWhere('customer_name', 'like', '%'.$term.'%');
                $query->orWhere('address', 'like', '%'.$term.'%');
                $query->orWhere('city', 'like', '%'.$term.'%');
                //$query->orWhere('distributor_id', 'like', '%'.$term.'%');
            }
        })

        ->orderBy('customer_name','asc')
        ->paginate(10);

        
        return view('customers.index')->with('customers', $customers);
    }

 
    public function create()
    {
        //Dealers List 
        $dealers = Dealer::all();

        return view('customers.create')->with('dealers', $dealers);

    }


    public function store(Request $request)
    {
        //Validate Data
        $this->validate ($request, $this->rules);

        //Store Customer in the Database
        $customers=Customer::create($request->all());

        //Getting a Flash Message
        Session::flash('success','New Customer Created !!!');

        //Redirect to the view
        return redirect() -> route('customers.show', $customers->id);

    }

 
    public function show($id)
    {
        $customers = Customer::find($id);

        return view('customers.show')->with('customers', $customers);
    }


    public function edit($id)
    {
        //Find the Customer that need to be updated
        $customers = Customer::find($id);

        $dealers = Dealer::all();

        //Return to the EDIT View
        return view ('customers.edit')->with('customers', $customers)->with('dealers', $dealers);
    }

 
    public function update(Request $request, $id)
    {
        //Validate the Updated Data
        $this->validate ($request, $this->rules);

        //Store the updated Data in Database
        $customers = Customer::find($id);
        $customers->update($request->all());

        //Set the Flash Message with success message
        Session::flash('success', 'Customer data updated');

        //Redirect it to the customers.show page
        return redirect()->route('customers.show', $customers->id);           

    }


    public function destroy($id)
    {
        //Get the Customer that is to be deleted
        $customers = Customer::find($id);

        //Update its status Field to 0 and update the delete field
        $customers->status = Customer::where('customer_name',$customers->customer_name)->update(['status' => 0]);
        
        $ct = 'Asia/Karachi';
        $del_time=Carbon::now($ct);
        $customers->deleted =Customer::where('customer_name',$customers->customer_name)->update(['deleted' => $del_time]); 

        //Flash Message
        Session::flash('success', 'The Customer is successfully deleted');

        //Redirect to the Index Page
        return redirect()->route('customers.index');
    }
}
