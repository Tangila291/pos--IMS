@extends('backend.admin')

@section('content')
<h1>Brand List</h1>
<a class="btn btn-primary" href="{{route('Brand.form')}}">Create Brand list</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Brand Name</th>
      <th scope="col">Description</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>

  @foreach ($allBrand as $brand)

    <tr>
    <th scope="row">{{$brand->id}}</th>
      <td>{{$brand->name}}</td>
      <td>{{$brand->description}}</td>
      <td>{{$brand->status}}</td>
      <td>
        <a href="{{route('Brand.edit',$brand->id)}}" class="btn btn-success">Edit</a>
        <a href="{{route('Brand.delete',$brand->id)}}" class="btn btn-danger">Delete</a>

      </td>
    @endforeach
  </tbody>
</table>





@endsection





