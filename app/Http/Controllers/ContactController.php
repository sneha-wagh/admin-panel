<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::all();

        return view('contact.index', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|max:255',
            'address'=> 'required|max:255',
            'phone'=> 'required|max:255',
            'email'=> 'required|max:255',
            'message'=> 'required|max:255',
        ]);

        $contact = new Contact([
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'message' => $request->get('message'),
        ]);

        $contact->save();

        return redirect('/contact')->with('success', 'Data saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);

        return view('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // echo "hi";die;
        $contact = Contact::find($id);

        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> 'required|max:255',
            'address'=> 'required|max:255',
            'phone'=> 'required|max:255',
            'email'=> 'required|max:255',
            'message'=> 'required|max:255',
        ]);                                           

        $contact = Contact::find($id);
        $contact->name = $request->get('name');
        $contact->address = $request->get('address');
        $contact->phone = $request->get('phone');
        $contact->email = $request->get('email');
        $contact->message = $request->get('message');
        $contact->save();

        return redirect('/contact')->with('success', 'Data Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // echo "hi";die;
        $contact = Contact::find($id);
        $contact->delete();

        return redirect('/contact')->with('success', 'Data deleted!');
    }
}
   