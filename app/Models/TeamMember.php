<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'photo',
        'bio',
        'linkedin_url',
        'email',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    /**
     * Uppercase initials used for the placeholder avatar.
     */
    public function initials(): string
    {
        $parts = array_values(array_filter(preg_split('/\s+/', trim($this->name)) ?: []));

        // Single short token (e.g. "ANG") is already an initials-style label.
        if (count($parts) === 1) {
            return mb_strtoupper(mb_substr($parts[0], 0, 3));
        }

        $initials = collect($parts)->take(2)->map(fn ($p) => mb_substr($p, 0, 1))->implode('');

        return mb_strtoupper($initials !== '' ? $initials : 'E');
    }
}
