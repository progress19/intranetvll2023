<?php   

class ServerTimeController extends CController
{
    public function actionIndex()
    {
        $response = array(
            'timestamp' => time(),
            'dateString' => date('Y-m-d H:i:s')
        );
        header('Content-type: application/json');
        echo CJSON::encode($response);
        Yii::app()->end();
    }
}
