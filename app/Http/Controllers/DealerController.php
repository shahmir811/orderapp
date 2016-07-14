<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dealer;
use App\Distributor;
use Session;
use Carbon;


class DealerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $dealers = Dealer::where('status','=',1)->where(function($query) use ($request)
        {
            //Filter by Keyword Enter
            if(($term = $request->get('term')))
            {
                $query->orWhere('name', 'like', '%'.$term.'%');
                $query->orWhere('address', 'like', '%'.$term.'%');
                $query->orWhere('email', 'like', '%'.$term.'%');
                //$query->orWhere('distributor_id', 'like', '%'.$term.'%');
                $query->orWhere('distributor_id', 'like', '%'.$term.'%')->join('distributions')->on('dealers.distributor_id', '=', 'distributions.id');
            }
        })

        ->orderBy('name','asc')
        ->paginate(10);

        
        return view('dealers.index')->with('dealers', $dealers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Distributions List 
        $distributions = Distributor::all();

        return view('dealers.create')->with('distributions', $distributions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate Data
        $this->validate ($request, [
            'name'           => 'required|max:255',
            'address'        => 'required|max:255',
            'email'          => 'required|unique:dealers',
            'distributor_id' => 'required|integer'
            ]);

        //Store in the database

        $dealers = New Dealer;

        $dealers->name            = $request->name;
        $dealers->address         = $request->address;
        $dealers->email           = $request->email;
        $dealers->distributor_id  = $request->distributor_id;
        
        $dealers->save();

        //Getting a Flash Message
        Session::flash('success','New Dealer Created !!!');

        //Redirect to the view
        return redirect() -> route('dealers.show', $dealers->id);        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dealers = Dealer::find($id);

        return view('dealers.show')->with('dealers', $dealers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Find the Dealer that need to be updated
        $dealers = Dealer::find($id);

        $distributions = Distributor::all();

        //Return to the EDIT View
        return view ('dealers.edit')->with('dealers', $dealers)->with('distributions', $distributions);
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
        //Validate the Updated Data
        $this->validate ($request, [
            'name'           => 'required|max:255',
            'address'        => 'required|max:255',
            'email'          => 'required',
            'distributor_id' => 'required|integer'
            ]);


        //Store the updated data in the database
        $dealers = Dealer::find($id);

        $dealers->name            = $request->input('name');
        $dealers->address         = $request->input('address');
        $dealers->email           = $request->input('email');
        $dealers->distributor_id  = $request->input('distributor_id');

        
        $dealers->save();

        //Set the Flash Message with success message
        Session::flash('success', 'Dealer data updated');       
        
        //Redirect it to the dealers.show page
        return redirect()->route('dealers.show', $dealers->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get the Dealer that is to be deleted
        $dealers = Dealer::find($id);

        //Update its status Field to 0 and update the delete field
        $dealers->status = Dealer::where('name',$dealers->name)->update(['status' => 0]);
        
        $ct = 'Asia/Karachi';
        $del_time=Carbon::now($ct);
        $dealers->deleted =Dealer::where('name',$dealers->name)->update(['deleted' => $del_time]); 

        //Flash Message
        Session::flash('success', 'The Dealer is successfully deleted');

        //Redirect to the Index Page
        return redirect()->route('dealers.index');
    }
}
