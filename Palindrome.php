<!--	Copyright Aziom, Inc. 2022 -->
<!doctype html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="ROBOTS" content="noindex, nofollow" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link href="css/Palindrome.css" rel="stylesheet" type="text/css" />
<title>Palindrome Test</title>
</head>

<body>
<div class="hdrm"><a href="/index.php">AZIOM</a></div>

<div id="inpCntrOut">
  <div class="inpCntr">
	<div class="palTstHdr">Palindrome and Same Members Test</div>
    <form id="inpEntry">
      <div class="inpStrRow"><span class="inpStrPrompt">String 1:</span>
        <input class="inpFormDat" type="text" id="paln_id" name="inpStr1" autocomplete="Palindrome" required>
      </div>
      <div class="inpStrRow"><span class="inpStrPrompt">String 2:</span>
        <input class="inpFormDat" type="text" id="memb_id" name="inpStr2" autocomplete="Member">
      </div>
      <div class="inpSubmit">
        <input id="subBut" class="inpBut1" type="button" onclick="palnInit(this.form)" value="Submit">
        <input id="clrBut" class="inpBut2" type="reset" value="Clear">
        <img  class="inpInfo" onClick="infoInit()"src="/Test/img/Info_icon22.png" width="22" height="22" alt="Info">

      </div>
    </form>   
  </div>
</div>

<div id="dispCntrOut">
  <div class="dispCntr">
	<div class="dispHdr">Palindrome and Same Members Results</div>
	<div id="dispResults">
       	<div class="dispStrNo">String stringNo</div>
		<div class="dispName">tstName</div>
		<div class="dispResult">tstResult</div>
		<div class="dispTime">tstTime µs</div>
		<div class="dispDone"></div>
        <br>
	</div>

	<div class="dispSubmit">
		<button class="dispBut1" onClick="palnDone()">Another</button>
	</div>
  </div>
</div>

<div id="infoCntrOut">
	<div class="infoCntr">
		<div class="infoHdr">Palindrome Information</div>
		<div class="infoSub">
		<div class="infoSub2">Description</div>
		<div class="infoTxt">A palindrome is defined as "A word, phrase, verse, or sentence that reads the same backward or forward"</div>
		<div class="infoSub2">Parameters</div>
		<div class="infoTxt">Enter string(s) to be tested in String 1 or in both</div>
		<div class="infoSub2">Results</div>
		<div class="infoTxt">True or False and the time used for execution on the server in PHP</div>
	</div>

	<div class="infoHdr">Same Members Information</div>
	<div class="infoSub">
		<div class="infoSub2">Description</div>
		<div class="infoTxt">The Same Members test looks for the exact same characters and quantity regardlees of order in the strings</div>
		<div class="infoSub2">Parameters</div>
		<div class="infoTxt">Both parameters must be entered</div>
		<div class="infoSub2">Results</div>
		<div class="infoTxt">True or False and the time used for execution on the server in PHP</div>
	</div>

	<div class="infoSubmit">
		<button class="infoBut1" onClick="infoDone()">Close</button>
	</div>
  </div>
</div>

<script src="js/Palindrome.js"></script>
</body>
</html>
