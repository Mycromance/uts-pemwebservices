@extends('layouts.app')

@section('content')
@php $edit = isset($biodata); @endphp

<div class="card shadow-sm border-0 mx-auto" style="max-width:600px;">
    <div class="card-body">
        <h4 class="mb-3">{{ $edit ? 'Edit' : 'Tambah' }} Biodata</h4>

        <form action="{{ $edit ? route('biodata.update', $biodata->id) : route('biodata.store') }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @if ($edit) @method('PUT') @endif

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                       value="{{ old('nama', $biodata->nama ?? '') }}" required>
                @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror"
                       value="{{ old('nim', $biodata->nim ?? '') }}" required>
                @error('nim') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" rows="3" class="form-control">{{ old('deskripsi', $biodata->deskripsi ?? '') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Foto</label>
                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('biodata.index') }}" class="btn btn-outline-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection