$("#btn-Nuevo").on("click",function(){
	location="form.php";	
});

  $(".form").on("submit",function(e)
   {  e.preventDefault();
        
       $.ajax({
            type:'post',
            url:'../principal.php',
            data: {"fun" : 'ins',"clas" : clas(),'datos':form()},
            success:function(msg)
            {
                alert(msg);
                window.location="index.html";
            }
        });


   });