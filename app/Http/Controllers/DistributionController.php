<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Distributor;
use App\Location;
use  Session;
use Carbon;

class DistributionController extends Controller
{

    public function index(Request $request)
    {

        $distributions = Distributor::where('status','=',1)->get();
        return view('distributions.index')->with('distributions', $distributions);

    }


    public function create()
    {
        //Grab all the locations
        $locations = Location::all();
        //Creating a New Distributor
        return view('distributions.create')->with('locations', $locations);
    }


    public function store(Request $request)
    {
        // Vaidation 
         $this->validate($request, [
            'name'        => 'required|max:255',
            'email'       => 'required|unique:distributors',
            'phone'       => 'required|max:255',
            'location_id' => 'required|integer'
            ]);

        //Storing in the Database 

        $distributions = New Distributor;

        $distributions->name        = $request->name;
        $distributions->email       = $request->email;
        $distributions->phone       = $request->phone;
        $distributions->location_id = $request->location_id;

        $distributions->save();

        //Getting a Flash Message
        Session::flash('success','New Distributor Created !!!');


        //Redirect to another page

        return redirect() -> route('distributions.show',$distributions->id);

    }


    public function show($id)
    {
        //Displays the stored Distributor

        $distributions = Distributor::find($id);

        return view ('distributions.show')->with('distributions',$distributions);
    }


    public function edit($id)
    {
        //Find the Distributor That needs to be edited
        $distributions = Distributor::find($id);

        $locations = Location::all();

        //return the view and pass the variable
        return view ('distributions.edit')->with('distributions', $distributions)->with('locations', $locations);
    }


    public function update(Request $request, $id)
    {

        //Validate the Input Updated data
        $this->validate($request,[
            'name'        => 'required|max:255',
            'email'       => 'required',
            'phone'       => 'required|max:255',
            'location_id' => 'required|integer'            
            ]);


        //Find the Distributor that will be updated
        $distributions = Distributor::find($id);

        //Store the updated data in the database
        $distributions->name        = $request->input('name');
        $distributions->email       = $request->input('email');
        $distributions->phone       = $request->input('phone');
        $distributions->location_id = $request->input('location_id');

        $distributions->save();


        //Set the Flash Message with success message
        Session::flash('success', 'Distributor data updated');

        //Redirect it to the distributions.show page
        return redirect()->route('distributions.show', $distributions->id);

    }


    public function destroy($id)
    {
        //Get the Distributor that is to be deleted
        $distributions = Distributor::find($id);

        //Update its status Field to 0 and update the delete field
        $distributions->status = Distributor::where('name',$distributions->name)->update(['status' => 0]);
        
        $ct = 'Asia/Karachi';
        $del_time=Carbon::now($ct);
        $distributions->deleted =Distributor::where('name',$distributions->name)->update(['deleted' => $del_time]); 

        //Flash Message
        Session::flash('success', 'The Distributor is successfully deleted');

        //Redirect to the Index Page
        return redirect()->route('distributions.index');

    }


}
