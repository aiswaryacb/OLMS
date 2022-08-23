$(document).ready(function(){
    $("#update_form").validate({
        rules:{
            fname: {
                required: true,
                minlength: 3,
                maxlength:15
                
            },
            lname: {
                required: true,
                maxlength:10
            },
            dob:{
                required:true,
                lessThanToday:true
                
            },
//            DOBMonth:{
//                required:true
//            },
//            DOBYear:{
//                required:true
//            },
            gender:{
                required:true
            },
//            sid:{
//                required:true
//                
//            },
            designation:{
                required:true
            },
            dept:{
                required:true
            },
            mailid:{
                required:true,
                email:true
            },
            address:{
                required:true,
                minlength:5,
                maxlength:20
            },
            phno:{
                required:true,
                number:true,
                minlength:10,
                maxlength:10
            },
            pw:{
                required:true,
                minlength:6,
                maxlength:10
            }
        },
        messages:{
            fname:{
                   required:"First name is required",
                   minlength:"First name should have atleast 3 characters",
                   maxlength:"First name canit have more than 15 characters"
            },
            lname:{
                required:"Last name is required",
                maxlength:"Last name can't have more than 10 characters"
                
            },
            dob:{
                required:"Day is required",
               lessThanToday:"Future joins are not allowed"
                
                
            },
//            DOBMonth:{
//              required:"Month is required"  
//            },
//            DOBYear:{
//                required:"Year is required"
//            },
            gender:{
                required:"Gender is required"
            },
//            sid:{
//                required:"Staff ID is required"
//            },
            designation:{
                required:"Designation is required"
            },
            dept:{
                required:"Department id required"
                            
            },
            mailid:{
                required:"Mail Id is required",
                email:"Enter a valid email id"
            },
            address:{
                required:"Address is required",
                minlength:"Address should atleast have 5 characters",
                maxlength:"Address can't have more than 20 characters"
            },
            phno:{
                required:"Phone number is required",
                number:"Enter a valid phone number",
                minlength:"Phone number should have 10 digits",
                maxlength:"Phone number should have 10 digits"
            },
            pw:{
                required:"Password is required",
                minlength:"password should have atleast 6 characters",
                maxlength:"password can't have more than 10 characters"
            }
            
        },
        submitHandler: function(form) {
            form.submit();
        }
    });//validate function ends
});//document.ready ends
jQuery.validator.addMethod("lessThanToday", 
function(value, element) {
    var today = new Date();
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10) {
        dd='0'+dd;
    } 

    if(mm<10) {
        mm='0'+mm;
    } 
    //var date = new Date(dd,mm,yyyy);
    document.getElementById("today").value = today;

    if(!/Invalid|NaN/.test(new Date(value))){
        return new Date(value) < today;
    }
    return isNaN(value) && isNan(today) || (Number(value) < Number(today));
},'Must be less than today date');
