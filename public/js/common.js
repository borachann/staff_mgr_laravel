function includeJs(defaultUrl, iosUrl) {

	if(iosUrl != null && iosUrl.length > 0){
		var os = "iPhone";
		var os2= "iPad";
		var agent		= navigator.userAgent;
		var checker = new RegExp(os);
		var checker2 = new RegExp(os2);
		if (checker.test(agent) || checker2.test(agent)){
			document.write("<script type='text/javascript' src='" + iosUrl + "'></script>");
			return;
		}
	}
	
	var jScript = "<script type='text/javascript' src='" + defaultUrl + "'></script>";
	document.write(jScript); 

}

includeJs("/js/common/jquery.min.js");
includeJs("/js/common/bootstrap.min.js");
includeJs("/js/common/gbox.ui.js");
includeJs("/js/common/jquery-ui-1.10.2.nonwidget.min.js");
includeJs("/js/common/jquery.bpopup.min.js");
includeJs("/js/common/jquery.fileupload.js");
includeJs("/js/common/jquery.form.min.js");
includeJs("/js/common/jquery.bpopup.min.js");
includeJs("/js/common/xregexp-all.js"); 
includeJs("/js/common/moment.min.js");
includeJs("/js/common/jquery.ui.datepicker-ko.js");
includeJs("/js/common/jquery-ui.js");

