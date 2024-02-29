<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeviceType extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected  $table = 'device_types';

    protected  $fillable = ['title','slug','display_rank','image','short_description','description','meta_title','meta_keyword','meta_description','buy_option','sell_option','repair_option','status','created_by','updated_by'];

    function createdBy(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    function updatedBy(){
        return $this->belongsTo(User::class,'updated_by','id');
    }
}
