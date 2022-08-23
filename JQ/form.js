$(document).ready(function(){
    $("#signup-form").validate({
        rules:{
            fname: {
                required: true,
                minlength: 3,
                maxlength:15
                
            },
            lname: {
                required: true,
                maxlength:10,
                lname:true
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
//                required:true,
//                idspec:true,
//                iddept:true,
//                idcode:true,
//                maxlength:7,
//                minlength:7
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
//                required:"Staff ID is required",
//                minlength:"Staff id length should be 7",
//                maxlength:"staff id length can't exceed 7"
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
                minlength:"Address should have atleast 5 characters",
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
//jQuery.validator.addMethod("idspec",function(value,element){
//    return this.optional(element) || /^s+/.test(value);
//},"staff id should begin with s");
//jQuery.validator.addMethod("iddept",function(value,element){
//    return this.optional(element) || /^s+[cs ce ee ei ec it]+/.test(value);
//},"second and third letters should refer to department code eg:cs");
//jQuery.validator.addMethod("idcode",function(value,element){
//    return this.optional(element) || /^s+[cs,ce,ee,ei,ec,it]+[1-9]+[0-9]+[0-9]+[0-9]/.test(value);
//},"Personal identification code should be 4 digit number");
jQuery.validator.addMethod("lname",function(value,element){
    return this.optional(element) || /^[a-zA-Z ]+$/.test(value);
},"Only alphabets are allowed in name field");

//function getAge(birthDateString) {
//    var today = new Date();
//    var birthDate = new Date(birthDateString);
//    var age = today.getFullYear() - birthDate.getFullYear();
//    var m = today.getMonth() - birthDate.getMonth();
//    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
//        age--;
//    }
//    return age;
//}
//jQuery.validator.addMethod("age",
//function(value, element) {
// if(getAge(Date(value)) <= 24) {
//    return (getAge(Date(value)) >= 24) || (getAge(Date(value)) < 60);
//} 
//if(!/Invalid|NaN/.test(new Date(value))){
//        return new getAge(Date(value)) < 24;
//    }
// return (getAge(Date(value)) >= 24) || (getAge(Date(value)) < 60);
//},'You have to be 24 years old to get this job!!');


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
    //yyyy=yyyy-24;
    //var date = new Date(dd,mm,yyyy);
    document.getElementById("today").value = today;

    if(!/Invalid|NaN/.test(new Date(value))){
        return new Date(value) < today;
    }
    return isNaN(value) && isNan(today) || (Number(value) < Number(today));
},'Must be less than today date');



//$.post('sidvalidation.php',{sid: $('#usid').val()}, function(data){
//    if(data.exists){
//       alert('Staff id already exists');
//    }
// }, 'JSON');
