<?php

namespace App\Http\Controllers;
use App\Adv;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
      $advs = Adv::orderBy('updated_at',"desc")->take(5)->get();
      return view('pages.index')->with('advs',$advs);
    }
    public function about()
    {
      return view('pages.about');
    }
    public function services()
    {
      $data = array(
        'title' => 'Services',
        'services'=> ['Advertisment promotion','Help with your Advertisment','Negotiation with interested individuals','More to come soon..']
       );
      return view('pages.services')->with($data);
    }
}
