<?php
namespace App\Controllers;

/*
 * | Controller Base
 */
class Base extends \CodeIgniter\Controller
{

    protected $config;

    protected $data = [];

    protected $setflash = [
        'info',
        'Nenhuma informaçao foi enviada'
    ];

    // Seta mensagem de retorno no

    // https://mailtrap.io/
    public function __construct()
    {
        $this->data['user_name'] = $this->getUser('nome'); // Preciso passar o nome do usuário no template.
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
