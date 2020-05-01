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
	
	if ($("#form #type").val() == "join") {
		total -= -$("#form #joinAmount").val();
		$("#join-line").show().find("span").text($("#form #joinAmount").val() + "€");
	}

	if ($("#form #donateAmount").val()) {
		total -= -$("#form #donateAmount").val();
		$("#donate-line").show().find("span").text($("#form #donateAmount").val() + "€");
	}

	if ($("#form #slJoin").val()) {
		$("#sl-join-line").show().find("span").text($("#form #slJoin").val());
	}

	if ($("#form #slAmount").val()) {
		total -= -$("#form #slAmount").val();
		$("#sl-donate-line").show().find("span").text($("#form #slAmount").val() + "€");
	}
	
	if ($("#form #budgetAmount").val()) {
		total -= -$("#form #budgetAmount").val();
		if ($("#form #budget").val() == "Operation") {
			$("#donate-budget-line-operation").show().find("span").text($("#form #budgetAmount").val() + "€");
		} 
		else if ($("#form #budget").val() == "Communication") {
			$("#donate-budget-line-communication").show().find("span").text($("#form #budgetAmount").val() + "€");
		} 
		else if ($("#form #budget").val() == "Election") {
			$("#donate-budget-line-elections").show().find("span").text($("#form #budgetAmount").val() + "€");
		}
	} 

	$("#total-line").show().find("span").text(total + "€");

	var deduction = Math.round(total * .66);
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

function clickDonateHandler(event) {
	$("#form #type").val("donate");
	$("#form #joinAmount").val("");

	var step = $("#form .step:visible");

	step .animate({ left: "-=2000" }, 400, function() {
		step .hide();
		step .css({left: 0});
		$("#form .step-donate-two").fadeIn();
	});
}

