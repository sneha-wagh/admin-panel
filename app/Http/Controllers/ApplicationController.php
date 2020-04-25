<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Application;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $application = Application::all();

        return view('application.index', compact('application'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('application.create');
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
            // 'heading'=> 'required|max:255',
            'title'=> 'required|max:255',
            'content'=> 'required|max:255',
           
        ]);
         
        $file = $request->file('image');
         
          if ($file) {
             
          
            $extension = $file->getClientOriginalExtension();

            $image = time().'.' .$extension;

            $file -> move('img/application/' , $image);


        $application = new Application([
           
            'image' => $image,
            // 'heading' => $request->get('heading'),  
            'title' => $request->get('title'),
            'content' => $request->get('content'),
        ]);

        $application->save();

        if($application){
                    return redirect('/application')->with('success', 'Congrats Data Saved Successfully!');
                 }
            }

                 return redirect('/application')->with('error', 'Opps! Data Fail to Create!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = Application::find($id);

        return view('application.show', compact('application'));
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
        $application = Application::find($id);

        return view('application.edit', compact('application'));
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
        
            // 'heading'=> 'required|max:255',
            'title'=> 'required|max:255',
            'content'=> 'required|max:255',
        ]);
         
        $input = $request->all();
        $file = $request->file('image');
        // dd($input); die; 
  
         if($file)
                {
                    // dd($file); die;
                    $extension = $file->getClientOriginalExtension();

                    $image = time().'.' .$extension;

                    $file -> move('img/application/' , $image);

                    $application = array( 
                    
                        'image' => $image,
                        // 'heading' => $request->heading,
                        'title' => $request->title,
                        'content' => $request->content,
                        
                       

                        // 'product_code' => $request->product_code,
                        // 'product_price' => $request->product_price,
                        // 'product_description' => $request->product_description,
                    );
                    Application::findOrfail($id)->update($application);
        // $clientlogo = Clientlogo::find($id);
        // $clientlogo->title = $request->get('title');
        // $clientlogo->content = $request->get('content');
        // $about->address = $request->get('address');
        }

                    return redirect('/application')->with('success', 'Congrats Application Updated Successfully!');
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
        $application = Application::find($id);
        $application->delete();

        return redirect('/product')->with('success', 'Congrats Application Deleted Successfully!');
    }
}
   