<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;


class Company extends Model
{
    use Sluggable;
    use HasFactory;

    protected $fillable = [
        'user_id',
        'logo',
        'banner',
        'name',
        'bio',
        'vision',
        'industry_type_id',
        'organization_type_id',
        'team_size_id',
        'establishment_date',
        'website',
        'phone',
        'address',
        'email' ,
        'city' ,
        'state' ,
        'country',
        'map_link'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
