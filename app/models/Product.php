<?php

/**
 * Created by PhpStorm.
 * User: arash
 * Date: 1/23/14
 * Time: 3:16 PM
 */
class Product extends BaseModel
{
    protected $table = 'product';
    protected $guarded = array('id');
    protected $fillable = array();
    protected $hidden = array();
    protected $softDelete = true;
    public $timestamps = true;

    public static $platforms = array('windows', 'macintosh', 'ios', 'android');

    public function category()
    {
        return $this->belongsTo('Category');
    }

    public function productFile () {
        return $this->belongsTo('ProductFile');
    }

    public function buys()
    {
        return $this->hasMany('Buy');
    }

    public function licenses()
    {
        return $this->hasMany('License');
    }

    public function productRate()
    {
        return $this->hasMany('ProductRate');
    }

    public function getValidLicenseCount()
    {
        return $this->licenses()->notSold()->notReserved()->count();

    }

    public function getValidLicense()
    {
        return $this->licenses()->notSold()->notReserved()->first();
    }

    public function reserveLicense($count)
    {
        if ($this->getValidLicenseCount() >= $count) {
            for ($i = 0; $i < $count; $i++) {
                $license = $this->getValidLicense();
                $license->last_reserved_at = date("Y-m-d H:i:s");
                $license->save();
            }
        }
    }
} 