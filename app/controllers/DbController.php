<?php

class DbController extends BaseController
{
    public function createDb()
    {
        ini_set('max_execution_time', 600);

        Schema::dropIfExists('photo');
        Schema::dropIfExists('attached_file');
        Schema::dropIfExists('product');
        Schema::dropIfExists('slider');
        Schema::dropIfExists('users');


        Schema::create('users', function ($table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string('name', 200)->nullable();
            $table->string('email', 255)->index()->unique();
            $table->string("remember_token")->nullable();
            $table->string('username', 30)->index();
            $table->string('password', 60)->index();

            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('product', function ($table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string('title', 50);
            $table->string('description');

            $table->integer('price');

            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('photo', function ($table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id'); //;
            $table->string('imageable_type')->index();
            $table->integer('imageable_id')->unsigned()->index();
            $table->string('path');
            $table->string('real_name');
            $table->boolean('is_main')->default(0);
            $table->timestamps();

        });

        Schema::create('attached_file', function ($table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id'); //;
            $table->string('fileable_type')->index();
            $table->integer('fileable_id')->unsigned()->index();
            $table->string('path');
            $table->string('real_name');
            $table->timestamps();
        });

        Schema::create('slider', function ($table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');

            $table->timestamps();
            $table->softDeletes();
        });

        $user = new User();
        $user->name = 'Error SWG';
        $user->email = 'admin@error-swg.ir';
        $user->username = 'admin';
        $user->password = 'admin';
        $user->save();
    }

}