function IncludeFile(jsFile)
{
	document.write('<script type="text/javascript" src="'     + jsFile + '"></script>'); 
}


function trim(TRIM_VALUE){
	if(TRIM_VALUE.length < 1){
		return"";
	}

	TRIM_VALUE = RTrim(TRIM_VALUE);
	TRIM_VALUE = LTrim(TRIM_VALUE);
	if(TRIM_VALUE === ""){
		return "";
	}
	else{
		return TRIM_VALUE;
	}
} //End Function

function RTrim(VALUE){
	var w_space = String.fromCharCode(32);
	var v_length = VALUE.length;
	var strTemp = "";
	if(v_length < 0){
		return"";
	}

	var iTemp = v_length -1;

	while(iTemp > -1){
		if(VALUE.charAt(iTemp) != w_space){

			strTemp = VALUE.substring(0,iTemp +1);
			break;
		}
		iTemp = iTemp-1;
	} //End While
	return strTemp;
} //End Function

function LTrim(VALUE){
	var w_space = String.fromCharCode(32);
	if(v_length < 1){
		return"";
	}
	var v_length = VALUE.length;
	var strTemp = "";

	var iTemp = 0;

	while(iTemp < v_length){
		if(VALUE.charAt(iTemp) != w_space){
			strTemp = VALUE.substring(iTemp,v_length);
			break;
		}
		iTemp = iTemp + 1;
	} //End While
	return strTemp;
} //End Function

function validate_upload() {
	var fileval = document.getElementById("source").value;
	if (trim(fileval) === null || trim(fileval) === '') {
		alert("Please choose a file to upload.");
		document.getElementById("source").focus();
		return false;
	}
}

function doSelectAll(elem,phone) {
	var selectAll = document.getElementById(elem);
	var checked = selectAll.checked;
	for (i=0; i < phone; i++) {
		elem = document.getElementById('chkbox_' + i);
		elem.checked = checked;
	}
	var list = document.getElementsByName("selectAll");
	for (i=0; i < list.length; i++) {
		list[i].checked = checked;
	}
}

function doSelectPhone() {
	var list = document.getElementsByName("selectAll");
	for (i=0; i < list.length; i++) {
		list[i].checked = false;
	}
}
function validateAndConfirm() {
	var lid = document.getElementById("leadid");
	var lidval = lid.value;
	var lidtxt = lid.options[lid.selectedIndex].text;
	if (lidval == '_none_') {
		alert("Please select the lead to be removed.");
		return false;
	} else {
		var makesure = confirm("Please confirm that you want to delete the lead set associated with '" + lidtxt + "'.", "Yes", "No")	;
		if (makesure === true) {
			document.getElementById("leadname").value = lidtxt;
			document.forms[0].submit();
			return true;
		} else {
			return false;
		}
	}
}

