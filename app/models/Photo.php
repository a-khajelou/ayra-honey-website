<?php

class Photo extends BaseModel {

    protected $table = 'photo';
    protected $guarded = array();
    protected $fillable = array();
    protected $hidden = array();
    protected $softDelete = false;
    public $timestamps = true;



    /**
    *relations
    */
    public function imageable()
    {
        return $this->morphTo();
    }
    
    // utility functions

    public static function get($photo, $size='orginal'){
        if(is_null($photo))
            return '/static/images/no-photo.jpg';
        $photo_url='';
        $photo_url = Photo::getPhotoDir($photo, $size);
        if(!is_null($photo_url))
            return $photo_url;
        else
            return '/static/images/no-photo.jpg';

        // if($photo != NULL){
        //     $photo_url= '/'.$photo->path.'/';
        //     if($size!=null && $size!='orginal')
        //         $photo_url .= $size.'/';
        //     $photo_url .= $photo->filename;
        // }else{
        //     return '/static/images/no-photo.jpg';
        // }
        // return $photo_url;
    }
}