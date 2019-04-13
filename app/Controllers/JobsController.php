<?php
namespace App\Controllers;
use App\Models\Job;
use Respect\Validation\Validator as val;

class  JobsController extends BaseController{
  public function getAddJobAcion($request){
    $responseMessage=null;

    if($request->getMethod()=='POST'){
       $postData= $request->getParsedBody();
       $jobValidator = val::key('title',val::stringType()->notEmpty())
                          ->key('description',val::stringType()->notEmpty());
      try{
        $jobValidator->assert($postData);
        $files= $request->getUploadedFiles();
        $logo= $files['logo'];
        if($logo->getError()==UPLOAD_ERR_OK){
          //si estuvo bien la subida del archivo
          $fileName = $logo->getClientFileName();
          $logo->moveTo("upload/$fileName");
          $job = new Job();
          $job->title= $postData['title'];
          $job->description= $postData['description'];
          $job->nombreArchivo= $fileName;
          $job->save();
          $responseMessage= 'Guardado con éxito!';
        }
        else{
            $responseMessage= 'Error al cargar el archivo';
        }

      }catch(\Exception $e)
      {
        $responseMessage= $e->getMessage();
      }
    }
    //include '../views/addJob.php';
    return $this->renderHtml('addJob.twig',[
      'responseMessage'=>$responseMessage
        ]);
  }
}

 ?>
