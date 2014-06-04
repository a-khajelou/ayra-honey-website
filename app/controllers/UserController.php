<?php

class UserController extends Controller
{

    public static $rules = array(
        'username' => 'required',
        'name' => 'required',
        'email' => 'required|email',
    );

    public function getLogin()
    {
        if (Auth::user() != null)
            return Redirect::to('/admin');
        return View::make('public.login');

    }

    public function anyLogout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

    public function postLogin()
    {
        if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')))) {
            return Redirect::intended();
        }
        $errors = array();
        $errors[] = "";
        $errors['page'] = 'login';
        return Redirect::back()->with('err_msgs', $errors);
    }

    public function postChangePassword()
    {
        $rules = array(
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            $errors = array();
            foreach ($validator->messages()->all() as $key => $value) {
                $errors[$key] = $value;
            }
            $errors['page'] = 'password-change';
            return Redirect::back()->with('err_msgs', $errors);
        }
        try {
            $u = Auth::user();

            Auth::attempt(array(
                'identifier' => $u->username,
                'password' => Input::get('old_password')
            ));
            $u->setPasswordAttribute(Input::get('password'));
            $u->save();
            Auth::logout();
            return Redirect::to('/login');
        } catch (Exception $e) {
            return View::make('admin.user.password')
                ->with('flush', 'رمز عبور قبلی درست نمیباشد');
        }
    }
}