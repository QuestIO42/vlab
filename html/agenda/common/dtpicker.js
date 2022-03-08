/* -- Date / Time Picker -- */

'use strict';

//Common functions

function $I(elmId) { return document.getElementById(elmId); }

function createDiv(divId,x,y) {;
	//if not present, create picker div
	if (!$I(divId)) {
		var newNode = document.createElement("div");
		newNode.setAttribute("id", divId);
		newNode.setAttribute("style", "display: none;");
		document.body.appendChild(newNode);
	}
 	//move div to x,y and toggle display
	var xpDiv = $I(divId);
	xpDiv.className = divId; 
	xpDiv.style.position = "absolute";
	xpDiv.style.left = x + "px";
	xpDiv.style.top = y + "px";
	xpDiv.style.display = (xpDiv.style.display === "block" ? "none" : "block");
	xpDiv.style.zIndex = 100;
	return(xpDiv);
}


//Date Picker

var formName, dateFieldId, clearButton;
 
//vars dFormat, tFormat, wStart, dwStartH, dwEndH, dpMonths, dpWkdays, dpClear and dpToday must be defined outside dtpicker.js !

function dPicker(cB,dateForm,dateFieldId1,dateFieldId2) {

	var dateField1 = $I(dateFieldId1);
	var dateField2 = (dateFieldId2) ? $I(dateFieldId2) : "";
	dateFieldId = dateFieldId1;
	formName = dateForm;
	clearButton = cB;

	//compute dpicker coordinates
	var df1Rect = dateField1.getBoundingClientRect();
	var x = df1Rect.right + 22;
	var y = df1Rect.top;

	//if not present, create dpDiv at x,y and toggle display
	var dpDiv = createDiv("dpDiv",x,y);

	//get working date from dateField 1 or 2
	var dateString;
	var dt;
 
	if (dateField1.value) {
		dateString = dateField1.value;
	} else if (dateField2) {
		dateString = dateField2.value;
	}
	if (dateString) {
		var dtArray = dateString.split(/[^\d]/);
		var posY = dFormat.search("y") / 2;
		var posM = dFormat.search("m") / 2;
		var posD = dFormat.search("d") / 2;
		dt = new Date(parseInt(dtArray[posY],10), parseInt(dtArray[posM],10) - 1, parseInt(dtArray[posD],10));
	}
	if (!dateString || isNaN(dt.getTime())) { //invalid date
		dt = new Date();
	}
	refreshDP(dt.getFullYear(), dt.getMonth(), dt.getDate());
}

function refreshDP(year,month,day) { //display/refresh date picker
	var curDate = new Date();
	var today = curDate.getFullYear()+("0"+(curDate.getMonth()+1)).slice(-2)+("0"+curDate.getDate()).slice(-2);
	var TD = "<td class='dpTD' onMouseOut='this.className=\"dpTD\";' onMouseOver='this.className=\"dpTDHover\";' "; //leave open
	var html = "<table class='dpTable' cols=7>\n<tr>";
	html += "<td>" + getArrowTag(year, month, -1, "&#9664;") + "</td>\n";
	html += "<td class='dpTitle' colspan=5>" + dpMonths[month] + " " + year + "</td>\n";
	html += "<td>" + getArrowTag(year, month, 1, "&#9654;") + "</td>\n</tr>\n";
 	html += "<tr>";
  for(var i = wStart; i < wStart+7; i++) { html += "<th>" + dpWkdays[i] + "</th>\n"; }
	html += "</tr>\n<tr>";
 	curDate = new Date(year, month, 1);
  for (var i = (curDate.getDay() + 6 + (1-wStart)) % 7; i > 0; i--) { html += "<td></td>\n"; }
 	do {
		var dayNum = curDate.getDate();
		var dateString = year + ("0"+(month+1)).slice(-2) + ("0"+dayNum).slice(-2); //yyyymmdd
		var TD_onclick = " onclick=\"updateDateField('" + dateString + "');\">";
		html += TD + TD_onclick + (dayNum === day ? "<div class='dpHilight'>" + dayNum + "</div>" : dayNum) + "</td>\n";
    if ((curDate.getDay() + 6 + (1-wStart)) % 7 === 6) html += "</tr>\n<tr>"; //if EndOfWeek, start new row
		curDate.setDate(dayNum + 1); //increment the day
	} while (curDate.getDate() > 1)
  for (var i = (curDate.getDay() + 6 + (1-wStart)) % 7; i < 7; i++) { html += "<td class=out></td>\n"; }
	html += "</tr>\n<tr><td colspan=7>";
  html += "<button class='dpButton' onclick=\"updateDateField('"+today+"');\"> "+dpToday+" </button> ";
	if (clearButton != 0) {
		html += "<button class='dpButton' onclick='updateDateField();'> "+dpClear+" </button>";
	}
  html += "</td>\n</tr>\n</table>\n";
	var dpDiv = $I("dpDiv");
 	dpDiv.innerHTML = html;
	//last minute y-correction
	var dpRect = dpDiv.getBoundingClientRect();
	var dpH = dpRect.height;
	var dpB = dpRect.bottom;
	var winH = window.innerHeight;
	if (dpB > winH) {
		dpDiv.style.top = winH - dpH - 15 + "px";
	}

}

