<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adv;
use Illuminate\Support\Facades\DB;

class SearchesController extends Controller
{
  public function getIndex( Request $request ) {
  $s = $request->query('s');

  // Query and paginate result
  $advs = Adv::where('title','like', "%$s%")
      ->orWhere('body','like', "%$s%")
      ->paginate(4);

  return view('results', ['advs' => $advs, 's' => $s ]);
  }
}
