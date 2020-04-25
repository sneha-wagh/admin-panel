<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Enquiry;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enquiry = Enquiry::all();

        return view('enquiry.index', compact('enquiry'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('enquiry.create');
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
            'email'=> 'required|max:255',
            'message'=> 'required|max:255'
        ]);

        $enquiry = new Enquiry([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'message' => $request->get('message'),
        ]);

        $enquiry->save();

        return redirect('/enquiry')->with('success', 'Data saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enquiry = Enquiry::find($id);

        return view('enquiry.show', compact('enquiry'));
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
        $enquiry = Enquiry::find($id);

        return view('enquiry.edit', compact('enquiry'));
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
            'email'=> 'required|max:255',
            'amessage'=> 'required|max:255'
        ]);

        $enquiry = Enquiry::find($id);
        $enquiry->name = $request->get('name');
        $enquiry->email = $request->get('email');
        $about->message = $request->get('message');
        $enquiry->save();

        return redirect('/enquiry')->with('success', 'Data Updated!');
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
        $enquiry = Enquiry::find($id);
        $enquiry->delete();

        return redirect('/enquiry')->with('success', 'Data deleted!');
    }
}
   