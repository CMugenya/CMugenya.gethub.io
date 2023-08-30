function fetchemp(){
    var id = document.getElementById("entryno").value;

    $.ajax({
        url: "fetchcaregiver.php",
        method: "POST",
        data:{
            x: id
        },
        dataType: "JSON",
        success: function (data) {
            document.getElementById("id_passport").value = data.id_passport;
            document.getElementById("fname").value = data.fname;
            document.getElementById("mname").value = data.mname;
            document.getElementById("sname").value = data.sname;
            document.getElementById("Residence").value = data.residence;
            document.getElementById("contact1").value = data.contact1;
            document.getElementById("contact2").value = data.contact2;
        }
    })
}