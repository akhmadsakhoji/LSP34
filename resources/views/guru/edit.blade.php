@extends('layouts.master')
@section('title', 'Edit Data Guru')
@section('content')

    <div class="row">
        <div class="col-md-6">
            <Form action="guru/update/{{ $guru->id }}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" name="nama" placeholder="Nama" value="{{ $guru->nama }}" class="form-control">
                    </div>
                    <div class="text-danger">
                        @error('nama')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-book"></i></span>
                        <input type="text" name="nip" placeholder="NIP" value="{{ $guru->nip }}" class="form-control">
                    </div>
                    <div class="text-danger">
                        @error('nip')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="text" name="jabatan" placeholder="Jabatan" value="{{ $guru->jabatan }}" class="form-control">
                    </div>
                    <div class="text-danger">
                        @error('jabatan')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                        <input type="text" name="pendidikan" placeholder="Pendidikan" value="{{ $guru->pendidikan }}" class="form-control">
                    </div>
                    <div class="text-danger">
                        @error('pendidikan')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-bank"></i></span>
                        <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" value="{{ $guru->tempat_lahir }}"
                            class="form-control" data-inputmask="&quot;mask&quot;:&quot;(999) 999-9999&quot;">
                    </div>
                    <div class="text-danger">
                        @error('tempat_lahir')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ $guru->tanggal_lahir }}"
                            class="form-control" data-inputmask="&quot;mask&quot;:&quot;(999) 999-9999&quot;">
                    </div>
                    <div class="text-danger">
                        @error('tanggal_lahir')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <select name="agama" class="form-control">
                        <option>Islam</option>
                        <option>Kristen</option>
                        <option>Hindu</option>
                        <option>Budha</option>
                        <option>Lainnya</option>
                    </select>
                    <div class="text-danger">
                        @error('agama')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="text" name="telp" placeholder="No Telp" value="{{ $guru->telp }}" class="form-control"
                            data-inputmask="&quot;mask&quot;:&quot;(999) 999-9999&quot;">
                    </div>
                    <div class="text-danger">
                        @error('telp')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <input type="text" name="alamat" placeholder="Alamat" value="{{ $guru->alamat }}" class="form-control"
                            data-inputmask="&quot;mask&quot;:&quot;(999) 999-9999&quot;">
                    </div>
                    <div class="text-danger">
                        @error('alamat')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <img src="{{url('images/'.$guru->photo)}}" width="100px">
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="file" name="photo" value="{{$guru->photo}}" class="form-control">
                        </div>
                        <div class="text-danger">
                            @error('photo')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>

                <div>
                    <a href="/guru" class="btn btn-success btn-sm">Close</a>
                    <button class="btn btn-primary btn-sm">Save</button>
                </div>
            </Form>
        </div>
    </div>

@endsection @push('scripts')
    <script>
        $(function() {
            $('#guru-table').DataTable();
        })
    </script>
@endpush
