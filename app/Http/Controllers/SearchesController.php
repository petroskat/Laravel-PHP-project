<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adv;
use Illuminate\Support\Facades\DB;

class SearchesController extends Controller
{
  public function getIndex( Request $request ) {


    $s = $request->query('search');
    if ($s == '') {
      return view('results')->with('advs',NULL);
    }

    // Query and paginate result
    $advs = Adv::where('title','like', "%" . $s . "%")
        ->orWhere('body','like', "%" . $s . "%")
        ->orWhere('region','like',"%" . $s . "%")
        ->orWhere('category','like',"%" . $s . "%")
        ->paginate(4);

    return view('results', ['advs' => $advs, 's' => $s ]);
  }

  public function search(Request $request)
  {
    $this->validate($request,[
      'minPrice' => 'integer|nullable',
      'maxPrice' => 'integer|nullable|min:'.($request->get('minPrice')),
      'Category' => 'required'
    ]);

    $category = $request->input('Category');
    $min = $request->input('minPrice');
    $max = $request->input('maxPrice');
    $region = $request->input('Region');

    if ($min == '') {
      $min = 0 ;
    }
    if ($max == '') {
      $max = 20001 ;
    }



    $advs = Adv::where('category','=',$category)
                 ->whereBetween('price',[$min,$max]);

    if ($region != '0') {
      $advs = $advs->where('region',$region)->paginate(4);
    }
    else {
      $advs = $advs->paginate(4);
    }



    return view('results',['advs'=>$advs]);

  }
}
