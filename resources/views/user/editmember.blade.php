@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Pengguna</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="col-lg-9">
    <form method="post" action="/user/{{ $user->username }}" class="mb-5" enctype="multipart/form-data">
      @method('put')
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nama Pengguna</label>
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $user->name) }}" autofocus required>
          @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email', $user->email) }}" required>
          @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password <small>(kosongkan jika tidak ada perubahan)</small></label>
          <div class="group-input">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" id="passeye" type="button" id="button-addon2"><i id="eyeopen" class="fa fa-eye"></i><i id="eyeclose" style="display: none;" class="fa fa-eye-slash"></i></button>
          </div>
          @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Data Pengguna</button>
    </form>
</div>

<script>
  $("#passeye").click(function(){
    var x = $("#password");
    var y = $("#eyeopen");
    var z = $("#eyeclose");
    if(x.attr("type") === 'password'){
      x.attr("type", "text");
      z.css("display", "block");
      y.css("display", "none");
    }else{
      x.attr("type", "password");
      z.css("display", "none");
      y.css("display", "block");
    }
  });

</script>
    
@endsection