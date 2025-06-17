@extends('adminlte::page')

@section('title', 'RSPB')

@section('content_header')
<h1 class="m-0 text-dark">Antrian</h1>
@stop

@section('content')
<div class="col-md-12 justify-content-center mx-auto py-5 bg-white rounded-lg">
    <div class="mx-5">
        <h1 class="text-center text-primary">Ambil Antrian</h1>
        <hr>
        <form action="{{ route ('patient.get_queue') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-5 mb-3 row">
                <label for="poli" class="col-sm-2 col-form-label">Pilih Poli</label>
                <div class="col-sm-10">
                    <select class="form-control" aria-label="Poli" name="poli" required>
                        <option selected>Pilih Poli</option>
                        @foreach ($poli as $polis)
                        <option value="{{ $polis->poli_code}}">{{ $polis->poli_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="queue" class="col-sm-2 col-form-label">Nomor Antrian</label>
                <div class="col-sm-10">
                    <input readonly type="number" class="form-control" id="queue" name="queue" value="{{ $queue }}" required>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@stop