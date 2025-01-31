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
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ old('username', $user->username) }}" required>
          @error('username')
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
          <label for="status" class="form-label">Status</label>
          <select class="form-select" name="status">
              <option value="1" @if ($user->status === '1')
                selected
            @endif>Active</option>
              <option value="0" @if ($user->status === '0')
                selected
            @endif>Non Active</option>
          </select>
        </div>
        @if (auth()->user()->role_slug === 'admin')
        <div class="mb-3">
          <label for="role_slug" class="form-label">Role</label>
          <select class="form-select" name="role_slug">
            @foreach ($role as $r)
                <option value="{{ $r->slug }}" @if ($r->slug === $user->role_slug)
                    selected
                @endif>{{ $r->role }}</option>
            @endforeach
          </select>
        </div>
          <div class="mb-3">
            <label for="kode_skpd" class="form-label">Kode SKPD</label>
            <select class="form-select" name="kode_skpd">
              <option value="" @if ($user->kode_skpd == '')
                selected
            @endif>Bukan Anggota SKPD</option>
              @foreach ($skpd as $s)
                  <option value="{{ $s->kode }}" @if ($s->kode === $user->kode_skpd)
                    selected
                @endif>{{ $s->name }}</option>
              @endforeach
            </select>
          </div>
        @elseif(auth()->user()->role_slug === 'kaskpd')
          <input type="text" name="role_slug" class="form-control" id="role_slug" value="askpd" hidden readonly>
          <input type="text" name="kode_skpd" class="form-control" id="kode_skpd" value="{{ auth()->user()->kode_skpd }}"  hidden readonly>
          <div class="mb-3">
            <label for="kode_unit" class="form-label">Sub Unit</label>
            <select class="form-select" name="kode_sub">
              <option value="" @if ($user->kode_sub == '')
                selected
            @endif>--- Pilih Sub Unit ---</option>
              @foreach ($sub_units as $su)
                  <option value="{{ $su->kode }}" @if ($su->kode === $user->kode_sub)
                    selected
                @endif>{{ $su->name }}</option>
              @endforeach
            </select>
          </div>
        @endif
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