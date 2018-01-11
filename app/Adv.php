<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Adv extends Model
{
    // search related stuff
    use Notifiable;
    use Searchable;

    //table name
    protected $table = 'advs';
    // Primary key
    public $primarykey = 'id';
    // timestamps
    public $timestamps = true;

    public function user() {
      return $this->belongsTo('App\User');
    }
    public function searchableAs()
    {
        return view('advs.index');
    }
    // store advertisement
    public static function store_adv(Request $request)
    {
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

      // create and store Advertisment
      $adv = new Adv;
      $adv->title = $request->input('title');
      $adv->body = $request->input('description');
      $adv->user_id = auth()->user()->id;
      $adv->cover_image = $filenameToStore;
      $adv->category = $request->input('Category');
      $adv->price = $request->input('Price');
      $adv->region = $request->input('Region');
      try {
        $adv->save();
        return true;
      } catch (Exception $e) {
        return false;
      }

    }
    //advertisement update procedure
    public static function update_adv(Request $request,$id)
    {
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
      if (!$adv) {
        return redirect('/')->with('error','Item does not exist or was removed :(');
      }
      if (auth()->user()->id =! $adv->user_id) {
        return redirect('/')->with('error',"This advertisement doesn't belong to you !!");
      }
      $adv->title = $request->input('title');
      $adv->body = $request->input('description');
      if ($request->hasFile('cover_image')) {
        $adv->cover_image = $filenameToStore;
      }
      $adv->category = $request->input('Category');
      $adv->price = $request->input('Price');
      $adv->region = $request->input('Region');

      try {
        $adv->save();
        return true;
      } catch (Exception $e) {
        return false;
      }

    }

    public static function delete_adv($id)
    {
      $adv = Adv::find($id);
      if (!$adv) {
        return false;
      }
      //check if the user is the author so he can edit
      if (auth()->user()->id == $adv->user_id) {
        $adv->delete();
        //image deletion
        if ($adv->cover_image != 'no_image.jpg') {
          Storage::delete('public/cover_image/'.$adv->cover_image);
        }
        return true;
      }
      else {
        return false;
      }
    }

}
