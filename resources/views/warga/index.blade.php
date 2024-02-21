@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Selamat datang Admin! Silahkan masukan data karyawan PT. SOLUSI 032 disini!') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="padding-top: 20px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Database Karyawan') }}</div>
                <div class="card-body">
                <a class="btn btn-dark" href="/warga/create">Tambah Karyawan</a>
                <table class="table">
                    <thead class="table-light">
                    <tr>  
                        <td>NAMA</td>
                        <td>JABATAN</td>
                        <td>NIK</td>
                        <td>GENDER</td>
                        <td>ALAMAT</td>
                        <td>AKSI</td>
                    </tr>
                    </thead>
                    @foreach($warga as $w)
                        <tbody>
                        <tr>
                            <td>{{$w->nama}}</td>
                            <td>{{$w->nik}}</td>
                            <td>{{$w->no_kk}}</td>
                            <td>{{$w->jenis_kelamin}}</td>
                            <td>{{$w->alamat}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-warning" href="/warga/{{$w->id}}/edit">Edit</a>
                                    <form action="/warga/{{$w->id}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input class="btn btn-danger" type="submit" value="Delete">
                                    </form>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

