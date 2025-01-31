@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Pengguna</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

      <div class="table-responsive col-lg-12">
        <a href="/user/create" class="btn btn-primary mb-3"><span data-feather="plus"></span> Tambah Pengguna</a>
        @can('admin')
          <div class="row d-flex justify-content-center">
            <div class="col col-8">
              <form action="/user">
                <div class="input-group">
                  <select name="skpd" id="getskpd" class="form-select">
                    <option value="">Semua SKPD</option>
                    @foreach ($skpd as $s)
                      <option value="{{ $s->kode }}" @if($s->kode == request('skpd')) selected @endif>{{ $s->name }}</option>
                    @endforeach
                  </select>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-magnifying-glass"></i></button>
                </div>
              </form>
            </div>
        @endcan
        
        </div>

        @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if (session()->has('warning'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('warning') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if (session()->has('danger'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('danger') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <table class="table table-striped table-sm">
          <thead>
            <tr class="text-center">
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">Role</th>
              <th scope="col">SKPD</th>
              <th scope="col">Sub Unit</th>
              <th scope="col">Status</th>
              <th scope="col" class="w-10">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($users as $user)
                @if (auth()->user()->role_slug == 'admin')
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $user->name }}</td>
                      <td class="text-center">{{ $user->role->role }}</td>
                      <td>
                        @if ($user->kode_skpd != '')
                          {{ $user->skpd->name }}
                        @endif
                      </td>
                      <td>
                        @if ($user->subunit != '')
                          {{ $user->subunit->name }}
                        @endif
                      </td>
                      <td>@if ($user->status == 1) <i class="text-green fa fa-square"></i> @else <i class="text-red fa fa-square"></i> @endif</td>
                      <td class="text-center">
                          <a href="/user/{{ $user->username }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                          <form action="/user/{{ $user->username }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                          </form>
                      </td>
                  </tr>
                @elseif (auth()->user()->role_slug == 'kaskpd')
                  @if ($user->role_slug != 'kaskpd')
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $user->name }}</td>
                      <td class="text-center">{{ $user->role->role }}</td>
                      <td>
                        @if ($user->kode_skpd != '')
                          {{ $user->skpd->name }}
                        @endif
                      </td>
                      <td>
                        @if ($user->subunit != '')
                          {{ $user->subunit->name }}
                        @endif
                      </td>
                      <td>@if ($user->status == 1) <i class="text-green fa fa-square"></i> @else <i class="text-red fa fa-square"></i> @endif</td>
                      <td class="text-center">
                          <a href="/user/{{ $user->username }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                          <form action="/user/{{ $user->username }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                          </form>
                      </td>
                    </tr>
                  @endif
                @endif
              @endforeach
          </tbody>
        </table>
      </div>
      @can('admin')
        <div class="d-flex justify-content-center">
          {{ $users->links() }}
        </div>
      @endcan
@endsection