function list_columns() {
	window.open('listColumns.cgi', null, 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=400,height=600,left=0,top=0');
}

function validate() {
	var lnval = document.getElementById("leadname").value;
	var fileval = document.getElementById("source").value;
	if (trim(fileval) === null || trim(fileval) === '') {
		alert("Please choose a file to upload.");
		document.getElementById("source").focus();
		return false;
	} else {
		if (trim(lnval) === null || trim(lnval) === '') {
			alert("Please enter a value for lead name.");
			document.getElementById("leadname").focus();
			return false;
		} else {
			var regex = /^[a-zA-Z0-9@#$()_+-:.]*$/;
			var verify = regex.exec(lnval);
			if (!verify) {
				//An invalid expression
				alert("You have entered an invalid value for 'lead name'. \n\
						Permissible values include alphabets, numbers, and \n\
						special characters like @ # $ ( ) _ + - : .");
				document.getElementById("leadname").focus();
				return false;
			} else {

				document.getElementById('main').style.display='block';
				document.getElementById('fade').style.display='block';
				document.getElementById("import").disabled = true;
				document.getElementById("import").value = "Please wait...";
				return true;
			}
		}
	}

}
function myfade()
{
	document.getElementById('main').style.display='block';
	document.getElementById('fade').style.display='block';
}	



function updateText() {
	var select = document.getElementById("leadid");
	var textbox = document.getElementById("leadname");
	if (select.options[select.selectedIndex].value == '_new_') {
		textbox.value = '';
		textbox.disabled = false;
	} else {
		textbox.value = select.options[select.selectedIndex].text;
		textbox.disabled = true;
	}
}

function validate_removeNumber() {
	var phone = document.getElementById("phone").value;
	if (trim(phone) === null || trim(phone) === '') {
		var makesure = confirm("You have not entered a value for phone. This will list all numbers. Continue?", "Yes", "No");
		if (makesure === true) {
			document.forms[0].submit();
			return true;
		} else {
			document.getElementById("phone").focus();
			return false;
		}
	}
}

function nofade()
{
	window.top.document.getElementById('main').style.display='none';
	window.top.document.getElementById('fade').style.display='none' ;
}
function fade(msg)
{
	if(msg){
		window.top.document.getElementById('main').innerHTML=msg;
	}else
	{
		if (window.top.document.getElementById('main').innerHTML == undefined)
		{
			window.top.document.getElementById('main').innerHTML='Please Wait ....' ;
		}
	}

	window.top.document.getElementById('main').style.display='block';
	window.top.document.getElementById('fade').style.display='block';

}


function pause(millis)
{
	var date = new Date();
	var curDate = null;

	do { curDate = new Date(); 
		alert(curDate-date) ;
	}
	while(curDate-date < millis);
} 

function fetchPrint(httpRequest,url,divid,progress)
{ 
	if (1)
	{
		if (window.ActiveXObject) httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
		else 
			httpRequest = new XMLHttpRequest();
		if(progress)  {           document.getElementById(divid).innerHTML="Processing ....  " +  "<img src='/web/images/wait.gif' >"; }
		httpRequest.open("GET", url, true);
		httpRequest.onreadystatechange= function () {printOnDiv(httpRequest,url,divid); } ;
		httpRequest.setRequestHeader('X_REQUESTED_WITH', 'XMLHttpRequest');	
		httpRequest.send(null);
	}
	else alert("Error in processing ");
}

function fetchPrintAlways(httpRequest,url,divid,progress,delay)
{ 

	delay = (delay === null) ? 10000 : delay;

	if (1)
	{
		if (window.ActiveXObject) httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
		else 
			httpRequest = new XMLHttpRequest();
		if(progress == 1)  {           document.getElementById(divid).innerHTML="Processing ....  " +  "<img src='/web/images/wait.gif' >"; }
		httpRequest.open("GET", url, true);
		httpRequest.onreadystatechange= function () {printOnDivAlways(httpRequest,url,divid,delay); } ;
		httpRequest.setRequestHeader('X_REQUESTED_WITH', 'XMLHttpRequest');	
		httpRequest.send(null);
	}
	else alert("Error in processing ");
}

function printOnDivAlways(httpRequest,url,divid,delay)
{ 

	delay = (delay === null) ? 10000 : delay;
	if (httpRequest.readyState == 4)     {

		if(httpRequest.status==200){

			//	if(progress == 'progress')  {      document.getElementById(divid).innerHTML="<img src=\"treenode_expand_minus.gif\"  onclick=\"fetchPrint(url,divid);\"  >"; }
			document.getElementById(divid).innerHTML=httpRequest.responseText;
			var param="'"+divid+"'" + ',' +"'" + url  +"'" + ','+"'" + divid +"'"   + ','+"'" + 0 +"'" + ','+"'" + delay +"'"   ;
			var temp = setTimeout('fetchPrintAlways('+ param+ ')',delay); 
					}
					else  {  document.busy=0;  alert("Error loading page\n"+ httpRequest.status +":"+ httpRequest.statusText);}
					}

					}



					function fetchExecuteAlways(httpRequest,url,divid,progress,delay)
					{ 

					delay = (delay === null) ? 10000 : delay;

					if (1)
					{
					if (window.ActiveXObject) httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
					else 
					httpRequest = new XMLHttpRequest();
					if(progress == 1)  {           document.getElementById(divid).innerHTML="Processing ....  " +  "<img src='/web/images/wait.gif' >"; }
					httpRequest.open("GET", url, true);
					httpRequest.onreadystatechange= function () { executeOnDivAlways(httpRequest,url,divid,delay); } ;
					httpRequest.setRequestHeader('X_REQUESTED_WITH', 'XMLHttpRequest');	
					httpRequest.send(null);
					}
					else alert("Error in processing ");
					}

function executeOnDivAlways(httpRequest,url,divid,delay)
{ 

	delay = (delay === null) ? 10000 : delay;
	if (httpRequest.readyState == 4)     {

		if(httpRequest.status==200){

			//	if(progress == 'progress')  {      document.getElementById(divid).innerHTML="<img src=\"treenode_expand_minus.gif\"  onclick=\"fetchPrint(url,divid);\"  >"; }
			//	document.getElementById(divid).innerHTML=httpRequest.responseText;
			//	document.getElementById(divid).innerHTML=httpRequest.responseText;
			try {
				eval(httpRequest.responseText) ;
			}catch (e) 
			{

			}		

			var param="'"+divid+"'" + ',' +"'" + url  +"'" + ','+"'" + divid +"'"  + ','+"'" + 0 +"'" + ','+"'" + delay +"'"    ;
			var temp = setTimeout('fetchExecuteAlways('+ param+ ')',delay); 
					}
					else  {  document.busy=0;  alert("Error loading page\n"+ httpRequest.status +":"+ httpRequest.statusText);}
					}

					}




					function printOnDiv(httpRequest,url,divid)
					{ 
					if (httpRequest.readyState == 4)     {

					if(httpRequest.status==200){

					//	if(progress == 'progress')  {      document.getElementById(divid).innerHTML="<img src=\"treenode_expand_minus.gif\"  onclick=\"fetchPrint(url,divid);\"  >"; }
					document.getElementById(divid).innerHTML=httpRequest.responseText;
					//			var param="'"+divid+"'" + ',' +"'" + url  +"'" + ','+"'" + divid +"'" ;
					//		var temp = setTimeout('fetchPrint('+ param+ ')',10000); 
					}
					else  {  document.busy=0;  alert("Error loading page\n"+  url  + httpRequest.status +":"+ httpRequest.statusText);}
					}

					}

function processRequest(str)
{
	if (httpRequest.readyState == 4)     {

		if(httpRequest.status==200){

			//alert(document.getElementByTagName('divid').length);
			document.getElementById("img_"+ str ).innerHTML="<img src=\"treenode_expand_minus.gif\"  onclick=\"doit2('" + str + "');\"  >";
			// var  tt=httpRequest.responseText;
			// var  tt1=httpRequest.responseText;

			// if(tt  = /Authentication/)
			//{
			//	alert(tt1);
			//document.getElementById("print_" + str ).innerHTML="";
			//}
			//else{
			//alert("sachin"); 
			document.getElementById("print_" + str ).innerHTML=httpRequest.responseText;
			// }
		}
		else  {   alert("Error loading page\n"+ httpRequest.status +":"+ httpRequest.statusText);}
	}
}



function addEvent(elementid,divid)
{
	var new1 = document.getElementById(elementid).value ;
	var old1 = document.getElementById(divid).innerHTML;
	if (new1 === '')
	{
		return 0 ;
	}
	var date = new Date();		
	document.getElementById(divid).innerHTML= date + new1 + '<br>' + old1 ;	
	return 0 ; 	
}   

function saveOnServer(httpRequest,url,divid)
{
	var msg=document.getElementById(divid).innerHTML ;
	url=url + '&msg=' + msg ;
	if (1)
	{
		if (window.ActiveXObject) httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
		else 
			httpRequest = new XMLHttpRequest();
		// document.getElementById(divid).innerHTML="Processing ....  " +  "<img src='/web/images/wait.gif' >";
		httpRequest.open("GET", url, true);
		httpRequest.onreadystatechange= function () {printOnNoDiv(httpRequest,url,divid); } ;
		httpRequest.send(null);
	}
	else alert("Error in processing ");
}
function printOnNoDiv(httpRequest,url,divid)
{ 
	if (httpRequest.readyState == 4)     {

		if(httpRequest.status !=200){

			//  document.getElementById(divid).innerHTML="<img src=\"treenode_expand_minus.gif\"  onclick=\"fetchPrint(url,divid);\"  >";
			//document.getElementById(divid).innerHTML=httpRequest.responseText;
			document.busy=0;  alert("Error loading page\n"+ httpRequest.status +":"+ httpRequest.statusText);}
	}
}


function cleanDiv(divid)
{
	document.getElementById(divid).innerHTML='';
}

function checkChecked(id,oid)
{
	/*	try {
		alert  ( document.getElementById(id).checked  )  ;
		} catch(e)
		{

		}
		*/	
	if ( document.getElementById(id).checked === false ) 
	{
		document.getElementById(oid).innerHTML='';
		//	alert (oid) ;	
		return false ;
	}else
	{
		//		alert ('true') ;	
		return true ;
	}

}


function createHidIn(name,value)
{
	//alert('test');
	//aTextBox=document.createElement('input');
	//aTextBox.type = 'hidden';
	//aTextBox.name = name ;
	//aTextBox.value = value;
	//return true ;

	var mytext=document.createTextNode(name) ;
	mytext.type='hidden' ;	
	document.getElementById("downloadall").appendChild(mytext) ;



}




function appendElement(name , value , id )
{
	if ( document.getElementById(id).checked === false )
	{





		if (name == 'asterisk')
		{
			return true ;
		}
		if (name == 'fnames')
		{

			//	alert(document.getElementById(name).value);
			//	alert(document.getElementById('asterisk').value);

			var tmp2 = Array();
			var tmp = Array();
			tmp=document.getElementById(name).value.split(",") ;
			tmp2=document.getElementById('asterisk').value.split(",") ;
			//	alert (" Trying removing  " + name + 'as' + value) ;
			document.getElementById(name).value='';
			document.getElementById('asterisk').value='';
			for (var i=0;i<tmp.length; i++)
			{
				if (tmp[i] != value)
				{

					if (document.getElementById(name).value === '')
					{
						document.getElementById(name).value=tmp[i] ;
						document.getElementById('asterisk').value=tmp2[i] ;
					}else
					{
						document.getElementById(name).value=document.getElementById(name).value + ',' + tmp[i] ;
						document.getElementById('asterisk').value=document.getElementById('asterisk').value + ',' + tmp2[i] ;
					}


				}
			}

		}
		//	alert(document.getElementById(name).value.split(",")) ;

		return false ;
	}else
	{
		//alert ("adding " + name + 'as' + value) ;
		if (document.getElementById(name).value === '')
		{
			document.getElementById(name).value= value ;
		}else
		{	
			document.getElementById(name).value=document.getElementById(name).value + ',' + value ;
		}
		//	alert(document.getElementById(name).value);
		return true ;
	}

}

function submitit(formname){
	document.forms[formname].elements['f1'].value=document.getElementById('fnames').value;
	document.forms[formname].elements['a1'].value=document.getElementById('asterisk').value;
	document.forms[formname].elements['ingain'].value=document.getElementById('input_gain').value;
	document.forms[formname].elements['outgain'].value=document.getElementById('output_gain').value;


	var fmObj=document.getElementById(formname);
	fmObj.submit();
	return true;

}


function checkAll(field)
{

	var obj=document.forms ;
	var objlen=obj.length ;


	//	alert (objlen) ;


	for (var i = 0; i < objlen; i++)
	{
		var objele=obj[i].elements ;
		var objelelen=objele.length ;
		for (var j = 0 ; j < objelelen ; j++ ) 
		{
			if (objele[j].type == 'checkbox')  
			{
				objele[j].checked = 'true' ;	
				try {
					objele[j].onclick() ;	
				} catch (e) 
				{

				}

			}	

		}
		//	alert (i) ;
		//	alert(obj[i].elements.type) ;
		//	field[i].checked = true ;
	}
}









function uncheckAll(field)
{



	var obj=document.forms ;
	var objlen=obj.length ;

	for (var i = 0; i < objlen; i++)
	{
		var objele=obj[i].elements ;
		var objelelen=objele.length ;
		for (var j = 0 ; j < objelelen ; j++ ) 
		{
			if (objele[j].type == 'checkbox')  
			{
				objele[j].checked =false ;	
				try {
					objele[j].onclick() ;	
				} catch(e)
				{

				}

			}
		}
		//	alert (i) ;
		//	alert(obj[i].elements.type) ;

	}
}





function IsNumeric(sText)

{
	var ValidChars = "0123456789.";
	var IsNumber=true;
	var Char;


	for (i = 0; i < sText.length && IsNumber === true; i++) 
	{ 
		Char = sText.charAt(i); 
		if (ValidChars.indexOf(Char) == -1) 
		{
			IsNumber = false;
		}
	}
	return IsNumber;

}






var Notifier=new function(){
	// real alert function placeholder
	this._alert=null;
	// return Notifier object methods
	return {
		// m=message,c=classname
notify:
		function(m,c){
			// we may consider adding frames support
			var w=this.main;
			// shortcut to document
			var d=this.main.document;
			// canvas, window width and window height
			var r=d.documentElement;
			var ww=w.innerWidth?w.innerWidth+w.pageXOffset:r.clientWidth+r.scrollLeft;
			var wh=w.innerHeight?w.innerHeight+w.pageYOffset:r.clientHeight+r.scrollTop;
			// create a block element
			var b=d.createElement('div');
			b.id='MessageDiv';
			b.className=c||'';
			b.style.cssText='top:-9999px;left:-9999px;position:absolute;white-space:nowrap;background:#FFFF92; ';
			// classname not passed, set defaults
			if(b.className.length===0){
				b.style.margin='0px 0px';
				b.style.padding='8px 8px';
				b.style.border='1px solid #f00';
				b.style.backgroundColor='#fc0';
			}
			// insert block in to body
			b=d.body.insertBefore(b,d.body.firstChild);
			// write HTML fragment to it
			b.innerHTML=m;
			// save width/height before hiding
			var bw=b.offsetWidth;
			var bh=b.offsetHeight;
			// hide, move and then show
			b.style.display='none';
			//				b.style.top=Math.random()*(wh-bh)+'px';// random y position
			//				b.style.top=wh-bh+'px';// this is to place it to the bottom
			b.style.top='80%' ;
			//				b.style.left=Math.random()*(ww-bw)+'px';// random x position
			//				b.style.left=ww-bw+'px';// this is to place it to the right
			b.style.left='80%' ;
			b.style.display='block';
			// fadeout block if supported
			setFading(b,100,0,12000,function(){d.body.removeChild(b);});
		},
			// initialize Notifier object
init:
			function(w,s){
				// save window
				this.main=w;
				this.classname=s||'';
				// if not set yet
				if(this._alert ===null){
					// save old alert function
					//	this._alert=this.main.alert;
					// redefine alert function
					this.main.alertNotify=function(m){
						Notifier.notify(m,s) ;
					};
				}
			},
			// shutdown Notifier object
shut:
			function(){
				// if redifine set
				if(this._alert!==null){
					// restore old alert function
					this.main.alert=this._alert;
					// unset placeholder
					this._alert=null;
				}
			}
	};
};

// apply a fading effect to an object
// by applying changes to its style
// @o = object style
// @b = begin opacity
// @e = end opacity
// @d = duration (millisec)
// @f = function (optional)
function setFading(o,b,e,d,f){
	var t=setInterval(function(){
			b=stepFX(b,e,2);
			setOpacity(o,b/100);
			if(b==e)
			{ 
			if(t)
			{
			clearInterval(t);t=null;
			}
			if(typeof f=='function')
			{
			f();
			}
			}
			},d/50);
}

// set opacity for element
// @e element
// @o opacity
function setOpacity(e,o){
	// for IE
	e.style.filter='alpha(opacity='+o*100+')';
			// for others
			e.style.opacity=o;
			}

			// increment/decrement value in steps
			// checking for begin and end limits
			//@b begin
			//@e end
			//@s step
			function stepFX(b,e,s){
			return b>e?b-s>e?b-s:e:b<e?b+s<e?b+s:e:b;
			}

			var __alert=window.alert;

			//Notifier.init(window, 'notifier');


			function fetchExecute(httpRequest,url,divid,progress)
			{ 


				if (1)
				{
					if (window.ActiveXObject) httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
					else 
						httpRequest = new XMLHttpRequest();
					if(progress == 1)  {           document.getElementById(divid).innerHTML="Processing ....  " +  "<img src='/web/images/wait.gif' >"; }
					httpRequest.open("GET", url, true);
					httpRequest.onreadystatechange= function () { executeOnDiv(httpRequest,url,divid); } ;
					httpRequest.setRequestHeader('X_REQUESTED_WITH', 'XMLHttpRequest');	
					httpRequest.send(null);
				}
				else alert("Error in processing ");
			}

function executeOnDiv(httpRequest,url,divid)
{ 

	if (httpRequest.readyState == 4)     {

		if(httpRequest.status==200){

			//	if(progress == 'progress')  {      document.getElementById(divid).innerHTML="<img src=\"treenode_expand_minus.gif\"  onclick=\"fetchPrint(url,divid);\"  >"; }
			//	document.getElementById(divid).innerHTML=httpRequest.responseText;
			//	document.getElementById(divid).innerHTML=httpRequest.responseText;
			try {
				eval(httpRequest.responseText) ;
			}catch (e) 
			{

			}		

			//		var param="'"+divid+"'" + ',' +"'" + url  +"'" + ','+"'" + divid +"'"  + ','+"'" + 0 +"'" + ','+"'" + delay +"'"    ;
			//		var temp = setTimeout('fetchExecuteAlways('+ param+ ')',delay); 
		}
		else  {  document.busy=0;  alert("Error loading page\n"+ httpRequest.status +":"+ httpRequest.statusText);}
	}

}




function Browser() {

	var ua, s, i;

	this.isIE = false;
	this.isNS = false;
	this.version = null;

	ua = navigator.userAgent;

	s = "MSIE";
	if ((i = ua.indexOf(s)) >= 0) {
		this.isIE = true;
		this.version = parseFloat(ua.substr(i + s.length));
		return;
	}

	s = "Netscape6/";
	if ((i = ua.indexOf(s)) >= 0) {
		this.isNS = true;
		this.version = parseFloat(ua.substr(i + s.length));
		return;
	}

	// Treat any other "Gecko" browser as NS 6.1.

	s = "Gecko";
	if ((i = ua.indexOf(s)) >= 0) {
		this.isNS = true;
		this.version = 6.1;
		return;
	}
}

var browser = new Browser();

// Global object to hold drag information.

var dragObj = new Object();
dragObj.zIndex = 0;

function dragStart(event, id) {

	var el;
	var x, y;

	// If an element id was given, find it. Otherwise use the element being
	// clicked on.

	if (id)
		dragObj.elNode = document.getElementById(id);
	else {
		if (browser.isIE)
			dragObj.elNode = window.event.srcElement;
		if (browser.isNS)
			dragObj.elNode = event.target;

		// If this is a text node, use its parent element.

		if (dragObj.elNode.nodeType == 3)
			dragObj.elNode = dragObj.elNode.parentNode;
	}

	// Get cursor position with respect to the page.

	if (browser.isIE) {
		x = window.event.clientX + document.documentElement.scrollLeft + document.body.scrollLeft;
		y = window.event.clientY + document.documentElement.scrollTop + document.body.scrollTop;
	}
	if (browser.isNS) {
		x = event.clientX + window.scrollX;
		y = event.clientY + window.scrollY;
	}

	// Save starting positions of cursor and element.

	dragObj.cursorStartX = x;
	dragObj.cursorStartY = y;
	dragObj.elStartLeft = parseInt(dragObj.elNode.style.left, 10);
	dragObj.elStartTop = parseInt(dragObj.elNode.style.top, 10);

	if (isNaN(dragObj.elStartLeft)) dragObj.elStartLeft = 0;
	if (isNaN(dragObj.elStartTop)) dragObj.elStartTop = 0;

	// Update element's z-index.


	dragObj.zIndex++;
	dragObj.elNode.style.zIndex = dragObj.zIndex;


	// Capture mousemove and mouseup events on the page.

	if (browser.isIE) {
		document.attachEvent("onmousemove", dragGo);
		document.attachEvent("onmouseup", dragStop);
		window.event.cancelBubble = true;
		window.event.returnValue = false;
	}
	if (browser.isNS) {
		document.addEventListener("mousemove", dragGo, true);
		document.addEventListener("mouseup", dragStop, true);
		event.preventDefault();
	}
}

function dragGo(event) {

	var x, y;

	// Get cursor position with respect to the page.

	if (browser.isIE) {
		x = window.event.clientX + document.documentElement.scrollLeft + document.body.scrollLeft;
		y = window.event.clientY + document.documentElement.scrollTop + document.body.scrollTop;
	}
	if (browser.isNS) {
		x = event.clientX + window.scrollX;
		y = event.clientY + window.scrollY;
	}

	// Move drag element by the same amount the cursor has moved.

	dragObj.elNode.style.left = (dragObj.elStartLeft + x - dragObj.cursorStartX) + "px";
	dragObj.elNode.style.top = (dragObj.elStartTop + y - dragObj.cursorStartY) + "px";

	if (browser.isIE) {
		window.event.cancelBubble = true;
		window.event.returnValue = false;
	}
	if (browser.isNS)
		event.preventDefault();
}

function dragStop(event) {

	// Stop capturing mousemove and mouseup events.

	if (browser.isIE) {
		document.detachEvent("onmousemove", dragGo);
		document.detachEvent("onmouseup", dragStop);
	}
	if (browser.isNS) {
		document.removeEventListener("mousemove", dragGo, true);
		document.removeEventListener("mouseup", dragStop, true);
	}
}


function createPopupDiv(id,showCloseButton,title,width,height){

	if(!document.getElementById(id)){
		showCloseButton=(typeof (showCloseButton)!='undefined')?showCloseButton:true;

		var popupDivObj = document.createElement("DIV");


		// popupDivObj.align='center';
		popupDivObj.id=id;

		popupDivObj.className='popup';
		popupDivObj.onmousedown="dragOBJ(this,event); return false;";
		popupDivObj.style.position='absolute';


		popupDivObj.style.top='50px';
		popupDivObj.style.left='400px';
		popupDivObj.style.right='300px';
		if(width)
			popupDivObj.style.width=width+'px';
		else
			popupDivObj.style.width='400px';
		if(height)
			popupDivObj.style.height=height+'px';
		else
			popupDivObj.style.height='200px';
		popupDivObj.style.zIndex='512';
		//      popupDivObj.style.border='solid 5px #cdcdcd';
		//popupDivObj.style.zIndex='1000';

		popupDivObj.innerHTML="<div id='popupborderid' class='popupborder'  onmousedown=\"dragStart(event,'"+ id+"');\"  >&nbsp;<span class='popupicon'>&nbsp;&nbsp;&nbsp;</span> &nbsp;<span class='textpopup'>"+title+" </span><div class='popupspace'></div>";
		/*
		   if(showCloseButton) {
		   popupDivObj.innerHTML=popupDivObj.innerHTML+"<div align=right onclick='hideExtraDiv(\""+id+"\");' >&nbsp;[X]&nbsp;</div>";       
		   }
		   */
		document.body.appendChild(popupDivObj);

		return popupDivObj;
	}
}

function addOption(selDivName,text,value )
{
	var optn = document.createElement("OPTION");
	optn.text = text;
	optn.value = value;
	var selectboxObj=document.getElementById(selDivName);
	selectboxObj.options.add(optn);
}

function createSelectBox(id,divid,classname,onclickFunction){
	var selObj = document.createElement("SELECT");
	selObj.id=id;
	if(classname)
		selObj.className=classname;
	if (onclickFunction)
		selObj.onchange=function () { eval(onclickFunction) ; };

	//	selObj.onClick=function(){ eval onclickFunction	} ;

	document.getElementById(divid).appendChild(selObj);
	return selObj;
}
function hideDiv(id){    

	try{

		document.getElementById(id).style.display='none';
		// document.getElementById(id).style.visibility='hidden';
		var p1 = document.body;
		var p2= document.getElementById(id);


		//closeDiv(id,'1'); //temp off 
		p1.removeChild(p2);
	}
	catch(e){}
	//document.body.removeChild(document.getElementById(id));

}


/*
*/

var shortcutListener = {

listen: true,

	shortcut: null,
	combination: '',
	lastKeypress: 0,
	clearTimeout: 3000,

	// Keys we don't listen 
	keys: {
KEY_BACKSPACE: 8,
	       KEY_TAB:       9,
	       KEY_ENTER:    13,
	       KEY_SHIFT:    16,
	       KEY_CTRL:     17,
	       KEY_ALT:      18,
	       KEY_ESC:      27,
	       KEY_SPACE:    32,
	       KEY_LEFT:     37,
	       KEY_UP:       38,
	       KEY_RIGHT:    39,
	       KEY_DOWN:     40,
	       KEY_DELETE:   46,
	       KEY_HOME:     36,
	       KEY_END:      35,
	       KEY_PAGEUP:   33,
	       KEY_PAGEDOWN: 34
	},

init: function() {
	      if (!window.SHORTCUTS) return false;
	      this.createStatusArea();
	      this.setObserver();
	      return true ;	
      },

isInputTarget: function(e) {

		       var target = e.target || e.srcElement;
		       if (target && target.nodeName) {
			       var targetNodeName = target.nodeName.toLowerCase();
			       if (targetNodeName == "textarea" || targetNodeName == "select" ||
					       (targetNodeName == "input" && target.type &&
						(target.type.toLowerCase() == "text" ||
						 target.type.toLowerCase() == "password")) )  {
				       return true;
			       }
		       }

		       return false;
	       },

stopEvent: function(event) {
		   if (event.preventDefault) {
			   event.preventDefault();
			   event.stopPropagation();
		   } else {
			   event.returnValue = false;
			   event.cancelBubble = true;
		   }
	   },


	   // shortcut notification/status area
createStatusArea: function() {
			  var area = document.createElement('div');
			  area.setAttribute('id', 'shortcut_status');
			  area.style.display = 'none';
			  document.body.appendChild(area);
		  },

showStatus: function() {
		    document.getElementById('shortcut_status').style.display = '';
	    },

hideStatus: function() {
		    document.getElementById('shortcut_status').style.display = 'none';
		    autoCompleteSetVisible("hidden");
	    },

showCombination: function() {
			 var bar = document.getElementById('shortcut_status');
			 bar.innerHTML = this.combination;
			 this.showStatus();
		 },

		 // This method creates event observer for the whole document
		 // This is the common way of setting event observer that works 
		 // in all modern brwosers with "keypress" fix for
		 // Konqueror/Safari/KHTML borrowed from Prototype.js
setObserver: function() {
		     var name = 'keypress';
		     if (navigator.appVersion.match(/Konqueror|Safari|KHTML/) || document.detachEvent) {
			     name = 'keydown';
		     }
		     if (document.addEventListener) {
			     document.addEventListener(name, function(e) {shortcutListener.keyCollector(e); }, false);
		     } else if (document.attachEvent) {
			     document.attachEvent('on'+name, function(e) {shortcutListener.keyCollector(e) ;});
		     }
	     },

	     // Key press collector. Collects all keypresses into combination 
	     // and checks it we have action for it
keyCollector: function(e) {
		      autoCompleteSetVisible("visible");
		      // do not listen if no shortcuts defined
		      if (!window.SHORTCUTS) return false;
		      // do not listen if listener was explicitly turned off
		      if (!shortcutListener.listen) return false;
		      // leave modifiers for browser
		      if (e.altKey || e.ctrlKey || e.metaKey) return false;
		      var keyCode = e.keyCode;
		      // do not listen for Ctrl, Alt, Tab, Space, Esc and others
		      for (var key in this.keys) {
			      if (e.keyCode == this.keys[key]) return false;
		      }
		      // do not listen for functional keys
		      if (navigator.userAgent.match(/Gecko/)) {
			      if (e.keyCode >= 112 && e.keyCode <=123) return false;
		      }
		      // do not listen in input/select/textarea fields
		      if (this.isInputTarget(e)) return false;

		      // get letter pressed for different browsers


		      var code = e.which ? e.which : e.keyCode ;
		      //	alert(e + ' ' + e.which+ ' ' +e.keyCode ) ;
		      var letter ;	
		      if ((e) && (! code))
		      {

			      letter = e.toLowerCase();
		      }else
		      {		
			      letter = String.fromCharCode(code).toLowerCase();
		      }
		      if (e.shiftKey) letter = letter.toUpperCase();
		      if (shortcutListener.process(letter)) 
		      {

			      shortcutListener.stopEvent(e);
		      }
		      return true ;
	      },

	      // process keys
process: function(letter) {

		 //	alert('here 1 ' + letter);
		 if (!window.SHORTCUTS) return false;
		 if (!shortcutListener.listen) return false;
		 // if no combination then start from the begining
		 if (!shortcutListener.shortcut) { shortcutListener.shortcut = SHORTCUTS; }

		 // if unknown letter then say goodbye
		 if (!shortcutListener.shortcut[letter]) 
		 {
			 //	alert(letter) ;	
			 //	alert('here 2');
			 return false ;

		 }
		 if (typeof(shortcutListener.shortcut[letter]) == "function") {
			 shortcutListener.shortcut[letter]();
			 shortcutListener.clearCombination();

		 } else {
			 shortcutListener.shortcut = shortcutListener.shortcut[letter];
			 // append combination

			 shortcutListener.combination = shortcutListener.combination + letter;
			 if (shortcutListener.combination.length > 0) {
				 shortcutListener.showCombination();
				 // save last keypress timestamp (for autoclear)
				 var d = new Date;
				 shortcutListener.lastKeypress = d.getTime();
				 // autoclear combination in 2 seconds
				 setTimeout("shortcutListener.clearCombinationOnTimeout()", shortcutListener.clearTimeout);
			 }
		 }
		 return true;
	 },

	 // clear combination
clearCombination: function() {
			  shortcutListener.shortcut = null;
			  shortcutListener.combination = '';
			  this.hideStatus();
		  },

clearCombinationOnTimeout: function() {
				   var d = new Date;
				   // check if last keypress was earlier than (now - clearTimeout)
				   // 100ms here is used just to be sure that this will work in superfast browsers :)
				   if ((d.getTime() - shortcutListener.lastKeypress) >= (shortcutListener.clearTimeout - 100)) {
					   shortcutListener.clearCombination();
				   }
			   }
};


var SHORTCUTS = {
	'v': {
		'e': {
			'r': {
				's': {
					'i': {
						'o': {
							'n': function() { alert(acpVersion);} 
						}}}}}

	},

	'r': {
		'e': {
			'l': {
				'e': {
					'a': {
						's': {
							'e': function() { alert(acpRelease);}
						}}}}}}
	, 
		't': {
			'o': {
				'g': {
					's': {
						'c': function() { if (document.getElementById('sideboxdragarea').style.display === '') { document.getElementById('sideboxdragarea').style.display='none';} else {document.getElementById('sideboxdragarea').style.display=''; } }
					}}}}
	,
		'w': {
			'h' :{
				'o' :{
					'm' :{
						'a' :{
							'd' :{
								'e' :{
									'y' :{
										'o' :{
											'u' : function() { alert('PC Team'); }
										}}}}}}}}}

} ;

//SHORTCUTS.x={'y': { 'z' :  function () {alert('in xy')}}} ;

var autoCompleteSuggestions = new Array("version", "release");
var autoCompleteOutp;
var autoCompleteOldins;
var autoCompletePosi = -1;
var autoCompleteWords = new Array();
var autoCompleteInput;
var autoCompleteKey;
var autoCompleteLookID='';
var t ;	
function autoCompleteSetVisible(visi){
	var x = document.getElementById("autoCompleteShadow");
	if (autoCompleteLookID !== '' )
	{
		t = document.getElementById(autoCompleteLookID);
	}else
	{

		t = document.getElementsByName("text")[0];
	}

	x.style.position = 'absolute';
	x.style.top =  (autoCompleteFindPosY(t)+3)+"px";
	x.style.left = (autoCompleteFindPosX(t)-20)+"px";
	document.getElementById(autoCompleteLookID).innerHTML='';
	x.style.visibility = visi;
	t.style.visibility = visi;

	//	alert(visi) ;

	//		x.style.display="none";
}

function autoCompleteInit(){
	autoCompleteOutp = document.getElementById("autoCompleteOutput");
	window.setInterval("autoCompleteLookAt()", 100);
	autoCompleteSetVisible("hidden");
	document.onautoCompleteKeydown = autoCompleteKeygetter; //needed for Opera...
	document.onautoCompleteKeyup = autoCompleteKeyHandler;
}

function autoCompleteFindPosX(obj)
{
	var curleft = 0;
	if (obj.offsetParent){
		while (obj.offsetParent){
			curleft += obj.offsetLeft;
			obj = obj.offsetParent;
		}
	}
	else if (obj.x)
		curleft += obj.x;
	return curleft;
}

function autoCompleteFindPosY(obj)
{
	var curtop = 0;
	if (obj.offsetParent){
		curtop += obj.offsetHeight;
		while (obj.offsetParent){
			curtop += obj.offsetTop;
			obj = obj.offsetParent;
		}
	}
	else if (obj.y){
		curtop += obj.y;
		curtop += obj.height;
	}
	return curtop;
}

function autoCompleteLookAt(){
	//	var ins = document.getElementsByName("text")[0].value;
	var ins ;
	//	alert('look') ;		
	if (autoCompleteLookID !== '' )
	{
		ins = document.getElementById(autoCompleteLookID).innerHTML;
	}else
	{

		ins = document.getElementsByName("text")[0].value;
	}


	if (autoCompleteOldins == ins) return;
	else if (autoCompletePosi > -1) return; 
	else if (ins.length > 0){
		autoCompleteWords = autoCompleteGetWord(ins);
		if (autoCompleteWords.length > 0){
			autoCompleteClearOutput();
			for (var i=0;i < autoCompleteWords.length; ++i) autoCompleteAddWord (autoCompleteWords[i]);

			if (autoCompleteLookID !== '' )
			{
				autoCompleteInput = document.getElementById(autoCompleteLookID).innerHTML;
			}else
			{

				autoCompleteInput = document.getElementsByName("text")[0].value;
			}


			//				autoCompleteInput = document.getElementsByName("text")[0].value;

		}
		else{
			autoCompleteSetVisible("hidden");
			autoCompletePosi = -1;
		}
	}
	else{
		autoCompleteSetVisible("hidden");
		autoCompletePosi = -1;
	}
	autoCompleteOldins = ins;
}

function autoCompleteAddWord(word){
	var sp = document.createElement("div");
	sp.appendChild(document.createTextNode(word));
	sp.onmouseover = autoCompleteMouseHandler;
	sp.onmouseout = autoCompleteMouseHandlerOut;
	sp.onclick = autoCompleteMouseClick;
	autoCompleteOutp.appendChild(sp);
}

function autoCompleteClearOutput(){
	while (autoCompleteOutp.hasChildNodes()){
		noten=autoCompleteOutp.firstChild;
		autoCompleteOutp.removeChild(noten);
	}
	autoCompletePosi = -1;
}

function autoCompleteGetWord(beginning){
	var autoCompleteWords = new Array();
	for (var i=0;i < autoCompleteSuggestions.length; ++i){
		var j = -1;
		var correct = 1;
		while (correct == 1 && j+1 < beginning.length){
			j++;
			if (autoCompleteSuggestions[i].charAt(j) != beginning.charAt(j)) correct = 0;
		}
		j++;
		if (correct == 1) autoCompleteWords[autoCompleteWords.length] = autoCompleteSuggestions[i];
	}
	return autoCompleteWords;
}

function autoCompleteSetColor (_autoCompletePosi, _color, _forg){
	autoCompleteOutp.childNodes[_autoCompletePosi].style.background = _color;
	autoCompleteOutp.childNodes[_autoCompletePosi].style.color = _forg;
}

function autoCompleteKeygetter(event){
	if (!event && window.event) event = window.event;
	if (event) autoCompleteKey = event.autoCompleteKeyCode;
	else autoCompleteKey = event.which;
}

function autoCompleteKeyHandler(event){
	if (document.getElementById("autoCompleteShadow").style.visibility == "visible"){
		var textfield ;
		if (autoCompleteLookID !== '' )
		{
			textfield = document.getElementById(autoCompleteLookID).innerHTML;
		}else
		{
			textfield = document.getElementsByName("text")[0];
		}
		if (autoCompleteKey == 40){ //Key down
			//alert (autoCompleteWords);
			if (autoCompleteWords.length > 0 && autoCompletePosi ==  autoCompleteWords.length-1){
				if (autoCompletePosi >=0) autoCompleteSetColor(autoCompletePosi, "#fff", "black");
				else autoCompleteInput = textfield.value;
				autoCompletePosi++;
				autoCompleteSetColor(autoCompletePosi, "blue", "white");
				if (autoCompleteLookID !== '' )
				{
					textfield.innerHTML = autoCompleteOutp.childNodes[autoCompletePosi].firstChild.nodeValue;
				}else
				{
					textfield.value = autoCompleteOutp.childNodes[autoCompletePosi].firstChild.nodeValue;
				}


			}
		}
		else if (autoCompleteKey == 38){ //Key up
			if (autoCompleteWords.length > 0 && autoCompletePosi >= 0){
				if (autoCompletePosi >=1){
					autoCompleteSetColor(autoCompletePosi, "#fff", "black");
					autoCompletePosi--;
					autoCompleteSetColor(autoCompletePosi, "blue", "white");
					if (autoCompleteLookID !== '' )
					{
						textfield.innerHTML = autoCompleteOutp.childNodes[autoCompletePosi].firstChild.nodeValue;
					}else
					{
						textfield.value = autoCompleteOutp.childNodes[autoCompletePosi].firstChild.nodeValue;
					}
					//			textfield.value = autoCompleteOutp.childNodes[autoCompletePosi].firstChild.nodeValue;
				}
				else{
					if (autoCompleteLookID !== '' )
					{
						textfield.innerHTML = autoCompleteInput;
					}else
					{
						textfield.value = autoCompleteInput;
					}
					autoCompleteSetColor(autoCompletePosi, "#fff", "black");

					textfield.focus();
					autoCompletePosi--;
				}
			}
		}
		else if (autoCompleteKey == 27){ // Esc
			if (autoCompleteLookID !== '' )
			{
				textfield.innerHTML = autoCompleteInput;
			}else
			{
				textfield.value = autoCompleteInput;
			}

			//		textfield.value = autoCompleteInput;
			autoCompleteSetVisible("hidden");
			autoCompletePosi = -1;
			autoCompleteOldins = autoCompleteInput;
		}
		else if (autoCompleteKey == 8){ // Backspace
			autoCompletePosi = -1;
			autoCompleteOldins=-1;
		}
	}
} 

var autoCompleteMouseHandler=function(){
	for (var i=0; i < autoCompleteWords.length; ++i)
		autoCompleteSetColor (i, "white", "black");

	this.style.background = "blue";
	this.style.color= "white";
} ;

var autoCompleteMouseHandlerOut=function(){
	this.style.background = "white";
	this.style.color= "black";
} ;

var autoCompleteMouseClick=function(){

	if (autoCompleteLookID !== '' )
	{
		//                autoCompleteInput = document.getElementById(autoCompleteLookID).innerHTML;
		//		document.getElementById(autoCompleteLookID).innerHTML=this.firstChild.nodeValue ;
		var tmpStr=document.getElementById(autoCompleteLookID).innerHTML;
		//	var fullStr=this.firstChild.nodeValue;
		//	var scId=document.getElementById('shortcut_status') ;
		//		scId.innerHTML=fullStr ;
		//		shortcutListener.showStatus();


		for(i=tmpStr.length;i<=this.firstChild.nodeValue.length;i++)
		{
			//	alert(fullStr.charAt(i));
			//	alert("passing " + i + '  ' + this.firstChild.nodeValue.charAt(i) + ' ' + fullStr) ;
			//		shortcutListener.process(this.firstChild.nodeValue.charAt[i]) ;


			shortcutListener.keyCollector(this.firstChild.nodeValue.charAt(i)) ;
			//			scId.innerHTML=scId.innerHTML+this.firstChild.nodeValue.charAt(i) ;
		}

		//	autoCompleteSetVisible("hidden");

	}        
	autoCompleteSetVisible("hidden");
	autoCompletePosi = -1;
	autoCompleteOldins = this.firstChild.nodeValue;
} ;

function setFocusForAutoComplte(id)
{
	autoCompleteLookID=id;
}
