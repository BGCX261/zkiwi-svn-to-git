// JavaScript Document
function onSubmitForm(formName,url)
{ 
	var theForm = document.getElementById(formName);
	theForm.action = url;
	multipleSelectOnSubmit();
	theForm.submit();	
	
	//javascript:$('#fileUploadgrowl').fileUploadStart();
	return true;
	
	
}

function checkCheckBox(){
	var theForm = document.appForm;
	if (theForm.elements[i].name=='cid[]')
	{
        theForm.elements[i].checked = checked;
        if(theForm.elements[i].checked = true){
        	window.alert(this.value);
        }
    }
}

var checked=false;
function checkedAll() {
    var theForm = document.appForm;
    if (checked == false)
    {
    	checked = true;
    	//theForm.checkValue.value = theForm.elements.length;
    }
    else
    {
    	checked = false;
    	//theForm.checkValue.value = 0;
    }
    
    var countCheckBox = 0;
    for (i=0; i<theForm.elements.length; i++) {
        if (theForm.elements[i].name=='cid[]'){
            theForm.elements[i].checked = checked;
            countCheckBox++;
        }
    }
    
    if (checked == true)
    {
    	theForm.checkValue.value = countCheckBox;
    }
    else
    {    	
    	theForm.checkValue.value = 0;
    }
}

$(document).ready( function(){
	$(".hori").mouseover( function() { $(this).addClass("over") });
	$(".hori").mouseout( function() { $(this).removeClass("over") });
	$(".hori").click( function(){ 
		$(this).find(".check").each(function(){ this.checked = !this.checked;});
	});

	$("#reset").click( function(){ 
		document.getElementById('keyword').value='';
		$.cookie("keyword", null);
		location.reload(true);
    });

	$("#keyword").change(function(){		
		keyword=this.value;
		$.cookie("keyword",keyword,{ expires: 1 });
		document.location.reload();
	});						   
	$("#keyword").val($.cookie("keyword"));

	
	$("#status").change(function(){		
		status=this.value;
		$.cookie("status",status,{ expires: 7 });
		document.location.reload();
	});						   
	$("#status").val($.cookie("status"));
	
	$("#featured").change(function(){		
		featured=this.value;
		$.cookie("featured",featured,{ expires: 7 });
		document.location.reload();
	});						   
	$("#featured").val($.cookie("featured"));
 
	
	$("#special").change(function(){		
		special=this.value;
		$.cookie("special",special,{ expires: 7 });
		document.location.reload();
	});						   
	$("#special").val($.cookie("special"));
	 
	
	$( "#start_date" ).datepicker({
		numberOfMonths: 1,  dateFormat: 'yy/mm/dd',
	});
	$( "#finish_date" ).datepicker({
		numberOfMonths: 1,  dateFormat: 'yy/mm/dd',
	});
	
});


function BrowseServer( startupPath, functionData ){
	var finder = new CKFinder();
	finder.basePath = 'public/templates/admin/system/ckfinder/'; //Ä�Æ°á»�ng path nÆ¡i Ä‘áº·t ckfinder
	finder.startupPath = startupPath; //Ä�Æ°á»�ng path hiá»‡n sáºµn cho user chá»�n file
	finder.selectActionFunction = SetFileField; // hÃ m sáº½ Ä‘Æ°á»£c gá»�i khi 1 file Ä‘Æ°á»£c chá»�n
	finder.selectActionData = functionData; //id cá»§a text field cáº§n hiá»‡n Ä‘á»‹a chá»‰ hÃ¬nh
	//finder.selectThumbnailActionFunction = ShowThumbnails; //hÃ m sáº½ Ä‘Æ°á»£c gá»�i khi 1 file thumnail Ä‘Æ°á»£c chá»�n	
	finder.popup(); // Báº­t cá»­a sá»• CKFinder
} //BrowseServer

function SetFileField( fileUrl, data ){
	document.getElementById( data["selectActionData"] ).value = fileUrl;
}

function ShowThumbnails( fileUrl, data ){	
	var sFileName = this.getSelectedFile().name; // this = CKFinderAPI
	document.getElementById( 'thumbnails' ).innerHTML +=
	'<div class="thumb">' +
	'<img src="' + fileUrl + '" />' +
	'<div class="caption">' +
	'<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
	'</div>' +
	'</div>';
	document.getElementById( 'preview' ).style.display = "";
	return false; // náº¿u lÃ  true thÃ¬ ckfinder sáº½ tá»± Ä‘Ã³ng láº¡i khi 1 file thumnail Ä‘Æ°á»£c chá»�n
}



