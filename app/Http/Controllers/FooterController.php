<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Footer;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientlogo = Footer::all();

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
            'heading'=> 'required|max:255',
            'content'=> 'required|max:255',
            // 'address'=> 'required|max:255'
        ]);
         
        $file = $request->file('image');
         
          if ($file) {
             
          
            $extension = $file->getClientOriginalExtension();

            $image = time().'.' .$extension;

            $file -> move('img/footer/' , $image);


        $footer = new Footer([
            'image' => $image,
            'heading' => $request->get('heading'),
            'content' => $request->get('content'),
           
            // 'address' => $request->get('address'),
        ]);

        $footer->save();

        if($footer){
                    return redirect('/footer')->with('success', 'Congrats Client Logo Saved Successfully!');
                 }
            }

                 return redirect('/footer')->with('error', 'Opps! Client Logo Fail to Create!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $footer = Footer::find($id);

        return view('footer.show', compact('footer'));
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
        $footer = Footer::find($id);

        return view('footer.edit', compact('footer'));
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
            'heading'=> 'required|max:255',
            'content'=> 'required|max:255',
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

                    $file -> move('img/footer/' , $image);

                    $footer = array( 
                        'image' => $image,
                        'heading' => $request->heading,
                        'content' => $request->content,
                        // 'product_code' => $request->product_code,
                        // 'product_price' => $request->product_price,
                        // 'product_description' => $request->product_description,
                        
                    );
                    Footer::findOrfail($id)->update($footer);
        // $clientlogo = Clientlogo::find($id);
        // $clientlogo->title = $request->get('title');
        // $clientlogo->content = $request->get('content');
        // $about->address = $request->get('address');
        }

                    return redirect('/footer')->with('success', 'Congrats Client Logo Updated Successfully!');
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
        $footer = Footer::find($id);
        $footer->delete();

        return redirect('/footer')->with('success', 'Congrats Client Logo Deleted Successfully!');
    }
}
   