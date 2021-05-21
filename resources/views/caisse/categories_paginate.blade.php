@foreach($categories as $category)
 <div class="col-2 col-xs-3 col-sm-2" style="overflow:hidden;">
    <button id="{{$category->id}}">{{$category->name}}</button>
    </div>
@endforeach
  <div class="col-4 col-xs-4 col-sm-4" id="paginate_category">
    {{$categories->links()}}
  </div>