<!DOCTYPE html>
<html>
<head>
<title> University Admission System</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        
</head>
<body class="d-flex flex-column">
    
    
<?php
include 'db.php';   
require 'header.php';
$valid=true;
$eng_name='';
$mm_name='';
$gender='';
// to validate inputs
if(!empty($_POST))
{
    $data=[
        "title"=>$_POST['title'],
        "eng_name"=>$_POST['eng_name'],
        "mm_name"=>$_POST['mm_name'],
        "gender"=>$_POST['gender'],
        "email"=>$_POST['email'],
        "syllabus"=>$_POST['syllabus']
    ];
    
    
    if(isset($_POST['title']))
    {
        $title=$_POST['title'];
        if(empty($title))
        {
            $titleError='Please choose title';
            $valid=false;
        }
    }

    if(isset($_POST['eng_name']))
    {
        $eng_name=$_POST['eng_name'];
        if(empty($eng_name))
        {
            $enameError='Please add Name (Eng)';
            $valid=false;
        }
    }
    if(isset($_POST['gender']))
    {
        $gender=$_POST['gender'];
        if(empty($gender))
        {
            $genderError='Please add Name (MM)';
            $valid=false;
        }
    }
    if(isset($_POST['mm_name']))
    {
        $mm_name=$_POST['mm_name'];
        if(empty($mm_name))
        {
            $mmnameError='Please add Name (MM)';
            $valid=false;
        }
    }
    
        
    //to check father is living or decease
    /*if(isset($_POST['fstatus']))
    {
        $fstatus=$_POST['fstatus'];
        if($fstatus=="living")
        {
            if(isset($_POST['fage']))
            {
                $fage=$_POST['fage'];
                if(empty($fage))
                {
                    $fageError='Please add age';
                    $valid=false;
                }
            } 
        }
        
    }*/

      
    
    
}
//to connect database
 if ($valid) {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO applicant(ename,mmname,gender) values('$eng_name','$mm_name','$gender')";
    $q = $pdo->prepare($sql); 
    $q->execute(array($eng_name,$mm_name,$gender));
    Database::disconnect();
 }
?>
<div class="container maincontent">
    <fieldset class="adminform">
    <legend>Admission Progress</legend>
      <table width="100%">
        <tr>
          <td width="20%"><b>1. Fill in Application</b></td>
          <td width="15%">2. Verify Data</td>
          <td width="32%">3. Print Application Form</td>
          <td width="12%">4. Login</td>
        </tr>
      </table>
      <div class="progress">
         <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
       </div>
    </fieldset>
    
    <form class="form-horizontal" action="application.php" method="post">
    <div class="container" >
    <div class="row">
      <h4> Applicant's Information </h4>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" for="title">Title<span class="help-inline">*</span></label> 
           <div class="controls col-md-4">
                <select name="title" id="title" class="form-control form-control-inline col-md-4" >
                <option value="" >---Select---</option>
                  <option value="Mr" >Mr</option>
                  <option value="Ms" >Ms</option>
                  <option value="Mrs">Mrs</option>
                </select>
                <?php if (!empty($titleError)): ?>
                <span class="help-inline"><?php echo $titleError;?></span>
                <?php endif; ?>
            </div>
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="eng_name">Name (Eng)<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
               <input name="eng_name" type="text" id="eng_name" class="form-control form-control-inline col-md-4" placeholder="Name in English" value="<?php echo !empty($eng_name)?$eng_name:'';?>" >
               <?php if (!empty($enameError)): ?>
                <span class="help-inline"><?php echo $enameError;?></span>
                <?php endif; ?>            
            </div>
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="mm_name">Name (MM)<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
               <input name="mm_name" type="text" id="mm_name" class="form-control form-control-inline col-md-4" placeholder="Name in Myanmar" >
               <?php if (!empty($mmnameError)): ?>
                <span class="help-inline"><?php echo $mmnameError;?></span>
                <?php endif; ?>            
            </div>
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="gender">Gender<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
            <label class="radio-inline"><input type="radio" name="gender" value="male" id="male" checked>Male</label>
            <label class="radio-inline"><input type="radio" name="gender" value="female" id="female">Female</label>
                          
            </div>
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="email">Email<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
               <input name="email" type="text" id="email" class="form-control form-control-inline col-md-4"  >
                           
            </div>
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="syllabus">Syllabus<span class="help-inline">*</span></label>
           <div class="controls col-md-4">
                <select name="syllabus" id="syllabus" class="form-control form-control-inline col-md-4" >
                <option value="" >---Select---</option>
                  <option value="civil" >Civil Engineering/option>
                  <option value="it" >IT Engineering</option>
                  <option value="electrical">Electrical Engineering</option>
                </select>
                
            </div>
    </div>
    </div>
    <br><hr>
