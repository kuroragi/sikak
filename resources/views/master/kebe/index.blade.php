@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kelompok Belanja</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    <div class="table-responsive col-lg-9">
        <button class="btn btn-block btn-primary mb-3" id="addbutton" data-bs-toggle="modal" data-bs-target="#addmodal"><i
                class="fa fa-plus"></i> Tambah Kelompok Belanja</button>

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

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <table class="table table-striped table-sm" id="tbl">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Kelompok Belanja</th>
                    <th scope="col">Periode</th>
                    <th scope="col">KAK</th>
                    <th scope="col">Dengan Satuan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody id="tbody">
                @foreach ($kebe as $k)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->ket }}</td>
                        <td class="text-center">{{ $k->start_periode ?? 2023 }} - {{ $k->end_periode ?? 'sekarang' }}</td>
                        <td class="text-center"><input type="checkbox"
                                @if ($k->is_kak == 1) class="bg-green" checked @endif disabled></td>
                        <td class="text-center"><input type="checkbox"
                                @if ($k->is_satuan_needed == 1) class="bg-green" checked @endif disabled></td>
                        <td class="text-center">
                            @if ($k->status == 1)
                                <i class="text-green fa fa-square"></i>
                            @else
                                <i class="text-red fa fa-square"></i>
                            @endif
                        </td>
                        <td>
                            <button class="badge bg-warning border-0" id="editbutton" data-bs-toggle="modal"
                                kebe="{{ $k->id }}" data-bs-target="#editmodal"><i class="fa fa-edit"></i></button>
                            @if (auth()->user()->role == 'admin')
                                <form action="/kebe/{{ $k->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i
                                            class="fa fa-circle-xmark"></i></button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="accordion col-lg-9 mb-5" id="accordionDeleted">
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading_soft_delete">
                <button class="accordion-button collapsed bg-danger text-light" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse_soft_delete" aria-expanded="false" aria-controls="collapseTwo">
                    Data Kebutuhan Belanja yang tak Aktif
                </button>
            </h2>
            <div class="accordion-collapse collapse p-3" id="collapse_soft_delete" aria-labelledby="heading"
                data-bs-parent="accordionDeleted">
                <table class="table table-striped table-sm" id="tbl">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Kelompok Belanja</th>
                            <th scope="col">Periode</th>
                            <th scope="col">KAK</th>
                            <th scope="col">Dengan Satuan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @foreach ($unactive_kebes as $k)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $k->ket }}</td>
                                <td class="text-center">{{ $k->start_periode ?? 2023 }} -
                                    {{ $k->end_periode ?? 'sekarang' }}</td>
                                <td class="text-center"><input type="checkbox"
                                        @if ($k->is_kak == 1) class="bg-green" checked @endif disabled></td>
                                <td class="text-center"><input type="checkbox"
                                        @if ($k->is_satuan_needed == 1) class="bg-green" checked @endif disabled></td>
                                <td class="text-center">
                                    @if ($k->status == 1)
                                        <i class="text-green fa fa-square"></i>
                                    @else
                                        <i class="text-red fa fa-square"></i>
                                    @endif
                                </td>
                                <td>
                                    <button class="badge bg-warning border-0" id="editbutton" data-bs-toggle="modal"
                                        kebe="{{ $k->id }}" data-bs-target="#editmodal"><i
                                            class="fa fa-edit"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Add Data -->
    <div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kebutuhan Belanja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/kebe" class="mb-5">
                        @csrf
                        <div class="row">
                            <div class="col col-xl-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Kebutuhan Belanja</label>
                                    <input type="ket" name="ket"
                                        class="form-control @error('ket') is-invalid @enderror" id="addket"
                                        value="{{ old('ket') }}" autofocus required>
                                    @error('ket')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="urutan" class="form-label">Urutan</label>
                                    <select name="urutan" class="form-select" id="addurutan">
                                        @php
                                            $count_kebe = count($kebe);
                                        @endphp
                                        @for ($i = 1; $i <= $count_kebe + 1; $i++)
                                            <option @if ($count_kebe + 1 == $i) selected @endif
                                                value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="start_periode" class="form-label">Awal Periode</label>
                                        <select name="start_periode" class="form-select" id="add_startperiode">
                                            @for ($i = 2023; $i <= date('Y', strtotime(now())); $i++)
                                                @if (date('Y', strtotime(now())) == $i)
                                                    <option selected value="{{ $i }}">{{ $i }}
                                                    </option>
                                                @else
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endif
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="end_periode" class="form-label">Akhir Periode <a href="javascript:"
                                                data-bs-toggle="popover" data-bs-trigger="hover"
                                                data-bs-placement="right" title="Pemilihan AKhir Periode"
                                                data-bs-content="Jika memilih sekarang berarti kelompok belanja masih aktif, jika memilih yang yang berarti kelompok belanja akan berakhir pada tahun tersebut">
                                                <i class="fa fa-exclamation-triangle text-warning"></i></a></label>
                                        <select name="end_periode" class="form-select" id="add_endperiode">
                                            @for ($i = 2023; $i <= date('Y', strtotime(now())); $i++)
                                                @if (date('Y', strtotime(now())) == $i)
                                                    <option selected value="">Sekarang
                                                    </option>
                                                @else
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endif
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <label for="is_kak">Berbentuk KAK?</label>
                                    <input class="form-check-input" name="is_kak" type="checkbox" role="switch"
                                        id="addiskak">
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <label for="is_satuan_needed">Memiliki Satuan?</label>
                                    <input class="form-check-input" name="is_satuan_needed" type="checkbox"
                                        role="switch" id="addissatuanneeded">
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <label for="is_pencetus">Memiliki Pencetus?</label>
                                    <input class="form-check-input" name="is_pencetus" type="checkbox" role="switch"
                                        id="add_ispencetus">
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" class="form-select" id="addstatus">
                                        <option value="1" class="bg-green">Aktif</option>
                                        <option value="0" class="bg-danger">Non Aktif</option>
                                    </select>
                                </div> --}}
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah Kelompok Belanja</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Create -->

    <!-- Modal Edit Data -->
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kebutuhan Belanja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="editform" action="/kebe" class="mb-5">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col col-xl-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Kebutuhan Belanja</label>
                                    <input type="ket" name="ket"
                                        class="form-control @error('ket') is-invalid @enderror" id="editket"
                                        value="{{ old('ket') }}" autofocus required>
                                    @error('ket')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="urutan" class="form-label">Urutan</label>
                                    <select name="urutan" class="form-select" id="editurutan">
                                        @php
                                            $count_kebe = count($kebe);
                                        @endphp
                                        @for ($i = 1; $i <= $count_kebe; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="start_periode" class="form-label">Awal Periode</label>
                                        <select name="start_periode" class="form-select" id="edit_startperiode">
                                            @for ($i = 2023; $i <= date('Y', strtotime(now())); $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="end_periode" class="form-label">Akhir Periode <a href="javascript:"
                                                data-bs-toggle="popover" data-bs-trigger="hover"
                                                data-bs-placement="right" title="Pemilihan AKhir Periode"
                                                data-bs-content="Jika memilih sekarang berarti kelompok belanja masih aktif, jika memilih yang yang berarti kelompok belanja akan berakhir pada tahun tersebut">
                                                <i class="fa fa-exclamation-triangle text-warning"></i></a></label>
                                        <select name="end_periode" class="form-select" id="edit_endperiode">
                                            @for ($i = 2023; $i <= date('Y', strtotime(now())); $i++)
                                                @if (date('Y', strtotime(now())) == $i)
                                                    <option selected value="">Sekarang
                                                    </option>
                                                @else
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endif
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <label for="is_kak">Berbentuk KAK?</label>
                                    <input class="form-check-input" name="is_kak" type="checkbox" role="switch"
                                        id="editiskak">
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <label for="is_satuan_needed">Memiliki Satuan?</label>
                                    <input class="form-check-input" name="is_satuan_needed" type="checkbox"
                                        role="switch" id="editissatuanneeded">
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <label for="is_pencetus">Memiliki Pencetus?</label>
                                    <input class="form-check-input" name="is_pencetus" type="checkbox" role="switch"
                                        id="edit_ispencetus">
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" class="form-select" id="editstatus">
                                        <option value="1" class="bg-green">Aktif</option>
                                        <option value="0" class="bg-danger">Non Aktif</option>
                                    </select>
                                </div> --}}
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">edit Kelompok Belanja</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal edit -->
@endsection

