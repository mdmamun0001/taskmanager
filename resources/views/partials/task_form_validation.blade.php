<script type="text/javascript">
		function validateForm() {
		  var inputDate = new Date(document.forms["task_form"]["task_date_time"].value);
		  var taskTimeFild=document.getElementById('datetimepickers');
		  
		  if (inputDate< new Date()) {
            taskTimeFild.classList.add("is-invalid");
            document.getElementById('timeError').innerHTML="Please take a time after current time ";
		    return false;
		  }
		 
		}
</script>