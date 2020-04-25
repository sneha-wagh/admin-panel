<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Testimonial;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonial = Testimonial::all();

        return view('testimonial.index', compact('testimonial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('testimonial.create');
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
            'name'=> 'required|max:255',
            'designation'=> 'required|max:255',
            'content'=> 'required|max:255'
        ]);
         
        $file = $request->file('image');
         
          if ($file) {
             
          
            $extension = $file->getClientOriginalExtension();

            $image = time().'.' .$extension;

            $file -> move('img/testimonial/' , $image);


        $testimonial = new Testimonial([
            'name' => $request->get('name'), 
            'image' => $image,
            'designation' => $request->get('designation'),  
            'content' => $request->get('content'),
        ]);

        $testimonial->save();

        if($testimonial){
                    return redirect('/testimonial')->with('success', 'Congrats Data Saved Successfully!');
                 }
            }

                 return redirect('/testimonial')->with('error', 'Opps! Data Fail to Create!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimonial = Testimonial::find($id);

        return view('testimonial.show', compact('testimonial'));
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
        $testimonial = Testimonial::find($id);

        return view('testimonial.edit', compact('testimonial'));
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
            'designation'=> 'required|max:255',
            'content'=> 'required|max:255'
        ]);
         
        $input = $request->all();
        $file = $request->file('image');
        // dd($input); die; 
  
         if($file)
                {
                    // dd($file); die;
                    $extension = $file->getClientOriginalExtension();

                    $image = time().'.' .$extension;

                    $file -> move('img/testimonial/' , $image);

                    $testimonial = array( 
                        'name' => $request->name,
                        'image' => $image,
                        'designation' => $request->designation,
                        'content' => $request->content,
                       

                        // 'product_code' => $request->product_code,
                        // 'product_price' => $request->product_price,
                        // 'product_description' => $request->product_description,
                    );
                    Testimonial::findOrfail($id)->update($testimonial);
        // $clientlogo = Clientlogo::find($id);
        // $clientlogo->title = $request->get('title');
        // $clientlogo->content = $request->get('content');
        // $about->address = $request->get('address');
        }

                    return redirect('/testimonial')->with('success', 'Congrats Client Logo Updated Successfully!');
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
        $testimonial = Testimonial::find($id);
        $testimonial->delete();

        return redirect('/testimonial')->with('success', 'Congrats Client Logo Deleted Successfully!');
    }
}
   