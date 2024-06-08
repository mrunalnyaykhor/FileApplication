<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contact;
    public function __construct(){
        $this->contact= new Contact();
    }
    public function index(){
        $response['contacts']=$this->contact->all();
        return view("auth.contact")->with($response);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'mobilenumber' => 'required|string',
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->mobilenumber =$request->mobilenumber;
        $contact->address=$request->address;

          $contact->save();
            if($contact ){


                return redirect()->back()->with(session()->flash('alert-success', 'Your contact has been created.'));
            }else

            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong!'));


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
