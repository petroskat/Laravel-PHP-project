
  <h3><u><b>Latest Advertisements</b></u></h3>
  <hr>

  <div style="overflow-y: scroll; height:390px;" class="container">
    @if (count($advs) > 0)
      @foreach ($advs as $adv)
        <a href="/advs/{{$adv->id}}"><div class="well shrink text-center" style="border-radius: 25px;">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <img height="70" width="90" src="/storage/cover_image/{{$adv->cover_image}}" alt="Advertisement_Image">
            </div>
            <div class="col-md-6 col-sm-6">
              <h4>{{$adv->title}}</h4>
            </div>
            <div class="col-sm-12">
              <br>
              <small>{{$adv->created_at}}</small>
            </div>
          </div>
        </div></a>
      @endforeach
    @else
      <p>There are no Advertisments yet :(</p>
    @endif
  </div>
