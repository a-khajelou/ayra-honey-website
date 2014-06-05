<?php
/**
 * Created by PhpStorm.
 * User: arash
 * Date: 6/5/14
 * Time: 5:14 AM
 */

class Message extends BaseModel {
    protected $table = 'message';
    protected $guarded = array('id');
    protected $fillable = array();
    protected $hidden = array();
    protected $softDelete = true;
    public $timestamps = true;


} 