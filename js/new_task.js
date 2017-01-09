$(document).ready(function () {
  //click on preview button
  $("#preview").click(function () {
     $("#messageShow").hide();
     $("#view").hide();
     var username=$("#username").val();
     var email=$("#email").val();
     var task=$("#task").val();
     var imageLink=$("#imageLink").val();
     if (imageLink!="") {
       var img=new Image();
       img.src=imageLink;
     }
     //write inserted data in the preview field
     $("#view").html("Username: "+username+"<br><br>Email: "+email+"<br><br>Task: "+task+
       "<br><br>Image: <br><br>"+"<img id='image' src='"+imageLink+"'/>");
     $("#view").show();
     //resize image
     img.onload=function() {
       if (this.width>320) {
         $("#image").attr("width", "320");
         $("#image").attr("height", this.height*(320/this.width));
       }
       if (this.height>240){
         $("#image").attr("height", "240");
         $("#image").attr("width", this.width*(240/this.height));
       }
       $("#view").show();
       return false;
     };
  })
  //click on send button
  $("#send").click(function () {
	   $("#messageShow").hide();
     $("#view").hide();
		 var username=$("#username").val();
	   var email=$("#email").val();
		 var task=$("#task").val();
     var imageLink=$("#imageLink").val();
		 var fail="";
     //check if all fields have been filled
  	 if (username.length<1)
        fail="Insert your name";
  	 else if (email.split('@').length-1==0||email.split('.').length-1==0)
  	 	  fail="Email is incorrect";
  	 else if (task.length<1)
  			fail="Insert the task";
     else if (imageLink.length<1)
     		fail="Insert link for the image";
  	 if (fail!="") {
  			$("#messageShow").html(fail);
        $("#messageShow").show();
  	    return false;
  	 }
     //send inserted data
  	 $.ajax({
  			url:'/php/new_task.php',
  			type:'POST',
  			cache: false,
  			data: {'username':username, 'email':email, 'task':task, 'imageLink':imageLink},
  			dataType: 'html',
  			success: function (data) {
  				if(data=='Task has been sent') {
  					$("#messageShow").html(data);
            $("#messageShow").show();
            $("#view").hide();
            $("#username").val("");
            $("#email").val("");
            $("#task").val("");
            $("#imageLink").val("");
  				}
          else {
            $("#messageShow").html("Something is wrong");
            $("#messageShow").show();
            $("#view").hide();
          }
  			}
  	 })
	})
})
