/*
    This file is part of FoxyIDX.

    Foobar is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    FoxyIDX is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Foobar.  If not, see <http://www.gnu.org/licenses/>.

    Author: Brian P Johnson
    Contact: brian@pjohnson.info
*/

var httpReq = createRequestObject();

var reqString = "";
var requestQueue = new Array();

var thisRequest = null;
var thisElement = "MatricesDiv";
var thisMask = 0;

function createRequestObject(){
	
	var newMask = document.createElement('div');
	newMask.style.width="100%";
	newMask.style.height="100%";
	newMask.style.zIndex="1000";
	newMask.style.position="fixed";
        newMask.style.top="0px";
        newMask.style.left="0px";
        newMask.style.background="black";
        newMask.style.filter="alpha(opacity=80)";
        newMask.style.opacity="0.8";
        newMask.style.font-style="bold";
        newMask.style.visibility="hidden";
	document.appendChild(newMask);

        var req;
        if(window.XMLHttpRequest){
                req = new XMLHttpRequest();
        }
        else if(window.ActiveXObject){
                req = new ActiveXObject("Microsoft.XMLHTTP");
        }
        else{
                alert('Upgrade your browser'); 
        }
        return req;
}

function processRequests() {

        thisRequest = false;
        for (key in requestQueue) {
                thisElement = requestQueue[key][0];
                thisRequest = requestQueue[key][1];
                var date = new Date();
                thisRequest += "&sID="+readSessionData();
                thisRequest += "&time="+date.getTime();
                if(requestQueue[key][2] > thisMask) {
                        thisMask = requestQueue[key][2];
                }
                requestQueue.splice(key, 1);
                break;
        }
        if(!thisRequest) {
                return false;
        }
        if(thisMask > 0) Mask();
        else unMask();

        if(thisRequest) {
                httpReq.open("POST", thisRequest, true);
                httpReq.onreadystatechange = showHTML;
                httpReq.send("");
        }
}

/*
function example() {
	document.getElementById('chooseSheet').style.visibility = 'hidden';
        reqString = "./getMatricesHTML.php?RateSheetID="+RateSheetID+"";
        requestQueue[0] = Array('MatricesDiv', reqString, 1);
}
*/
/*
	var x = getOffset(e).left;
        var y = getOffset(e).top;

*/

function getOffset( el ) {
    var _x = 0;
    var _y = 0;
    while( el && !isNaN( el.offsetLeft ) && !isNaN( el.offsetTop ) ) {
        _x += el.offsetLeft - el.scrollLeft;
        _y += el.offsetTop - el.scrollTop;
        el = el.parentNode;
    }
    return { top: _y, left: _x };
}

function showHTML() {
        if(httpReq.readyState == 4) {
                htmlOut = httpReq.responseText;
                if (window.ActiveXObject)
                {
                        document.getElementById(thisElement).innerHTML=htmlOut;
                        document.getElementById(thisElement).style.visibility = "visible";
                }
                else if (document.implementation && document.implementation.createDocument)
                {
                        document.getElementById(thisElement).innerHTML = htmlOut;
                        document.getElementById(thisElement).style.visibility = "visible";
                }
                if(requestQueue.length > 0) processRequests();
                else {
                        if(thisMask == 1) unMask();
                }
        }
}

function Mask() {
        document.getElementById('mask').style.visibility = 'visible';
        document.getElementById('spinner').style.visibility = 'visible';
}

function unMask() {
        thisMask = 0;
        document.getElementById('mask').style.visibility = 'hidden';
        document.getElementById('spinner').style.visibility = 'hidden';
}

function quickChangeDone() {
        responseDone = true;
        if(verifyColorChange) {
                if(thisElement) thisElement.style.backgroundColor = confirmColor;
        }
}

function changecss(myclass, element, value) {
        if (! document.styleSheets ) {
                alert('no css');
                return;
        }
        for (var i = 0; i < document.styleSheets.length; i++) {
                if(document.styleSheets[i].cssRules != null) {
                        for (var j = 0; j < document.styleSheets[i].cssRules.length; j++) {
                                var thisClass = document.styleSheets[i].cssRules[j].selectorText;
                                //document.getElementById('response').innerHTML += thisClass+"</br/>";
                                if(!(typeof thisClass === 'undefined')) {
                                        if(thisClass === myclass) {
                                                document.styleSheets[i].cssRules[j].style[element] = value;
                                        }
                                }
                        }
                }
                else if(document.styleSheets[i].rules != null)  {
                        for (var j = 0; j < document.styleSheets[i].rules.length; j++) {
                                var thisClass = document.styleSheets[i].rules[j].selectorText;
                                if(!(typeof thisClass === 'undefined')) {
                                        if(thisClass === myclass) {
                                                document.styleSheets[i].rules[j].style[element] = value;
                                        }
                                }
                        }
                }
        }
}

