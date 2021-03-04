<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class MyFilter implements FilterInterface
{
    private $ip;
    private $auth;    

    public function before(RequestInterface $request, $arguments = null)
    {
        	
        $this->auth = service('session')->get();  
		$this->ip = $request->getIPAddress();
              
        if (!$this->isLoggedIn() or ($this->auth['key'] != PRIVATE_KEY) or ($this->ip != $this->auth['ip_login'])) {
           service('session')->destroy();
           return redirect()->to(base_url('auth/logout'));
          
        }      		
      
       
    }

    // --------------------------------------------------------------------
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }   

    /**
     * Checks whether a user is logged in.
     * @return bool if a user is logged in
     */
    private function isLoggedIn(): bool
    {
        if (!isset($this->auth['isLoggedIn']) or !isset($this->auth['ip_login'])) {
            return false;
        }

        return (null !== $this->auth['isLoggedIn'] && $this->auth['userData'] !== null && $this->ip === $this->auth['ip_login']);
    }

}
