<?php

class DefaultController extends Controller
{

	public $layout='//layouts/dashboard_admin';

	public function actionIndex()
	{
		$this->render('index');
	}



public function actionFrancoForm()
{
    $model = new FrancoForm;

    // uncomment the following code to enable ajax-based validation
    
    if(isset($_POST['ajax']) && $_POST['ajax']==='franco-form-francoForm-form')
    {
        echo CActiveForm::validate($model);
        Yii::app()->end();
    }
    

    if(isset($_POST['FrancoForm']))
    {
        $model->attributes = $_POST['FrancoForm'];
        if($model->validate())
        {
            
            // form inputs are valid, do something here
            //$this->redirect(Yii::app()->homeUrl.'admin/default/imprimirFranco');
            //$this->redirect(array('admin/default/imprimirFranco','nombre'=>$model->nombre,'sector'=>$model->sector));
            $this->render('imprimirFranco',array('nombre'=>$model->nombre));

            return;
        }
    }
    $this->render('francoForm',array('model'=>$model));
} 	

    public function actionImprimirFranco() {
        $this->render('imprimirFranco'
            //,array('model'=>$model)
            );
    } 

   public function actionRecuperarpass()
   {
        sleep(1);
        if(isset($_POST['usuario'])){
            $usuarios = Usuario::model()->findAllByAttributes(array(),
            $condition = 'username=:usuario',
            $params = array(':usuario' => $_POST['usuario']));
            $contar = count($usuarios);
            if ($contar<1) {echo CJSON::encode(array("error"=>0,"msg"=>"Usuario no encontrado."));}
            ELSE{echo CJSON::encode(array("error"=>0,"msg"=>"La contraseña fue enviada a su email."));
                    foreach ($usuarios as $usuario) {
                    $email = $usuario->email;
                    $pass = $usuario->password;
                    $id = $usuario->id;
                }

        $length = 10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $string = '';
         
        for ($p = 0; $p < $length; $p++) {
            $string .= $characters[mt_rand(0, strlen($characters))];
        }

        $user = Usuario::model()->findByPk($id);
        $user->password=md5($string);
        $user->save(); // guardar cambios en la base de datos

        $body="<b>La nueva contraseña del usuario ".$_POST['usuario']." es : ".$string;
        $mail = new YiiMailer();
        $mail->setView('contact');
        $mail->setData(array('message' => '', 'name' => '','description' => $body));
        $mail->setFrom('info@intranetvll.com', 'Intranet Valle de Las Leñas');
        $mail->AddAddress($email);
        $mail->setSubject('Recuperación de contraseña');

            $mail->smtpConnect([
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    ]
                ]);

        $mail->send();
        }}}


}