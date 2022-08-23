<?php
$date=date('d-m-Y');
?>
<html>
<head><title>Sign up</title>
<link href="icon2.png" rel="icon" type="image/png"/>

<script src="JQ/jquery.min.js" type="text/javascript"></script>
<script src="JQ/jquery.validate.js" type="text/javascript"></script>
<script src="JQ/form.js" type="text/javascript"></script>
<script language="Javascript" type="text/javascript">

        function onlyAlphabets(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }
        function onlyNumbers(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode >= 48 && charCode <= 57))
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }
        
        
        
</script>
</head>
<style>
.error {color: #FF0000;}
body {
    margin: 0;
    background: url(blue.gif);
    background-repeat: repeat-y;
}

a:hover{
	background-color: green;
	}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color:MEDIUMSLATEBLUE ;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: darkorange;
}

.active {
    background-color: darkorange;
}
footer {
    padding: 1em;
    color: white;
    background-color: black;
    clear: left;
    text-align: center;
}
header {
    padding: 2em;
    color: white;
    background-color: deepskyblue;
    clear: left;
    text-align: center;
}


div.seek{
   
    margin-top: 10px;
    margin-bottom: 100px;
    margin-right: 150px;
    margin-left: 450px;
}
.button {
    background-color: navy;
    border: none;
    color: white;
    padding: 15px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 15px 20px;
    cursor: pointer;
}
input[type=submit] {
    width: 100%;
    background-color: blue;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: darkblue;
}
input[type=text] {
    width: 100%;
    padding: 10px 10px;
    margin: 10px 0;
    box-sizing: border-box;
    border: 2px solid #BDBDBD;
    border-radius: 10px;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
}

input[type=text]:focus {
    border: 2px solid #3498DB;
}
input[type=password] {
    width: 100%;
    padding: 10px 10px;
    margin: 10px 0;
    box-sizing: border-box;
    border: 2px solid #BDBDBD;
    border-radius: 10px;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
}

input[type=password]:focus {
    border: 2px solid #3498DB;
}
input[type=date] {
    width: 100%;
    padding: 10px 10px;
    margin: 10px 0;
    box-sizing: border-box;
    border: 2px solid #BDBDBD;
    border-radius: 10px;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
}

input[type=date]:focus {
    border: 2px solid #3498DB;
}

textarea {
    width: 100%;
    height: 150px;
    padding: 12px 20px;
    border-radius: 4px;
    box-sizing: border-box;
    border: 2px solid #BDBDBD;
    font-size: 16px;
    resize: none;
}

select {
    width: 100%;
    padding: 10px 10px;
    border: none;
    border-radius: 10px;
    border: 2px solid #BDBDBD;
}
.hidden{
    display: none;
}
</style>
</head>
<body style="background-color:WHITE;">


<header>
    <img src="l17.png" alt="some_text" align="left" style="width:150px;height:125px;">
    <h1 style="font-size:250%;"><b>ONLINE  LEAVE  MANAGEMENT  SYSTEM</b></h1></header>
<ul>
    <li><a href="index.php">Home</a></li>
</ul>

<div class="seek">
    <h2 style="color:green;font-family: verdana"><b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSIGN&nbspUP</b></h2></br></br>
    <form action="signupdetails.php" method="post" name="signup-form" id="signup-form" >
        <table style="border:0px">
            <tr>
                <td><label for="fname" >First Name : </label><span class="error">*</span></td>
                <td><input type="text" name="fname" placeholder="First Name" onkeypress="return onlyAlphabets(event,this);"></td>
                
            </tr>
            <tr>
                <td><label for="lname">Last Name : </label><span class="error" onkeypress="return onlyAlphabets(event,this);">*</span></td>
                <td><input type="text" name="lname" placeholder="Last Name" required></td>
            </tr>
            <input type="date" class="hidden" name="today" id="today" value="<?php echo $date; ?>"/>
            <tr>
                <td><label for="dob"> Date of Joning : </label><span class="error">*</span></td>
                <td><input type="date" name="dob" required>
