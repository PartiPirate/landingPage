<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Parti Pirate">

    <title>Parti Pirate - Don à la campagne de MACHIN-E</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="assets/css/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Retina Images Plugin -->
    <script src="assets/js/plugins/retina/retina.min.js"></script>

	<!-- Jquery vmap Plugin -->
	<link href="assets/css/plugins/jquery.vmap/jqvmap.css" rel="stylesheet" type="text/css" />

	
    <!-- Plugin CSS -->
    <link href="assets/css/plugins/hover/hover.min.css" rel="stylesheet">
    <link href="assets/css/plugins/owl.carousel/owl.carousel.css" rel="stylesheet">
    <link href="assets/css/plugins/owl.carousel/owl.theme.css" rel="stylesheet">
    <link href="assets/css/plugins/owl.carousel/owl.transitions.css" rel="stylesheet">
    <link href="assets/css/plugins/jquery.fs.wallpaper/jquery.fs.wallpaper.css" rel="stylesheet">
    <link href="assets/css/plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
	

    <!-- Spectrum CSS -->
    <!-- Note: spectrum.css is the default blue theme. To use another theme, uncomment the one you want and delete the rest, including the default spectrum.css! -->
    <link href="assets/css/spectrum-purple.css" rel="stylesheet">
    <link href="assets/css/pp.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

	<!-- Piwik -->
	<script type="text/javascript">
	  var _paq = _paq || [];
	  _paq.push(["setDomains", ["*.template.partipirate.org"]]);
	  _paq.push(['trackPageView']);
	  _paq.push(['enableLinkTracking']);
	  (function() {
	    var u="//piwik.partipirate.org/";
	    _paq.push(['setTrackerUrl', u+'piwik.php']);
	    _paq.push(['setSiteId', 2]);
	    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
	    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
	  })();
	</script>
	<noscript><p><img src="//piwik.partipirate.org/piwik.php?idsite=2" style="border:0;" alt="" /></p></noscript>
	<!-- End Piwik Code -->

    <div id="wrapper">

        <nav class="navbar navbar-dark navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="#page-top">
                        <span class="logo">
                            <img src="assets/img/logo.png" alt="">
                        </span>
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                    <ul class="nav navbar-nav">
                        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li class="page-scroll">
                            <a href="#megaform" class="btn-donate">Donner</a>
                        </li>
						<li class="dropdown">
							<a id="total-line" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<span style="text-align: right;"></span>
								<i class="glyphicon glyphicon-shopping-cart"></i> 
								<i class="caret" style="display: none;"></i>
							</a>
							<ul class="dropdown-menu" id="cart">
								<li id="join-line" 							style="display: none;"><a href="#">Adhésion : <span style="float: right;"></span></a></li>
								<li id="donate-line" 						style="display: none;"><a href="#">Don : <span style="float: right;"></span></a></li>
								<li id="sl-join-line" 						style="display: none;"><a href="#">Adhésion à une section locale : <span style="float: right;"></span></a></li>
								<li id="sl-donate-line" 					style="display: none;"><a href="#">Don à la section : <span style="float: right;"></span></a></li>
								<li id="donate-budget-line-operation" 		style="display: none;"><a href="#">Don au budget &laquo;Fonctionnement&raquo; : <span style="float: right;"></span></a></li>
								<li id="donate-budget-line-communication" 	style="display: none;"><a href="#">Don au budget &laquo;Communication&raquo; : <span style="float: right;"></span></a></li>
								<li id="donate-budget-line-elections"	 	style="display: none;"><a href="#">Don au budget &laquo;Elections&raquo; : <span style="float: right;"></span></a></li>
								<li role="separator" class="divider"></li>
								<li id="deduct-line" 						style="display: none;"><a href="#">Déduction fiscale : <span style="float: right;"></span></a></li>
								<li id="cost-line" 							style="display: none;"><a href="#">Coût : <span style="float: right;"></span></a></li>
							</ul>
						</li>                        	
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <header class="video-bg">
            <div class="intro-video intro-dark-bg container">
                <div class="overlay"></div>
                <div class="intro-body">
                    <div class="container">
                        <span class="page-scroll">
                            <a href="#megaform" class="btn btn-primary btn-square btn-lg">Donnez, aidez un candidat</a>
                        </span>
                        <br>
                        <br>
                        <h1 class="brand-heading">
                            Parti<br><span class="text-primary">Pirate</span>
                        </h1>
                        <hr class="light">
                        <div class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <h4>Le Parti Pirate défend la vie privée, c'est un élément essentiel pour la démocratie et la liberté d'expression</h4>
                                </div>
                                <div class="item">
                                    <h4>Le Parti Pirate défend et promeut le logiciel libre</h4>
                                </div>
                                <div class="item">
                                    <h4>Le Parti Pirate défend et encourage l'agriculture biologique sur tout le territoire</h4>
                                </div>
                            </div>
                        </div>
                        <div class="page-scroll" data-scrollreveal="enter bottom after .6s">
                            <a href="#megaform" class="btn btn-scroll-light sink">
                                <i class="fa fa-angle-double-down"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

		<section id="megaform" class="megaform-1">
			<form id="form">
				<input type="hidden" id="type">
				<input type="hidden" id="joinAmount">
				<input type="hidden" id="donateAmount">
				<input type="hidden" id="slJoin">
				<input type="hidden" id="slAmount">
				<input type="hidden" id="budget">
				<input type="hidden" id="budgetAmount">
            <div class="container">
                <div class="row" style="min-height: 300px;">

                    <div class="col-lg-12 text-center step step-join-two" data-scrollreveal="move 0 over 1s">
                        <h2>&nbsp;Vous souhaitez donner pour la campagne de MACHIN-E ?</h2>
                        <hr class="primary">
                        <ul class="list-inline">
                            <li><button type="button" style="width: 226px; height: 57px;" class="btn btn-primary btn-square btn-raised btn-6">6€</button><br>
                            	2€ après déduction fiscale
                            </li>
                            <li><button type="button" style="width: 226px; height: 57px;" class="btn btn-primary btn-square btn-raised btn-10">10€</button><br>
                            	4€ après déduction fiscale</li>
                            <li><button type="button" style="width: 226px; height: 57px;" class="btn btn-primary btn-square btn-raised btn-20">20€</button><br>
                            	7€ après déduction fiscale</li>
                        </ul>
					</div>
					
                    <div class="col-lg-12 text-center step step-join-three" style="display: none;">
                        <h2><a href=#step-join-two class="btn-prev">
                                <i class="fa fa-angle-double-left"></i>
                            </a>&nbsp;Vous voulez donner plus ?</h2>
                        <hr class="primary">
                        <ul class="list-inline">
                            <li><button type="button" style="width: 226px; height: 57px;" class="btn btn-primary btn-square btn-raised btn-join-donate-more-yes">Oui</button></li>
                            <li><button type="button" style="width: 226px; height: 57px;" class="btn btn-primary btn-square btn-raised btn-join-donate-more-no">Non</button></li>
                        </ul>

                        <ul class="list-inline step step-join-three-amount" style="display: none;">
                            <li><input type="number" min="0" max="7500" step="10" id="step-join-three-amount" class="text-right" style="width: 100px; height: 57px; margin-top: 0; margin-bottom: 0; padding-right: 5px; font-size: 30px;"> &euro;</li>
                            <li><button type="button" style="width: 226px; height: 57px; margin-top: -11px;" class="btn btn-primary btn-square btn-raised btn-join-donate-more-ok">Voilà !</button></li>
                        </ul>
					</div>

                    <div class="col-lg-12 text-center step step-identity" style="display: none;">
						
                        <h2>Et vous êtes ?</h2>
                        <hr class="primary">
                        
						<div class="form-group has-feedback">
                               <div class="form-group col-xs-12 col-md-6 floating-label-form-group controls">
                                   <label>Votre prénom<sup class="required">*</sup></label>
                                   <input type="text" class="form-control" placeholder="Votre prénom" id="firstname" name="firstname" required data-validation-required-message="Veuillez entrer votre prénom.">
                                   <p class="help-block text-danger"></p>
                               </div>
                               <div class="form-group col-xs-12 col-md-6 floating-label-form-group controls">
                                   <label>Votre nom<sup class="required">*</sup></label>
                                   <input type="text" class="form-control" placeholder="Votre nom" id="lastname" name="lastname" required data-validation-required-message="Veuillez entrer votre nom.">
                                   <p class="help-block text-danger"></p>
                               </div>
						</div>
	
						<div class="form-group has-feedback">
                               <div class="form-group col-xs-12 col-md-6 floating-label-form-group controls">
                                   <label>Votre adresse mail<sup class="required">*</sup></label>
                                   <input type="text" class="form-control" placeholder="Votre adresse mail" id="email" name="email" required data-validation-required-message="Veuillez entrer votre addresse mel.">
                                   <p class="help-block text-danger"></p>
                               </div>
                               <div class="form-group col-xs-12 col-md-6 floating-label-form-group controls">
                                   <label>Votre pseudo</label>
                                   <input type="text" class="form-control" placeholder="Votre pseudo" id="pseudo" name="pseudo" data-validation-required-message="Veuillez entrer votre pseudo.">
                                   <p class="help-block text-danger"></p>
                               </div>
						</div>
	
						<div class="form-group has-feedback">
                               <div class="form-group col-xs-12 col-md-6 floating-label-form-group controls">
                                   <label>Votre téléphone</label>
                                   <input type="text" class="form-control" placeholder="Votre téléphone" id="telephone" name="telephone" required data-validation-required-message="Veuillez entrer votre numéro de téléphone au format 0601020304 ou +33 6 01020304.">
                                   <p class="help-block text-danger"></p>
                               </div>
								<div class="form-group col-xs-12 col-md-6 floating-label-form-group controls">
								   <label>Votre nationalité<sup class="required">*</sup></label>
                                   <select class="form-control" id="nationality" name="nationality">
                                   </select>
								   <p class="help-block text-danger"></p>
                                   <input type="hidden" id="nationalityLabel" name="nationalityLabel">
								</div>
						</div>
	
						<div class="form-group has-feedback">
                               <div class="form-group col-xs-12 col-md-12 floating-label-form-group controls">
                                   <label>Votre adresse<sup class="required">*</sup></label>
                                   <input type="text" class="form-control" placeholder="Votre adresse" id="address" name="address" required data-validation-required-message="Veuillez entrer votre adresse.">
                                   <p class="help-block text-danger"></p>
                               </div>
						</div>
	
						<div class="form-group has-feedback">
                               <div class="form-group col-xs-12 col-md-2 floating-label-form-group controls">
                                   <label>Votre code postal<sup class="required">*</sup></label>
                                   <input type="text" class="form-control" placeholder="Votre CP" id="zipCode" name="zipCode" data-validation-required-message="Veuillez entrer votre code postal.">
                                   <p class="help-block text-danger"></p>
                               </div>
                               <div class="form-group col-xs-12 col-md-5 floating-label-form-group controls">
                                   <label>Votre ville<sup class="required">*</sup></label>
                                   <input type="text" class="form-control" placeholder="Votre ville" id="city" name="city" data-validation-required-message="Veuillez entrer votre ville.">
                                   <p class="help-block text-danger"></p>
                               </div>
                               <div class="form-group col-xs-12 col-md-5 floating-label-form-group controls">
                                   <label>Votre pays<sup class="required">*</sup></label>
                                   <input type="text" class="form-control" placeholder="Votre pays" id="country" name="country" data-validation-required-message="Veuillez entrer votre pays." value="France">
                                   <p class="help-block text-danger"></p>
                               </div>
						</div>

						<label><sup class="required">*</sup> : Champ obligatoire</label>

                        <ul class="list-inline">
                            <li><button type="button" style="width: 226px; height: 57px;" class="btn btn-primary btn-square btn-raised btn-identity-ok">On y est presque :D</button></li>
                        </ul>

                    </div>

                    <div class="col-lg-12 text-center step step-disclaimer" style="display: none;">
                        <h2><a href="#step-identity" class="btn-prev">
                                <i class="fa fa-angle-double-left"></i>
                            </a>&nbsp;Attention point légal</h2>
                        <hr class="primary">
                        <div class="text-left">
							Je certifie sur l'honneur que :<br>
							<ul>
								<li>je suis une personne physique et le règlement de ma cotisation et/ou don ne provient pas du compte d'une personne morale (société, association, collectivité...),</li>
								<li>le paiement de ma cotisation et/ou don provient de mon compte bancaire personnel ou de celui de mon conjoint, concubin, ascendant ou descendant.</li>
								<li>j'ai bien lu les mentions "à savoir" ci-dessous</li>
							</ul>
							
							<div>
								Outre nos statuts et notre règlement intérieur que vous devrez lire puisque vous vous engagez à vous y conformer, nous vous invitons particulièrement à prendre connaissance de notre déclaration de politique générale et de notre programme avant de remplir votre demande d'adhésion.<br>
								Les adhésions en tant que personne morale ne sont pas ouvertes.<br>
								Cette adhésion est valide de date à date.<br>
								Conformément à l’article 34 de la loi N°78-17 du 6 janvier 1978 dite « Informatique et Libertés », vous disposez d’un droit d’accès, de modification, de rectification, de suppression des données qui vous concernent sur simple demande à secretaires-nationaux@lists.partipirate.org. Le Parti Pirate est une association à but politique régie par la loi du 1er juillet 1901. L’Association de Financement du Parti Pirate, déclarée le 21/04/11 a été agréée le 18/07/11.<br>
								Voir cette page pour notre politique informatique &amp; Liberté, de confidentialité des données communiquées avant d'adhérer.<br>
								Vous devez indiquer votre véritable identité car se faire établir et utiliser un reçu-don sous une fausse identité constituerait une fraude fiscale.<br>
                                <br>								
								Votre don vous donne droit à une réduction annuelle d'impôt sur le revenu à hauteur de 66% de son montant, dans la double limite de 20% du revenu imposable et de 15 000 € de dons par foyer fiscal.<br>
								Montant maximal total annuel 7500€ pour les dons consentis et les cotisations versées en qualité d’adhérent d’un ou de plusieurs partis politiques par une personne physique dûment identifiée à une ou plusieurs associations agréées en qualité d’association de financement ou à un ou plusieurs mandataires financiers d’un ou de plusieurs partis politiques, Réf : alinéa 1er de l’article 11-4 de la loi du 11 mars 1988 modifié le 11 octobre 2013.<br>
							</div>
						</div>
						<br />
                        <ul class="list-inline">
                            <li><button type="button" style="width: 226px; height: 57px;" class="btn btn-primary btn-square btn-raised btn-disclaimer-ok">J'accepte et je pars payer</button></li>
                        </ul>

					</div>
				</div>
			</div>
			</form>
		</section>

        <footer class="footer-1">
            <div class="upper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <h2 class="script">Parti Pirate</h2>
                            <address>
                                21, place de la République<br>
                                75003 Paris<br>
							</address>
                        </div>
                        <div class="col-md-3">
                            <h4>Liens</h4>
                            <ul class="list-unstyled footer-links">
                                <li>
                                    <a href="https://www.partipirate.org" target="_blank">Site du Parti Pirate</a>
                                </li>
                                <li>
                                    <a href="https://wiki.partipirate.org" target="_blank">Wiki du Parti Pirate</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-3">
                            <h4>Social</h4>
                            <ul class="list-inline">
                                <li>
                                    <a href="https://www.facebook.com/partipiratefr/" class="btn btn-social-light btn-facebook"><i class="fa fa-fw fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/partipirate" class="btn btn-social-light btn-twitter"><i class="fa fa-fw fa-twitter"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lower">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="small"><a href="licences.html" title="Information licence">Mentions légales</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>

	
	<div id="volunteerVeil" class="text-center simply-hidden">
		<img src="assets/img/logo_pp.png" alt="Logo du Parti Pirate">
	</div>

    <script src="assets/js/min.js"></script>
	<script src="assets/js/plugins/jquery.vmap/jquery.vmap.js"></script>
    <script src="assets/js/plugins/jquery.vmap/jquery.vmap.france.js"></script>
    <script src="assets/js/doncampagne.js"></script>

</body>

</html>
