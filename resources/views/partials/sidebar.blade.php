<div class="card sidebar-card">
    <div class="card-body d-flex flex-column text-center p-4">

        {{-- Circular profile picture --}}
        <div class="mb-3">
            @if ($profile->photo_url)
                <img src="{{ $profile->photo_url }}" class="avatar rounded-circle"
                     alt="Profile photo of {{ $profile->full_name }}">
            @else
                <div class="avatar rounded-circle d-inline-flex align-items-center justify-content-center bg-secondary-subtle text-secondary fs-1 fw-bold">
                    {{ $profile->initials }}
                </div>
            @endif
        </div>

        {{-- Name, course, year and section --}}
        <h1 class="h4 fw-bold mb-1">{{ $profile->full_name }}</h1>
        <p class="text-secondary mb-1">{{ $profile->course }}</p>
        <p class="text-secondary small mb-0">{{ $profile->year_section }}</p>

        {{-- Links at the bottom (Facebook, Gmail, GitHub) --}}
        <div class="d-grid gap-2 mt-4 mt-md-auto pt-md-4">
            @if ($profile->facebook_url)
                <a href="{{ $profile->facebook_url }}" target="_blank" rel="noopener"
                   class="btn btn-outline-secondary">
                    <i class="bi bi-facebook me-2"></i>Facebook
                </a>
            @endif
            @if ($profile->email)
                <a href="mailto:{{ $profile->email }}" class="btn btn-outline-secondary">
                    <i class="bi bi-envelope-fill me-2"></i>Gmail
                </a>
            @endif
            @if ($profile->github_url)
                <a href="{{ $profile->github_url }}" target="_blank" rel="noopener"
                   class="btn btn-outline-secondary">
                    <i class="bi bi-github me-2"></i>GitHub
                </a>
            @endif
            <a href="{{ route('profile.edit') }}" class="btn btn-link btn-sm text-secondary mt-1">
                <i class="bi bi-pencil-square me-1"></i>Edit profile
            </a>
        </div>
    </div>
</div>
