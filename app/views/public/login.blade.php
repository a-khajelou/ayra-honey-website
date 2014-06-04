@extends('public.base')
@section('body')
<div class="container_12">
    <div class="grid_12">

        <img src="/static/images/big_pic1.jpg" alt="" class="img3">
        <br><br>
<br><br>
        <div class="grid_3"> &nbsp;</div>


        <form id="login-form" class="grid_6">
        <span>
            Please Enter Your Information To LogIn Your Account:
        </span><br><br>
            <fieldset>
                <label class="name">
                    <input type="text" placeholder="User Name">

                </label>
                <label class="name">

                    <input type="password" placeholder="Password">
                </label>

                <div class="btns"><a href="#" class="button more_btn3" data-type="submit">Log In</a></div>
            </fieldset>
        </form>

    </div>
</div>

</div>
@stop