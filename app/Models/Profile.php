<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'full_name', 'course', 'year_section', 'photo_path',
        'motto', 'bible_verse', 'bible_verse_ref',
        'facebook_url', 'email', 'github_url',
        'gcash_name', 'gcash_number', 'gcash_qr_path',
    ];

    // Full URL of the profile photo, or null if none was uploaded
    public function getPhotoUrlAttribute(): ?string
    {
        return $this->photo_path ? asset('storage/' . $this->photo_path) : null;
    }

    // Full URL of the GCash QR image, or null if none was uploaded
    public function getGcashQrUrlAttribute(): ?string
    {
        return $this->gcash_qr_path ? asset('storage/' . $this->gcash_qr_path) : null;
    }

    // Initials shown when there is no photo (e.g. "CL")
    public function getInitialsAttribute(): string
    {
        $words = preg_split('/\s+/', trim($this->full_name));
        $first = mb_substr($words[0] ?? '', 0, 1);
        $last = count($words) > 1 ? mb_substr(end($words), 0, 1) : '';
        return mb_strtoupper($first . $last);
    }
}
