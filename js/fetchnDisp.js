

function selectstudyid(){

    var x = document.getElementById("PID").value;

     $.ajax({
         url:"popupresult.php",
         method: "POST",
         data:{
             id : x
         },
         success:function(data){
             $("#ans").html(data);
         }

     })
}