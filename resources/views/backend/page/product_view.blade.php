@extends('backend.admin')

@section('content')
<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                        <img class="card-img-top mb-5 mb-md-0" src="{{url('/uploads/'.$product->image)}}" alt="product image" style="width: 300px;"></div>
                    <div class="col-md-6">
                        <div class="small mb-1">SKU: BST-498</div>
                        <h1 class="display-5 fw-bolder">{{$product->name}}</h1>
                        <div class="fs-5 mb-5">
                            <span class="">{{$product->price}} .BDT</span>
                            <p>Stock: {{$product->quantity}} available</p>

                        </div>
                        <p class="lead">description here</p>
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem">
                            @if($product->quantity>0)
                            <a class="btn btn-success" href="{{route('Add.to.cart',$product->id)}}">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </a>
                            @else
                            <a disabled class="btn btn-success" href="">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </a>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>







@endsection