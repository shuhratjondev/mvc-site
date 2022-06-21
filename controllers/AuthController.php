<?php


namespace app\controllers;


use shuhratjon\mvc\Application;
use shuhratjon\mvc\Controller;
use shuhratjon\mvc\middlewares\AuthMiddleware;
use shuhratjon\mvc\Request;
use shuhratjon\mvc\Response;
use app\models\LoginForm;
use app\models\User;

class AuthController extends Controller
{


    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request, Response $response)
    {
        $this->setLayout('auth');
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/');
                return;
            }
        }
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request)
    {
        $this->setLayout('auth');
        $user = new User();

        if ($request->method() === 'post') {
            $user->loadData($request->getBody());
            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
            }
        }
        return $this->render('register', [
            'model' => $user
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function profile()
    {
        return $this->render('profile');
    }

}