<?php
/**
 * Created by PhpStorm.
 * User: arash
 * Date: 6/4/14
 * Time: 1:00 PM
 */

class Honey extends BaseModel {
    protected $table = 'honey';
    protected $guarded = array('id');
    protected $fillable = array();
    protected $hidden = array();
    protected $softDelete = true;
    public $timestamps = true;

    public static $variables = array(
        'title' ,
        'description' ,
    );
} 