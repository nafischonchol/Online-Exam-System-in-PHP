$( document ).ready(function() {
	//for User Registration
    $("#regSubmit").click(function(){

    	
    	var name=$("#name").val();
    	var username=$("#username").val();
    	var pass=$("#pass").val();
    	var email=$("#email").val();

    	
    	var dataString="name="+name+"&username="+username+"&pass="+pass+"&email="+email;

    	$.ajax({
    		type:"POST",
    		url: "getRegister.php",
    		data: dataString,
    		success:function(data)
    		{
    			$("#state").html(data);
    			
    		}
    		
    	});
    	return false;
    });// end regSubmit click function

    	//for login user
    $("#login").click(function(){
    	
    	var email=$("#email").val();
    	var pass=$("#pass").val();
    	var info="email="+email+"&pass="+pass;
    	//alert(info);


    	$.ajax({
    		type:"POST",
    		url: "getLogin.php",
    		data: info,
    		success:function(data)
    		{
    			if($.trim(data)=="ok")
    			{

    				window.location="exam.php";

    			}
    			else
    			{
    				$("#error").html(data);

    			}
    			
    		}
    		
    	});
    	return false;
    });//end login click

    $("#update").click(function(){
        
        var name=$("#name").val();
        var username=$("#username").val();
        var email=$("#email").val();
        var pass=$("#pass").val();
        var userId=$("#userId").val();
        var updateInfo="name="+name+"&username="+username+"&email="+email+"&pass="+pass+"&userId="+userId;
        //alert(updateInfo);
        

        $.ajax({
            type:"POST",
            url: "updateUser.php",
            data: updateInfo,
            success:function(data)
            {
                $("#mgs").html(data);
            }
            
        });
        return false;
    });//end update profile click


});//end document ready

