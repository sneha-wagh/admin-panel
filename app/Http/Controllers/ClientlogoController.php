<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Clientlogo;

class ClientlogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientlogo = Clientlogo::all();

        return view('clientlogo.index', compact('clientlogo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('clientlogo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $file = $request->file('image');
         // dd($file); die;
        $request->validate([
            'title'=> 'required|max:255',
            // 'content'=> 'required|max:255',
            // 'address'=> 'required|max:255'
        ]);
         
        $file = $request->file('image');
         
          if ($file) {
             
          
            $extension = $file->getClientOriginalExtension();

            $image = time().'.' .$extension;

            $file -> move('img/clientlogo/' , $image);


        $clientlogo = new Clientlogo([
            'title' => $request->get('title'),
            'image' => $image,
            // 'address' => $request->get('address'),
        ]);

        $clientlogo->save();

        if($clientlogo){
                    return redirect('/clientlogo')->with('success', 'Congrats Client Logo Saved Successfully!');
                 }
            }

                 return redirect('/clientlogo')->with('error', 'Opps! Client Logo Fail to Create!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientlogo = Clientlogo::find($id);

        return view('clientlogo.show', compact('clientlogo'));
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
        $clientlogo = Clientlogo::find($id);

        return view('clientlogo.edit', compact('clientlogo'));
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
            'title'=> 'required|max:255',
            // 'content'=> 'required|max:255',
            // 'address'=> 'required|max:255'
        ]);
         
        $input = $request->all();
        $file = $request->file('image');
        // dd($input); die; 
  
         if($file)
                {
                    // dd($file); die;
                    $extension = $file->getClientOriginalExtension();

                    $image = time().'.' .$extension;

                    $file -> move('img/clientlogo/' , $image);

                    $clientlogo = array( 
                       'title' => $request->title,
                        // 'product_name' => $request->product_name,
                        // 'product_code' => $request->product_code,
                        // 'product_price' => $request->product_price,
                        // 'product_description' => $request->product_description,
                        'image' => $image,
                    );
                    Clientlogo::findOrfail($id)->update($clientlogo);
        // $clientlogo = Clientlogo::find($id);
        // $clientlogo->title = $request->get('title');
        // $clientlogo->content = $request->get('content');
        // $about->address = $request->get('address');
        }

                    return redirect('/clientlogo')->with('success', 'Congrats Client Logo Updated Successfully!');
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
        $clientlogo = Clientlogo::find($id);
        $clientlogo->delete();

        return redirect('/clientlogo')->with('success', 'Congrats Client Logo Deleted Successfully!');
    }
}
   