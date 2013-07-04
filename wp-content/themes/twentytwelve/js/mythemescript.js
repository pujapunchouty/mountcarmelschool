
( function( $ ) {


	$("#searchsubmit").click(function(e){
     	 var textval=$("#s").val();	
         if((textval=="") || (textval==null))
          {     
                e.preventDefault();
		alert("Please Enter keyword");
          }
	});


 $('#forthcoming_posts li:nth-child(even)').addClass('alternate');
} )( jQuery );
