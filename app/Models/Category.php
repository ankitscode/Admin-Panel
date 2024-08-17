<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    
    protected $cast = [
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];

    protected $fillable = [
        'id',
        'name',
        'parent_name',
        'is_active',
        'is_menu',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'update_by',
    ];


    protected $hidden = [
        'created_by',
        'updated_by',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
        );
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
    public function updated_by()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
