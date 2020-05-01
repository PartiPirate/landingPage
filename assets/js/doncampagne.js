/* global $ */

var donateUrl = "https://don.partipirate.org";
var joinUrl = "https://adhesion.partipirate.org";

function getProjectId(projectType) {
	if ($("#form #budget").val() == "Election") {
		return 143;
	} 
	else if ($("#form #budget").val() == "Communication") {
		return 142;
	} 

	return 141;
}

function isCompleteFormHandler(event) {
	event.preventDefault();

	var isOk = true;

	var form = {iCertify: true};
	
	if ($("#form #joinAmount").val()) {
		form["costRadio"] = $("#form #joinAmount").val();
		form["donation"] = $("#form #donateAmount").val();
	}
	else {
		form["donation"] = 0;
		form["projectId"] = getProjectId($("#form #budget").val());
		form["projectAdditionalDonation"] = $("#form #budgetAmount").val();
	}
	form["localSection"] = $("#form #slJoin").val().toLowerCase();
	form["localDonation"] = $("#form #slAmount").val();
	form["comment"] = "";
//	form["comment"] = $("#form #budget").val();
	
	form["firstname"] = $("#form #firstname").val();
	form["lastname"] = $("#form #lastname").val();
	form["nationality"] = $("#form #nationality").val();
	form["nationalityLabel"] = $("#form #nationalityLabel").val();
	form["email"] = $("#form #email").val();
	form["address"] = $("#form #address").val();
	form["zipcode"] = $("#form #zipCode").val();
	form["city"] = $("#form #city").val();
	form["country"] = $("#form #country").val();
	
	form["telephone"] = $("#form #telephone").val();

	form["pseudo"] = $("#form #pseudo").val();
	form["rejoin"] = $("#form #rejoin").val();

	if (isOk) {
		$.post("do_setPaymentForm.php", form, function(data) {
			try {
				var jsonData = $.parseJSON(data);
				alert(jsonData.message);
			}
			catch(error) {
				// Il n'y a pas d'erreur
				$("body").append($(data));
				$("#payboxForm").submit();
			}
		}, "html");
	}
}

function updateCart() {
	var total = 0;
	
	$("#cart > li").hide();
	
	total -= -$("#form #joinAmount").val();
//	$("#join-line").show().find("span").text($("#form #joinAmount").val() + "€");
	$("#donate-line").show().find("span").text(total + "€");

	if ($("#form #donateAmount").val()) {
		total -= -$("#form #donateAmount").val();
		$("#donate-line").show().find("span").text(total + "€");
	}

	$("#total-line").show().find("span").text(total + "€");

	var deduction = Math.floor(total * .66);
	var cost = total - deduction;

	$("#deduct-line").show().find("span").text(deduction + "€");
	$("#cost-line").show().find("span").text(cost + "€");
	
	if (total == 0) {
		$("#total-line .caret").hide();
		$("#cart .divider").hide();
	}
	else {
		$("#total-line .caret").show();
		$("#cart .divider").show();
	}
}

function showStep(currentLink, step, event) {
	event.preventDefault();
	var currentStep = $(currentLink).parents(".step");
	
	currentStep.animate({ left: "-=2000" }, 400, function() {
		currentStep.hide();
		currentStep.css({left: 0});
		$("#form " + step).fadeIn();
	});
}

function clickJoinAmountHandler(amount) {
	$("#form #joinAmount").val(amount);
	updateCart();
	
	$("#form .step-join-two").animate({ left: "-=2000" }, 400, function() {
		$("#form .step-join-two").hide();
		$("#form .step-join-two").css({left: 0});
		$("#form .step-join-three").fadeIn();
	});
}

function clickJoinDonateMoreNo(event) {
	updateCart();

	$("#form .step-join-three").animate({ left: "-=2000" }, 400, function() {
		$("#form .step-join-three").hide();
		$("#form .step-join-three").css({left: 0});
		$("#form .step-identity").fadeIn();
	});
}

