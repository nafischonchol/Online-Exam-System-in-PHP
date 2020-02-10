$( document ).ready(function() {
    $("#submit").click(function(){
    	var button=$("#submit").val();

    	$.ajax({
    		type:"POST",
    		url: "try.php",
    		data: name,
    		success:function(data)
    		{
    			$("#state").html(data);
    			alert(data);
    		}
    		
    	});
    	return false;

    });
});