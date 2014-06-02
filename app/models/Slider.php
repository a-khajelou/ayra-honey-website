<?php

class Slider extends BaseModel {

	protected $table = 'slider';
	protected $guarded = array('id');
	protected $fillable = array();
	protected $hidden = array();
    protected $softDelete = true;
    public $timestamps = true;

    public static $variables =  array();
	/**
    *relations
    */
    public function getTitle () {
        return $this->title ;
    }

    public function setTitle ($title) {
        $this->title = $title ;
    }

    public function getDescription () {
        return $this->description ;
    }

    public function setDescription ($description) {
        $this->description = $description ;
    }

    public function getUrl () {
        return $this->url ;
    }

    public function setUrl ($url) {
        $this->url = $url ;
    }
/*
    public function subProduct(){
    	return $this->belongsTo('SubProduct');
    }*/
   
}