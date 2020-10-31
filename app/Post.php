<?php

namespace App;

# importamos el paquete eloquent-slug
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
	# usamos el paquete slug
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }

     # relacion con la entidad (modelo) User
    public function user(){
        return $this->belongsTo(User::class);
    }

    # formateo de los extractos del post
    public function getGetExcerptAttribute(){
        return substr($this->body, 0, 140);
    }
}
