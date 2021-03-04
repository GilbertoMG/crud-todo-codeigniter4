<?php
namespace Modules\Todo\Dashboard\Controllers;

use App\Controllers\Base;

class Dashboard extends Base
{

    public function index()
    {
        return view('Modules\Todo\Dashboard\Views\index', $this->data);
    }
}
