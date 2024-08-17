<?php

namespace App\Models;

use App\Models\User;
use App\Models\Media;
use App\Models\Category;
use App\Imports\ProductImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'id',
        'productname',
        'category_id',
        'media_id',
        'price',
        'uniquecode',
        'created_by',
        'updated_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
        'email_verified_at',
        'provider_name',
        'provider_id',
        'provider_access_token',
        'updated_at',
        'created_at',
        'deleted_at',
        'created_by',
        'updated_by',
        'id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updated_by()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function media()
    {
        return $this->belongsTo(Media::class,'media_id');
    }

    public function category(){
        
        return $this->belongsTo(Category::class,'category_id');
    } 

    public static function galleryMedia($id)
    {
        $query = DB::table('product_attribute')
                ->select('data')
                ->where('product_attribute.attribute_id', '=', 18)
                ->where('product_attribute.product_id', '=', $id)
                ->first();
        if (!isset($query)){
            return null;
        }
        $data = collect(json_decode($query->data, true))->map(function ($n){
            $image = Media::where('id',$n)->select('name','thumbnail_name')->first();
            if (!isset($image) && empty($image)){
                return null;
            }
            $image['name'] = asset(config('image.api_product_image_path_view').$image->name);
            $image['thumbnail_name'] = asset(config('image.api_product_image_path_view').$image->thumbnail_name);
            return $image->toArray();
        });
        return $data;
    }

    ##-----------------------Aceessors--------------------------##

    // protected function name(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn (string $value) => ucfirst($value),
    //     );
    // }
}