function clickJoinHandler(event) {
	$("#form #type").val("join");
//	$("#form .step-one").slideUp(400, function() {
//		$("#form .step-join-two").fadeIn();		
//	});

	var step = $("#form .step:visible");

	step .animate({ left: "-=2000" }, 400, function() {
		step .hide();
		step .css({left: 0});
		$("#form .step-join-two").fadeIn();
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
	$("#form #slJoin").val("");
	updateCart();

	$("#form .step-join-three").animate({ left: "-=2000" }, 400, function() {
		$("#form .step-join-three").hide();
		$("#form .step-join-three").css({left: 0});
//		$("#form .step-join-four").fadeIn();
		showIdentity();
	});
}

function clickJoinDonateMoreYes(event) {
	$("#form .step-join-three-amount").fadeIn();
}

function clickJoinDonateMoreOk(event) {
	$("#form #donateAmount").val($("#form #step-join-three-amount").val());
	$("#form #slJoin").val("");
	updateCart();

	$("#form .step-join-three").animate({ left: "-=2000" }, 400, function() {
		$("#form .step-join-three").hide();
		$("#form .step-join-three").css({left: 0});
		showIdentity();
//		$("#form .step-join-four").fadeIn();
	});
}


function clickDonateBudgetOperation(event) {
	$("#form .step-donate-two-amount").fadeIn();
	$("#form #budget").val("Operation");
	$("#form .budget-comment").hide();
	$("#form .operation-comment").css({"display": "inline-block"});
	$("#form .btn-type-donate").removeClass("active");
	$(this).addClass("active");
}

function clickDonateBudgetCommunication(event) {
	$("#form .step-donate-two-amount").fadeIn();
	$("#form #budget").val("Communication");
	$("#form .budget-comment").hide();
	$("#form .communication-comment").css({"display": "inline-block"});
	$("#form .btn-type-donate").removeClass("active");
	$(this).addClass("active");
}

function clickDonateBudgetElection(event) {
	$("#form .step-donate-two-amount").fadeIn();
	$("#form #budget").val("Election");
	$("#form .budget-comment").hide();
	$("#form .election-comment").css({"display": "inline-block"});
	$("#form .btn-type-donate").removeClass("active");
	$(this).addClass("active");
}

function clickDonateBudgetOk(event) {
	$("#form #budgetAmount").val($("#form #step-donate-two-amount").val());
	updateCart();

	$("#form .step-donate-two").animate({ left: "-=2000" }, 400, function() {
		$("#form .step-donate-two").hide();
		$("#form .step-donate-two").css({left: 0});
		$("#form .step-identity").fadeIn();
	});
}


function clickJoinSlNo(event) {
	$("#form #slJoin").val("");
	updateCart();

	$("#form .step-join-four").animate({ left: "-=2000" }, 400, function() {
		$("#form .step-join-four").hide();
		$("#form .step-join-four").css({left: 0});
		showIdentity();
	});
}

function clickJoinSlYes(event) {
	$("#form .step-join-four-sl").fadeIn();
	$("#form .step-join-four-amount").fadeIn();
}

function clickJoinSlOk(event) {
//	$("#form #slJoin").val($("#form #step-join-four-sl").val());
	$("#form #slAmount").val($("#form #step-join-four-amount").val());
	updateCart();

	$("#form .step-join-four").animate({ left: "-=2000" }, 400, function() {
		$("#form .step-join-four").hide();
		$("#form .step-join-four").css({left: 0});
		showIdentity();
	});
}

function showIdentity() {
	$("#form .step-identity").fadeIn();
}

function clickIdentityOk(event) {
	$("#error-div").children().remove();

	const errors = [];

	if (!$("#firstname").val()) {
		errors.push("no_firstname");
	}
	if (!$("#lastname").val()) {
		errors.push("no_lastname");
	}
	if ($("#email").val().indexOf("@partipirate.org") != -1) {
		errors.push("no_email_ppo");
	}
	if (!$("#email").val()) {
		errors.push("no_email");
	}
	if (!$("#address").val()) {
		errors.push("no_address");
	}
	if (!$("#zipCode").val()) {
		errors.push("no_zipcode");
	}
	if (!$("#city").val()) {
		errors.push("no_city");
	}
	if (!$("#country").val()) {
		errors.push("no_country");
	}

	if (errors.length) {
		// there are some errors
		for(var index = 0; index < errors.length; ++index) {
			$("#error-div").append("<div>" + lang[errors[index]] + "</div>")
		}
	}
	else {
		$("#form .step-identity").animate({ left: "-=2000" }, 400, function() {
			$("#form .step-identity").hide();
			$("#form .step-identity").css({left: 0});
			$("#form .step-disclaimer").fadeIn();
		});
	}
}

function initMaps() {
	if ($('#join-sl-map').length == 0) return;
	
	$('#join-sl-map').vectorMap({
	    map: 'france_fr',
		hoverOpacity: 0.3,
		hoverColor: "#ec0000",
		backgroundColor: "#f4f5f7",
		color: "#e0deea",
		borderColor: "#000000",
		borderWidth: 2,
		selectedColor: "#6d28aa",
		enableZoom: false,
		showTooltip: true,
	    onRegionClick: function(element, code, region)
	    {
	    	$("#form #slJoin").val(region);
	    }
	});
	
	$("#join-sl-map svg").attr("width", 340).attr("height", 270);
	$("#join-sl-map").css({"width": "340px", "height": "270px"});
}

function initFlag() {
    $(".video-bg").wallpaper({
        source: {
            mp4: "assets/mp4/Drapeau.mp4",
            poster: "assets/img/demo-bgs/video-bg-fallback.jpg"
        }
    });
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
	
	$("body").on("click", ".btn-donate", clickDonateHandler);
	$("body").on("click", ".btn-join", clickJoinHandler);
	$("body").on("click", ".btn-24", function() { clickJoinAmountHandler(30); });
	$("body").on("click", ".btn-12", function() { clickJoinAmountHandler(15); });
	$("body").on("click", ".btn-6",  function() { clickJoinAmountHandler(15); });
	$("body").on("click", ".operation",  clickDonateBudgetOperation);
	$("body").on("click", ".communication", clickDonateBudgetCommunication);
	$("body").on("click", ".election",  clickDonateBudgetElection);

	$("body").on("click", ".btn-join-donate-more-no",  clickJoinDonateMoreNo);
	$("body").on("click", ".btn-join-donate-more-yes", clickJoinDonateMoreYes);
	$("body").on("click", ".btn-join-donate-more-ok",  clickJoinDonateMoreOk);
	$("body").on("click", ".btn-Donate-budget-ok",  clickDonateBudgetOk);

	$("body").on("click", ".btn-join-sl-no",  clickJoinSlNo);
	$("body").on("click", ".btn-join-sl-yes", clickJoinSlYes);
	$("body").on("click", ".btn-join-sl-ok",  clickJoinSlOk);

	$("body").on("click", ".btn-identity-ok", clickIdentityOk);
	$("body").on("click", ".step-join-two .btn-prev",  function(event) { showStep(this, ".step-one", event); });
	$("body").on("click", ".step-join-three .btn-prev",  function(event) { showStep(this, ".step-join-two", event); });
	$("body").on("click", ".step-join-four .btn-prev",  function(event) { showStep(this, ".step-join-three", event); });
	$("body").on("click", ".step-disclaimer .btn-prev",  function(event) { showStep(this, ".step-identity", event); });
	$("body").on("click", ".step-donate-two .btn-prev",  function(event) { showStep(this, ".step-one", event); });
	
	$("body").on("click", ".btn-disclaimer-ok", isCompleteFormHandler);

	initNationalities();

	initMaps();
	initFlag();
});