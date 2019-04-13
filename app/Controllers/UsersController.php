<?php
namespace App\Controllers;
use App\Models\User;
use Respect\Validation\Validator as val;

class  UsersController extends BaseController{
  public function getAddUserAction($request){
    $responseMessage=null;

    if($request->getMethod()=='POST'){
       $postData= $request->getParsedBody();
       $jobValidator = val::key('nombre',val::stringType()->notEmpty())
                          ->key('TxtUsuario',val::stringType()->notEmpty())
                          ->key('contrasena',val::stringType()->notEmpty())
                          ->key('email',val::stringType()->notEmpty());
      try{
        $jobValidator->assert($postData);
        $user = new User();
        $user->nombre= $postData['nombre'];
        $user->usuario= $postData['TxtUsuario'];
        $user->email= $postData['email'];
        $user->contrasena= password_hash($postData['contrasena'], PASSWORD_DEFAULT);
        $user->save();
        $responseMessage= 'Usuario Guardado con éxito!';

      }catch(\Exception $e)
      {
        $responseMessage= $e->getMessage();
      }
    }
    //include '../views/addJob.php';
    return $this->renderHtml('addUser.twig',[
      'responseMessage'=>$responseMessage
        ]);
  }
}

 ?>
