<?php

namespace LaracastClone;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $guarded = [];

    protected $with = ['lessons'];

    public function lessons(){
        return $this->hasMany(Lesson::class);
    }


    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getImagePathAttribute(){
        return asset('storage/'.$this->image_url);
    }

    public function getOrderedLessons(){
        return $this->lessons()->orderBy('episode_number', 'asc')->get();
    }


}
