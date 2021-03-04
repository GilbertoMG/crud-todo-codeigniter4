<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class BaseController extends Controller
{

    protected $data = [];

    protected $helpers = [];

    protected $setflash = [
        'info',
        'Nenhuma informaçao foi enviada'
    ];

    // Seta mensagem de retorno no
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        $this->data['user_name'] = $this->getUser('nome');
    }

    /**
     * retorna dados do usuario
     *
     * @return string/array
     */
    protected function getUser(?string $field = null)
    {
        $user = service('session')->get('userData');
        if (null === $user) {
            return null;
        }

        return null === $field ? $user : ($user[$field] ?? null);
    }

    public function setMessage(array $arr = null)
    {
        if ($arr == null) {
            $arr = [
                'info',
                'Nenhuma informaçao foi enviada'
            ];
        }

        session()->setFlashdata('msg', $arr);
    }

    protected function setInt(int $num): int
    {
        return intval($num);
    }
}
