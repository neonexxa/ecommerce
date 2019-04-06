@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach($products as $product)
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="{{$product->pic}}" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text">{{$product->desc}}</p>
                    <a class="btn btn-primary" href="#"
                       onclick="event.preventDefault();
                                     document.getElementById('newbill-form{{$product->id}}').submit();">
                        Buy RM {{$product->price}}
                    </a>

                    <form id="newbill-form{{$product->id}}" action="{{ route('purchase.store') }}" method="POST" style="display: none;">
                        @csrf
                        <input type="hidden" name="product" value="{{$product->id}}">
                    </form>
                  </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
