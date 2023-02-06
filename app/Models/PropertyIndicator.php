<?php

namespace App\Models;
use App\Models\UserAdmin;
use Illuminate\Database\Eloquent\Model;

class PropertyIndicator extends Model
{
    /**
     * Relationship
     */
    public function user()
    {
        return $this->belongsTo(UserAdmin::class);
    }

    /**
     * Scope Query
     */
    public function scopeGetWithCount($query){
        return $query->get()->count();
    }

    /**
     * Mutator
     */
	public function setPhotosAttribute($photos)
    {
        if (is_array($photos)) {
            $this->attributes['photos'] = json_encode($photos);
        }
    }

    /**
     * Accessor
     */
    public function getPhotosAttribute($photos)
    {
        return json_decode($photos, true);  
    }

    public function verified(){

    }
    
    public function approved(){

    }
    
    // public function setFrontphotosAttribute($frontphoto)
    // {
    //     if (is_array($frontphoto)) {
    //         $this->attributes['front_photo'] = json_encode($frontphoto);
    //     }
    // }

    // public function getFrontphotosAttribute($frontphoto)
    // {
    //     return json_decode($frontphoto, true);
    // }
}

