
$("form span").hide();

$("#password").keyup(ErrorMessageEvent).keyup(enableButton);
$("#confirm_password").keyup(matchPass).keyup(enableButton);

function isPassValid() { 
	return $("#password").val().length > 7;
}

function isPassMatching(){
	return $("#confirm_password").val() === $("#password").val();
}

function isButtonEnabled() {
	return isPassValid() && isPassMatching();
}

function ErrorMessageEvent(){
	if (isPassValid()) {
		$(this).next().hide();
	}
	else{
		$(this).next().show();
	}
}

function matchPass() {
	if (isPassMatching()) {
		$(this).next().hide();
	}
	else{
		$(this).next().show();
	}
}

function enableButton() {
	$("#submit").prop("disabled", !isButtonEnabled);
	if (!isButtonEnabled()) {
		$("#submit").prop('disabled', true);
		$("#submit").css({background: "#dddddd", color:"black"});
	}
	else{
		$("#submit").css({background: "#18a689", color:"white"});
	}
}