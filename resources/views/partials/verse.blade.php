<section class="card mb-3 mb-md-4">
    <div class="card-body p-4">
        <div class="section-label mb-2"><i class="bi bi-book me-1"></i>Bible Verse</div>
        <blockquote class="mb-0">
            <p class="verse-text mb-2">{{ $profile->bible_verse }}</p>
            @if ($profile->bible_verse_ref)
                <footer class="text-secondary small">&mdash; {{ $profile->bible_verse_ref }}</footer>
            @endif
        </blockquote>
    </div>
</section>
