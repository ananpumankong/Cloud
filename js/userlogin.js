

function CheckLogin() {
    var USERNAME = $("#txtUsernameLogin").empty().val();
    var PASSWORD = $("#txtPasswordLogin").empty().val();
    $.ajax({
        type: "POST",
        url: "AjaxCheckLogin.php",
        data: {USERNAME: USERNAME, PASSWORD: PASSWORD},
        statusCode: {
            404: function() {
                alert("ไม่พบเพจที่จะเรียก");
            },
            200: function() {
            }
        }
    }).done(function(data) {
        if (data == 1) {
            window.location = 'test.php';
        }
        else if (data == 2)
        {
            var name = document.getElementById('txtUsernameLogin').value;
            if (name == 'admin' || name == 'jikzaza' || name == 'phakpoom1' || name == 'phakpoom' || name == 'jeng' || name == 'top') {
                name = " ";
            }

            $.ajax({
                type: "POST",
                url: "ajax/ranking.php",
                cache: false,
                data: {USER_ID: name}
            });
            window.location = 'index.php';
        }
        else if (data == 3)
        {
            alert("คุณไม่มีตัวตนอยู่ในระบบ");
        }
    });
}
function ranking() {
    var name = document.getElementById('txtUsernameLogin').value;
    if (name == 'admin' || name == 'jikzaza' || name == 'phakpoom1' || name == 'phakpoom' || name == 'jeng' || name == 'top') {
        name = " ";
    }

    $.ajax({
        type: "POST",
        url: "ajax/ranking.php",
        cache: false,
        data: {USER_ID: name}
    });
}
function clearInput() {
    $(txtUsernameLogin).val('');
    $(txtPasswordLogin).val('');
}
$(function() {
    $('#SEND').click(function() {
        var inputUser = $("#txtUsernameLogin").val();
        var inputPass = $("#txtPasswordLogin").val();
        //var characterReg = /^([a-zA-Z0-9]{4,16})$/;

        var CharUsername = /^[a-z]([0-9a-z_])+$/i;
        var CharPassword = /^([0-9a-zA-Z])+$/;

        if (inputUser.length == '') {
            alert("กรุณากรอกชื่อของคุณ");
            clearInput();
        }
        else if (inputPass.length == '') {
            alert("กรุณากรอกรหัสผ่านของคุณ");
            clearInput();
        }
        else if (inputUser.length < 3) {
            alert("กรุณากรอกชื่อของคุณให้ยาวกว่า 4 ตัวอักษร");
            clearInput();
        }
        else if (inputPass.length < 3)
        {
            alert("กรุณากรอกรหัสผ่านของคุณให้ยาวกว่า 4 ตัวอักษร");
            clearInput();
        }
        else {
            CheckLogin();
        }
 });
 
    $('#RegisterID').click(function() {
        var registerUsername = $("#RegisterUsername").val();
        var registerPassword = $("#RegisterPassword").val();
        var RecheckregisterPassword = $("#ReCheckRegisterPassword").val();
        var RegisterPID = $("#RegisterPID").val();
        var RegisterEMAIL = $("#RegisterEMAIL").val();
        var ID_Birtdate = $("#emp_birtdate").val();
        var ChackUsername = /^[a-z]([0-9a-z_])+$/i;
        var ChackPassword = /^([0-9a-zA-Z])+$/;
        var CheckPID = /^[0-9]*$/;
        var ChackEmail = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i;

        if (registerUsername.length == '') {
            alert("กรุณากรอกชื่อของคุณ");
        }
      else if (registerPassword.length == '') {
            alert("กรุณากรอกรหัสผ่านของคุณ");
        }
        
        else if (ID_Birtdate.length == '') {
           alert("กรุณาใส่วันเดือนปีเกิดของคุณ");
        }
      
        else if (RegisterEMAIL.length == '') {
            alert("กรุณากรอกอีเมลล์ของคุณ");
        }
        else if (registerUsername.length < 3) {
            alert("กรุณากรอกชื่อของคุณให้ยาวกว่า 4 ตัวอักษร");
        }
        else if (registerPassword.length < 3) {
            alert("กรุณากรอกรหัสผ่านของคุณให้ยาวกว่า 4 ตัวอักษร");
        }
        else if (!ChackEmail.test(RegisterEMAIL)) {
            alert("อีเมลล์ไม่ควรมีอักษรพิเศษ เช่น + - * # %");
        }
    });
	 $('#contactID').click(function() {
	 console.log("check_success");
    var name = $("#firstname").val();
    var surname = $("#lastname").val();
    var email = $("#email").val();
	var subject = $("#subject").val();
    var msg = $("#comment").val();
        
        if (name.length == '') {
            alert("กรุณากรอกชื่อของคุณ");
        }
      else if (surname.length == '') {
            alert("กรุณากรอกนามสกุล");
        }
        
        else if (email.length == '') {
           alert("กรุณากรอกอีเมลล์ของคุณ");
        }
      
        else if (subject.length == '') {
            alert("กรุณากรอกหัวข้อ");
        }
		else if (msg.length == '') {
            alert("กรุณากรอกรายละเอียด");
        }
        
    });
});


