var notify = function(){
	 var reqElem = jQuery('.menu-item a');
     for(var i=0; i<reqElem.length; i++){
     	if(reqElem[i].textContent.toLowerCase() == 'requests'){
     		jQuery(reqElem[i]).css("color","#D05728");
     		jQuery(reqElem[i]).css("font-weight","bold");
     	}
     }
}
