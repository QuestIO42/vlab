/*
= LuxCal JavaScript tools =
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
*/

'use strict';

//global variables
var winXS = '0';
var hlpWinH = 500, hlpWinW = 800, hlpWinT = 100; //help window height, width, top
var evtWinH = 200, evtWinW = 510, evtWinT = 100; //event window height, width, top

//shortcut functions

function $I(id) { return document.getElementById(id); }
function $N(name) { return document.getElementsByName(name); }
function $Q(selector) { return document.querySelectorAll(selector); }

function help(page,back) { //show user guide, if back, show back button
	var hlpWinL = (screen.width - hlpWinW) / 2;
	var hlpWin = window.open('','hlpWin','menubar=no,location=no,toolbar=no,height=' + hlpWinH + ',width=' + hlpWinW + ',top=' + hlpWinT + ',left=' + hlpWinL + ', scrollbars');
	var parObj = {xP:39,hP:page};
	if (back !== undefined) { parObj.bP = back; }
	index(parObj,'hlpWin');
	hlpWin.focus();
}

function scrollY(scrObj) { //save/restore sBox y-scroll value to/from local storage
	var elm = $I('sBox');
	if (typeof(Storage) !== 'undefined' && elm !== null) {
		var item = 'sBox' + scrObj.cP;
		if (scrObj.action === 'save') { //save y-scroll value
			sessionStorage.setItem(item,elm.scrollTop);
		} else if (sessionStorage.getItem(item) !== undefined) { //goto y-scroll value
			elm.scrollTop = sessionStorage.getItem(item);
		}
	}
}

function newE(dt,cid,st,et){ //new event - date, cat ID and times (optional)
	var evtWinL = (screen.width - evtWinW) / 2;
	var evtWin = window.open('','evtWin','menubar=no,location=no,toolbar=no,height=' + evtWinH +',width=' + evtWinW + ',top=' + evtWinT + ',left=' + evtWinL + ', scrollbars=0');
	var parObj = {xP:30,mode:'add',action:'add'};
	if (dt) { parObj.evD = dt; }
	if (cid) { parObj.catID = cid; }
	if (arguments.length > 2) { parObj.evTs = st; parObj.evTe = et; }
	index(parObj,'evtWin');
	evtWin.focus();
	return false;
}

function editE(id,date,cal){ //edit event
	var evtWinL = (screen.width - evtWinW) / 2;
	var evtWin = window.open('','evtWin','menubar=no,location=no,toolbar=no,height=' + evtWinH + ',width=' + evtWinW + ',top=' + evtWinT + ',left=' + evtWinL + ', scrollbars=0');
	var parObj = {xP:30,mode:'edit',action:'edi0',eid:id,evD:date};
	if (cal !== undefined) { parObj.cal1x = cal; } //if defined, use cal; but don't store in session (used by displays)
	index(parObj,'evtWin');
	evtWin.focus();
	return false;
}

function showE(id,date,cal){ //show event
	var evtWinL = (screen.width - evtWinW) / 2;
	var evtWin = window.open('','evtWin','menubar=no,location=no,toolbar=no,height=' + evtWinH + ',width=' + evtWinW + ',top=' + evtWinT + ',left=' + evtWinL + ', scrollbars=0');
	var parObj = {xP:32,eid:id,evD:date};
	if (cal !== undefined) { parObj.cal1x = cal; } //if defined, use cal; but don't store in session (used by displays)
	index(parObj,'evtWin');
	return false;
}

function winFit() { //resize window height to fit its content
	var neededIH = document.body.offsetHeight + 16;
	var currentIH = window.innerHeight || document.documentElement.clientHeight;
	if (window.resizeBy) {
		window.resizeBy(0,neededIH - currentIH);
	} else {
		var currentOW = window.outerWidth;
		var currentOH = window.outerHeight;
		window.resizeTo(currentOW,neededIH + currentOH - currentIH);
	}
}

