$(document).ready(function(){	
	$(".LinkProyectos").click(function(){
		$.get('Paginas/Proyectos.php',{},
	    function(data)
	    {	   
	    	$("#dashboardContent").css("display","none");  
	      	$('#ContenidoPrincipal').html(data);  	      
	    }); 
	});
	$(".LinkProblemas").click(function(){
		$.get('Paginas/Problems.php',{},
	    function(data)
	    {	   
	    	$("#dashboardContent").css("display","none");  
	      	$('#ContenidoPrincipal').html(data);  	      
	    }); 
	});
	$(".LinkChangeOrders").click(function(){
		$.get('Paginas/ChangeOrders.php',{},
	    function(data)
	    {	   
	    	$("#dashboardContent").css("display","none");  
	      	$('#ContenidoPrincipal').html(data);  	      
	    }); 
	});
	$(".LinkSettings").click(function(){
		$.get('Paginas/Settings.php',{},
	    function(data)
	    {	   
	    	$("#dashboardContent").css("display","none");  
	      	$('#ContenidoPrincipal').html(data);  	      
	    }); 
	});
	$(".LinkDirectorio").click(function(){
		$.get('Paginas/Directorio.php',{},
	    function(data)
	    {	   
	    	$("#dashboardContent").css("display","none");  
	      	$('#ContenidoPrincipal').html(data);  	      
	    }); 
	});
	$(".LinktoDoList").click(function(){
		$.get('Paginas/toDoList.php',{},
	    function(data)
	    {	   
	    	$("#dashboardContent").css("display","none");  
	      	$('#ContenidoPrincipal').html(data);  	      
	    }); 
	});

});