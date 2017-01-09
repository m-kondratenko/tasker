$(document).ready(function() {
  $("#editForm").hide();
  var editID="";
  $('#body').on('click', 'tr', function(){
    $("#taskEdit").val($(this).find('#taskCol').html());
    $("#statusEdit").val($(this).find('#statusCol').html());
    editID=$(this).find('#num').html();
    $("#editID").html($(this).find('#num').html());
    $("#editForm").show();
  });
  $("#edit").click(function () {
     alert("what");
     $("#editMes").hide();
     var status=$("#statusEdit").val();
     var task=$("#taskEdit").val();
     var id=$("#editID").html();
     var fail="";
     //check if all fields have been filled
     if ((status!=1)$$(status!=0))
        fail="Status can be only 0 or 1";
     else if (task.length<1)
        fail="Insert the task";
     if (fail!="") {
        $("#editMes").html(fail);
        $("#editMes").show();
        return false;
     }
     //send inserted data
     $.ajax({
        url:'/php/edit_task.php',
        type:'POST',
        cache: false,
        data: {'status':status, 'task':task, 'id':id},
        dataType: 'html',
        success: function (data) {
          if(data=='Update has been done') {
            $("#editMes").html(data);
            $("#editMes").show();
            $("#statusEdit").val("");
            $("#taskEdit").val("");
            $("#editID").html("");
          }
          else {
            $("#editMes").html("Something is wrong");
            $("#editMes").show();
          }
        }
     })
  })
})
