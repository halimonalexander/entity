<?php

namespace HalimonAlexander\Entity;

use Smarty;
use HalimonAlexander\Input\Input;

class FormHandler
{
    protected $input;
    protected $smarty;

    final public function __construct(Smarty $smarty)
    {
        $this->input = new Input();
        $this->smarty = $smarty;

        $this->init();
    }

    protected function init()
    {
    }
}