function getArrowTag(year,month,offset,label) {
	var newM = (month + 12 + offset) % 12;
	var newY = (Math.abs(newM - month) > 1) ? year + offset : year;
	return "<span class='dpArrow' onclick='refreshDP(" + newY + "," + newM + ");'>" + label + "</span>";
}

function updateDateField(yyyymmdd) {
	var dateField = $I(dateFieldId);
	var dpDiv = $I("dpDiv");
	if (yyyymmdd) {
		dateField.value = dFormat.replace ("y",yyyymmdd.substr(0,4)).replace ("m",yyyymmdd.substr(4,2)).replace ("d",yyyymmdd.substr(6,2));
		if (formName) document.forms[formName].submit();
	} else {
		dateField.value = '';
	}
	dpDiv.style.display = "none";
}


//Time Picker

function tPicker(timeFieldId) {
	var timeField = $I(timeFieldId);
	var hhmm1, hhmm2;

	//compute tpicker coordinates
	var rect = timeField.getBoundingClientRect();
	var x = rect.right + 22;
	var y = 5;

	//if not present, create tpDiv, move it to x,y and toggle display
	var tpDiv = createDiv("tpDiv",x,y);

 	//draw the tpicker table; the timeField object will receive the time
	var html='<div class="tpFrame">';
	var apm = /\s?a$/i.exec(tFormat);
	if (apm !== null) {
		var am = apm[0].replace("a","am").replace("A","AM"); 
		var pm = apm[0].replace("a","pm").replace("A","PM"); 
	}
	if (apm !== null) { html += '- '+am+' -'; }
	for (var i = dwStartH; i <= Math.min(dwEndH,23); i++) {
		if (i === dwStartH) { html += '<div class="tpAM">'; }
		if (i === 12 && (apm != null)) { html += '- '+pm+' -'; }
		if (i === 12) { html += '<div class="tpPM">'; }
		if (i === 18) { html += '<div class="tpEM">'; }
		for (var j = 0; j < 60; j += 15) {
			if (apm != null) {
				var hh = i;
				var ampm = (hh < 12) ? am : pm;
				if (hh >= 13) { hh -= 12; }
				if (hh === 0) { hh = 12; } //midnight: 12:00am (not: 0:00am)
				hhmm1 = hh + ":" + ("0"+j).slice(-2) + ampm;
				hhmm2 = ("0"+hh).slice(-2) + ":" + ("0"+j).slice(-2);
			} else {
				hhmm1 = hhmm2 = ("0"+i).slice(-2) + ":" + ("0"+j).slice(-2)
			}
			html += "<span class='tpPick' onclick=\"updateTimeField('"+timeFieldId+"', '"+hhmm1+"');\">"+hhmm2+"</span>";
			if (j<45) { html += ' '; }
		}
		html += (i === 11 || i === 17 || i === 23) ? '</div>' : '<br>';
	}
	html += '</div>';
	tpDiv.innerHTML = html;
}

function updateTimeField(timeFieldId,timeString) {
	var timeField = $I(timeFieldId);
	if (timeString) { timeField.value = timeString.replace(/^0(\d:)/,'$1'); } //trim leading zero
	var tpDiv = $I("tpDiv");
	tpDiv.style.display = "none";
	timeField.focus();
}
