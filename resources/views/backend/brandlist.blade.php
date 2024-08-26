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
        <a class="btn btn-success" href="">View</a>
        <a class="btn btn-info" href="">Edit</a>
        <a class="btn btn-danger" href="">Delete</a>
      </td>
    @endforeach
  </tbody>
</table>





@endsection





