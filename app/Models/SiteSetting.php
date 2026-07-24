<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'company_name',
        'tagline',
        'description',
        'email',
        'phone',
        'address',
        'map_embed',
        'logo',
        'facebook',
        'instagram',
        'linkedin',
        'twitter',
        'youtube',
        'footer_text',
    ];

    /**
     * Retrieve the single site-settings row, creating a default one if needed.
     */
    public static function current(): self
    {
        return static::firstOrCreate([], ['company_name' => 'PT Efea Inovasi Solusi']);
    }

    /**
     * Social links keyed by platform, filtered to those that are set.
     *
     * @return array<string, string>
     */
    public function socialLinks(): array
    {
        return array_filter([
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'linkedin' => $this->linkedin,
            'twitter' => $this->twitter,
            'youtube' => $this->youtube,
        ]);
    }
}
