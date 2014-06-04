<?php
/**
 * Created by PhpStorm.
 * User: arash
 * Date: 6/4/14
 * Time: 1:03 PM
 */

class Content extends BaseModel {
    protected $table = 'content';
    protected $guarded = array();
    protected $fillable = array();
    protected $hidden = array();
    protected $softDelete = false;
    public $timestamps = true;

    public function contentable () {
        return $this->morphTo();
    }

} 