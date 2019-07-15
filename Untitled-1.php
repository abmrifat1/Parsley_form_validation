<html>  
    <head>  
        <title>PHP Form Validation using Parsleys.js Library</title>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="http://parsleyjs.org/dist/parsley.js"></script>
    </head>
 <style>
 .box
 {
  width:100%;
  max-width:600px;
  background-color:#f9f9f9;
  border:1px solid #ccc;
  border-radius:5px;
  padding:16px;
  margin:0 auto;
 }
 input.parsley-success,
 select.parsley-success,
 textarea.parsley-success {
   color: #468847;
   background-color: #DFF0D8;
   border: 1px solid #D6E9C6;
 }

 input.parsley-error,
 select.parsley-error,
 textarea.parsley-error {
   color: #B94A48;
   background-color: #F2DEDE;
   border: 1px solid #EED3D7;
 }

 .parsley-errors-list {
   margin: 2px 0 3px;
   padding: 0;
   list-style-type: none;
   font-size: 0.9em;
   line-height: 0.9em;
   opacity: 0;

   transition: all .3s ease-in;
   -o-transition: all .3s ease-in;
   -moz-transition: all .3s ease-in;
   -webkit-transition: all .3s ease-in;
 }

 .parsley-errors-list.filled {
   opacity: 1;
 }
 
 .parsley-type, .parsley-required, .parsley-equalto{
  color:#ff0000;
 }
 
 </style>
    <body>  
        <div class="container">  
            <br />  
            <br />
   <br />
   <div class="table-responsive">  
    <h3 align="center">PHP Form Validation using Parsleys.js Library</h3><br />
    <div class="box">
     <form id="validate_form">
      <div class="row">
       <div class="col-xs-6">
        <div class="form-group">
         <label>First Name</label>
         <input type="text" name="first_name" id="first_name" placeholder="Enter First Name" required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup" class="form-control" />
        </div>
       </div>
       <div class="col-xs-6">
        <div class="form-group">
         <label>Last Name</label>
         <input type="text" name="last_name" id="last_name" placeholder="Last Name" required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup" class="form-control" />
        </div>
       </div>
      </div>
      <div class="form-group">
       <label for="email">Email</label>
       <input type="text" name="email" id="email" placeholder="Email" required data-parsley-type="email" data-parsley-trigger="keyup" class="form-control" />
      </div>
      <div class="form-group">
       <label for="password">Password</label>
       <input type="password" name="password" id="password" placeholder="Password" required data-parsley-length="[8, 16]" data-parsley-trigger="keyup" class="form-control" />
      </div>
      <div class="form-group">
       <label for="cpassword">Confirm Password</label>
       <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password"data-parsley-equalto="#password" data-parsley-trigger="keyup" required class="form-control" />
      </div>
      <div class="form-group">
       <label for="cpassword">Website</label>
       <input type="text" id="website" name="website" placeholder="Website URL" data-parsley-type="url" data-parsley-trigger="keyup" class="form-control" />
      </div>
      <div class="form-group">
       <div class="checkbox">
        <label><input type="checkbox" id="check_rules" name="check_rules" required /> I Accept the Terms & Conditions</label>
       </div>
      </div>
      <div class="form-group">
       <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-success" />
      </div>
     </form>
    </div>
   </div>  
  </div>
    </body>  
</html>  
<script>  
$(document).ready(function(){  
    $('#validate_form').parsley();
 
 $('#validate_form').on('submit', function(event){
  event.preventDefault();
  if($('#validate_form').parsley().isValid())
  {
   $.ajax({
    url:"action.php",
    method:"POST",
    data:$(this).serialize(),
    beforeSend:function(){
     $('#submit').attr('disabled','disabled');
     $('#submit').val('Submitting...');
    },
    success:function(data)
    {
     $('#validate_form')[0].reset();
     $('#validate_form').parsley().reset();
     $('#submit').attr('disabled',false);
     $('#submit').val('Submit');
     alert(data);
    }
   });
  }
 });
});  
</script>
