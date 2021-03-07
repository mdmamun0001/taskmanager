<script type="text/javascript">
		function validateDate() {

		  var inputDate = new Date(document.getElementById('datetimepickers').value);
		  var taskTimeFild=document.getElementById('datetimepickers');
		  
		  if (inputDate < new Date()) {
            taskTimeFild.classList.add("is-invalid");
            document.getElementById('timeError').innerHTML="Please take a time after current time ";
		    return false;
		  }
		 
		}

		function imageValidation(image){

                   
                   var validExtension=/(.jpg|.jpeg|.gif|.png)/i;

                   if(!validExtension.exec(image.value)){

                     image.classList.add("is-invalid");
                    alert("take image");
                    image.value=null;
                     return false;
                   }
                   

		}
</script>