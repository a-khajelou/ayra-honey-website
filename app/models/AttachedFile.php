<?php
/**
 * Created by PhpStorm.
 * User: arash
 * Date: 3/5/14
 * Time: 6:31 PM
 */

class AttachedFile extends BaseModel {
    protected $table = 'attached_file';
    protected $guarded = array();
    protected $fillable = array();
    protected $hidden = array();
    protected $softDelete = false;
    public $timestamps = true;



    /**
     *relations
     */
    public function fileable()
    {
        return $this->morphTo();
    }
}