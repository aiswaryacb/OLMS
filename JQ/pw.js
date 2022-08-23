$(document).ready(function(){
    $("#pw").validate({
        rules:{
            opw:{
                required:true,
                minlength:6,
                maxlength:10
            },
            
             npw:{
                required:true,
                minlength:6,
                maxlength:10
            }
        },
        
         messages:{
             
             opw:{
                required:"Password is required",
                minlength:"password should have atleast 6 characters",
                maxlength:"password can't have more than 10 characters"
            },
             
             npw:{
                required:"Password is required",
                minlength:"password should have atleast 6 characters",
                maxlength:"password can't have more than 10 characters"
            }
         },
         
         submitHandler: function(form) {
            form.submit();
        }
    });
});