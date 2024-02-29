<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "settings";

    protected $fillable = ['name','slogan','address','email','phone','mobile','facebook_url','youtube_url','twitter_url','instagram_url','google_map_url','logo_header','logo_footer','favicon_image','status','created_by','updated_by'];

    function createdBy()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }

    function updatedBy()
    {
        return $this->belongsTo(User::class,'updated_by','id');
    }
}
