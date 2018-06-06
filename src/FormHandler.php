<?php
namespace HaliminAlexander\Entity;

use Smarty;
use HalimonAlexander\CRM\Input;

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
