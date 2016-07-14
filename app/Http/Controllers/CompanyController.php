<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Company;
use App\Location;
use  Session;
use Carbon;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $companies = Company::where('status','=',1)->where(function($query) use ($request)
        {
            //Filter by Keyword Enter
            if(($term = $request->get('term')))
            {
                $query->orWhere('company_name', 'like', '%'.$term.'%');
                $query->orWhere('industry', 'like', '%'.$term.'%');
                $query->orWhere('address', 'like', '%'.$term.'%');
                $query->orWhere('employees', 'like', '%'.$term.'%');
            }
        })

        ->orderBy('company_name','asc')
        ->paginate(10);

        
        return view('companies.index')->with('companies', $companies);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Capture All the Locations from the Location Table
        $locations = Location::all();

        //Creating a New Company
        return view('companies.create')->with('locations', $locations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Vaidation 
         $this->validate($request, [
            'company_name' => 'required|max:255',
            'industry'     => 'required|max:255',
            'address'      => 'required|max:255',
            'employees'    => 'required',
            'location_id'  => 'required|integer'
            ]);

        //Storing in the Database 

        $companies = New Company;

        $companies->company_name = $request->company_name;
        $companies->industry     = $request->industry;
        $companies->address      = $request->address;
        $companies->employees    = $request->employees;
        $companies->location_id  = $request->location_id;

        $companies->save();

        //Getting a Flash Message
        Session::flash('success','New Company Created !!!');


        //Redirect to another page
        return redirect() -> route('companies.show',$companies->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Displays the stored Company

        $companies = Company::find($id);

        return view ('companies.show')->with('companies',$companies);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Find the Company That needs to be edited
        $companies = Company::find($id);

        $locations = Location::all();

        //return the view and pass the variable
        return view ('companies.edit')->with('companies', $companies)->with('locations',$locations);
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



        //Validate the Input Updated data
         $this->validate($request, [
            'company_name' => 'required|max:255',
            'industry'     => 'required|max:255',
            'address'      => 'required|max:255',
            'employees'    => 'required',
            'location_id'  => 'required|integer'
            ]);

        //Store the updated data in the database

        $companies = Company::find($id);

        $companies->company_name = $request->company_name;
        $companies->industry     = $request->industry;
        $companies->address      = $request->address;
        $companies->employees    = $request->employees;
        $companies->location_id  = $request->location_id; 


        $companies->save();


        //Set the Flash Message with success message
        Session::flash('success', 'Company data updated');

        //Redirect it to the companies.show page
        return redirect()->route('companies.show', $companies->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get the Company that is to be deleted
        $companies = Company::find($id);

        //Update its status Field to 0 and update the delete field
        $companies->status = Company::where('company_name',$companies->company_name)->update(['status' => 0]);
        
        $ct = 'Asia/Karachi';
        $del_time=Carbon::now($ct);
        $companies->deleted =Company::where('company_name',$companies->company_name)->update(['deleted' => $del_time]);

        //Flash Message
        Session::flash('success', 'The Company is successfully deleted');

        //Redirect to the Index Page
        return redirect()->route('companies.index');
    }
}
