<?php
namespace controller;

class contactController extends \Library\backcontroller
{  
	public function executeShow()
	{
		$this->page->addVar('contact', 'id="active"');
		$this->page->addVar('test', 'show');
		$this->page->setContentFile(__DIR__.'/../view/contactView.php');
	}

	public function executeEnvoyerMail() {
		$dest = "sylinelee@gmail.com";
		$objet = "Message envoyé par " . $_POST['email'];
		$message = $_POST['message'];
		
		$headers = 'Mime-Version: 1.0'."\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
        $headers .= "\r\n";
        mail($dest, $objet, $message, $headers);

        $this->page->addVar('confirmation', "Votre message a bien été envoyé.");
        $this->executeShow();
	}
}

?>