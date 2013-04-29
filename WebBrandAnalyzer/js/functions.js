/**
 * Complex Functions
 *
 * @author Dominik Sigmund
 * @version 0.1
 */

/**
 * Main Init of Page
 * 
 *  @called index.php
 *  @since 0.1
 *  @worker none
 *  @manipulates div#content
 *  @return void
 *  @version 0.1
 *  @author Dominik Sigmund
 */
function init_page(){
	//TODO: Dashboard
}

function showLogin(){
	var ajax = getAjax();
	ajax.onreadystatechange = function()
	{
	if(ajax.readyState == 4)
		{
		e("popup").innerHTML = ajax.responseText;
		togglePopup();
		}
	};
	ajax.open("POST", "php/worker/login/showLogin.php", true);
	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajax.setRequestHeader("Content-length", 0);
	ajax.setRequestHeader("Connection", "close");
	ajax.send(null); 
}

function login(){
	letError(e("txt_user"));
	letError(e("txt_pwd"));
	var error=false;
	
	var user = e("txt_user").value;
	var password = e("txt_pwd").value;
	
	if(user==""){setError(e("txt_user"));error=true;}
	if(password==""){setError(e("txt_pwd"));error=true;}
	if(error)return;
	
	var ajax = getAjax();
	ajax.onreadystatechange = function(){
		if(ajax.readyState == 4){
			if(ajax.responseText!="0"){
				togglePopup();
				e("msg_welcome").innerHTML="Hallo, "+ajax.responseText;
			}
			else {
				//TODO: Error Message. Where?
				setError(e("txt_user"));
				setError(e("txt_pwd"));
			}
		}
	};
	var pwd = MD5(password);
	params = "name="+user+"&pwd="+pwd;
	ajax.open("POST", "php/worker/login/login.php", true);
	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajax.setRequestHeader("Content-length", params.length);
	ajax.setRequestHeader("Connection", "close");
	ajax.send(params); 
}
function showLoggedInUser(){
	var ajax = getAjax();
	ajax.onreadystatechange = function(){
		if(ajax.readyState == 4){
				e("msg_welcome").innerHTML="Hallo, "+ajax.responseText;
		}
	};
	ajax.open("POST", "php/worker/login/getLoggedInName.php", true);
	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajax.setRequestHeader("Content-length", 0);
	ajax.setRequestHeader("Connection", "close");
	ajax.send(null); 
}
function logout(){
	var ajax = getAjax();
	ajax.onreadystatechange = function()
	{
	if(ajax.readyState == 4)
		{
		e("popup").innerHTML = ajax.responseText;
		togglePopup();
		}
	};
	ajax.open("POST", "php/worker/login/logout.php", true);
	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajax.setRequestHeader("Content-length", 0);
	ajax.setRequestHeader("Connection", "close");
	ajax.send(null); 
}


function mod_not_found(module_name){
	showError("The Module "+module_name+" you were looking for, could not be found.");
}