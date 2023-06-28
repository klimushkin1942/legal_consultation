<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use Filterable;
    const NEW = 'new';
    const PENDING = 'in_progress';
    const COMPLETED = 'completed';

    use HasFactory;

    protected $fillable = [
        'status',
        'content',
        'category_id',
        'client_id',
        'lawyer_id',
        'answer',
        'created_at'
    ];
}
