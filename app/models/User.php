<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Toddish\Verify\Models\User as VerifyUser;

class User extends BaseModel implements UserInterface, RemindableInterface {

    protected $softDelete = true;
    protected $table = 'users';
    protected $guarded = array();
    protected $hidden = array('password');
    public $timestamps = true;
    /**
     *relations
     */
    public function myUser(){
        return $this->hasOne('MyUser');
    }
    /**
     *other
     */

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getReminderEmail()
    {
        return $this->email;
    }

    public function forceDelete(){
        if(in_array(Auth::user()->id, array(1,2))){
            if(!is_null($this->myUser))
                $this->myUser->forcDelete();
            return parent::forceDelete();
        }else{
            app::abort(404);
        }
    }



    /**
     *	Scopes
     */
    public function scopeAdmin($query)
    {
        var_dump(get_class($query));
        die();

        return $query;
    }
    public function scopeNotAdmin($query)
    {
        return $query;
    }

    public function buyGroups () {
        return $this->hasMany('BuyGroup');
    }

    public function productRate(){
        return $this->hasMany('ProductRate');
    }
    public function likes(){
        return $this->hasMany('Like');
    }
    public function dislikes(){
        return $this->hasMany('Dislike');
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }
}