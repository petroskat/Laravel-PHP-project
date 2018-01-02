<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Adv;

class AdvsController extends Controller
{
    // constructor for authentication reasons
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advs = Adv::orderBy('updated_at',"desc")->paginate(4);
        return view('advs.index')->with('advs',$advs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('advs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'title' => 'required',
        'description' => 'required',
        'cover_image'=> 'image|nullable|max:1999',
        'Price' => 'required'
      ]);

      // handle image upload
      if ($request->hasFile('cover_image')) {
        // get filename with extension.
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        // get just filename
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        // now get the extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        // filename to Store (with timestamp in order to be unique)
        $filenameToStore = $filename."_".time().".".$extension;
        //finally upload the image
        $path = $request->file('cover_image')->storeAs('public/cover_image',$filenameToStore);
      }
      else {
        $filenameToStore = 'no_image.jpg';
      }

      // create Advertisment
      $adv = new Adv;
      $adv->title = $request->input('title');
      $adv->body = $request->input('description');
      $adv->user_id = auth()->user()->id;
      $adv->cover_image = $filenameToStore;
      $adv->category = $request->input('Category');
      $adv->price = $request->input('Price');
      $adv->region = $request->input('Region');
      $adv->save();

      return redirect('/advs')->with('success','Advertisment sucessfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adv = Adv::find($id);
        return view('advs.show')->with("adv",$adv);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $adv = Adv::find($id);

      //check if the user is the author so he can edit
      if (auth()->user()->id == $adv->user_id) {
        return view('advs.edit')->with('adv',$adv);
      }
      else {
        return redirect('/advs')->with('error','You are sneaky , but you have no power here!!');
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request,[
        'title' => 'required',
        'description' => 'required'
      ]);
      // handle image upload
      if ($request->hasFile('cover_image')) {
        // get filename with extension.
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        // get just filename
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        // now get the extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        // filename to Store (with timestamp in order to be unique)
        $filenameToStore = $filename."_".time().".".$extension;
        //finally upload the image
        $path = $request->file('cover_image')->storeAs('public/cover_image',$filenameToStore);
      }

      // Update Advertisment
      $adv = Adv::find($id);
      $adv->title = $request->input('title');
      $adv->body = $request->input('description');
      if ($request->hasFile('cover_image')) {
        $adv->cover_image = $filenameToStore;
      }
      $adv->category = $request->input('Category');
      $adv->price = $request->input('Price');
      $adv->region = $request->input('Region');
      $adv->save();

      return redirect('/advs')->with('success','Advertisment sucessfully updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adv = Adv::find($id);
        //check if the user is the author so he can edit
        if (auth()->user()->id == $adv->user_id) {
          $adv->delete();
          return redirect('/advs')->with('success','Advertisment sucessfully deleted!!');
        }
        // if the Advertisement has an image
        if ($adv->cover_image != 'no_image.jpg') {
          Storage::delete('public/cover_image/'.$adv->cover_image);
        }
        else {
          return redirect('/advs')->with('error','You are sneaky , but you have no power here!!');
        }



    }
    public function sidebar()
    {
        return view('inc.sidebar');
    }


}