<!-- education -->
  <div class="container" >
    <div class="row">
      <h4>Education </h4>
    </div>
    
    
    <div class="form-group ">
        <label class="control-label col-md-2" for="gender">Study in</label>
            <div class="controls col-md-4">
            <label class="radio-inline"><input type="radio" name="studyin" id="myanmar" checked>Myanmar</label>
            <label class="radio-inline"><input type="radio" name="studyin" id="abroad ">Abroad</label>
                            
            </div>
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="school">School<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
               <input name="school" type="text" id="school" class="form-control form-control-inline col-md-4"  >
                            
            </div>
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="level">Level of Completion<span class="help-inline">*</span></label>
           <div class="controls col-md-4">
                <select name="level" id="level" class="form-control form-control-inline col-md-4" >
                <option value="" >---Select---</option>
                  <option value="gce_o" >GCE O Level</option>
                  <option value="gce_a" >GCE A Level</option>
                  <option value="grade11">Grade 11</option>
                  <option value="grade11">IGCSE</option>
                </select>
            </div>
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="level">Major of Completion<span class="help-inline">*</span></label>
           <div class="controls col-md-4">
                <select name="level" id="level" class="form-control form-control-inline col-md-4" >
                <option value="" >---Select---</option>
                  <option value="gce_o" >Science (Biology)</option>
                  <option value="gce_a" >Arts</option>
                  <option value="grade11">Science and Arts</option>
                  <option value="grade11">other</option>
                </select>
            </div>
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="marks">Marks<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
               <input name="marks" type="text" id="marks" class="form-control form-control-inline col-md-4"  >
                            
            </div>
    </div>
  </div>
  <br><hr>
