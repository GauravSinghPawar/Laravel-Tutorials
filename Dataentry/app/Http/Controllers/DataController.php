<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
use Session;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }


    public function index()
    {
       $data = Data::orderBy('id', 'desc')->paginate(5);
         //return $data;


        return view('home')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $data = Data::orderBy('id', 'desc')->paginate(5);
         //return $data;


        return view('home')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                /*    $this->validate($request, array(

                'name' => 'required|max:255',
                'dob' => 'required|date|before:tomorrow'
                'email' => 'required',
                'phone' => 'required',
                'company' => 'required',
                'address' => 'required',
                'password' => 'required',
                'subscribe' => 'required|accepted'
               )

            );*/


            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'dob' => 'required|date|before:tomorrow',
                'email' => 'required|email',
                'phone' => 'required',
                'company' => 'required',
                'address' => 'required',
                'password' => 'required',
                'subscribe' => 'required|accepted'

            ]);

            //return $validatedData;

              //return $request->all();
              $data =  new Data;
              $data->name = $request->name;

              //$data->dob = date("Y-m-d", strtotime($request->dob));
              $data->dob = $request->dob;
              $data->email = $request->email;
              $data->phone = $request->phone;
              $data->company = $request->company;
              $data->address = $request->address;
              $data->password = $request->password;

              if($request->subscribe == "on"){
                $request->subscribe = 1;
              }
              else
              {
                $request->subscribe = 0;
              }
              $data->subscribe = $request->subscribe;

              $data->save();


              Session::flash('status', 'User data successfully saved!');


              return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
