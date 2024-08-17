<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionPerformed extends Model
{
    use HasFactory;
    
    protected $table = 'action_performeds';

    protected $fillable = [
      'user_id',
      'action_id',
      'file_name',
      'action_performed',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
