$(document).ready(function(){
    $("#ppw").validate({
        rules:{
            opw:{
                required:true,
                minlength:6,
                maxlength:15
            },
            
             npw:{
                required:true,
                minlength:6,
                maxlength:15
            }
        },
        
         messages:{
             
             opw:{
                required:"Password is required",
                minlength:"password should have atleast 6 characters",
                maxlength:"password can't have more than 15 characters"
            },
             
             npw:{
                required:"Password is required",
                minlength:"password should have atleast 6 characters",
                maxlength:"password can't have more than 15 characters"
            }
         },
         
         submitHandler: function(form) {
            form.submit();
        }
    });
});