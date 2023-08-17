<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Profile;

class ProfileController extends Controller
{   
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        return 'awaw';
    }

    public function actionCreateProfile()
    {     
       \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
       $profile = new Profile();
       $profile->scenario = Profile:: SCENARIO_CREATE;
       $profile->attributes = \yii::$app->request->post();
       if($profile->validate())
       {
            $profile->save();
            return array('status' => true, 'data'=> 'Profile record is successfully updated');
       }
       else
       {
            return array('status'=>false,'data'=>$profile->getErrors());    
       }
    }

    public function actionGetProfile()
    {
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $profile = Profile::find()->all();
        if(count($profile) > 0 )
        {
            return array('status' => true, 'data'=> $profile);
        }
        else
        {
            return array('status'=>false,'data'=> 'No profile Found');
        }
    }

    public function actionUpdateProfile()
    {
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;     
        $attributes = \yii::$app->request->post();
        
        $profile = Profile::find()->where(['id' => $attributes['id'] ])->one();

        if($profile)
        {
            $profile->attributes = \yii::$app->request->post();
            
            if($profile->validate())
            {                
                $profile->save();
                return array('status' => true, 'data'=> 'Profile record is updated successfully');
            }

            return array('status'=>false,'data'=>$profile->getErrors());    
        
        }
        else
        {
            return array('status'=>false,'data'=> 'No Profile Found');
        }
    }

    public function actionDeleteProfile()
    {
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $attributes = \yii::$app->request->post();

        $profile = Profile::find()->where(['id' => $attributes['id'] ])->one();  

        if($profile)
        {
            $profile->delete();
            return array('status' => true, 'data'=> 'Profile record is successfully deleted'); 
        }
        else
        {
            return array('status'=>false,'data'=> 'No Profile Found');
        }
    }

}