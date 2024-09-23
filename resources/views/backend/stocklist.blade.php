@extends('backend.admin')

@section('content')
<h1> Stock List </h1>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Product Image</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Category Name</th>
      <th scope="col">Brand Name</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  
  @foreach($allStock as $stock)
    <tr>
      <th scope="row">{{$stock->id}}</th>
      <td><img src="{{url('/uploads/'.$stock->image)}}" alt="" width="60"></td>
      <td>{{$stock->name}}</td>
      <td>{{$stock->price}}</td>
      <td>{{$stock->quantity}}</td>
      <td>{{$stock->category->name}}</td>
      <td>{{$stock->brand->name}}</td>
      <td>
       <a href="{{route('Stock.delete',$stock->id)}}" class="btn btn-danger">Delete</a>

      </td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
