<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/carousel.css">
    <link rel="stylesheet" href="/css/price.css">
    <title>{{ $title }}</title>

  </head>
  <body>

    @include('partials/navbar')

<div style="margin-top: 70px">
    @yield('container')
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
      <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <strong class="me-auto">Notifikasi</strong>
          <small>Baru saja</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          @foreach ($errors->all() as $message)
              <p class="text-danger">{{ $message }}</p>
          @endforeach
          <p class="text-success">{{ session()->get('notify') }}</p>
        </div>
      </div>
    </div>
    
    @if ($errors->any() || session()->has('notify'))
        <script>
          var myAlert =document.getElementById('liveToast');//select id of toast
          var bsAlert = new bootstrap.Toast(myAlert);//inizialize it
          bsAlert.show();
        </script>
    @endif

  </body>
</html>