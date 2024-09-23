@extends('backend.admin')
@section('content')
<h1>Category</h1>
<a class="btn btn-primary" href="{{route('Category.form')}}">Create Category</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category Name</th>
      <th scope="col">Description</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>

  @foreach ($allCategory as $cat)

    <tr>
    <th scope="row">{{$cat->id}}</th>
      <td>{{$cat->name}}</td>
      <td>{{$cat->description}}</td>
      <td>{{$cat->status}}</td>
      <td>
      <a href="{{route('Category.view',$cat->id)}}" class="btn btn-primary">View</a>
      <a href="{{route('Category.edit',$cat->id)}}" class="btn btn-success">Edit</a>
      <a href="{{route('Category.delete',$cat->id)}}" class="btn btn-danger">Delete</a>
      </td>
    @endforeach
  </tbody>
</table>





@endsection