@extends('template/main')

@section('content')

<div class="row my-3">
  <div class="col-lg-4">
    <div class="card" >
      <img src="{{ asset('assets/img/iphone.jpg') }}" style="height: 300px; width:250px" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Detail pesanan</h5>
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
        </table>        
        
        <button class="btn btn-primary" id="pay-button" >Pay now</button>
      </div>
    </div>
  </div>
  
  <script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    const payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay( '{{ $snapToken }}', {
        onSuccess: function(result){
          /* You may add your own implementation here */
          alert("payment success!"); console.log(result);
          window.location.href = '/invoice/{{ $order->id }}'
        },
        onPending: function(result){
          /* You may add your own implementation here */
          alert("wating your payment!"); console.log(result);
        },
        onError: function(result){
          /* You may add your own implementation here */
          alert("payment failed!"); console.log(result);
        },
        onClose: function(){
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
      })
    });
  </script>
@endsection