function winNar(limit) { //update "window Xtra Small" cookie
	var v = document.cookie.match('LXCxs=([0|1])');
	var setXS = (!v || v[1] === '0') ? '0' : '1';
	winXS = (window.innerWidth < limit) ? '1' : '0';
	if (setXS !== winXS) {
		cookie('LXCxs',winXS,14400,'/'); //10 days
		return true; //cookie set
	}
	return false;
}

function cookie(name,value,minutes,path) { //bake cookie
	var d = new Date;
	d.setTime(d.getTime() + 60000 * minutes); //expires in 'minutes' minutes
	var path = (path !== undefined) ?';path=' + path : '';
	document.cookie = name + '=' + value + ';expires=' + d.toUTCString() + path;
}

function detach(obj,fName) { //detach file from event
	var elm = $I('att');
	elm.value = elm.value.replace(';' + fName,'');
	obj.parentNode.innerHTML = '';
}

// AJAX functions

function checkE(obj,evtID,evtDt,usrID) { //toggle the event check mark
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState === 4 && xhr.status === 200) {
			if (xhr.responseText != '0') {
				obj.innerHTML = xhr.responseText;
			}
		}
	}
	xhr.open("POST","common/checkevt.php",true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("evtID="+evtID+"&evtDt="+evtDt+"&usrID="+usrID);
}

//general functions

function index(pars,target) { //dummy form to turn GET into POST
	var form = document.createElement("form");
//	if (typeof calID !== 'undefined') { pars.cal1x = calID; } //if defined, use calID; but don't store in session
	form.method = "post";
	form.action = "index.php";
	if (target !== undefined) {
		pars.winCh = 1; //window change
		form.target = target;
	}
	for(var key in pars) {
		var input = document.createElement("input");
		input.setAttribute("type","hidden");
		input.setAttribute("name",key);
		input.setAttribute("value",pars[key]);
		form.appendChild(input);
	}
	document.body.appendChild(form);
	form.submit();
}

function done(action) { //close window and refresh calendar (action: c = close; r = reload opener)
	if (action.indexOf('r') > -1) { window.opener.location = window.opener.location.href; } //refresh calendar 
	if (action.indexOf('c') > -1) { window.close(); }
}

function styleWin(page) { //styling page (new window)
	var pageObj = new Object();
	pageObj.xP = page;
	var styleWin = window.open('','styleWin',"top=100,left=200,width=1000,height=800");
	index(pageObj,'styleWin');
	styleWin.focus();
	return false;
}

function check1(boxName,thisBox,toggle) { //check 1 of N check boxes
	var chBoxes = $N(boxName);
	var checked = thisBox.checked;
	Array.from(chBoxes).forEach (function(value) { value.checked = false; });
	thisBox.checked = (toggle !== undefined && !checked) ? false : true;
}

function check0(boxName,boxCopy) { //check box 0 of N check boxes
	var chBoxes = $N(boxName+'[]');
	Array.from(chBoxes).forEach (function(value) { value.checked = false; });
	chBoxes[0].checked = true;
	if (boxCopy !== undefined) {
		var chBoxes = $N(boxCopy+'[]');
		Array.from(chBoxes).forEach (function(value) { value.checked = false; });
		chBoxes[0].checked = true;
	}
}

function checkN(boxName) { //check any of N check boxes
	var chBoxes = $N(boxName+'[]');
	var check = false;
	Array.from(chBoxes).forEach (function(value) { if (value.checked) check = true; });
	chBoxes[0].checked = !check;
}

function checkGvN(boxNameV,boxNameA) { //check any of N group View check boxes
	var chBoxesV = $N(boxNameV+'[]');
	var check = false;
	Array.from(chBoxesV).forEach (function(value) { if (value.checked) check = true; });
	$I(boxNameV+'0').checked = !check;
	if (check === true) {
		var chBoxesA = $N(boxNameA+'[]');
		if (chBoxesA[0].checked) {
			Array.from(chBoxesV).forEach (function(value) { value.checked = false; });
			chBoxesV[0].checked = true;
		} else {
			for (var i = (chBoxesA.length - 1);i >= 0;i--) { //copy Add values to View values
				if (chBoxesA[i].checked) {
					chBoxesV[i].checked = true;
				}
			}
		}
	}
}

