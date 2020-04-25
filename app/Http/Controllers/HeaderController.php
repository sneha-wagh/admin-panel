<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Header;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = Header::all();

        return view('header.index', compact('header'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('header.create');
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
            'mobile'=> 'required|max:255',
            'email'=> 'required|max:255',
            'address'=> 'required|max:255'
        ]);

        $about = new About([
            'mobile' => $request->get('mobile'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
        ]);

        $header->save();

        return redirect('/header')->with('success', 'Data saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $header = Header::find($id);

        return view('header.show', compact('header'));
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
        $header = Header::find($id);

        return view('header.edit', compact('header'));
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
            'mobile'=> 'required|max:255',
            'email'=> 'required|max:255',
            'address'=> 'required|max:255'
        ]);

        $header = About::find($id);
        $header->mobile = $request->get('mobile');
        $header->email = $request->get('email');
        $header->address = $request->get('address');
        $header->save();

        return redirect('/header')->with('success', 'Data Updated!');
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
        $header = Header::find($id);
        $header->delete();

        return redirect('/header')->with('success', 'Data deleted!');
    }
}
   