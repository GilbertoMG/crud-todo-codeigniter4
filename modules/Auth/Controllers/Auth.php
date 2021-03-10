<?php
namespace Modules\Auth\Controllers;

class Auth extends \CodeIgniter\Controller
{

    protected $helpers = [
        'form',
        'aux',
        'aux_html'
    ];

    public $data, $authModel;

    public function __construct()
    {
        $this->data['validation'] = \Config\Services::validation();
        $this->data['msg'] = [
            '',
            ''
        ];
        $this->authModel = model('Modules\Auth\Models\AuthModel', false);
    }

    public function index()
    {
        // return view('Modules\Pages\Views\login', $this->data);
        return view('Modules\Auth\Views\login', $this->data);
    }

    public function login()
    {
        // Receber os dados do post e verificar os login
        if ($this->request->getMethod() == 'post' && $this->validate($this->data['validation']->getRuleGroup('login'))) {

            // $authModel2 = model('Modules\Auth\Models\AuthModel', false);
            $auth = $this->authModel->chkLogin($this->request->getPost());
            /*
             * $auth = $this->authModel->chkLogin([
             * 'login' => $this->request->getPost('login'),
             * //'email'=> $this->request->getPost('email'),
             * 'senha' => $this->request->getPost('senha'),
             * ]);
             */

            if ($auth != false && $auth->id > 0) {

                session()->set([
                    'isLoggedIn' => true,
                    'ip_login' => \Config\Services::request()->getIPAddress(),
                    'key' => PRIVATE_KEY,
                    'userData' => [
                        'nome' => $auth->nome,
                        'id' => (int) $auth->id,
                        //'isAdmin' => $auth->grupo_id == 1 ? true : false,
                        'isAdmin' => $auth->grupo_id === 1,
                        'grupo_id' => (int) $auth->grupo_id
                    ]
                ]);

                return redirect()->to(base_url('todo/dashboard'));
            } else {

                $this->data['msg'] = [
                    'danger',
                    'Erro de autenticação, verifique seus dados.'
                ];
            }
        }

        return view('Modules\Auth\Views\login', $this->data);
    }

    public function logout()
    {
        session()->stop();
        session()->destroy();
        return redirect()->to(base_url(''));
    }
}

