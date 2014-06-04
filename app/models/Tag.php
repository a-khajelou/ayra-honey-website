<?php

class Tag extends BaseModel {

	protected $table = 'tag';
	protected $guarded = array('id');
	protected $fillable = array();
	protected $hidden = array();
    protected $softDelete = false;
    public $timestamps = true;

    public static $variables =  array();

    public function tagable(){

        return $this->morphTo();
    }

}