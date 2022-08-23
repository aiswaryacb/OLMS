
//today = mm+'/'+dd+'/'+yyyy;
$(document).ready(function(){
    $("#leave_apply").validate({
        rules:{
            tol: {
                required: true
            },
            frm: {
                required: true,
                date:true,
                greaterThanToday:true 
               
            },
            to: {
                required: true,
                date:true,
                greaterThan: "#frm"
                
            },
            no_of_days:{
                required:true,
                number:true,
                min:1,
                max:180
            },
            reason:{
                required:true
            }
        },
        messages:{
            tol: {
                required:"Specify the type of leave"
            },
            frm: {
                required:"Specify the from date",
                date:"This should be a date"
                //greaterThan:"You can't apply leave for a previous day"
                
                
                
            },
            to: {
                required:"Specify the to date",
                date:"This should be a date"
                
                
            },
            no_of_days:{
                required:"Specify the number of days",
                number:"Number of days should be an integer",
                min:"Minimum number of days should be atleast 1",
                max:"You can't apply for more than 180 leaves"
            },
            reason:{
                required:"Specify the reason for the leave"
            }
            
        },
        submitHandler: function(form) {
            form.submit();
        }
    });//validate function ends
});//document.ready ends
jQuery.validator.addMethod("greaterThan", 
function(value, element, params) {

    if (!/Invalid|NaN/.test(new Date(value))) {
        return new Date(value) >= new Date($(params).val());
    }

    return isNaN(value) && isNaN($(params).val()) 
        || (Number(value) >= Number($(params).val())); 
},'Must be greater than from');
jQuery.validator.addMethod("greaterThanToday", 
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
        return new Date(value) >= today;
    }
    return isNaN(value) && isNan(today) || (Number(value) >= Number(today));
},'Must be greater than today date');





