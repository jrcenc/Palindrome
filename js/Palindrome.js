//	Copyright Aziom, Inc. 2022

// Load once, retain while window remains
palnOrgDispReesult = document.getElementById("dispResults").innerHTML; 



//	Promise to return Result / Error from server call
function promAuthSendObj(reqUrl) {
  return new Promise(function (resolve, reject) {
	var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function () {
	    if (xmlhttp.readyState == 4)	{
			switch(xmlhttp.status) {
				case 200:
					resolve(xmlhttp.responseText);
					break;
				default:
					reject(xmlhttp.responseText);
			}
    	}
	};

	xmlhttp.open("GET",reqUrl);
	xmlhttp.send();
  });
}


function palnInit(fData) {
	var tstStr1 = fData.inpStr1.value;
	var tstStr2 = fData.inpStr2.value;
	document.getElementById("clrBut").disabled = true;

// Send XHR for test parameters
	var reqUrl="https://aziom.com/Test/SS_Palindrome.php?s1=" + tstStr1 + "&s2=" + tstStr2;
	promAuthSendObj(reqUrl).then(function (data) {
		palnDisp(JSON.parse(data));
    }).catch(function(error) {
		palnErrorDisp(error);
    });
}


function palnDisp(jpData) {
	var htmlNewTxt="";

	jpData.forEach(function(jpElm, jpIdx) {
		if (jpElm[0]) {
			txtCond="Passed";
		} else {
			txtCond="Failed";
		}

		if (jpIdx < 2) {
			testTxt="Palindrome";
		} else {
			testTxt="Same Members";
		}

        var replObj = {
            stringNo: jpIdx + 1,
            tstName: testTxt,
            tstResult: txtCond,
            tstTime: (jpElm[1] * 1000000).toFixed(4)
        };
 
        htmlNewTxt += palnOrgDispReesult.replace(/stringNo|tstName|tstResult|tstTime/gi, function(strIdx){
			return replObj[strIdx];
			});
	});

	document.getElementById("dispResults").innerHTML = htmlNewTxt;	
	document.getElementById("dispCntrOut").style.display = 'inline-block';
}


function palnErrorDisp(errTxt) {
	var divId = document.getElementById("dispResults");
	divId.innerHTML="Error"
	document.getElementById("dispCntrOut").style.display = 'inline-block';
}


function infoInit() {
	var styDisp = document.getElementById("infoCntrOut").style.display;
	
	if (styDisp == "none" || styDisp == "") {
		document.getElementById("infoCntrOut").style.display="inline-block";
	} else {
		document.getElementById("infoCntrOut").style.display="none";
	}
}


function infoDone() {
	document.getElementById("infoCntrOut").style.display = 'none';
}


function palnDone() {
	document.getElementById("inpCntrOut").style.display = 'inline-block';			
	document.getElementById("dispCntrOut").style.display = 'none';
	document.getElementById("infoCntrOut").style.display = 'none';
	document.getElementById("inpEntry").reset();
	document.getElementById("clrBut").disabled = false;
}
