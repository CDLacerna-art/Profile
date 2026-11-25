<section class="card text-center">
    <div class="card-body p-4 p-md-5">

{{-- GCash QR code --}}
@if ($profile->gcash_qr_url)
    <img src="{{ $profile->gcash_qr_url }}" class="qr-box mb-3"
         alt="GCash QR code of {{ $profile->full_name }}">
@else
    <div class="qr-box d-inline-flex flex-column align-items-center justify-content-center text-secondary mb-3">
        <i class="bi bi-qr-code fs-1"></i>
        <span class="small mt-2">QR code not uploaded yet</span>
    </div>
@endif

        <p class="text-secondary mb-3">Want to support me? Scan my GCash QR code.</p>

        <button type="button" class="btn btn-danger btn-lg px-5"
                data-bs-toggle="modal" data-bs-target="#donateModal">
            Donate Here
        </button>
    </div>
</section>

{{-- Donate modal with the GCash QR component --}}
<div class="modal fade" id="donateModal" tabindex="-1" aria-labelledby="donateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 1rem;">

            <div class="modal-header border-0 pb-0">
                <h2 class="modal-title h5 fw-bold" id="donateModalLabel">Support Me via GCash</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            {{-- Step 1: show QR --}}
            <div class="modal-body text-center" id="donateStep">
                <p class="text-secondary small">Open GCash, tap <strong>Scan QR</strong>, and scan the code below.</p>

                @if ($profile->gcash_qr_url)
                    <img src="{{ $profile->gcash_qr_url }}" class="qr-box mb-3" alt="GCash QR code of {{ $profile->full_name }}">
                @else
                    <div class="qr-box d-inline-flex flex-column align-items-center justify-content-center text-secondary mb-3">
                        <i class="bi bi-qr-code fs-1"></i>
                        <span class="small mt-2">QR code not uploaded yet</span>
                    </div>
                @endif

                @if ($profile->gcash_name)
                    <div class="fw-semibold">{{ $profile->gcash_name }}</div>
                @endif
                @if ($profile->gcash_number)
                    <div class="text-secondary">
                        <span id="gcashNumber">{{ $profile->gcash_number }}</span>
                        <button type="button" class="btn btn-sm btn-outline-secondary ms-2" id="copyNumber">
                            <i class="bi bi-clipboard"></i> Copy
                        </button>
                    </div>
                @endif
            </div>

            {{-- Step 2: thank you (success / green) --}}
            <div class="modal-body d-none" id="thanksStep">
                <div class="alert alert-success mb-0 text-center">
                    <i class="bi bi-check-circle-fill fs-3 d-block mb-2"></i>
                    Thank you so much for your support!
                </div>
            </div>

            <div class="modal-footer border-0 pt-0 justify-content-center" id="donateFooter">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="confirmDonation">I have donated</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    const donateModal   = document.getElementById('donateModal');
    const donateStep    = document.getElementById('donateStep');
    const thanksStep    = document.getElementById('thanksStep');
    const donateFooter  = document.getElementById('donateFooter');

    // "I have donated" -> show the thank-you message
    document.getElementById('confirmDonation').addEventListener('click', function () {
        donateStep.classList.add('d-none');
        donateFooter.classList.add('d-none');
        thanksStep.classList.remove('d-none');
    });

    // Reset the modal each time it closes
    donateModal.addEventListener('hidden.bs.modal', function () {
        donateStep.classList.remove('d-none');
        donateFooter.classList.remove('d-none');
        thanksStep.classList.add('d-none');
    });

    // Copy the GCash number
    const copyBtn = document.getElementById('copyNumber');
    if (copyBtn) {
        copyBtn.addEventListener('click', function () {
            const number = document.getElementById('gcashNumber').textContent.trim();
            navigator.clipboard.writeText(number).then(function () {
                copyBtn.innerHTML = '<i class="bi bi-check2"></i> Copied';
            });
        });
    }
</script>
@endpush
