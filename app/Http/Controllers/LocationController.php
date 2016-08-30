<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Location;
use Session;
use DateTime;
use Carbon;

class LocationController extends Controller
{

    public function index(Request $request)
    {

        $locations = Location::where('status','=',1)->get();
        return view('locations.index')->with('locations', $locations);
    }

    public function store(Request $request)
    {
        //Validation
        $this->validate($request, [
            'location_name'     => 'required|max:255',
            'location_address'  => 'required|max:255'
            ]);

        //Storing in the Database

        $locations = new Location;

        $locations -> location_name     = $request -> location_name;
        $locations -> location_address  = $request -> location_address;

        $locations -> save();

        //Add Flash Measage
        Session::flash('success', 'New Location Added');

        //Redirect to Another Page
        return redirect() -> route ('locations.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $locations = Location::find($id);

        return view('locations.show')->with('locations', $locations);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Find the location that need to be edited
        $locations = Location::find($id);

        //Goto the view where location is edited
        return view('locations.edit')->with('locations',$locations);

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
        //Find the location that will be updated
        $locations = Location::find($id);

        //Validate the Edited data
        $this->validate($request,[
            'location_name'     => 'required|max:255',
            'location_address'  => 'required|max:255'
            ]);

        //Store the Updated data in the Database
        $locations->location_name    = $request->input('location_name');
        $locations->location_address = $request->input('location_address');

        $locations->save();

        //Redirect it to the locations.show page
        return redirect()->route('locations.show', $locations->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get the Location that is to be deleted
        $locations = Location::find($id);

        //Update its status Field to 0 and update the delete field
        $locations->status = Location::where('location_name',$locations->location_name)->update(['status' => 0]);

        
        $ct = 'Asia/Karachi';
        $del_time=Carbon::now($ct);
        $locations->deleted =Location::where('location_name',$locations->location_name)->update(['deleted' => $del_time]); 

        //Flash Message
        Session::flash('success', 'The Location is successfully deleted');

        //Redirect to the Index Page
        return redirect()->route('locations.index');
    }
}
