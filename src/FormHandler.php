<?php

declare(strict_types=1);

namespace HalimonAlexander\Entity;

use HalimonAlexander\Input\Input;
use Smarty;

class FormHandler
{
    protected Input $input;
    protected Smarty $smarty;

    public function __construct(Smarty $smarty, ?Input $input = null)
    {
        $this->input = $input ?? new Input();
        $this->smarty = $smarty;
    }
}
