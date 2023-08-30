function fetchemp(){
    var id = document.getElementById("entryno").value;

    $.ajax({
        url: "fetchgatestudy.php",
        method: "POST",
        data:{
            x: id
        },
        dataType: "JSON",
        success: function (data) {
            document.getElementById("scrnvstdate").value = data.scrnvstdate;
            document.getElementById("id_passport").value = data.id_passport;
            document.getElementById("birthcertno").value = data.birthcertno;
            document.getElementById("birthnotification").value = data.birthnotification;
            document.getElementById("fname").value = data.fname;
            document.getElementById("mname").value = data.mname;
            document.getElementById("sname").value = data.sname;
            document.getElementById("gender").value = data.sex;
            document.getElementById("dob").value = data.dob;
            document.getElementById("residence").value = data.residence;
            document.getElementById("contact1").value = data.contact1;
            document.getElementById("contact2").value = data.contact2;
            document.getElementById("contact3").value = data.contact3;
        }
    })
}