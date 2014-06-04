<?php
/**
 * Created by PhpStorm.
 * User: arash
 * Date: 2/4/14
 * Time: 9:43 PM
 */

class TestController extends BaseController {
    public function getIndex(){
        // $path = '/var/www/osos/osos/files/1394018095.1008MBrFhIwFhD/slide1.jpg';
        // return BaseController::downloadXSendFile($path);
        
        $password = Hash::make('secret');
        if (Hash::check('secret', $password))
        {  echo "asdasda";

        }
        die();

        $u=Auth::user();
        var_dump($u->password);
        echo "<br>";
        var_dump(Hash::check('admin', $u->password));
        echo "<br>";

        if (Hash::check('admin', $u->password)){
            var_dump('yesss');
        }
        echo "<br>";
        var_dump('fuck');
 // $selprod=Product::orderBy(DB::raw('RAND()'))->first();
 // var_dump($selprod->id); 
 die();

        // $cat = Category::find(1);
        // //  // $det = new Details();
        // //  // $det->title="fuck";
        // //  // $det->save();
        // $det = Details::find(1);

        // // // $cat->details()->sync(array(1=>array('description'=>'hjklkj')));

        // // $cat->details()

        //     $dS=array();
        // var_dump(Details::whereNotIn('id',$dS)->count());

        $q = Details::leftJoin('category_detail', 'detail.id', '=', 'category_detail.detail_id')
                        ->leftJoin('category', 'category.id', '=', 'category_detail.category_id')
                        ->select('category.id as cat_id','detail.id as det_id','category_detail.description','detail.title as title')
                        ->orderBy('detail.updated_at', 'desc')
                        ->get();
        $ans=array();
        foreach ($q as $item) {
            if(!array_key_exists($item->det_id, $ans))
                $ans[$item->det_id]=array('cats'=>array(),'title'=>$item->title);
            $ans[$item->det_id]['cats'][$item->cat_id]=$item->description;
        }
        foreach ($ans as $det) {
            var_dump($det);
            echo "<br>";
            echo "<br>";
        }
        die();

        // var_dump($cat->details()->distinct()->lists('id'));die();


        /*//SmsTemp::render(Auth::user());
        $dateTime1=new DateTime(date("Y-m-d H:i:s"));
        $dateTime2=$dateTime1->add(new DateInterval('PT10S'));
        sleep(7);
        $now=new DateTime(date("Y-m-d H:i:s"));
        echo date_format($dateTime1 , "Y-m-d H:i:s")."<br/>";
        echo date_format($now , "Y-m-d H:i:s")."<br/>";
        if ($now < $dateTime2){
            echo "NO !"."<br/>" ;
        }
        else {
            echo "OK !"."<br/>" ;
        }
        sleep(5);
        $now=new DateTime(date("Y-m-d H:i:s"));
        echo date_format($dateTime1 , "Y-m-d H:i:s")."<br/>";
        echo date_format($now , "Y-m-d H:i:s")."<br/>";
        if ($now < $dateTime2){
            echo "NO !"."<br/>" ;
        }
        else {
            echo "OK !"."<br/>" ;
        }*/
/*        $p = Product::find(1);
        $license=$p->getValidLicense();
        $license->last_reserved_at=date("Y-m-d H:i:s");
        $license->save();
        echo $license->id;*/
//        return View::make('admin.emails.welcome');

        //var_dump(ArticlePart::news()->get()->get(1)->relatedNews());

    }
    public function getEmail(){
        Mail::send('admin.emails.temp', array(), function($message)
        {
            $message->from('info@osos.ir', 'OSOS Company !');
            $message->to('arkh29@yahoo.com', 'Arash Khajelou')->subject('Optional Subject');
        });
    }
    public function getComment(){
        foreach (ArticlePart::news()->first()->comments as $comment){
            echo "\n".$comment->text;
            foreach ($comment->comments as $reply) {
                echo "\n\t".$reply->text;
                foreach($reply->comments as $reply_2) {
                    echo "\n\t\t".$reply_2->text;
                }
            }

        }
    }
    public function getAjax(){
        return View::make('public.test');
    }

    public function getFile(){
        $file=fopen('../app/views/admin/mail_templates/test.txt','w');
        fwrite($file,"this is a test text !");
        fclose($file);
        return "ok !";
    }
    public function getEval(){
        $string = 'cup';
        $name = 'coffee';
        $str = 'This is a $string with my $name in it.';
        echo $str. "\n";
        eval("\$str = \"$str\";");
        echo $str. "\n";
    }
}