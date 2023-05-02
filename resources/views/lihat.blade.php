@extends('layouts/main')

@section('container')

<div class="container text-center my-5">
  <h3>{{ $forum->title }}</h3>
  <img src="{{ asset('storage/' . $forum->image) }}" class="w-50">
  <p>{!! $forum->body !!}</p>
</div>

<footer class="text-body-secondary py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Kembali ke atas</a>
    </p>
  </div>
</footer>

<section class="bg-dark">
  <div class="container py-5 text-dark">
    <div class="row d-flex justify-content-center">
      <div class="col-md-11 col-lg-9 col-xl-7">
        
        @foreach ($forum->komentar as $komentar)
            
        <div class="d-flex flex-start mb-4">
          <div class="card w-100">
            <div class="card-body p-4">
              <div class="">
                <h5>{{ $komentar->nama }}</h5>
                <p>
                  {{$komentar->komentar}}
                </p>

              </div>
            </div>
          </div>
        </div>

        @endforeach

      </div>
    </div>
  </div>
</section>

<form action="/forum/{{ $forum->id }}/komentar">
<section class="bg-dark">
  <div class="container py-5 text-dark">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-6">
        <div class="card">
          <div class="card-body p-4">
            <div class="d-flex flex-start w-100">
              <div class="w-100">
                <h5>Masukan Nama</h5>
                <input type="text" name="nama" class="form-control">
                <h5>Tambahkan Komentar</h5>
                <div class="form-outline">
                  <textarea class="form-control" id="textAreaExample" rows="4" name="komentar"></textarea>
                </div>
                <div class="d-flex justify-content-end mt-3">
                  <button type="submit" class="btn btn-success">
                    Kirim Komentar
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>

@endsection