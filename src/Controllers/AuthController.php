<?php

namespace Controllers;

use Exception;
use Renderer;
use Controllers\Controller;
use Models\User;
use Models\Core\Request;
use Models\Facades\Auth;

class AuthController extends Controller
{

    public function signIn()
    {
        echo Renderer::render('/auth/signin.php');
    }


    public function verifySignIn(Request $req)
    {
        try {
            Auth::attempt($req->only('login', 'password'));
        } catch (\Exception $e) { 
            $error = $e->getMessage();
            echo Renderer::render('/auth/signin.php', compact('error'));
            die;
        }
        header('location:/public_html');
    }


    public function register(){
        echo Renderer::render('/auth/register.php');
    }


    public function verifyRegister(Request $req){
        if($req->password == $req->password2){
            if(empty(User::where('login', $req->login))){
                $user = User::create([
                    'nom' => $req->fullname,
                    'login' => $req->login,
                    'password' => password_hash($req->password, PASSWORD_DEFAULT)
                ]);
            }
            else{
                $error = "Le nom d'utilisateur saisis est déjà utilisé";
                echo Renderer::render('/auth/register.php', compact('error'));
            }
        }else{
            $error = "Les mots de passes saisis ne correspondent pas";
            echo Renderer::render('/auth/register.php', compact('error'));
        }
        header('location : /public_html');

    }
}
