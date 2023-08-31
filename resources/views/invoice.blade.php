@extends('template/main')

@section('content')
<h1 class="my-4">Invoice</h1>
<div class="row my-3">
  <div class="col-lg-4">
    <div class="card" >
      <div class="card-body">
        <h5 class="card-title">Detail Pesanan</h5>
        <table>
          <tr>
            <td>Nama</td>
            <td>: {{ $order->name }}</td>
          </tr>
          <tr>
            <td>No Hp</td>
            <td>: {{ $order->phone }}</td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>: {{ $order->addres }}</td>
          </tr>
          <tr>
            <td>Total harga</td>
            <td>: {{ $order->total_price }}</td>
          </tr>
          <tr>
            <td>Status</td>
            <td>: {{ $order->status }}</td>
          </tr>
        </table>        

      </div>
    </div>
  </div>
  
@endsection