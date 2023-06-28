<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const LAND_DISPUTES = 1;
    const FAMILY_DISPUTES = 2;
    const LABOR_DISPUTES = 3;
    const TRAFFIC_POLICE_DISPUTES = 4;

    protected $table = 'categories';

    use HasFactory;

    protected $fillable = [
        'name'
    ];
}
