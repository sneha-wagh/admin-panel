<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Services;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::all();

        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('services.create');
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
            'description'=> 'required|max:255',
            // 'address'=> 'required|max:255'
        ]);
         
        $file = $request->file('image');
         
          if ($file) {
             
          
            $extension = $file->getClientOriginalExtension();

            $image = time().'.' .$extension;

            $file -> move('img/services/' , $image);


        $services = new Services([
            'image' => $image,
            'title' => $request->get('title'),  
            'description' => $request->get('description'),
        ]);

        $services->save();

        if($services){
                    return redirect('/services')->with('success', 'Congrats Data Saved Successfully!');
                 }
            }

                 return redirect('/services')->with('error', 'Opps! Data Fail to Create!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $services = Services::find($id);

        return view('services.show', compact('services'));
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
        $services = Services::find($id);

        return view('services.edit', compact('services'));
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
            'description'=> 'required|max:255',
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

                    $file -> move('img/services/' , $image);

                    $services = array( 
                        'image' => $image,
                        'title' => $request->title,
                        'description' => $request->description,
                       

                        // 'product_code' => $request->product_code,
                        // 'product_price' => $request->product_price,
                        // 'product_description' => $request->product_description,
                    );
                    Services::findOrfail($id)->update($services);
        // $clientlogo = Clientlogo::find($id);
        // $clientlogo->title = $request->get('title');
        // $clientlogo->content = $request->get('content');
        // $about->address = $request->get('address');
        }

                    return redirect('/services')->with('success', 'Congrats Client Logo Updated Successfully!');
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
        $services = Services::find($id);
        $services->delete();

        return redirect('/services')->with('success', 'Congrats Client Logo Deleted Successfully!');
    }
}
   