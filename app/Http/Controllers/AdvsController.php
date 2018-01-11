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
        'Region' => 'required',
        'cover_image'=> 'image|nullable|max:1999',
        'Price' => 'required'
      ]);

      if (Adv::store_adv($request) == true) {
        return redirect('/advs')->with('success','Advertisment sucessfully Created');
      }
      else {
        return redirect('/advs')->with('error','Something went Wrong_creating');
      }

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
        if (!$adv) {
          return redirect('/')->with('error','Item does not exist or was removed :(');
        }
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

      if (!$adv) {
        return redirect('/')->with('error','Item does not exist or was removed :(');
      }

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
        'description' => 'required',
        'Region' => 'required',
        'cover_image'=> 'image|nullable|max:1999',
        'Price' => 'required'
      ]);

      if (Adv::update_adv($request,$id) == true) {
        return redirect('/advs')->with('success','Advertisment sucessfully Updated');
      }
      else {
        return redirect('/advs')->with('error','Something went Wrong_updating');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
      if (Adv::delete_adv($id) == true) {
        return redirect('/advs')->with('success','Advertisment sucessfully removed');
      }
      else {
        return redirect('/advs')->with('error','Something went Wrong_removing');
      }

    }
    
    public function sidebar()
    {
        return view('inc.sidebar');
    }


}
