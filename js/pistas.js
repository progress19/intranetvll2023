function go() {

	setTimeout(function() { 
       	$('.logo-imperial').addClass('animated flip');
       },19000);

	$('#s1_cs1').fadeOut();
	$('#s2').fadeOut();

	var id=1;
	
	$.ajax({   
        url: "buscarPistasSectorAjax",  
        data: "id=1",   
        success: function(datos){    

	        $('#s1_cs1').fadeIn();
	     
	        $('#s1_cs1').html(datos);
	        $('#s1_cs1').addClass('animated fadeIn'); 

	        $('.es').addClass('displayNone');
	        $('.en').addClass('displayNone');

	       setTimeout(function() { 
	        	$('.es').removeClass('displayNone');
	        	$('.es').addClass('animated fadeIn');
	        },0);
	        	
		    setTimeout(function() { 
	        	$('.es').addClass('displayNone');
	        	$('.en').removeClass('displayNone');
	        	$('.en').addClass('animated fadeIn');
	        },3000);

		    setTimeout(function() { 
		    	$('.en').addClass('displayNone');
		    	$('.es').removeClass('displayNone');
	        },6000);
	        	
		    setTimeout(function() { 
	        	$('.es').addClass('displayNone');
	        	$('.en').removeClass('displayNone');
	        },9000);

   	 }});

// sector II

    setTimeout(function() { 

    $.ajax({   
        url: "buscarPistasSectorAjax",  
        data: "id=2",   
        success: function(datos){  

        $('#s1_cs1').addClass('animated fadeOut');
        $('#s1_cs1').addClass('displayNone');

        $('#s2').fadeIn();   
       
       	$('#s2').addClass('animated fadeIn'); 
        $('#s2').html(datos);

        	$('#s2').fadeIn();
	     
	        $('.es').addClass('displayNone');
	        $('.en').addClass('displayNone');

	       setTimeout(function() { 
	        	$('.es').removeClass('displayNone');
	        	$('.es').addClass('animated fadeIn');
	        },0);
	        	
		    setTimeout(function() { 
	        	$('.es').addClass('displayNone');
	        	$('.en').removeClass('displayNone');
	        	$('.en').addClass('animated fadeIn');
	        },3000);

		    setTimeout(function() { 
		    	$('.en').addClass('displayNone');
		    	$('.es').removeClass('displayNone');
	        },6000);
	        	
		    setTimeout(function() { 
	        	$('.es').addClass('displayNone');
	        	$('.en').removeClass('displayNone');
	        },9000);

        } 
    });


},12000);

    // sector III

    setTimeout(function() { 

    $.ajax({   
        url: "buscarPistasSectorAjax",  
        data: "id=3",   
        success: function(datos){  

        $('#s2').addClass('animated fadeOut');
        $('#s2').addClass('displayNone');

        $('#s3').fadeIn();   
       
       	$('#s3').addClass('animated fadeIn'); 
        $('#s3').html(datos);

        	$('#s3').fadeIn();
	     
	        $('.es').addClass('displayNone');
	        $('.en').addClass('displayNone');

	       setTimeout(function() { 
	        	$('.es').removeClass('displayNone');
	        	$('.es').addClass('animated fadeIn');
	        },0);
	        	
		    setTimeout(function() { 
	        	$('.es').addClass('displayNone');
	        	$('.en').removeClass('displayNone');
	        	$('.en').addClass('animated fadeIn');
	        },3000);

		    setTimeout(function() { 
		    	$('.en').addClass('displayNone');
		    	$('.es').removeClass('displayNone');
	        },6000);
	        	
		    setTimeout(function() { 
	        	$('.es').addClass('displayNone');
	        	$('.en').removeClass('displayNone');
	        },9000);

        } 
    });


},24000);



}

function recarga(){
	setTimeout(function() {
		location.href = 'pistas'
	},36000)
	
}