function checkGaN(boxNameA,boxNameV) { //check any of N group Add check boxes
	var chBoxesA = $N(boxNameA+'[]');
	var check = false;
	chBoxesA.forEach (function(value) { if (value.checked) check = true; });
	if (check) {
		chBoxesA[0].checked = false;
	}
	if (check === true) {
		var chBoxesV = $N(boxNameV+'[]');
		if (!chBoxesV[0].checked) {
			for (var i = (chBoxesA.length - 1);i >= 0;i--) { //copy Add values to View values
				if (chBoxesA[i].checked) {
					chBoxesV[i].checked = true;
				}
			}
		}
	}
}

function checkA(boxName) { //check all check boxes
	var chBoxes = $N(boxName+'[]');
	Array.from(chBoxes).forEach (function(value) { value.checked = true; });
}

function toggleLabel(optBut,text1,text2) {
	var elm = $I(optBut);
	elm.innerHTML = (elm.innerHTML === text1) ? text2 : text1;
}

function showX(elmID,on) { //show or hide element
	var elm = $I(elmID);
	if (elm) { elm.style.display = (on ? "block" : "none"); }
}

function showL(list,on) { //show or hide list;
	$I(list).style.display = (on ? "block" : "none");
	if(typeof(Storage) !== 'undefined') { //store list status
		sessionStorage.setItem(list,on);
	}
}

function initL() { //initialize (show or hide) list after page reload;
	var lists = ["toapBar","todoBar","upcoBar"];
	lists.forEach(function (list) {
		if(typeof(Storage) !== 'undefined') { //init list
			if (sessionStorage.getItem(list) === '1') {
				$I(list).style.display = "block";
			}
		}
	});
}

function ewShow(evtExt) { //show or hide event window extension
	var elm = $I(evtExt);
	var sym = $I(evtExt + 'S');
	var frm = document.forms['event'];
	if (elm.style.display === "none") {
		elm.style.display = "block";
		sym.innerHTML = '&#10134;';
		frm.elements[evtExt].value = '1';
	} else {
		elm.style.display = "none";
		sym.innerHTML = '&#10133;';
		frm.elements[evtExt].value = '0';
	}
	winFit();
}

function showUm(elmID) { //user menu
	var elm = $I(elmID);
	elm.style.height = (elm.style.height.substr(0,1) > '0') ? '0px' : '40px';
}

function showSm(elmID) { //side menu
	var elm = $I(elmID);
	elm.style.width = (elm.style.width.substr(0,1) > "0") ? "0px" : "150px";
}

function showOp(elmID,formName) { //show or hide and submit Options Panel
	var elm = $I(elmID);
	elm.style.height = (elm.style.height.substr(0,1) > '0') ? '0px' : '250px';
	if (elm.style.height.substr(0,1) === '0') { document.forms[formName].submit(); }
}

function hideTimes(t) { //toggle visibility of event times
	$I("dTimeS").style.visibility = $I("dTimeE").style.visibility = t.checked ? "hidden" : "visible";
}

function delConfirm(item,ID,confText) {
	if (confirm(confText+'?')) {
		switch(item) {
			case 'usr': index({delExe:'y',uid:ID}); break;
			case 'grp': index({delExe:'y',gid:ID}); break;
			case 'cat': index({delExe:'y',cid:ID});
		}
	}
}

function update(jscolor,bgcol,color,bdcol) { //jscolor color changer
	if (bgcol) {
		var bArr = bgcol.split(',');
		bArr.forEach(function(value) { $I(value).style.backgroundColor = '#' + jscolor; });
	}
	if (color) {
		var cArr = color.split(',');
		cArr.forEach(function(value) { $I(value).style.color = '#' + jscolor; });
	}
	if (bdcol) {
		var dArr = bdcol.split(',');
		dArr.forEach(function(value) { $I(value).style.borderColor = '#' + jscolor; });
	}
}

function sml(m1,m2,m3,subject) { //open mail client
	if (confirm(smlConfirm + ':\n' + m1 + '@' + m2 + '.' + m3)) {
		subject = subject.replace(' ','%20');
		location.href='mailto:'+m1 + '@' + m2 + '.' + m3 + '?subject=' + subject;
	}
}

