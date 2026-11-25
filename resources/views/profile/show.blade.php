@extends('layouts.app')

@section('title', $profile->full_name)

@section('content')
    <div class="row g-3 g-md-4">

        {{-- LEFT: sidebar (becomes the top section on mobile) --}}
        <aside class="col-12 col-md-4 col-lg-3">
            @include('partials.sidebar')
        </aside>

        {{-- RIGHT: main content --}}
        <main class="col-12 col-md-8 col-lg-9">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @include('partials.motto')
            @include('partials.verse')
            @include('partials.donate')
        </main>

    </div>
@endsection
