<?php

namespace Social\SocialLogin\socialapp;

use Illuminate\Http\Request;
use Session;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use App\User;
use Auth;
use DB;
class SocialController extends Controller
{
    ## user data from app
    protected $user_data  = array();

    ## set driver
    protected $driver     = '';

    ## attribute save in it app ID
    protected $attribute  = '';

    ## here link of url to login or register
    public function login_app($type){
        session(['type_login'=>$type]);
        return Socialite::driver($this->driver)->stateless()->redirect();
    }


    ## here select type of operation login or registration
    public function social_call(){
        $this->user_data = Socialite::driver($this->driver)->stateless()->user();
        ## if data is empty
        if(empty($this->user_data)) return;
        ## handle upper case of type
        $case = ucfirst(Session::get('type_login'));
        ## call select type app login or registration
        return $this->{"social$case"}();
    }


    ## here in case login
    public function socialLogin(){
        try{
            $attr = [$this->attribute => $this->user_data->getId()];
            $login_user = User::WhereHas('social',function(Builder $query) use ($attr){
                $query->where($attr);
            })->first();

            if( !empty($login_user) ){
                Auth::login($login_user, true);
                return redirect('home');
            }
            return redirect('login')->withErrors(['msg_socail_login'=>'Account you try to login not found  ']);
        }catch(Exception $e){
            return redirect('login');
        }
    }


    ## here in case registration
    public function socialRegister(){
        try{
            $attr = [$this->attribute => $this->user_data->getId()];
            ## user login
            $login_user = User::WhereHas('social',function(Builder $query) use ($attr){
                $query->where($attr);
            })->first();

            if( !empty($login_user) ){
                return redirect('register')->withErrors([
                    'msg_socail_login'=>'you already have account please login to this account'
                ]);
            }

            ## if fields not set googd
            if(empty($this->user_data->getId()) || empty($this->user_data->getName()) | empty($this->user_data->getEmail()) ){
                return redirect('register')->withErrors([
                    'msg_socail_login'=>'Data of user login not
                    completed please complete your data on facebook and try again'
                ]);
            }

            ## user register
            $login_user = User::where('email',$this->user_data->getEmail())->first();
            if($login_user->count() == 0 ){
                $login_user = User::create([
                    'name'            => $this->user_data->getName(),
                    'email'           => $this->user_data->getEmail(),
                    'password'        => encrypt(substr($this->user_data->getName(),0,3).substr($this->user_data->getId(),0,3) )
                ]);
            }

            $scial_register = $login_user->social()->create([
                    $this->attribute  => $this->user_data->getId(),
            ]);


            ## auth login user from app
            Auth::login($login_user, true);
            return redirect('home');

        } catch(Exception $e){
            return redirect('register');
        }
    }

}
