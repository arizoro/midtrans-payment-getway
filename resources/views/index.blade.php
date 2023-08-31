@extends('template/main')

@section('content')

<h1 class="my-3" >All Handphone</h1>
    <div class="row my-3">
        <div class="col-lg-4">
          <div class="card" >
            <img src="{{ asset('assets/img/iphone.jpg') }}" style="height: 300px; width:250px" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Hp Iphone</h5>
              <span class="card-text" >Rp. {{ $harga['iphone'] }}</span>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              
              <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >Check Out</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card" >
            <img src="{{ asset('assets/img/samsung.png') }}" style="height: 300px; width:250px" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Hp Samsung</h5>
              <span class="card-text" >Rp. {{ $harga['samsung'] }}</span>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Check Out</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card" >
            <img src="{{ asset('assets/img/oppo.jpeg') }}" style="height: 300px; width:250px" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Hp Oppo</h5>
              <span class="card-text" >Rp. {{ $harga['oppo'] }}</span>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Check Out</a>
            </div>
          </div>
        </div>
    </div>

        {{-- modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Isi data diri</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/checkout" method="post">
              @csrf
              <div class="mb-3">
                <label for="qty" class="form-label">Jumlah pesanan</label>
                <input type="number" class="form-control" id="qty" name="qty">
              </div>
              
              <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name">
              </div>

              <div class="mb-3">
                <label for="phone" class="form-label">No Telp</label>
                <input type="text" class="form-control" id="phone" name="phone">
              </div>
              
              <div class="mb-3">
                <label for="addres" class="form-label">Alamat</label>
                <textarea name="addres" id="addres" class="form-control" cols="12" rows="6"></textarea>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="sumbit" class="btn btn-primary">Check Out</button>
          </div>
        </form>
        </div>
      </div>
    </div>
@endsection