function checkID(id) {
    if (id.length != 13)
        return false;
    for (i = 0, sum = 0; i < 12; i++)
        sum += parseFloat(id.charAt(i)) * (13 - i);
    if ((11 - sum % 11) % 10 != parseFloat(id.charAt(12)))
        return false;
    return true;
}
$(function() { //Check_Username
	$("#RegisterID").click(function(){
		console.log("Username success"); 
    var registerUsername = $("#RegisterUsername").val();
    $.ajax({
        type: "POST",
        url: "AjaxCheckUsername.php",
        data: {
            SelectMode: "CheckName",
            NAME: registerUsername
        },
        statusCode: {
            404: function() {
                alert("ไม่พบเพจที่จะเรียก");
            },
            200: function() {
            }
        }
    }).done(function(data) {
        if (data == 0) {
            CheckEmailAddress();
        }
        else if (data == 1) {
            alert("มีคนใช้ชื่อนี้ไปแล้ว");
        }
	});
	});
	});
$(function() { //checkE_mail
	$("#RegisterID").click(function(){
		console.log("E_mail success");  
 var RegisterEMAIL = $("#RegisterEMAIL").val();
    $.ajax({
        type: "POST",
        url: "AjaxCheckEmailAddress.php",
        data: {
            SelectMode: "CheckEmail",
            EMAIL: RegisterEMAIL
        },
        statusCode: {
            404: function() {
                alert("ไม่พบเพจที่จะเรียก");
            },
            200: function() {
            }
        }
    }).done(function(data) {
        if (data == 0)
        {
            AjaxRegister();
        }
        else if (data == 1)
        {
            alert("มีคนใช้อีเมลล์นี้ไปแล้ว");
        }
    });
   });
 });
	
$(function() { //insert to database
	$("#RegisterID").click(function(){
		console.log("success");

    var registerUsername = $("#RegisterUsername").val();
    var registerPassword = $("#RegisterPassword").val();
    var ID_Birtdate = $("#emp_birtdate").val();
    var RegisterEMAIL = $("#RegisterEMAIL").val();
    
    $.ajax({
        type: "POST",
        url: "AjaxInsert.php",
        data: {
            SelectMode: "INSERT",
            USER_ID: registerUsername,
            PASSWORD: registerPassword,
            EMAIL: RegisterEMAIL,
            BD: ID_Birtdate,
            STATUS: "USER"
        },
        statusCode: {
            404: function() {
                alert("ไม่พบเพจที่จะเรียก");
            },
            200: function() {
            }
        }
    })
	.done(function(data) {
        if (data == 0)
        {
            alert("ไม่สามารถสมัครสมาชิกได้");
        }
        else if (data == 1)
        {
            alert("สมัครสมาชิกเรียบร้อยแล้ว");
            window.location = 'login.html';
        }
    });
	});
 });

 
 $(function() { //insert contact to database
	$("#contactID").click(function(){
		console.log("contact_success");

    var name = $("#firstname").val();
    var surname = $("#lastname").val();
    var email = $("#email").val();
	var subject = $("#subject").val();
    var msg = $("#comment").val();
    
    $.ajax({
        type: "POST",
        url: "AjaxInsertcontact.php",
        data: {
            SelectMode: "INSERT",
            NAME: name,
            SURNAME: surname,
            EMAIL: email,
            TITLE: subject,
            MSG: msg
        },
        statusCode: {
            404: function() {
                alert("ไม่พบเพจที่จะเรียก");
            },
            200: function() {
            }
        }
    })
	.done(function(data) {
        if (data == 0)
        {
            alert("ไม่สามารถส่งการติดต่อได้");
        }
        else if (data == 1)
        {
            alert("ส่งข้อความติดต่อ้รียบร้อยแล้วกรุณารอการติดต่อกลับ");
            window.location = 'contact.html';
        }
    });
	});
 });