<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table="menu";
///////////////////////////////
    public function menuCategory(){
        //////////////////////////
        return $this->belongsTo(MenuCategory::class,'id_menu_category');
    }
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'price',
        'id_menu_category',
        'card'
    ];
}
