@extends('backend.admin')
@section('content')


<h1> Order Report </h1>
<form action="{{route('Report')}}">
    <label for=""> From date </label>
    <input required value="{{request()->from_date}}" name="from_date" type="date" placeholder="From date" class="form-control" >

    <label for=""> To date </label>
    <input required value="{{request()->to_date}}" name="to_date" type="date" placeholder="To date" class="form-control" >

    <button type="submit" class="btn btn-success">Search</button>

</form>

<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
    <h1> Order List Report</h1>
    <h4>Date: {{request()->from_date}} to {{request()->to_date}}</h4>
</div>
<div class="col-md-4"></div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Receiver Name</th>
      <th scope="col">Address</th>
      <th scope="col">Mobile</th>
      <th scope="col">Status</th>
      <th scope="col">Amount</th>
      <th scope="col">Order Date</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>

  @foreach ($orderReport as $report)


    <tr>
    <th scope="row">{{$report->id}}</th>
      <td>{{$report->receiver_name}}</td>
      <td>{{$report->receiver_address}}</td>
      <td>{{$report->receiver_mobile}}</td>
      <td>{{$report->status}}</td>
      <td>{{$report->total_amount}}</td>

      <td>{{$report->created_at}}</td>
      <td>
        <div class="d-flex">
          <a href="{{route('View.invoice',$report->id)}}" class="btn btn-primary">View</a>
          <a class="btn btn-danger" href="">Delete</a>
        </div>
      </td>
    @endforeach
  </tbody>
</table>

@endsection