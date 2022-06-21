<?php

namespace app\controllers;

use shuhratjon\mvc\Application;
use shuhratjon\mvc\Controller;
use shuhratjon\mvc\Request;
use shuhratjon\mvc\Response;
use app\models\ContactForm;

class SiteController extends Controller
{

    public function home()
    {
        //Application::$app->session->setFlash('success', date('Y-m-d H:i:s'));
        $params = [
            'name' => 'Shuhratjon'
        ];
        return $this->render('home', $params);
    }

    public function contact(Request $request, Response $response)
    {
        $model = new ContactForm();
        if ($request->isPost()) {
            $model->loadData($request->getBody());
            if ($model->validate() && $model->send()) {
                Application::$app->session->setFlash('success', 'Thanks for contacting us');
                $response->redirect('/' . $this->action);
            }
        }
        return $this->render('contact', [
            'model' => $model
        ]);
    }

}