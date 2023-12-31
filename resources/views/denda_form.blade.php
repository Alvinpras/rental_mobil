
<?php

$processedIds = array();

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Mobil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>

    </style>

</head>
<body>

@extends('layouts.admin_sewa')

@section('content')
<style>

</style>
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('denda_sewa_store') }}">
                        @method('patch')
                        @csrf
                        <div class="row mb-3">
                            <label for="keterlambatan" class="col-md-4 col-form-label text-md-end">keterlambatan</label>
                            <label for="keterlambatan" class="col-md-1 col-form-label text-md-end">{{$sewa->denda->keterlambatan}} Hari</label>
                            <input id="keterlambatan" type="hidden" name="keterlambatan" value="{{$sewa->denda->keterlambatan}}" >
                        </div>
                        <div class="row mb-3">
                            <label for="keterlambatan_hrg" class="col-md-4 col-form-label text-md-end">denda</label>
                            <label for="keterlambatan_hrg" class="col-md-1 col-form-label text-md-end">{{$sewa->denda->terlambat}}</label>
                            <input id="terlambat" type="hidden" name="terlambat" value="{{$sewa->denda->terlambat}}" >
                          </div>

                        <div class="row mb-3">
                            <label for="kerusakan" class="col-md-4 col-form-label text-md-end">{{ __('Harga kerusakan') }}</label>

                            <div class="col-md-6">
                                <input id="kerusakan" type="number" class="form-control @error('kerusakan') is-invalid @enderror" value="{{$sewa->denda->kerusakan}}"name="kerusakan" >
                                @error('kerusakan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="deks_kerusakan" class="col-md-3 col-form-label text-md-end sss">{{ __('Dekripsi kerusakan') }}</label>
                            <div class="form-outline">
                            <textarea value="{{$sewa->denda->deskripsi_kerusakan}}" class="form-control" id="deks_kerusakan" name="deks_kerusakan" rows="4"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="iddd" value="{{$sewa->denda->id}}">
                        <input type="hidden" name="mobil_idd" value="{{$sewa->denda->mobil_id}}">
                        <input type="hidden" name="sewa_id" value="{{$sewa->denda->sewa_id}}">
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Denda') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>


</script>
@endsection
</body>
</html>