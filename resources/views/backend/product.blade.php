@extends('backend.admin')

@section('content')
<h1>Products</h1>
<a class="btn btn-success" href="{{route('Product.form')}}">Create new product</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Image</th>

      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      
      <th scope="col">Category Name</th>
      <th scope="col">Brand Name</th>


      <th scope="col">Action</th>


    </tr>
  </thead>
  <tbody>
  @foreach ($allProduct as $key=>$product)
  <tr>
      <th scope="row">{{$key+1}}</th>
      <td>
        <img src="{{url('/uploads/'.$product->image)}}" alt="" width="60">
      </td>
      <td>{{$product->name}}</td>
      <td>{{$product->price}} BDT</td>
      <td>{{$product->description}}</td>
      
      <td>{{$product->category->name}}</td>
      <td>{{$product->brand->name}}</td>




      <td>
      <a href="{{route('Product.view',$product->id)}}" class="btn btn-primary">View</a>
      <a href="{{route('Product.edit',$product->id)}}" class="btn btn-success">Edit</a>
      <a href="{{route('Product.delete',$product->id)}}" class="btn btn-danger">Delete</a>



      </td>
    </tr>
  @endforeach
    

  </tbody>
</table>


{{ $allProduct->links() }}






@endsection