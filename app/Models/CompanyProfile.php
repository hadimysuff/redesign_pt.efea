<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $fillable = [
        'about',
        'vision',
        'mission',
        'history',
        'image',
        'stat_years',
        'stat_projects',
        'stat_clients',
        'stat_team',
    ];

    protected $casts = [
        'stat_years' => 'integer',
        'stat_projects' => 'integer',
        'stat_clients' => 'integer',
        'stat_team' => 'integer',
    ];

    /**
     * Retrieve the single company-profile row, creating a default one if needed.
     */
    public static function current(): self
    {
        return static::firstOrCreate([]);
    }
}