<!-- personal details -->
  <div class="container" >
    <div class="row">
      <h4>Personal Details </h4>
    </div>
    
    
    <div class="form-group ">
        <label class="control-label col-md-2" for="birthdate">Birthdate</label>
            <div class="controls col-md-4">
            <input type="date" id="birthdate" name="birthdate">
                            
            </div>
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="nationality">Nationality</label>
            <div class="controls col-md-4">
               <input name="nationality" type="text" id="nationality" class="form-control form-control-inline col-md-4"  >
                            
            </div>
            <label class="control-label col-md-2" for="nationality">Citizenship</label>
            <div class="controls col-md-4">
               <input name="citizen" type="text" id="citizen" class="form-control form-control-inline col-md-4"  >
                            
            </div>
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="level">Religion</label>
           <div class="controls col-md-4">
                <select name="religion" id="religion" class="form-control form-control-inline col-md-4" >
                <option value="" >---Select---</option>
                  <option value="buddhism" >Buddhism</option>
                  <option value="chirstian" >Christian</option>
                  <option value="islam">Islam</option>
                  <option value="hindu">Hindu</option>
                  <option value="other">Other</option>
                </select>
            </div>
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="bloodtype">Blood Group</label>
           <div class="controls col-md-4">
                <select name="bloodtype" id="bloodtype" class="form-control form-control-inline col-md-4" >
                <option value="" >---Select---</option>
                  <option value="A" >A</option>
                  <option value="B" >B</option>
                  <option value="AB">AB</option>
                  <option value="O">O</option>
                </select>
            </div>
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="citizenid">Citizen ID<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
               <input name="citizenid" type="text" id="citizenid" class="form-control form-control-inline col-md-4"  >
                            
            </div>
            <label class="control-label col-md-2" for="passport">If not Myanmar Citizen,enter passport number</label>
            <div class="controls col-md-4">
               <input name="passport" type="text" id="passport" class="form-control form-control-inline col-md-4"  >
                            
            </div>
    </div>
  </div>
  <br><hr>
  <!-- Mailing Address -->
  <div class="container" >
    <div class="row">
      <h4>Mailing Address </h4>
    </div>
    
    
    
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="address">Address No:<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
               <input name="address" type="text" id="address" class="form-control form-control-inline col-md-4"  >
                            
            </div>
            
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="street">Street<span class="help-inline">*</span></label>
        <div class="controls col-md-4">
               <input name="street" type="text" id="street" class="form-control form-control-inline col-md-4"  >
                            
            </div>  
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="township">Township<span class="help-inline">*</span></label>
        <div class="controls col-md-4">
               <input name="township" type="text" id="township" class="form-control form-control-inline col-md-4"  >
                            
            </div> 
            <label class="control-label col-md-2" for="city">City<span class="help-inline">*</span></label>
        <div class="controls col-md-4">
               <input name="city" type="text" id="city" class="form-control form-control-inline col-md-4"  >
                            
        </div>  
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="zipcode">Zip Code</label>
            <div class="controls col-md-4">
               <input name="zipcode" type="text" id="zipcode" class="form-control form-control-inline col-md-4"  >
                            
            </div>
            
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="township">Telephone</label>
        <div class="controls col-md-4">
               <input name="telephone" type="text" id="telephone" class="form-control form-control-inline col-md-4"  >
                            
            </div> 
            <label class="control-label col-md-2" for="mobile">Mobile<span class="help-inline">*</span></label>
        <div class="controls col-md-4">
               <input name="mobile" type="text" id="mobile" class="form-control form-control-inline col-md-4"  >
                            
        </div>  
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="facebook">Facebook</label>
            <div class="controls col-md-4">
               <input name="facebook" type="text" id="facebook" class="form-control form-control-inline col-md-4"  >
                            
            </div>
            
    </div>
  </div>
  <br><hr>
  <!-- father's information -->
  <div class="container" >
    <div class="row">
      <h4>Father's Information </h4>
    </div>
    
    
    
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="fname">Name<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
               <input name="fname" type="text" id="fname" class="form-control form-control-inline col-md-4"  >
                            
            </div>
            
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="fnationality">Nationality</label>
            <div class="controls col-md-4">
               <input name="fnationality" type="text" id="fnationality" class="form-control form-control-inline col-md-4"  >
                            
            </div>
            <label class="control-label col-md-2" for="fcitizen">Citizenship</label>
            <div class="controls col-md-4">
               <input name="fcitizen" type="text" id="fcitizen" class="form-control form-control-inline col-md-4"  >
                            
            </div>
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="fstatus">Status</label>
            <div class="controls col-md-4">
            <label class="radio-inline"><input type="radio" name="fstatus" value="living" id="fliving" checked>Living</label>
            <label class="radio-inline"><input type="radio" name="fstatus" value="decease" id="fdecease">Decease</label>
                            
            </div>
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="fage">Age</label>
        <div class="controls col-md-4">
               <input name="fage" type="text" id="fage" class="form-control form-control-inline col-md-4"  >
               <?php if (!empty($fageError)): ?>
                <span class="help-inline"><?php echo $fageError;?></span>
                <?php endif; ?>            
            </div>  
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="foccupation">Occuputation</label>
        <div class="controls col-md-4">
               <input name="foccupation" type="text" id="foccupation" class="form-control form-control-inline col-md-4"  >
                            
            </div>  
            <label class="control-label col-md-2" for="fposition">Position</label>
        <div class="controls col-md-4">
               <input name="fposition" type="text" id="fposition" class="form-control form-control-inline col-md-4"  >
                            
            </div> 
    </div>
    <br><br>
    <div class="form-check">
        <label class="control-label col-md-2" for="faddress">Father's address</label>
        <div class="controls col-md-4">
               <input name="faddress" type="checkbox" id="faddress" class="form-check-input form-control-inline col-md-4"  >
               <label class="form-check-label" for="faddress">Same as applicant's address</label>           
        </div>  
    </div>
    <br><br>
    <div class="form-group">
        <label class="control-label col-md-2" for="street">Street</label>
        <div class="controls col-md-4">
               <input name="street" type="text" id="street" class="form-control form-control-inline col-md-4"  >
                            
            </div>  
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="township">Township<span class="help-inline">*</span></label>
        <div class="controls col-md-4">
               <input name="township" type="text" id="township" class="form-control form-control-inline col-md-4"  >
                            
            </div> 
            <label class="control-label col-md-2" for="city">City<span class="help-inline">*</span></label>
        <div class="controls col-md-4">
               <input name="city" type="text" id="city" class="form-control form-control-inline col-md-4"  >
                            
        </div>  
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="zipcode">Zip Code</label>
            <div class="controls col-md-4">
               <input name="zipcode" type="text" id="zipcode" class="form-control form-control-inline col-md-4"  >
                            
            </div>
            
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="township">Telephone<span class="help-inline">*</span></label>
        <div class="controls col-md-4">
               <input name="telephone" type="text" id="telephone" class="form-control form-control-inline col-md-4"  >
                            
            </div> 
            <label class="control-label col-md-2" for="mobile">Mobile<span class="help-inline">*</span></label>
        <div class="controls col-md-4">
               <input name="mobile" type="text" id="mobile" class="form-control form-control-inline col-md-4"  >
                            
        </div>  
    </div>    <br>
    
  
  </div>
  <br><hr>
  <div class="container" >
    <div class="row">
      <h4>Mother's Information </h4>
    </div>
    
    
    
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="fname">Name<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
               <input name="fname" type="text" id="fname" class="form-control form-control-inline col-md-4"  >
                            
            </div>
            
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="fnationality">Nationality</label>
            <div class="controls col-md-4">
               <input name="fnationality" type="text" id="fnationality" class="form-control form-control-inline col-md-4"  >
                            
            </div>
            <label class="control-label col-md-2" for="fcitizen">Citizenship</label>
            <div class="controls col-md-4">
               <input name="fcitizen" type="text" id="fcitizen" class="form-control form-control-inline col-md-4"  >
                            
            </div>
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="status">Status</label>
            <div class="controls col-md-4">
            <label class="radio-inline"><input type="radio" name="mstatus" id="mliving" checked>Living</label>
            <label class="radio-inline"><input type="radio" name="mstatus" id="mdecese">Decese</label>
                            
            </div>
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="fage">Age</label>
        <div class="controls col-md-4">
               <input name="fage" type="text" id="fage" class="form-control form-control-inline col-md-4"  >
                            
            </div>  
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="foccupation">Occuputation</label>
        <div class="controls col-md-4">
               <input name="foccupation" type="text" id="foccupation" class="form-control form-control-inline col-md-4"  >
                            
            </div>  
            <label class="control-label col-md-2" for="fposition">Position</label>
        <div class="controls col-md-4">
               <input name="fposition" type="text" id="fposition" class="form-control form-control-inline col-md-4"  >
                            
            </div> 
    </div>
    <br><br>
    <div class="form-check">
        <label class="control-label col-md-2" for="maddress">Mother's address</label>
        <div class="controls col-md-4">
               <input name="maddress" type="checkbox" id="faddress" class="form-check-input form-control-inline col-md-4"  >
               <label class="form-check-label" for="faddress">Same as applicant's address</label>           
        </div>  
    </div>
    <br><br>
    <div class="form-group">
        <label class="control-label col-md-2" for="street">Street</label>
        <div class="controls col-md-4">
               <input name="street" type="text" id="street" class="form-control form-control-inline col-md-4"  >
                            
            </div>  
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="township">Township<span class="help-inline">*</span></label>
        <div class="controls col-md-4">
               <input name="township" type="text" id="township" class="form-control form-control-inline col-md-4"  >
                            
            </div> 
            <label class="control-label col-md-2" for="city">City<span class="help-inline">*</span></label>
        <div class="controls col-md-4">
               <input name="city" type="text" id="city" class="form-control form-control-inline col-md-4"  >
                            
        </div>  
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="zipcode">Zip Code</label>
            <div class="controls col-md-4">
               <input name="zipcode" type="text" id="zipcode" class="form-control form-control-inline col-md-4"  >
                            
            </div>
            
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="township">Telephone</label>
        <div class="controls col-md-4">
               <input name="telephone" type="text" id="telephone" class="form-control form-control-inline col-md-4"  >
                            
            </div> 
            <label class="control-label col-md-2" for="mobile">Mobile<span class="help-inline">*</span></label>
        <div class="controls col-md-4">
               <input name="mobile" type="text" id="mobile" class="form-control form-control-inline col-md-4"  >
                            
        </div>  
    </div>    <br>
    <br><hr>
  <div class="container" >
    <div class="row">
      <h4>Guardian's Information </h4>
    </div>    
    
    
    <div class="form-group ">
        <label class="control-label col-md-2" for="status">Status</label>
            <div class="controls col-md-4">
            <label class="radio-inline"><input type="radio" name="gstatus" value="father" id="father" checked>Father</label>
            <label class="radio-inline"><input type="radio" name="gstatus" value="mother" id="mother">Mother</label>
            <label class="radio-inline"><input type="radio" name="gstatus" value="other" id="other">Other</label>
                    
            </div>
    </div>
    <div id="guardianInfo"></div>     
    
    
  
  </div>
  <br><hr>
    <div class="col-md-12 button">
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
</form>
</div>
<script>
$(document).ready(function(){

$('#other').on('change', function () {

    var gstatus = $(this).val();
    console.log(gstatus);
   
    
    $.ajax({
        type: "POST",
        url: "show_guardian.php",
        // dataType: 'json',
        data: {'gstatus': gstatus },
        success: function (html) {
            
            console.log(html);
            $('#guardianInfo').html(html);
            
           
        }
    });
});


$('#father').on('change', function () {

var gstatus = $(this).val();
console.log(gstatus);


$.ajax({
    type: "POST",
    url: "show_guardian.php",
    // dataType: 'json',
    data: {'gstatus': gstatus },
    success: function (json) {
        
        console.log(json);
        $('#guardianInfo').html(json);
        
       
    }
});
});

$('#mother').on('change', function () {

var gstatus = $(this).val();
console.log(gstatus);


$.ajax({
    type: "POST",
    url: "show_guardian.php",
    // dataType: 'json',
    data: {'gstatus': gstatus },
    success: function (json) {
        
        console.log(json);
        $('#guardianInfo').html(json);
        
       
    }
});
});

});


</script>

</body>
</html>