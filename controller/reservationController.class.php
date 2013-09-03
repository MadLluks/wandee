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

    private function verif(&$error, $name, $number, $date) {
        if (trim($name) == "") {
            $error['name'] = "Vous devez saisir un nom.";
        }
        if (trim($number) == "") {
            $error['number'] = "Vous devez saisir un numéro de téléphone.";
        }
        if (trim($date) == "") {
            $error['date'] = "Vous devez choisir une date.";
        }
        $tomorrow  = date("Y-m-d", mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));

        if ($date < $tomorrow) {
            $error['date_invalide'] = "La date doit être supérieure à 24h.";
        }
    }

    public function executeReserver() {
        if (!(isset($_POST['name']) || isset($_POST['surname']) || isset($_POST['email']) || isset($_POST['number']) || isset($_POST['list']) || isset($_POST['moment']))) {
            $this->executeShow();
            return;
        }
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $moment = $_POST['moment'];
        $error = array();
        $timestamp = strtotime($date);
        $date = date('Y-m-d', $timestamp);
        $this->verif($error, $name, $number, $date);
        if (trim($surname) == "") {
            $error['surname'] = "Vous devez saisir un prénom.";
        }
        if(trim($email) != "" && (! filter_var($email, FILTER_VALIDATE_EMAIL))){  
            $error['email_invalide'] = "L'adresse email est invalide.";
        }
        if (! preg_match('#^0[0-9]([ .-]?[0-9]{2}){4}$#', $number)) {
            $error['numero_invalide'] = "Le numéro de téléphone est invalide.";
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
        if ($email == "") {
            $email = null;
        }
        $reservation = new \model\Reservation($name, $surname, $number, $email, $date, $moment);
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
        //$this->page->setContentFile(__DIR__.'/../view/reservationView.php');
        $this->executeShow();
    }

    public function executeReserverSurPlace() {
        if (!(isset($_POST['name']) || isset($_POST['nbPersonne']) || isset($_POST['number']) || isset($_POST['moment']) || isset($_POST['date']))) {
            $this->executeShow();
            return;
        }
        $name = $_POST['name'];
        $number = $_POST['number'];
        $date = $_POST['date'];
        $moment = $_POST['moment'];
        $nb = $_POST['nbPersonne'];
        $timestamp = strtotime($date);
        $date = date('Y-m-d', $timestamp);
        $error = array();
        $this->verif($error, $name, $number, $date);
        if (!empty($error)) {
            $this->page->addVar('error', $error);
            $this->executeShow();
            return;
        }
        $db = new \Library\DB;
        $manager = new \model\ReservationSurPlaceManager($db->getInstance());
        $reservationSurPlace = new \model\reservationSurPlace($name, $number, $date, $moment, $nb);
        $manager->addReservation($reservationSurPlace);
        $this->page->addVar('confirmation', 'Votre réservation a bien été prise en compte.');
        //$this->page->setContentFile(__DIR__.'/../view/reservationView.php');
        $this->executeShow();
    }
}

?>
