<?php

namespace App\Http\Controllers;
use App\Adv;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
      //get some ads for the sidebar
      $advs = Adv::orderBy('updated_at',"desc")->take(5)->get();
      return view('pages.index')->with('advs',$advs);
    }
    public function about()
    {
      return view('pages.about');
    }
    public function services()
    {
      return view('pages.services');
    }
}