//thumbnail functions

function toClipboard(elm) {
	$I('s'+elm.id).select(); //select the text field
	document.execCommand('Copy'); //copy the text inside the text field
}

function deleteTn(elm,confText) {
	var tnId = elm.id.replace('%20',' ');
	var tnName = tnId.substr(4,1) === '~' ? tnId.substr(5) : tnId;
	if (confirm(confText+' '+tnName+'?')) {
		index({delTn:tnId});
	}
}

//drag functions
var theElm,posX,posY;

function dragMe(elmID,e) {
	theElm = $I(elmID); //object to drag
	if (!e) e = window.event //if ie
	posX = theElm.offsetLeft - e.clientX;
	posY = theElm.offsetTop - e.clientY;
	document.onmousemove=moveMe;
	document.onmouseup=new Function("document.onmouseup = null; document.onmousemove = null;");
	return false;
}

function moveMe(e) {
	if (!e) e = window.event //if ie
	var newPosX = posX + e.clientX;
	var newPosY = posY + e.clientY;
	newPosX = Math.max(newPosX,0);
	newPosX = Math.min(newPosX,window.innerWidth - theElm.offsetWidth)
	theElm.style.left = newPosX + "px";
	newPosY = Math.max(newPosY,0);
	newPosY = Math.min(newPosY,window.innerHeight - 26);
	theElm.style.top = newPosY + "px";
}
//end drag functions

function printNice() {
	var oriHTML = document.body.innerHTML;
	var bgColor = document.body.style.backgroundColor;
	var elms = Array.from($Q("*")); //nodelist to array
	var regexNP = /noPrint/;
	var regexSB = /scrollBox/;

	document.body.style.backgroundColor = "white";
	elms.forEach(function(elm) {
		if (elm.tagName === "BUTTON" || regexNP.test(elm.className)) {
			elm.style.display = "none";
		}
		if (regexSB.test(elm.className)) {
			elm.style.position = "static";
			elm.style.overflow = "visible";
		}
	});
	window.print();
	document.body.innerHTML = oriHTML;
	document.body.style.backgroundColor = bgColor;
	return false;
}

//drag time functions (week and day view)
var hot, start, last, color, dragged=[];

function dragTime() {
	var varTags = $Q("var");
	color = varTags[0].style.backgroundColor;
	for (var i = (varTags.length - 1);i >= 0;i--) {
		varTags[i].onmousedown = starttime;
		varTags[i].onmouseover = dragtime;
		varTags[i].onmouseup = endtime;
	}
}

function starttime() {
	start = last = this.id;
	this.style.backgroundColor = "#DDDDDD";
	dragged.push(this); //remember colored elements
	hot = true;
}

function dragtime() {
	if (hot) {
		if (this.id < last) {
			$I(last).style.backgroundColor = color;
		} else {
			this.style.backgroundColor = "#DDDDDD";
			dragged.push(this); //remember colored elements
		}
		last = this.id;
	}
}

function endtime() {
	hot = false;
	if (last >= start) {
		var sdate = start.substr(7);
		var stime = start.substr(1,2) + ":" + start.substr(4,2);
		var hrs = parseInt(last.substr(1,2),10);
		var mins = parseInt(last.substr(4,2),10) + dwTimeSlot;
		if (mins >= 60) { hrs++; mins -= 60; }
		if (hrs == 24) { hrs--; mins = 59; }
		var etime = String("0" + hrs).slice(-2) + ":" + String("0" + mins).slice(-2);
		if (start.substr(0,1) == 'a') { etime ="23:59"; } //all day
		newE(sdate,cid,stime,etime);
	}
	dragged.forEach (function(value) { value.style.backgroundColor = color; });
	start = last = null;
}

//pop-up div functions

function getPopDiv(divID){
	var popobj = $I(divID);
	if (!popobj) { //object not yet existing
		popobj = document.createElement("div");
		popobj.id = divID;
		document.body.appendChild(popobj);
	}
	return popobj;
}

