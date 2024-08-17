<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductQuery extends Model
{
    use HasFactory;

    protected $fillable =
     ['id',
     'name',
     'email',
     'phone',
     'address',
     'city',
     'query'];

     protected $hidden = ['created_at', 'updated_at'];
      protected $guarded = [
        
      ];  
}