@push('js')
    <script>
        $("#addgenbtn").click(function() {
            var name = $("#addname").val();
            $.ajax({
                url: '/getslug?name=' + name,
                type: 'GET',
                success: function(data) {
                    $("#addslug").val(data.slug)
                }
            });
        });

        $("#editgenbtn").click(function() {
            var name = $("#editname").val();
            $.ajax({
                url: '/getslug?name=' + name,
                type: 'GET',
                success: function(data) {
                    $("#editslug").val(data.slug)
                }
            });
        });

        $("#tbody #editbutton").click(function() {
            var id = $(this).attr("kebe");
            $.ajax({
                url: '/getdataedit?tbl=kelompokbelanjas&whr=id&id=' + id,
                type: 'GET',
                success: function(data) {
                    $("#editform").attr("action", "/kebe/" + id);
                    $("#editket").val(data.ket);
                    $("#editurutan").val(data.urutan).change();
                    if (data.start_periode == null) {
                        data.start_periode = 2023;
                    }
                    $("#edit_startperiode").val(data.start_periode).change();
                    if (data.end_periode == null) {
                        data.end_periode = "";
                    }
                    $("#edit_endperiode").val(data.end_periode).change();
                    if (data.is_kak == 1) {
                        $("#editiskak").prop("checked", true);
                        $("#editissatuanneeded").prop("disabled", true);
                    } else {
                        $("#editiskak").prop("checked", false);
                        $("#editissatuanneeded").prop("disabled", false);
                    }
                    if (data.is_satuan_needed == 1) {
                        $("#editissatuanneeded").prop("checked", true);
                    } else {
                        $("#editissatuanneeded").prop("checked", false);
                    }
                    if (data.is_pencetus == 1) {
                        $("#edit_ispencetus").prop("checked", true);
                    } else {
                        $("#edit_ispencetus").prop("checked", false);
                    }
                    $("#editstatus").val(data.status).change();
                }
            });
        });

        $("#addiskak").change(function() {
            if ($(this).prop("checked") == true) {
                $("#addissatuanneeded").prop("checked", false);
                $("#add_issatuanneeded").val(0);
                $("#addissatuanneeded").prop("disabled", true);
            } else {
                $("#addissatuanneeded").prop("disabled", false);
            }
        });

        $("#editiskak").change(function() {
            if ($(this).prop("checked") == true) {
                $("#editissatuanneeded").prop("checked", false);
                $("#edit_issatuanneeded").val(0);
                $("#editissatuanneeded").prop("disabled", true);
            } else {
                $("#editissatuanneeded").prop("disabled", false);
            }
        });
    </script>
@endpush