//==== hover box pop-up function - static ====

function pop(parent,popContent,popClass,maxChars){
	var boxWidth = "auto", xOffL, xOffR;
	
	var lines = popContent.split("<br>") //split on <br>
	lines.forEach(function(value) {
		if (value.replace(/(<([^>]+)>)/ig,"").length > maxChars) { boxWidth = (5 * maxChars) + "px"; }
	});
	var popobj = getPopDiv("htmlPop");
	popobj.style.width = boxWidth;
	popobj.className = popClass;
	popobj.innerHTML = popContent;

	//compute coordinates
	popobj.style.maxHeight = null; //reset max-height
	var evtRect = parent.getBoundingClientRect(); //size and position relative to viewport
	if (evtRect.width < 20) { //mini-squares or symbols
		xOffR = 0;
		xOffL = evtRect.width;
	} else {
		xOffR = xOffL = evtRect.width * (winXS === '1' ? 0.5 : 0.3);
	}

	popobj.style.left = (evtRect.left + popobj.offsetWidth + xOffR) < (window.innerWidth - 20) ? evtRect.left + xOffR + "px" : (evtRect.left - popobj.offsetWidth + xOffL) + "px";
	if ((evtRect.bottom + popobj.offsetHeight) < window.innerHeight || evtRect.top < (window.innerHeight / 2)) { //show box under event title
		popobj.style.maxHeight = (window.innerHeight - evtRect.bottom - 20) + "px";
		popobj.style.top = evtRect.bottom + "px";
	} else { //show box above event title
		popobj.style.maxHeight = (evtRect.top - 20) + "px";
		popobj.style.top = (evtRect.top - popobj.offsetHeight) + "px";
	}
	popobj.style.visibility = "visible";
	popobj.onmouseover = function() { popobj.style.visibility = "visible"; };
	parent.onmouseout = popobj.onmouseout = function() { popobj.style.visibility = "hidden"; };
}

//==== hover box pop-up function - moving ====

function popM(parent,popContent){
	var maxLineLen = 120; //default max line length in hover box
	var offsetX = -60, offsetY = 16; //x, y offset of box
	var boxWidth = "auto";
	
	var lines = popContent.split("<br>") //split on <br>
	for (var i=0,len=lines.length; i<len; i++) {
		if (lines[i].replace(/(<([^>]+)>)/ig,"").length > maxLineLen) { boxWidth = (5 * maxLineLen) + "px"; }
	}
	var popobj = getPopDiv("htmlPop");
	popobj.style.width = boxWidth;
	popobj.className = 'normal';
	popobj.innerHTML = popContent;
	popobj.style.visibility = "visible";
	parent.onmousemove = function(e) {
		if (!e) var e = window.event; //if ie
		var rightedge = window.innerWidth-20; //window edge
		var bottomedge = window.innerHeight-10;

		if (rightedge - cursorX(e) - offsetX < popobj.offsetWidth) { //if pop hits the right edge
			popobj.style.left = rightedge - popobj.offsetWidth - 5 + "px"; //don't move it
		} else {
			popobj.style.left = (cursorX(e) < -offsetX) ? "5px" : cursorX(e) + offsetX + "px"; //move it with mouse
		}
		if (bottomedge-cursorY(e) - offsetY < popobj.offsetHeight) { //if pop hits the bottom edge
			popobj.style.top = cursorY(e) - popobj.offsetHeight - (offsetY/2) + "px"; //flip it up
		} else {
			popobj.style.top = cursorY(e) + offsetY + "px"; //move it with mouse
		}
	};
	parent.onmouseout = function() {
		parent.onmousemove = null;
		popobj.style.visibility = "hidden";
	};
	return;
}

//==== compatibility functions IE11 ====

function cursorX(e) { //get cursor X-position relative to page
	return e.pageX ? e.pageX : e.clientX + document.documentElement.scrollLeft + document.body.scrollLeft;
}
function cursorY(e) { //get cursor Y-position relative to page
	return e.pageY ? e.pageY : e.clientY + document.documentElement.scrollTop + document.body.scrollTop;
}