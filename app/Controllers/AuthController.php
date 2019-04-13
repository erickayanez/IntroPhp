<?php
namespace App\Controllers;
use App\Models\User;
use Respect\Validation\Validator as val;
use Zend\Diactoros\Response\RedirectResponse;

class  AuthController extends BaseController{
  public function getLogin($request){
     $responseMessage = $_SESSION['mensaje']??null;
    return $this->renderHtml('login.twig',[
      'responseMessage'=>$responseMessage
    ]);
  }

  public function postLogin($request)
  {
        $postData= $request->getParsedBody();
        $responseMessage=null;
       //busca un usuario y trae el primer coincidente
       $user= User::where('usuario', $postData['TxtUsuario'])->first();
       if($user){
         if(password_verify($postData['contrasena'], $user->contrasena))
         {

            $_SESSION['userId']= $user->id;
            //Respuesta de redireccionamiento
            return new RedirectResponse('/IntroPhp/admin');

         }else {
           $responseMessage = "Usuario y/o contraseña invalido";
         }
       }else {
         $responseMessage = "Usuario y/o contraseña invalido ";
       }
       return $this->renderHtml('login.twig',[
         'responseMessage'=>$responseMessage
       ]);

  }

  public function getLogout(){
    unset($_SESSION['userId']);
    //Respuesta de redireccionamiento
    return new RedirectResponse('/IntroPhp/login');

  }
}

 ?>
