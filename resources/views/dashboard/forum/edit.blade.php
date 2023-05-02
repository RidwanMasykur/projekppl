@extends('dashboard/layouts/main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buat Postingan Baru</h1>
</div>

<div class="col-lg-9">
    <img src="{{ asset('storage/' . $forum->image) }}" class="w-25">
    <form method="post" action="/dashboard/forum/{{ $forum->id }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="image" class="form-label">Masukkan Gambar!</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
            @error('image')
            <div class="invalid-feedback">
                {{ 'Data tidak boleh kosong!' }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"  name="title" value="{{ $forum->title }}">
            @error('title')
            <div class="invalid-feedback">
                {{ 'Data tidak boleh kosong!' }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label @error('body') is-invalid @enderror">Tulis Pesan Anda!</label>
            <input id="body" type="hidden" name="body" value="{{ $forum->body }}">
            <trix-editor input="body"></trix-editor>
            @error('body')
            <div class="invalid-feedback">
                {{ 'Data tidak boleh kosong!' }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-dark" onclick="return confirm('Apakah Anda yakin mengubah postingan?')">Simpan</button>
    </form>
</div>


@endsection