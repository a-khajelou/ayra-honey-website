<?php

class BaseModel extends Eloquent
{

    protected $guarded = array('id');
    protected $fillable = array();
    protected $hidden = array();
    protected $softDelete = false;
    public $timestamps = true;
    public static $variables = array();
    public static $paginate_per_page = 1000;

    // model functions
    public function photos()
    {
        return $this->morphMany('Photo', 'imageable');
    }

    public function tags()
    {
        return $this->morphMany('Tag', 'tagable');
    }

    public function attachedFiles()
    {
        return $this->morphMany('AttachedFile', 'fileable');
    }

    public function likes()
    {
        return $this->morphMany('Like', 'likable');
    }

    public function dislikes()
    {
        return $this->morphMany('Dislike', 'dislikable');
    }

    public function hasTag($tagName)
    {
        foreach ($this->tags as $tag) {
            if ($tag->name == $tagName or strpos($tag->name, $tagName) !== false or strpos($tagName, $tag->name) !== false) {
                return true;
            }
        }
        return false;
    }

    public function comments()
    {
        return $this->morphMany('Comment', 'commentable');
    }

    public function is_trashable()
    {
        if ($this->softDelete)
            return true;
        return false;
    }

    public function delete()
    {
        Event::fire('baseModel', array($this));
        return parent::delete();
    }

    public function forceDelete()
    {
        Event::fire('baseModel', array($this));
        return parent::forceDelete();
    }

    // utility functions
    public function notMainPhoto()
    {
        if (is_null($this) || is_null($this->id))
            return Null;
        return Photo::whereImageableId($this->id)
            ->whereImageableType(get_class($this))
            ->whereIsMain(false)
            ->get();
    }

    public function mainPhoto()
    {
        if (is_null($this) || is_null($this->id))
            return null;
        return Photo::whereImageableId($this->id)
            ->whereImageableType(get_class($this))
            ->whereIsMain(true)
            ->first();
    }

    public function getPhotosDir($size = NULL)
    {

        $photosDir = array();

        foreach ($this->photos as $p) {

            array_push($photosDir, Photo::getPhotoDir($p, $size));
        }
        return $photosDir;
    }

    public static function getPhotoDir($photo, $size='')
    {
        if(is_null($photo))
            return '';
        if(get_class($photo)!='Photo')
            throw new Exception("Argument 1 passed to BaseModel::getPhotoDir() must be an instance of Photo (basemodel)", 1);
            
        $dim = '';
        if (in_array($size, array('org', 'orginal', 'base', 'main', NULL)))
            $size = '';
        else {
            $dim = Config::get('image.' . $size);
            if ($dim == NULL)
                throw new Exception("this size '" . $size . "' dosn't exit in app.config", 1);
        }
        if ($photo->id == NULL) {
            throw new Exception("the photo object given is not saved yet", 1);
        }

        if ($size != '')
            $size = '/' . $size;

        $file_dir = public_path() . '/' . $photo->path . $size . '/' . $photo->real_name;
        $org_file_dir = public_path() . '/' . $photo->path . '/' . $photo->real_name;


        if (!File::exists($file_dir) and $size != '') {

            if (!File::exists($org_file_dir)) {
                //if even the orginal hoto dosn't exit
                throw new FileNotFoundException("Orginal file does not exist at path {$org_file_dir} db integrity with up;oads files failed");
            } else {
                //if a custom size photo dosn't exist
                $img = Image::make($org_file_dir);
                $img->resize($dim['width'], $dim['height'], true);
                File::makeDirectory(public_path() . '/' . $photo->path . $size . '/', 0777);
                $img->save($file_dir);
            }
        } else if ($size == '') {
            if (!File::exists($org_file_dir)) {
                //if even the orginal hoto dosn't exit
                throw new FileNotFoundException("Orginal file does not exist at path {$org_file_dir} db integrity with up;oads files failed");
            }
            return '/' . $photo->path . '/' . $photo->real_name;
        }
        return '/' . $photo->path . $size . '/' . $photo->real_name;
    }

