var donateUrl = "https://don.partipirate.org";
var joinUrl = "https://adhesion.partipirate.org";

function updateCart() {
	var total = 0;
	
	$("#cart > div").hide();
	
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

	$("#total-line").show().find("span").text(total + "€");

	var deduction = Math.floor(total * .66);
	var cost = total - deduction;

	$("#deduct-line").show().find("span").text(deduction + "€");
	$("#cost-line").show().find("span").text(cost + "€");
}

function clickDonateHandler(event) {
	$("#form #type").val("donate");
	$("#form .step-one").slideUp();
}

function clickJoinHandler(event) {
	$("#form #type").val("join");
//	$("#form .step-one").slideUp(400, function() {
//		$("#form .step-join-two").fadeIn();		
//	});

	$("#form .step-one").animate({ left: "-=2000" }, 400, function() {
		$("#form .step-one").hide();
		$("#form .step-join-two").fadeIn();
	});
}

function clickJoinAmountHandler(amount) {
	$("#form #joinAmount").val(amount);
	updateCart();
	
	$("#form .step-join-two").animate({ left: "-=2000" }, 400, function() {
		$("#form .step-join-two").hide();
		$("#form .step-join-three").fadeIn();
	});
}

function clickJoinDonateMoreNo(event) {
	updateCart();

	$("#form .step-join-three").animate({ left: "-=2000" }, 400, function() {
		$("#form .step-join-three").hide();
		$("#form .step-join-four").fadeIn();
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
		$("#form .step-join-four").fadeIn();
	});
}

function clickJoinSlNo(event) {
	$("#form #slJoin").val("");
	updateCart();

	$("#form .step-join-four").animate({ left: "-=2000" }, 400, function() {
		$("#form .step-join-four").hide();
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
		showIdentity();
	});
}

function showIdentity() {
	$("#form .step-identity").fadeIn();
}

function clickIdentityOk(event) {
	$("#form .step-identity").animate({ left: "-=2000" }, 400, function() {
		$("#form .step-identity").hide();
		$("#form .step-disclaimer").fadeIn();
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
	$("body").on("click", ".btn-24", function() { clickJoinAmountHandler(24); });
	$("body").on("click", ".btn-12", function() { clickJoinAmountHandler(12); });
	$("body").on("click", ".btn-6",  function() { clickJoinAmountHandler(6); });

	$("body").on("click", ".btn-join-donate-more-no",  clickJoinDonateMoreNo);
	$("body").on("click", ".btn-join-donate-more-yes", clickJoinDonateMoreYes);
	$("body").on("click", ".btn-join-donate-more-ok",  clickJoinDonateMoreOk);

	$("body").on("click", ".btn-join-sl-no",  clickJoinSlNo);
	$("body").on("click", ".btn-join-sl-yes", clickJoinSlYes);
	$("body").on("click", ".btn-join-sl-ok",  clickJoinSlOk);

	$("body").on("click", ".btn-identity-ok	",  clickIdentityOk);
	
});