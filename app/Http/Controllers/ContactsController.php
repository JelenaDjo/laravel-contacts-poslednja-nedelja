<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Contact::paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function store(ContactRequest /* Request */$request)
    {
        // first way to validate
        // $this->validate(
        //     $request,
        //     [
        //         'first_name'=>'requred',
        //         'last_name'=>'requred',
        //         'email'=>'requred | unique:contacts,email'
        //     ]
        // );

        return Contact ::create($request->only(['first_name', 'last_name', 'email']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        // return Contact::findOrFail(); // jednostavnije je nacin dole
        return $contact;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
   
     
    public function update(ContactRequest $request, Contact $contact)
    {
         $contact->update($request->only(['first_name', 'last_name', 'email']));
         return $contact;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return $contact;
    }
}
