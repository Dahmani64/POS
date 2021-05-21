@foreach($products as $product)
    <div class="col-2 col-xs-3 col-sm-2"  >
     <button style="overflow:hidden;" id='{{ $product->id }}' class='{{ $product->price }}'>{{ $product->name }}</button>
     </div>
@endforeach
<div class="col-12 col-xs-12 col-sm-12 " id="paginate_products">
      {{$products->links()}}
   </div>