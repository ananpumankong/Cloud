 var HttPRequest = false;
        
        function AdminEdit() {
            $('a.action').click(function() {
                var userList = $(this).parents('tr'),
                        userInfo = [];
                $.each($(userList).find('td:not(td:last-child)'), function(key) {
                    userInfo[key] = $(this).text();
                });
               // console.log(userInfo);
                $('#txtAdminUsername').empty().val(userInfo[1]);
                $('#txtAdminPassword').empty().val(userInfo[2]);
                $('#txtAdminPID').empty().val(userInfo[3]);
                $('#txtEmail').empty().val(userInfo[4]);
            });
        }
        function GettextAdmin() {
          
                var username = $("#txtUsernameByAdmin").val(),
                        password = $("#txtPasswordByAdmin").val(),
                        PID = $("#txtPIDByAdmin").val(),
                        EMAIL = $("#txtEmailByAdmin").val(),
                        STATUS = $("#txtStatusByAdmin option:selected").text();
                //alert(username + password + PID + EMAIL + STATUS);  
                $.ajax({
                    type: "POST",
                    url: "AjaxInsert.php",
                    data: {
                        SelectMode: "INSERT",
                        USER_ID: username,
                        PASSWORD: password,
                        PID: PID,
                        EMAIL: EMAIL,
                        STATUS: STATUS
                    },
                    statusCode: {
                        404: function() {
                            alert("ไม่พบเพจที่จะเรียก");
                        },
                        200: function() {
                            //alert("Sure");                            
                        }
                    }
                }).done(function() {

                    AjaxListPage('1');
                    $("#myForm").hide();
                });
            

        }
        function AreYouSure(ID, USER) {
            if (confirm('คุณแน่ใจแล้วนะว่าจะลบ ' + USER + " ออกจากระบบ")) {
                AjaxDelete(ID);
            }
            else {
                return false;
            }
        }
        function AjaxDelete(ID) {
           
                $.ajax({
                    type: "POST",
                    url: "AjaxDeleteTable.php",
                    data: {
                        SelectMode: "DELETE",
                        tID: ID
                    },
                    statusCode: {
                        404: function() {
                            alert("ไม่พบเพจที่จะเรียก");
                        },
                        200: function() {
                            //alert("Sure");                            
                        }
                    }
                }).done(function() {

                    AjaxListPage('1');
                    $("#myForm").hide();
                });
            
        }
        function ShowEdit(sID, sName, sPass, sPID, sEMAIL, sSTATUS)
        {
            document.getElementById("myForm").style.display = '';
            document.getElementById("textID").value = sID;
            document.getElementById("txtAdminUsername").value = sName;
            document.getElementById("txtAdminPassword").value = sPass;
            document.getElementById("txtAdminPID").value = sPID;
            document.getElementById("txtEmail").value = sEMAIL;
            document.getElementById("txtStatus").value = sSTATUS;
        }
        //////////////////////////////////////////////////////////////////

        function AjaxUpdate() {
            
                var tID = $("#textID").empty().val();
                var tUSER_ID = $("#txtAdminUsername").empty().val();
                var tPASSWORD = $("#txtAdminPassword").empty().val();
                var tPID = $("#txtAdminPID").empty().val();
                var tEMAIL = $("#txtEmail").empty().val();
                var tSTATUS = $("#txtStatus option:selected").text();

                if (tPASSWORD.length > 13 || tPASSWORD.length == "") {
                    //UPDATE NO ENCRYPT
                    //alert("OK");
                    $.ajax({
                        type: "POST",
                        url: "AjaxUpdate.php",
                        data:
                                {
                                    SelectMode: "UPDATE_NOMAL",
                                    tID: tID,
                                    tUSER_ID: tUSER_ID,
                                    tPASSWORD: tPASSWORD,
                                    tPID: tPID,
                                    tEMAIL: tEMAIL,
                                    tSTATUS: tSTATUS
                                },
                        statusCode: {
                            404: function() {
                                alert("ไม่พบเพจที่จะเรียก");
                            },
                            200: function() {
                                //alert("ส่งไปแล้ว");                            
                            }
                        }
                    }).done(function() {

                        AjaxListPage('1');

                        $("#myForm").hide();
                    });
                }
                else {
                    //alert("มาถูกแล้ว");
                    $.ajax({
                        type: "POST",
                        url: "AjaxUpdate.php",
                        data:
                                {
                                    SelectMode: "UPDATE_ENCRYTP",
                                    tID: tID,
                                    tUSER_ID: tUSER_ID,
                                    tPASSWORD: tPASSWORD,
                                    tPID: tPID,
                                    tEMAIL: tEMAIL,
                                    tSTATUS: tSTATUS
                                },
                        statusCode: {
                            404: function() {
                                alert("ไม่พบเพจที่จะเรียก");
                            },
                            200: function() {
                                //alert("ส่งไปแล้ว");                            
                            }
                        }
                    }).done(function() {

                        AjaxListPage('1');

                        $("#myForm").hide();
                    });
                }

            
        }
        function AjaxListPage(Page) {
          
                $('#table-custom-2').empty(); //Refresh
                $.ajax({
                    type: "POST",
                    url: "AjaxListTable.php",
                    data: {tMode: Page},
                    statusCode: {
                        404: function() {
                            alert("ไม่พบเพจที่จะเรียก");
                        },
                        200: function() {
                            //alert("ส่งไปแล้ว");                            
                        }
                    }
                }).done(function(msg) {
                    $('#table-custom-2').html(msg);
                    //  $('#table-custom-2').hide().append(msg).fadeIn("fast");   
                    AutorunListTable();
                });
            
        }
        function AutorunListTable() {
            $(function() {
                setInterval(function() {
                    var getData = $.ajax({
                        type: "POST",
                        url: "AjaxListTable.php",
                        data: {tMode: "1"},
                        success: function(getData) {
                            $('#table-custom-2').html(getData);
                        }
                    }).responseText;
                }, 300000);
            });
        }
        function bodyOnload()
        {
            AjaxListPage('1');
            setTimeout("doLoop();", 10000);
        }
        function doLoop()
        {
            bodyOnload();
        }
        function showSearchID() {
            $("#SearchID").show();
        }

        function Ajaxsearch() {
        
          
                var search = $("#textSearchID").val();
                $("#SearchID").hide();
                $('#table-custom-2').empty();
                $.ajax({
                    type: "POST",
                    url: "AjaxSearch.php",
                    data: {Search: search},
                    statusCode: {
                        404: function() {
                            alert("ไม่พบเพจที่จะเรียก");
                        },
                        200: function() {
                            //alert("ส่งไปแล้ว");                            
                        }
                    }
                }).done(function(msg) {
                    $('#table-custom-2').hide().append(msg).fadeIn("fast");

                    //alert( "Data Saved: " + msg );
                });

            
        }
        $(function() {
            $('#adduser').click(function() {

                var txtuser = $("#txtUsernameByAdmin").val();
                var txtpass = $("#txtPasswordByAdmin").val();
                var txtpid = $("#txtPIDByAdmin").val();
                var txtemail = $("#txtEmailByAdmin").val();
                // var txtstatus = $("#txtStatusByAdmin option:selected").val(); 

                //alert(txtuser +txtpass + txtpid + txtemail + txtstatus );

                var ChackUsername = /^[a-z]([0-9a-z_])+$/i;
                var ChackPassword = /^([0-9a-zA-Z])+$/;
                var CheckPID = /^[0-9]*$/;
                var ChackEmail = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i;

                if (txtuser.length == '')
                {
                    alert("กรุณากรอกชื่อของคุณ");
                }
                else if (txtpass.length == '') {
                    alert("กรุณากรอกรหัสผ่านของคุณ");
                }
                else if (txtpid.length == '') {
                    alert("กรุณากรอกรหัสบัตรประชาชนของคุณ");
                }
                else if (txtemail.length == '') {
                    alert("กรุณากรอกอีเมลล์ของคุณ");
                }
                else if (txtuser.length < 3) {
                    alert("กรุณากรอกชื่อของคุณให้ยาวกว่า 4 ตัวอักษร");
                }
                else if (txtpass.length < 3) {
                    alert("กรุณากรอกรหัสผ่านของคุณให้ยาวกว่า 4 ตัวอักษร");
                }
                else if (txtpid.length != 13 || !CheckPID.test(txtpid)) {
                    if (txtpid.length != 13) {
                        alert("กรุณากรอกรหัสบัตรประชาชนให้ถูกต้องครบ 13 หลัก และ สามารถกรอกได้เฉพาะตัวเลขเท่านั้น");
                    }
                    else {
                        alert("รหัสบัตรประชาชนกรอกได้เฉพราะตัวเลขเท่านั้น");
                    }
                }
                else if (!ChackUsername.test(txtuser)) {
                    alert("ชื่อของคุณกรอกได้เฉพาะ a-z และ 0-9 ได้เท่านั้น");
                }
                else if (!ChackPassword.test(txtpass)) {
                    alert("รหัสผ่านของคุณกรอกได้เฉพาะ a-z และ 0-9 ได้เท่านั้น");
                }

                else if (!ChackEmail.test(txtemail)) {
                    alert("อีเมลล์ไม่ควรมีอักษรพิเศษ เช่น + - * # %");
                }
                else if (ChackUsername.test(txtuser) && ChackPassword.test(txtpass) && ChackEmail.test(txtemail)) {
                    checkPID();
                }
            });
        });
        function checkID(id)
        {
            if (id.length != 13)
                return false;
            for (i = 0, sum = 0; i < 12; i++)
                sum += parseFloat(id.charAt(i)) * (13 - i);
            if ((11 - sum % 11) % 10 != parseFloat(id.charAt(12)))
                return false;
            return true;
        }
        function checkPID()
        {
            if (!checkID($("#txtPIDByAdmin").val()))
                alert('รหัสประชาชนไม่ถูกต้อง');
            else {
                //alert('รหัสประชาชนถูกต้อง เชิญผ่านได้');    
                CheckEmailAddress();

            }
        }
        function CheckEmailAddress()
        {
         

                var RegisterEMAIL = $("#txtEmailByAdmin").val();

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
                            // alert("ส่งไปแล้ว");                            
                        }
                    }
                }).done(function(data) {
                    if (data == 0)
                    {
                        AjaxCheckUsername();

                    }
                    else if (data == 1)
                    {
                        alert("มีคนใช้อีเมลล์นี้ไปแล้ว");
                    }
                });
            
        }
        function AjaxCheckUsername() {
           
                var txtuser = $("#txtUsernameByAdmin").val();

                $.ajax({
                    type: "POST",
                    url: "AjaxCheckUsername.php",
                    data: {
                        SelectMode: "CheckName",
                        USER_ID: txtuser
                    },
                    statusCode: {
                        404: function() {
                            alert("ไม่พบเพจที่จะเรียก");
                        },
                        200: function() {
                            // alert("ส่งไปแล้ว");                            
                        }
                    }
                }).done(function(data) {

                    if (data == 0)
                    {
                        GettextAdmin();
                        $("#popupAdminAddUser").hide();
                        // AjaxListPage('1');
                    }
                    else if (data == 1)
                    {
                        alert("มีคนใช้ชื่อนี้ไปแล้ว");
                    }
                });
            
        }
        $(function() {
            $("#logout").click(function() {
                if (confirm('ยืนยันการออกจากระบบ') == true)
                {
                    // alert('test');
                    $.ajax({
                        type: "POST",
                        url: "Destroysession.php",
                        data: {
                            sure: "1"
                        },
                        statusCode: {
                            404: function() {
                                alert("ไม่พบเพจที่จะเรียก");
                            },
                            200: function() {
                                // alert("ส่งไปแล้ว");                            
                            }
                        }
                    }).done(function(data) {
                        if (data == 1)
                        {
                            window.location = "LoginForm.php";
                        }
                    });

                }
            });
        });