<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'parent_id',
        'is_enable',
        'position',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'parent_id' => 'integer',
        'is_enable'=> 'boolean',
        'position' => 'integer'
    ];



    /**
     * Function to get Subcategories of a Parent Category
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getSubcategory(int $id)
    {
       return $subCategories = Category::all()->where('parent_id',$id);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'name';
    }
}
