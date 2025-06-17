@extends('adminlte::page')

@section('title', 'RSPB')

@section('content_header')
<h1 class="m-0 text-dark">Data Pasien</h1>
@stop

@section('content')
<div class="colmd-12 py-5 bg-white rounded-lg">
    <div class="col-md-10 row justify-content-center mx-auto">
        <table border="1" width="100%" class="text-center h6">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kewarganegaraan</th>
                    <th>NIK</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>No. Telepon</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patient as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->citizen }}</td>
                    <td>{{ $data->nik }}</td>
                    <td>{{ $data->birthplace }}, {{date('d-M-Y', strtotime($data->birthdate))}}</td>
                    <td>{{ $data->gender }}</td>
                    <td>{{ $data->phone_number }}</td>
                    <td>{{ $data->address }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop