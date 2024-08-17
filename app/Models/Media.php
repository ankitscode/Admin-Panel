<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $casts = [
        'created_by'    => 'integer',
        'updated_by'    => 'integer',
    ];

    protected $fillable = [
        'type',
        'file_size',
        'name',
        'thumbnail_name',
        'updated_by',
    ];

    protected $hidden = [
        'created_at',
        'created_by',
        'updated_by',
        'updated_at',
        'deleted_at',
    ];

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updated_by()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
