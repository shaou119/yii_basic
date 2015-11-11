<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
class NewsController extends Controller
{
   public function actionIndex()
   {
    return $this->render('index');
   } 
   
   public function actionItemsList()
   {
    $newsList = $this->listData();
    return $this->render('itemsList',['newsList'=>$newsList]);
   }
   
   
   public function actionItemDetail(){
    $id = Yii::$app->request->get('id');
    $newList = $this->listData();
    foreach($newList as $k=>$v){
        if($v['id']==$id){
            $item = $v;break;
        }
    }
    return $this->render('itemdetail',['item'=>$item]);
   }
   
   public function listData()
   {
    $newsList = [
    [ 'id' => 1, 'title' => 'First World War', 'date' => '1914-07-28' ],
    [ 'id' => 2, 'title' => 'Second World War', 'date' => '1939-09-01' ],
    [ 'id' => 3, 'title' => 'First man on the moon', 'date' => '1969-07-20' ]
    ];
    return $newsList;
    
   }

    public function actionAdvTest()
    {
        return $this->render('advtest');
    }
    
    public function actionResponsiveContentTest()
    {
        $responsive = Yii::$app->request->get('responsive',0);
        
        if($responsive)
        { 
            $this->layout = 'responsive';
        }else
        {
            $this->layout = 'main';
        }
        return $this->render('responsiveContentTest',['responsive'=>$responsive]);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}