<!--                <td><select name="DOBDay" style="width:30%">
                    <option value="">Day</option>
                    <option value="01">1</option>
                    <option value="02">2</option>
                    <option value="03">3</option>
                    <option value="04">4</option>
                    <option value="05">5</option>
                    <option value="06">6</option>
                    <option value="07">7</option>
                    <option value="08">8</option>
                    <option value="09">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                    </select>
                <select name="DOBMonth" style="width:30%">
                    <option value="">Month</option>
                    <option value="01">January</option>
                    <option value="02">Febuary</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                    <select name="DOBYear" style="width:30%">
                        <option value="">Year</option>
                        <option value="1993">1993</option>
                        <option value="1992">1992</option>
                        <option value="1991">1991</option>
                        <option value="1990">1990</option>
                        <option value="1989">1989</option>
                        <option value="1988">1988</option>
                        <option value="1987">1987</option>
                        <option value="1986">1986</option>
                        <option value="1985">1985</option>
                        <option value="1984">1984</option>
                        <option value="1983">1983</option>
                        <option value="1982">1982</option>
                        <option value="1981">1981</option>
                        <option value="1980">1980</option>
                        <option value="1979">1979</option>
                        <option value="1978">1978</option>
                        <option value="1977">1977</option>
                        <option value="1976">1976</option>
                        <option value="1975">1975</option>
                        <option value="1974">1974</option>
                        <option value="1973">1973</option>
                        <option value="1972">1972</option>
                        <option value="1971">1971</option>
                        <option value="1970">1970</option>
                        <option value="1969">1969</option>
                        <option value="1968">1968</option>
                        <option value="1967">1967</option>
                        <option value="1966">1966</option>
                        <option value="1965">1965</option>
                        <option value="1964">1964</option>
                        <option value="1963">1963</option>
                        <option value="1962">1962</option>
                        <option value="1961">1961</option>
                        <option value="1960">1960</option>
                        <option value="1959">1959</option>
                        <option value="1958">1958</option>
                        <option value="1957">1957</option>

                    </select>-->
                </td>
            </tr>
            <tr>
                <td><label for="gender">Gender</label><span class="error">*</span></td>
                <td><input type="radio" name="gender" value="m" checked> Male</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="radio" name="gender" value="f"> Female</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="radio" name="gender" value="o"> Other</td>
            </tr>
            <!--tr>
                <td><label for="sid">Staff ID : </label><span class="error">*</span></td>
                <td><input type="text" name="sid" placeholder="Staff ID" required></td>
            </tr-->
            <tr>
                <td><label for="designation">Designation</label><span class="error">*</span></td>
                <td><select name="designation">
                        <option value="">~select~</option>
                        <option value="Teaching Staff">Teaching Staff</option>
                        <option value="Non-teaching Staff">Non Teaching Staff</option>
                    </select></td>
            </tr>
            <tr>
                <td><label for="dept">Department</label><span class="error">*</span></td>
                <td><select name="dept">
                        <option value="">~select~</option>
			<option value="Computer Science">Computer Science</option>
			<option value="Civil">Civil</option>
                        <option value="Electronics and Communication">Electronics and Communication</option>
                        <option value="Electrical and Electronics">Electrical and Electronics</option>
                        <option value="Electronics and Instrumentation">Electronics and Instrumentation</option>
                        <option value="Information Technology">Information Technology</option>
                    </select></td>
            </tr>
            <tr>
                <td><label for="mailid">Email : </label><span class="error">*</span></td>
                <td><input type="text" name="mailid" placeholder="E-mail" required></td>
            </tr>
            <tr>
                <td><label for="address">Address : <span class="error">*</span></label><br/></td>
                <td><input type="text"  name="address" required>
                    </td>
            </tr>
            <tr>
                    <td><label for="phno">Phone : </label><span class="error">*</span></td>
                    <td><input type="text" name="phno"  placeholder="Phone " required onkeypress="return onlyNumbers(event,this);"></td>
            </tr>
            <tr>
                <td><label for="pw">Enter Password : </label><span class="error">*</span></td>
                <td><input type="password" name="pw"  placeholder="Password" required></td>
            </tr>
            <!--tr>
                <td><label for="cpw">Confirm Password : </label><span class="error">*</span></td>
                <td><input type="password" name="cpw"  placeholder="Confirm Password" required></td>
            </tr-->
            
            <tr></tr><tr></tr><tr></tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Signup"></td>
                
            </tr>
        </table>
    </form>
</div>

<footer>Contact : Department of Computer Science, College of Engineering, Kidangoor, 0987654321</footer>

</body>
</html>

