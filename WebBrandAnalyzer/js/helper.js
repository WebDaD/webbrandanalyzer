/**
 * Helper Functions
 *
 * @author Dominik Sigmund
 * @version 0.1
 */

String.prototype.startsWith = function (str){
    return this.slice(0, str.length) == str;
  };
/**
 * Gets an Ajax Element
 * 
 *  @called function
 *  @since 0.1
 *  @worker none
 *  @manipulates none
 *  @return ajaxrequest
 *  @version 1.0
 *  @author Dominik Sigmund
 */
function getAjax(){
	var ajaxRequest;  // The variable that makes Ajax possible!	
	try
		{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
		} 
	catch (e)
		{
		// Internet Explorer Browsers
		try
			{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
			} 
		catch (e) 
			{
			try
				{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} 
			catch (e)
				{
				// Something went wrong
				showError("Your browser broke!");
				return false;
				}
			}
		}
	return ajaxRequest;
}
/**
 * Gets Element from the DOM
 * 
 *  @called function
 *  @param name ID of the Element
 *  @since 0.1
 *  @worker none
 *  @manipulates none
 *  @return element
 *  @version 1.0
 *  @author Dominik Sigmund
 */
function e(name){
	return document.getElementById(name);
}
/**
 * Gets Value of Element from the DOM
 * 
 *  @called function
 *  @param name ID of the Element
 *  @since 0.1
 *  @worker none
 *  @manipulates none
 *  @return value
 *  @version 1.0
 *  @author Dominik Sigmund
 */
function v(name){
	return document.getElementById(name).value;
}
/**
 * get Selected Element of Select
 * 
 * 
 *  @called function
 *  @since 0.1
 *  @param name The Name of the Select Element
 *  @worker none
 *  @manipulates none
 *  @return Value
 *  @version 1.2
 *  @author Dominik Sigmund
 */
function gsv(name){
	return e(name).options[e(name).selectedIndex].value;
}
/**
 * Sets Value as Selected in element
 * 
 * 
 *  @called function
 *  @since 0.1
 *  @param name The Name of the Select Element
 *  @param value The Value that will be selected
 *  @worker none
 *  @manipulates none
 *  @return Value
 *  @version 1.2
 *  @author Dominik Sigmund
 */
function sv(name, value){
	e(name).selectedIndex = value;
}
/**
 * Toogles Visibility of an Element by setting or removing CSS-Class .hidden
 * 
 *  @called function
 *  @param element element-object
 *  @since 0.1
 *  @worker none
 *  @manipulates The Element
 *  @return none
 *  @version 1.0
 *  @author Dominik Sigmund
 */
function toggle(element){
	if(hasClass(element,"hidden")){
		element.className = element.className.replace('hidden','');
	}
	else {
		element.className = element.className + " hidden";
	}
}
/**
 * Shows an Element by removing CSS-Class .hidden
 * 
 *  @called function
 *  @param element element-object
 *  @since 0.1
 *  @worker none
 *  @manipulates The Element
 *  @return none
 *  @version 1.0
 *  @author Dominik Sigmund
 */
function show(element){
	if(hasClass(element,"hidden"))element.className = element.className.replace('hidden','');
}
/**
 * Hides an Element by setting CSS-Class .hidden
 * 
 *  @called function
 *  @param element element-object
 *  @since 0.1
 *  @worker none
 *  @manipulates The Element
 *  @return none
 *  @version 1.0
 *  @author Dominik Sigmund
 */
function hide(element){
	if(!hasClass(element,"hidden"))element.className = element.className + " hidden";
}
/**
 * Checks if an Element has a Certain Class
 * 
 *  @called function
 *  @param element element-object
 *  @param cls Name of the Class
 *  @since 0.1
 *  @worker none
 *  @manipulates none
 *  @return true or false
 *  @version 1.0
 *  @author Dominik Sigmund
 */
function hasClass(element, cls){
	return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
}

function togglePopup(){
	toggle(e("page-cover"));
	toggle(e("popup"));
}
/**
 * Sets Error Class for element
 * 
 *  @called function
 *  @param object element to set Error to
 *  @since 0.1
 *  @worker none
 *  @manipulates param_element
 *  @return none
 *  @version 1.0
 *  @author Dominik Sigmund
 */
function setError(element){
	if(!hasClass(element,"error")){
	if(element.className=="")element.className = "error";
	else element.className = element.className + " error";
	}
}
/**
 * Shows an Error as Popup
 * 
 *  @called function
 *  @param message Message to Display
 *  @since 0.1
 *  @worker none
 *  @manipulates popup
 *  @return none
 *  @version 1.0
 *  @author Dominik Sigmund
 */
function showError(message){
	e("popup").innerHTML = message+"<br/><img src=\"/img/cancel.png\" id=\"btn_cancel\" class=\"button\" alt=\"Cancel\" onclick=\"btn_cancel_onclick();\"/>";
	togglePopup();
}
/**
 * Relieves Error Class from element
 * 
 *  @called function
 *  @param object element to set Error to
 *  @since 0.1
 *  @worker none
 *  @manipulates param_element
 *  @return none
 *  @version 1.0
 *  @author Dominik Sigmund
 */
function letError(element){
	if(hasClass(element,"error"))element.className = element.className.replace('error','');
}

function createCalendar(element_name){
	new JsDatePick({
		useMode:2,
		target:element_name,
		limitToToday:false,
		cellColorScheme:"orange",
		imgPath:"img/",
		dateFormat:"%d.%m.%Y"
			});
}

function setStatus(msg){
	e("msg_status").innerHTML=msg;
}

function popupError(msg){
	e("popup_error").innerHTML=msg;
}

function getValueFromField(element_id,check){
	letError(element_id);
	var val="";
	if(element_id.startsWith("dd")){
		val= gsv(element_id);
	}
	else {
		val = v(element_id);
	}
	if(val==""){
		setError(element_id);
		check=false;
		return "";
	}
	else {
		if(check){
			check=true;
		}
		else {
			check=false;
		}
		return val;
	}
}

function saveOK(){
	e("btn_save").img="/img/save.png";
}
function saveWait(){
	e("btn_save").img="/img/wait.gif";
}
function saveError(){
	e("btn_save").img="/img/error.png";
}