<?php
/**
 * Created by PhpStorm.
 * User: arash
 * Date: 6/5/14
 * Time: 1:47 AM
 */

class Blog extends BaseModel {
    protected $table = 'blog';
    protected $guarded = array('id');
    protected $fillable = array();
    protected $hidden = array();
    protected $softDelete = true;
    public $timestamps = true;

} 