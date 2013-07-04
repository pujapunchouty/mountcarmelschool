
( function( $ ) {
        $(".tab_read_more").empty();
        $("#tab1").click(function(e){            
           $("#my-wordpress-tabs-1").addClass("active_tab");                                          
	   $("#my-wordpress-tabs-1").removeClass("inactive_tab");
           $("#my-wordpress-tabs-2").addClass("inactive_tab");
           $("#my-wordpress-tabs-3").addClass("inactive_tab");
           $("#tab1").addClass("selected_tab");  
           $("#tab2").removeClass("selected_tab");
	   $("#tab3").removeClass("selected_tab"); 
           $(".tab_read_more").empty();
          
         });

	$("#tab2").click(function(e){	   
           $("#my-wordpress-tabs-2").addClass("active_tab");
           $("#my-wordpress-tabs-2").removeClass("inactive_tab");
           $("#my-wordpress-tabs-1").addClass("inactive_tab");
           $("#my-wordpress-tabs-3").addClass("inactive_tab");
           $("#tab2").addClass("selected_tab");  
           $("#tab1").removeClass("selected_tab");
	   $("#tab3").removeClass("selected_tab");
           $(".tab_read_more").empty();
	   $(".tab_read_more").append("<p><a href='http://localhost/wordpress/why-mount-carmel-school/'>Read Full Message</a></p>");
         });

	$("#tab3").click(function(e){            
           $("#my-wordpress-tabs-3").addClass("active_tab");
	   $("#my-wordpress-tabs-3").removeClass("inactive_tab");
           $("#my-wordpress-tabs-2").addClass("inactive_tab");
           $("#my-wordpress-tabs-1").addClass("inactive_tab");
           $("#tab3").addClass("selected_tab");  
           $("#tab2").removeClass("selected_tab");
	   $("#tab1").removeClass("selected_tab"); 
	   $(".tab_read_more").empty();
	  $(".tab_read_more").append("<p><a href='http://localhost/wordpress/circulars-2'>Read Full Message</a></p>");
         });

	$("#searchsubmit").click(function(e){
     	 var textval=$("#s").val();	
         if((textval=="") || (textval==null))
          {     
                e.preventDefault();
		alert("Please Enter keyword");
          }
	});

 $('#forthcoming_posts li:nth-child(even)').addClass('alternate');
$('#forthcoming_circulars li:nth-child(even)').addClass('alternate');

  $('body').append('<div id="large"></div>');
  $('body').append('<div id="background"></div>');


 $("#success_msg").mouseover(function() {
   $(this).css("display","none");
});

 $("#error_msg").mouseover(function() {
   $(this).css("display","none");
});


$('#form form').submit(function(e){
e.preventDefault();
var id=$('#class_select :selected').val();
var date=$('#homework_date').val();
 if((id=="") || (id==null))
          {     
                   $("#error_msg").empty();
                   $("#error_msg").append("<p>please select class</p>")                    
                  $("#error_msg").css("display","block");
          }
	
 else if((date=="") || (date==null))
          {     
                $("#error_msg").empty();
                 $("#error_msg").append("<p>please select date</p>")                    
                  $("#error_msg").css("display","block");
          }
	
else {


 $.ajax({
  type: 'POST',
  url: 'http://localhost/wordpress/wp-admin/admin-ajax.php',
  data: {
  action: 'MyAjaxFunction',
  id: id,
  date: date, 
  },
  success: function(data, textStatus, XMLHttpRequest){
 if((data=="") || (data==null))
 {
   $("#display_homework").html('');
    $("#display_homework").append("No Result");
 }
 else
   {
    $("#display_homework").html('');
    $("#display_homework").append("Assignment ("+$('#class_select :selected').text()+")<br><br>"+data);    
   }
  },
  error: function(MLHttpRequest, textStatus, errorThrown){
  alert(errorThrown);
  }
  });


 }

});





$('#form2 form').submit(function(e){
e.preventDefault();
var id=$('#class_select2 :selected').val();
var date=$('#homework_date2').val();
var homework=$("#class_homework").val();
 if((id=="") || (id==null))
          {     
                $("#error_msg").empty();
                   $("#error_msg").append("<p>please select class</p>")                    
                  $("#error_msg").css("display","block");
          }
	
 else if((date=="") || (date==null))
          {     
             $("#error_msg").empty();
                 $("#error_msg").append("<p>please select date</p>")                    
                  $("#error_msg").css("display","block");
          }
	
else if((homework=="") || (homework==null))
          {     
                  $("#error_msg").empty();
                   $("#error_msg").append("<p>please fill homework</p>")                    
                  $("#error_msg").css("display","block");
          }
else {
$.ajax({
  type: 'POST',
  url: 'http://localhost/wordpress/wp-admin/admin-ajax.php',
  data: {
  action: 'MyAjaxFunction2',
  id: id,
  date: date,
  homework: homework,
  },
  success: function(data, textStatus, XMLHttpRequest){
                 $("#success_msg").empty();
                 $("#success_msg").append("<p>"+data+" rows effected</p>")                    
                  $("#success_msg").css("display","block");
    
  },
  error: function(MLHttpRequest, textStatus, errorThrown){
  alert(errorThrown);
  }
  });
 }

});





} )( jQuery );


jQuery(document).ready(function($){         
	
       });

function bookmarksite(title,url){
	if (window.sidebar) // firefox
         window.sidebar.addPanel(title, url, "");
       else if(window.opera && window.print){ // opera
       var elem = document.createElement('a');
        elem.setAttribute('href',url);
        elem.setAttribute('title',title);
        elem.setAttribute('rel','sidebar');
        elem.click();
}
else if(document.all)// ie
     window.external.AddFavorite(url, title);
} 

$(document).ready(function(){
  
  
  
});

