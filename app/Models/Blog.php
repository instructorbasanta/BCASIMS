<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected  $table = 'blogs';

    protected  $fillable = ['title','slug','image','short_description','description','meta_title','meta_keyword','meta_description','status','created_by','updated_by'];

    function createdBy(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    function updatedBy(){
        return $this->belongsTo(User::class,'updated_by','id');
    }
}
