<?php
namespace controller;

class reservationController extends \Library\backcontroller
{ 

  public function executeShow() {
    $this->page->addVar('reservation', 'id="active"');
    $this->page->addVar('test', 'show');
    $db = new \Library\DB;
    $manager = new \model\FoodManager($db->getInstance());

    $list['Entrées'] = $manager->getList('entrees');
    $list['Plats'] = $manager->getList('plats');
    $list['Desserts'] = $manager->getList('desserts');
    $list['Boissons'] = $manager->getList('boissons');

    $this->page->addVar('list', $list);
    
    $this->page->setContentFile(__DIR__.'/../view/reservationView.php');
}

    public function executeReserver() {
        if (!(isset($_POST['name']) || isset($_POST['surname']) || 
          isset($_POST['email']) || isset($_POST['number']) || 
          isset($_POST['list']))) {
          $this->executeShow();
            return;
        }
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $error = array();
        if (trim($name) == "") {
            $error['name'] = "Vous devez saisir un nom.";
        }
        if (trim($surname) == "") {
            $error['surname'] = "Vous devez saisir un prénom.";
        }
        if (trim($number) == "") {
            $error['number'] = "Vous devez saisir un numéro de téléphone.";
        }
        if (trim($email) == "") {
            $error['email'] = "Vous devez saisir une adresse email.";
        }
        if (trim($date) == "") {
            $error['date'] = "Vous devez choisir une date.";
        }
        if(! filter_var($email, FILTER_VALIDATE_EMAIL)){  
            $error['email_invalide'] = "L'adresse email est invalide.";
        }
        if (! preg_match('#^0[0-9]([ .-]?[0-9]{2}){4}$#', $number)) {
            $error['numero_invalide'] = "Le numéro de téléphone est invalide.";
        }
        date_default_timezone_set('Europe/Paris');
        $tomorrow  = date("Y-m-d", mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));
        $timestamp = strtotime($date);
        $date = date('Y-m-d', $timestamp);

        if ($date < $tomorrow) {
            $error['date_invalide'] = "La date doit être supérieure à 24h.";
        }
        $vide = true;
        foreach ($_POST['list'] as $key => $value) {
            if ($value != 0) {
              $vide = false;
              break;
            }
        }
        if ($vide) {
            $error['list'] = "Vous devez choisir au moins un article.";
        }
        if (!empty($error)) {
            $this->page->addVar('error', $error);
            $this->executeShow();
            return;
        }
        $db = new \Library\DB;
        $reservationManager = new \model\ReservationManager($db->getInstance());

        $reservation = new \model\Reservation($_POST['name'], $_POST['surname'], $_POST['number'], $_POST['email'], $date);
        $reservationManager->addReservation($reservation);
        $id = $reservationManager->getId();

        $reservedMealManager = new \model\reservedMealManager($db->getInstance());

        foreach ($_POST['list'] as $key => $value) {
            if ($value != 0) {
                $reservedMeal = new \model\ReservedMeal($id, $key, $value);
                $reservedMealManager->addReservedMeal($reservedMeal);
            }
        }
        $this->page->addVar('confirmation', 'Votre réservation a bien été prise en compte.');
        $this->page->setContentFile(__DIR__.'/../view/reservationView.php');
        $this->executeShow();
    }
}

?>
