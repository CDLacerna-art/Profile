@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-8">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h4 fw-bold mb-0">Edit Profile</h1>
            <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i>Back
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">Please fix the errors below.</div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Personal info --}}
            <div class="card mb-3">
                <div class="card-body p-4">
                    <div class="section-label mb-3">Personal Info</div>

                    <div class="mb-3">
                        <label for="full_name" class="form-label">Full name</label>
                        <input type="text" id="full_name" name="full_name"
                               class="form-control @error('full_name') is-invalid @enderror"
                               value="{{ old('full_name', $profile->full_name) }}">
                        @error('full_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-7 mb-3">
                            <label for="course" class="form-label">Course</label>
                            <input type="text" id="course" name="course"
                                   class="form-control @error('course') is-invalid @enderror"
                                   value="{{ old('course', $profile->course) }}">
                            @error('course') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="year_section" class="form-label">Year &amp; Section</label>
                            <input type="text" id="year_section" name="year_section"
                                   class="form-control @error('year_section') is-invalid @enderror"
                                   value="{{ old('year_section', $profile->year_section) }}">
                            @error('year_section') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div>
                        <label for="photo" class="form-label">Profile picture (JPG or PNG, max 2 MB)</label>
                        <input type="file" id="photo" name="photo" accept=".jpg,.jpeg,.png"
                               class="form-control @error('photo') is-invalid @enderror">
                        @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            {{-- Motto and Bible verse --}}
            <div class="card mb-3">
                <div class="card-body p-4">
                    <div class="section-label mb-3">Motto &amp; Bible Verse</div>

                    <div class="mb-3">
                        <label for="motto" class="form-label">Motto</label>
                        <textarea id="motto" name="motto" rows="3"
                                  class="form-control @error('motto') is-invalid @enderror">{{ old('motto', $profile->motto) }}</textarea>
                        @error('motto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="bible_verse" class="form-label">Bible verse</label>
                        <textarea id="bible_verse" name="bible_verse" rows="3"
                                  class="form-control @error('bible_verse') is-invalid @enderror">{{ old('bible_verse', $profile->bible_verse) }}</textarea>
                        @error('bible_verse') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div>
                        <label for="bible_verse_ref" class="form-label">Verse reference (example: John 3:16)</label>
                        <input type="text" id="bible_verse_ref" name="bible_verse_ref"
                               class="form-control @error('bible_verse_ref') is-invalid @enderror"
                               value="{{ old('bible_verse_ref', $profile->bible_verse_ref) }}">
                        @error('bible_verse_ref') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            {{-- Links --}}
            <div class="card mb-3">
                <div class="card-body p-4">
                    <div class="section-label mb-3">Links</div>

                    <div class="mb-3">
                        <label for="facebook_url" class="form-label">Facebook link</label>
                        <input type="url" id="facebook_url" name="facebook_url"
                               class="form-control @error('facebook_url') is-invalid @enderror"
                               value="{{ old('facebook_url', $profile->facebook_url) }}">
                        @error('facebook_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Gmail address</label>
                        <input type="email" id="email" name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $profile->email) }}">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div>
                        <label for="github_url" class="form-label">GitHub link</label>
                        <input type="url" id="github_url" name="github_url"
                               class="form-control @error('github_url') is-invalid @enderror"
                               value="{{ old('github_url', $profile->github_url) }}">
                        @error('github_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            {{-- Donation --}}
            <div class="card mb-4">
                <div class="card-body p-4">
                    <div class="section-label mb-3">Donation (GCash)</div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="gcash_name" class="form-label">GCash account name</label>
                            <input type="text" id="gcash_name" name="gcash_name"
                                   class="form-control @error('gcash_name') is-invalid @enderror"
                                   value="{{ old('gcash_name', $profile->gcash_name) }}">
                            @error('gcash_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gcash_number" class="form-label">GCash number</label>
                            <input type="text" id="gcash_number" name="gcash_number"
                                   class="form-control @error('gcash_number') is-invalid @enderror"
                                   value="{{ old('gcash_number', $profile->gcash_number) }}">
                            @error('gcash_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div>
                        <label for="gcash_qr" class="form-label">GCash QR code image (JPG or PNG, max 2 MB)</label>
                        <input type="file" id="gcash_qr" name="gcash_qr" accept=".jpg,.jpeg,.png"
                               class="form-control @error('gcash_qr') is-invalid @enderror">
                        @error('gcash_qr') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 justify-content-end mb-4">
                <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary">Cancel</a>
                <button type="submit" class="btn btn-success px-4">Save changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