function clickJoinDonateMoreYes(event) {
	$("#form .step-join-three-amount").fadeIn();
}

function clickJoinDonateMoreOk(event) {
	$("#form #donateAmount").val($("#form #step-join-three-amount").val());
	updateCart();

	$("#form .step-join-three").animate({ left: "-=2000" }, 400, function() {
		$("#form .step-join-three").hide();
		$("#form .step-join-three").css({left: 0});
		$("#form .step-identity").fadeIn();
	});
}

function showIdentity() {
	$("#form .step-identity").fadeIn();
}

function clickIdentityOk(event) {
	$("#form .step-identity").animate({ left: "-=2000" }, 400, function() {
		$("#form .step-identity").hide();
		$("#form .step-identity").css({left: 0});
		$("#form .step-disclaimer").fadeIn();
	});
}

var backgroundImage = null;

function initFlag() {
	if (backgroundImage) {
		
	}
	else {
	    $(".video-bg").wallpaper({
	        source: {
	            mp4: "assets/mp4/Drapeau.mp4",
	            poster: "assets/img/demo-bgs/video-bg-fallback.jpg"
	        }
	    });
	}
}

function initNationalities() {
	$.get("assets/js/nationalities.json", {}, function(data) {
		const nationalitySelect = $("#nationality");

		for(let iso in data) {
			let label = data[iso];

			const option = $("<option />");
			option.html(label);
			option.val(iso);
			
			nationalitySelect.append(option);
		}

		nationalitySelect.val("FR").change();
	}, "json");
	
	$("#nationality").change(function() {
		$("#nationalityLabel").val($("#nationality option:selected").text());
	});
}

$(function() {

	function check(form) {
		var status = true;

		return status;
	}

	function progressHandlingFunction(e) {
	    if (e.lengthComputable){
	    }
	}

	function submit(form) {
		if (!check(form)) return;

		$("#volunteerVeil").show();

	    var formData = new FormData(form[0]);
	    $.ajax({
	        url: 'do_volunteer.php',  //Server script to process data
	        type: 'POST',
	        xhr: function() {  // Custom XMLHttpRequest
	            var myXhr = $.ajaxSettings.xhr();
	            if(myXhr.upload){ // Check if upload property exists
	                myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // For handling the progress of the upload
	            }
	            return myXhr;
	        },
	        //Ajax events
	        success: function(data) {
    			$("#volunteerVeil").hide();
        		data = JSON.parse(data);

        		if (data.ko) {

        		}
        		else {
	    			$("#contactForm").hide();
	    			$("#response").show();
        		}
	        },
	        data: formData,
	        cache: false,
	        contentType: false,
	        processData: false
	    });
	}
	
	$("body").on("click", ".btn-6", function() { clickJoinAmountHandler(6); });
	$("body").on("click", ".btn-10", function() { clickJoinAmountHandler(10); });
	$("body").on("click", ".btn-20",  function() { clickJoinAmountHandler(20); });

	$("body").on("click", ".btn-join-donate-more-no",  clickJoinDonateMoreNo);
	$("body").on("click", ".btn-join-donate-more-yes", clickJoinDonateMoreYes);
	$("body").on("click", ".btn-join-donate-more-ok",  clickJoinDonateMoreOk);

	$("body").on("click", ".btn-identity-ok", clickIdentityOk);
	$("body").on("click", ".step-join-two .btn-prev",  function(event) { showStep(this, ".step-one", event); });
	$("body").on("click", ".step-join-three .btn-prev",  function(event) { showStep(this, ".step-join-two", event); });
	$("body").on("click", ".step-disclaimer .btn-prev",  function(event) { showStep(this, ".step-identity", event); });
	$("body").on("click", ".step-donate-two .btn-prev",  function(event) { showStep(this, ".step-one", event); });
	
	$("body").on("click", ".btn-disclaimer-ok", isCompleteFormHandler);
	
	initFlag();
	initNationalities();
});