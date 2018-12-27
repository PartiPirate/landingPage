<?php
/*
Copyright 2015-2016 Cédric Levieux, Parti Pirate

This file is part of PPMoney.

PPMoney is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

PPMoney is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with PPMoney.  If not, see <http://www.gnu.org/licenses/>.
*/

// To protect from direct call
if (!isset($hookEnabled)) exit();
if (!$transaction) exit();

include_once("config/mail.php");

$purpose = json_decode($transaction["tra_purpose"], true);

//print_r($transaction);

$addresses = array();
$addresses[] = "afpp@partipirate.org";
$addresses[] = "contact@partipirate.org";

if (isset($purpose["join"])) {

	$identity = "";

	foreach($addresses as $address) {
		$mail = getMailInstance();
	
		$mail->setFrom($config["smtp"]["from.address"], $config["smtp"]["from.name"]);
		$mail->addReplyTo($config["smtp"]["from.address"], $config["smtp"]["from.name"]);
	
		// L'adresse ici des SN
//		$mail->addAddress("secretaires-nationaux@lists.partipirate.org");
//		$mail->addCC("afpp@partipirate.org");
//		$mail->addCC("dvi@partipirate.org");
//		$mail->addBCC("contact@partipirate.org");

		$mail->addAddress($address);
	
		$subject = "[PartiPirate] Un nouvel adhérent";
		$mailMessage = "Bonjour,\n\n";
		$mailMessage .= "Référence adhésion : " . $transaction["tra_reference"] . "\n";
		$mailMessage .= "Email adhérent : " . $transaction["tra_email"] . "\n";
	
		if (isset($purpose["rejoin"])) {
			$subject = "[PartiPirate] Une réadhésion";
		}
		else {
			$mailMessage .= "Information adhérent : \n";
			$mailMessage .= "Nom : " . $transaction["tra_lastname"] . "\n";
			$mailMessage .= "Prénom : " . $transaction["tra_firstname"] . "\n";
			$mailMessage .= "Adresse : " . $transaction["tra_address"] . "\n";
			$mailMessage .= "Code postal : " . $transaction["tra_zipcode"] . "\n";
			$mailMessage .= "Ville : " . $transaction["tra_city"] . "\n";
			$mailMessage .= "Pays : " . $transaction["tra_country"] . "\n";
			if ($transaction["tra_telephone"]) {
				$mailMessage .= "Num : " . $transaction["tra_telephone"] . "\n";
			}
			$identity = $transaction["tra_firstname"] . " " . $transaction["tra_lastname"];
		}
	
		if (isset($purpose["local"])) {
			$mailMessage .= "\n";
			$mailMessage .= "Section locale : " . $purpose["local"]["section"] . "\n";
		}
	
		if (isset($purpose["forumPseudo"])) {
			$mailMessage .= "\n";
			$mailMessage .= "Pseudo : " . $purpose["forumPseudo"] . "\n";
			$identity = $purpose["forumPseudo"];
		}
	
		if (isset($purpose["reportSubscription"])) {
			$mailMessage .= "\n";
			$mailMessage .= "Inscription CR BN et CN : Oui\n";
		}
	
		if (isset($purpose["comment"]) && $purpose["comment"]) {
			$mailMessage .= "\n";
			$mailMessage .= "Commentaire : ".$purpose["comment"]."\n";
		}
	
	// 	$headers = "From: " . $config["smtp"]["from.name"] . " <".$config["smtp"]["from.address"].">" ."\r\n" .
	// 	"Reply-To: " . $config["smtp"]["from.name"] . " <".$config["smtp"]["from.address"].">" ."\r\n" .
	// 	"To: secretaires-nationaux@lists.partipirate.org\r\n" .
	// 	"X-Mailer: PHP/" . phpversion();
	
		$mail->Subject = subjectEncode(utf8_encode($subject));
		$mail->msgHTML(str_replace("\n", "<br>\n", utf8_decode($mailMessage)));
		$mail->AltBody = utf8_decode($mailMessage);
	
	// 	if (sendMail($config["smtp"]["from.name"] . " <".$config["smtp"]["from.address"].">",
	// 		"secretaires-nationaux@lists.partipirate.org",
	// 		$mail->Subject,
	// 		$mail->AltBody,
	// 		"",
	// 		"dvi@partipirate.org",
	// 		"")) {
	// 	}
	
	// 	if (mail("secretaires-nationaux@lists.partipirate.org", $mail->Subject, $mail->AltBody, $headers)) {
	// 		echo "Send SN Mails<br/>";
	// 	}
	
	
	//	$mail->SMTPSecure = "ssl";
		if ($mail->send()) {
	//		echo "Send SN Mails<br/>";
		}
	}

	// Envoi du mail à l'adhérent
	$subject = "[PartiPirate] Mail de bienvenue";
	
	$mailMessage = "Bonjour $identity !

Merci d'avoir adhéré et bienvenue au Parti Pirate ! 

En tant qu'adhérent, vous avez la possibilité de participer pleinement aux actions du parti. Votre implication peut prendre la forme d'une simple participation aux votes (ils ont lieu tous les mois), d'une participation à l'un des équipages (vous engager avec un groupe de Pirates sur une thématique précise), ou encore d'une participation plus active dans l'un des différents Conseils (qui assurent le bon fonctionnement du Parti).

S'il n'y avait qu'un site à retenir et à diffuser, gardez en tête : <a href='https://partipirate.org/'>https://partipirate.org/</a>. Vous y trouverez une grande partie des informations relatives au parti (adhésion, outils de prise de décision, forum, wiki). 
Vous trouverez en pièce jointe de cet e-mail un Livret d'Accueil et un Guide de l'Adhérent qui décrivent précisément notre fonctionnement et la façon dont chacun peut s'impliquer dans la vie du parti. 
Afin de vous permettre d'entrer rapidement en contact avec les autres Pirates et de commencer à militer dès à présent vous trouverez ci-dessous une rapide description des principaux outils.

<strong>Fabrilia</strong>
Si vous deviez conserver un seul lieu dans vos favoris pour accéder à tous nos outils, ce serait celui-ci : <a href='https://tools.partipirate.org/'>https://tools.partipirate.org/</a>

<strong>Discord</strong>
Discord est une plateforme d'échange en temps réel sur laquelle nous avons créé un serveur Parti Pirate (<a href='https://discord.partipirate.org/'>https://discord.partipirate.org/</a>), et nous y sommes toujours présents. Nous y organisons également nos réunions vocales, y diffusons les évènements auquel nous participons et avons mis en place une Radio Parti Pirate sur laquelle nous diffusons musique, réunions, discussions en tout genre. Pour avoir accès à l'ensemble des salons, indiquez dans galette (<a href='https://gestion.partipirate.org/'>https://gestion.partipirate.org/</a>) votre identifiant Discord complet (exemple : Patrick#8797).

<strong>Discourse</strong>
Notre forum \"Discourse\" (<a href='https://discourse.partipirate.org/'>https://discourse.partipirate.org/</a>) nous permet d'héberger les débats qui sont une phase indispensable à notre processus de prise de décision. Il est également utilisé pour échanger sur tout un tas de sujets qui concernent le parti, partage d'informations sur des événements, demande d'avis concernant une problématique particulière etc...

<strong>Congressus</strong>
Congressus (<a href='https://congressus.partipirate.org/'>https://congressus.partipirate.org/</a>) est notre interface de gestion des votes, développée par et pour les Pirates. Elle nous permet de déposer des textes, de les soutenir, de les amender, puis de voter. Congressus nous permet également d'organiser des réunions, d'éditer des comptes rendu, pour un maximum de transparence. Elle nous permet de mettre en place un processus de décision asynchrone.

<strong>Personae</strong>
Personae (<a href='https://personae.partipirate.org/'>https://personae.partipirate.org/</a>) est notre outil de gestion des droits qui permet de déléguer ses voix, partiellement ou complètement, à un ou d'autres Pirates. Cet outil vous permet aussi de signaler si vous acceptez ou non les délégations d'autres Pirates pour voter.

<strong>Wiki</strong>
Vous y trouverez nos Statuts auxquels nous tenons beaucoup, qui nous permettent d'exercer une démocratie délégative ou liquide (<a href='https://wiki.partipirate.fr/Statuts'>https://wiki.partipirate.fr/Statuts</a>). Le wiki possède tout un tas d'informations, des bases de programme, le code des pirates. Il est en cours de mise à jour.

Si vous avez la moindre question, n'hésitez pas à solliciter l'aide du Conseil de la Vie Interne sur Discourse ou par mail à contact@partipirate.org";
	
/*	
	$mailMessage = "Ami-e pirate, bonjour

Tu as adhéré(e) au Parti Pirate et nous t'en remercions.
Nous te transmettons ici le livret du nouvel adhérent : <a href=\"https://adhesion.partipirate.org/livretadherent.pdf\">https://adhesion.partipirate.org/livretadherent.pdf</a>
Si tu souhaites t'investir activement, plusieurs possibilités s'offrent à toi car sur le bateau pirate les tâches ne manquent pas :

- Tu peux consulter la liste des missions à pourvoir
- Tu peux prendre contact avec ta section locale pour des actions de terrain

Si tu as des questions, n'hésite pas à nous écrire et nous te répondrons dès que possible.

Encore une fois, bienvenue à bord !

Le Parti Pirate";
*/

// 	$subject = subjectEncode($subject);
// 	$from = $config["smtp"]["from.name"] . " <".$config["smtp"]["from.address"].">";

// 	if (sendMail($from, $transaction["tra_email"],
// 		$subject,
// 		str_replace("\n", "<br>\n", utf8_decode($mailMessage)),
// 		"",
// 		"",
// 		"")) {
// //		echo "Send member mail<br/>";
// 	}

	$mail = getMailInstance();

	$mail->setFrom($config["smtp"]["from.address"], $config["smtp"]["from.name"]);
	$mail->addReplyTo($config["smtp"]["from.address"], $config["smtp"]["from.name"]);

	$mail->Subject = subjectEncode($subject);
	$mail->msgHTML(str_replace("\n", "<br>\n", utf8_decode($mailMessage)));
	$mail->AltBody = strip_tags(str_replace("<strong>", "**", str_replace("</strong>", "**", utf8_decode($mailMessage))));

	$mail->addAttachment("201808_Livret_daccueil.pdf", "Livret_d_accueil.pdf", "base64", "application/pdf");
	$mail->addAttachment("20180928_-_Guide_de_lAdherent.pdf", "Guide_de_l_adherent.pdf", "base64", "application/pdf");

	$mail->addAddress($transaction["tra_email"]);

//	$mail->SMTPSecure = "ssl";
	if ($mail->send()) {
//		echo "Send SN Mails<br/>";
	}

//	echo "Hook SN<br />";
}
?>