    public function savePhoto($input_name)
    {
        //save photo from input to uploads folder 
        $filename = Input::file($input_name)->getClientOriginalName();
        $destinationPath = 'uploads/' . (string)microtime(true) . str_random(10);

        Input::file($input_name)->move($destinationPath, $filename);

        $photo = new Photo();
        $photo->path = $destinationPath;
        $photo->real_name = $filename;
        if ($this->id == Null)
            $this->save();
        $this->photos()->save($photo);
        return $photo;
    }

    public function deleteAllPhoto()
    {
        foreach ($this->photos as $photo) {
            self::deletePhoto($photo);
        }
    }

    public static function deletePhoto(Photo $photo)
    {
        File::deleteDirectory($photo->path);
        $photo->delete();
    }

    public function saveFile($input_name)
    {
        //save photo from input to uploads folder
        $filename = Input::file($input_name)->getClientOriginalName();
        $destinationPath = 'uploads/' . (string)microtime(true) . str_random(10);

        Input::file($input_name)->move($destinationPath, $filename);

        $file = new AttachedFile();
        $file->path = $destinationPath;
        $file->real_name = $filename;
        if ($this->id == Null)
            $this->save();
        $this->attachedFiles()->save($file);
        return $file;
    }
    // public function getAttr($title, $lang=NULL, $forCheck=false){
    //     $ans=NULL;
    //     if($this->id != NULL){

    //         if($lang==NULL)
    //             $lang = app::getLocale();

    //         if(!in_array($title, $this::$variables)){
    //             echo $title.' variable is not in '.get_class($this);
    //             die();
    //         }

    //         if(is_string($lang))
    //             $lang = Language::where('title', '=', $lang)->first();
    //         $lang_id = $lang->id;


    //         $ans = Content::where('contentable_id', '=', $this->id)
    //             ->where('contentable_type', '=', get_class($this))
    //             ->where('language_id', '=', $lang_id)
    //             ->where('title', '=', $title)->first();
    //     }
    //     if($ans!= NULL)
    //         if($forCheck)
    //             return $ans;
    //         else
    //             return $ans->body;
    //     else
    //         if($forCheck)
    //             return false;
    //         else
    //             return NULL;
    // }
    // public function setAttr($fieldName, $value, $lang=NULL){

    //     if($this->id == NULL){
    //         echo "first save your obj and then set it's attr :)";
    //         die();
    //     }

    //     if($lang==NULL)
    //         $lang = app::getLocale();
    //     if(is_string($lang))
    //         $lang = Language::where('title', '=', $lang)->first();
    //     $lang_id = $lang->id;

    //     if(!in_array($fi*eldName, $this::$variables)){
    //         echo $fieldName.' variable is not in '.get_class($this);
    //         die();
    //     }

    //     //
    //     $ans = $this->getAttr($fieldName, $lang, true);
    //     if($ans!=false || $ans!=NULL){
    //         //update existing attr
    //         $ans->body = $value;
    //         $ans->save();

    //     }else{
    //         //insert new attr
    //         $c = new Content();
    //         $c->title = $fieldName;
    //         $c->body = $value;

    //         $lang->content()->save($c);
    //         $this->contents()->save($c);
    //     }
    // }
    // public function deleteAttr($fieldName, $lang){

    //     if($this->id == NULL){
    //         echo "first save your obj and then set it's attr :)";
    //         die();
    //     }
    //     $ans = $this->getAttr($fieldName, $lang, true);
    //     if($ans!=false || $ans!=NULL){
    //         //update existing attr
    //         $ans->delete();
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }


    public static function setTag($name)
    {
        if (!self::checkTag($name)) {

        }
    }

    public function checkTag()
    {

    }

    public static function checkTags($tags)
    {
        foreach ($tags as $key => $value) {
            # code...
        }
    }

    public function getLikeRate()
    {
        return $this->likes()->count() - $this->dislikes()->count();
    }

    public function scopeRated($query, $count)
    {
        $res = $query->get()->all();
        if (!function_exists("cmp")) {
            function cmp($a, $b)
            {
                if ($a->getLikeRate() == $b->getLikeRate()) {
                    return 0;
                }
                return ($a->getLikeRate() < $b->getLikeRate()) ? -1 : 1;
            }
        }
        usort($res, "cmp");
        $res=array_reverse($res);
        return array_slice($res,0,$count);

    }

    public function scopeNearlyCreated($query,$count){
        return $query->get()->all();
    }


}