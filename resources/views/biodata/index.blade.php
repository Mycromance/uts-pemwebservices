@extends('layouts.app')

@section('content')
<div class="row row-cols-1 row-cols-md-3 g-4">

    <div class="col">
        <div class="card h-100 shadow-sm border-0">
            <a href="{{ route('biodata.create') }}"
               class="card-body d-flex align-items-center justify-content-center text-decoration-none">
                <span class="rounded-circle bg-success bg-gradient text-white d-flex align-items-center justify-content-center display-3"
                      style="width:115px;height:115px;">+</span>
            </a>
        </div>
    </div>

    @foreach ($biodata as $b)
    <div class="col">
        <div class="card h-100 shadow-sm border-0">
            <img src="{{ asset('storage/' . $b->foto) }}" class="card-img-top" alt="{{ $b->nama }}"
                 style="height:420px;object-fit:cover;">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title fw-bold">{{ $b->nama }}</h5>
                <p class="card-text small text-body-secondary">{{ $b->nim }} {{ $b->deskripsi }}</p>

                <div class="mt-auto border-top pt-3 d-flex gap-2">
                    <a href="{{ route('biodata.edit', $b->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                    <form action="{{ route('biodata.destroy', $b->id) }}" method="POST"
                          onsubmit="return confirm('Yakin hapus biodata ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger btn-sm">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection