<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::all();

        return view('blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('blog.create');
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
            'title'=> 'required|max:255',
            'content'=> 'required|max:255',
           
        ]);
         
        $file = $request->file('image');
         
          if ($file) {
             
          
            $extension = $file->getClientOriginalExtension();

            $image = time().'.' .$extension;

            $file -> move('img/blog/' , $image);


        $blog = new Blog([
           
            'image' => $image,
            'heading' => $request->get('heading'),  
            'title' => $request->get('title'),
            'content' => $request->get('content'),
        ]);

        $blog->save();

        if($blog){
                    return redirect('/blog')->with('success', 'Congrats Data Saved Successfully!');
                 }
            }

                 return redirect('/blog')->with('error', 'Opps! Data Fail to Create!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);

        return view('blog.show', compact('blog'));
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
        $blog = Blog::find($id);

        return view('blog.edit', compact('blog'));
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

                    $file -> move('img/blog/' , $image);

                    $blog = array( 
                    
                        'image' => $image,
                        'heading' => $request->heading,
                        'title' => $request->title,
                        'content' => $request->content,
                        
                       

                        // 'product_code' => $request->product_code,
                        // 'product_price' => $request->product_price,
                        // 'product_description' => $request->product_description,
                    );
                    Blog::findOrfail($id)->update($blog);
        // $clientlogo = Clientlogo::find($id);
        // $clientlogo->title = $request->get('title');
        // $clientlogo->content = $request->get('content');
        // $about->address = $request->get('address');
        }

                    return redirect('/blog')->with('success', 'Congrats Client Logo Updated Successfully!');
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
        $blog = Blog::find($id);
        $blog->delete();

        return redirect('/blog')->with('success', 'Congrats Client Logo Deleted Successfully!');
    }
}
   