<?php
namespace controller;

class menuController extends \Library\backcontroller
{  
  public function executeShow() {
    $db = new \Library\DB;
    $manager = new \model\FoodManager($db->getInstance());
    if(!isset($_GET['type'])) {
       $type = 'entrees';
    }
    else {
       $type = $_GET['type'];
    }
    
    $list = $manager->getList($type);

    $this->page->addVar('listMeals', $list);

    $this->page->addVar('carte', 'id="active"');
    $this->page->addVar($type, 'id="active"');

    $this->page->setContentFile(__DIR__.'/../view/menuView.php');
  }

}

?>