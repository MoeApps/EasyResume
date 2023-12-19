<?php


require '../vendor/autoload.php';

use Dompdf\Dompdf;


//setup database connection 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "EasyResume";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
//get the signed user object  stored in the session 
$user=$_SESSION["user"];
$userid=$user->getid();
$sql ="select * from skills where user_id=$userid";
//get the user skills 
$skills_array=mysqli_query($conn,$sql);
//get the user educations 
$sql="select * from education where user_id=$userid";
$education_array=mysqli_query($conn,$sql);
//----------------
$sql="select * from work_experience where user_id=$userid";
$experience_array=mysqli_query($conn,$sql);
//---------------------
$sql="select * from certifications where user_id=$userid";
$certifications_array=mysqli_query($conn,$sql);
$dompdf = new Dompdf();
$html="<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Your Name - Resume</title>
  <style>
  body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }

  .container {
    max-width: 794px; /* A4 width in pixels (210mm converted to pixels at 96dpi) */
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
  }

  .header {
    text-align: center;
    margin-bottom: 20px;
  }

  .name {
    font-size: 20px;
    font-weight: bold;
    color: #333;
    margin-bottom: 5px;
  }

  .profession {
    font-size: 16px;
    color: #555;
  }

  .section {
    margin-bottom: 15px;
  }

  .section-title {
    font-size: 18px;
    font-weight: bold;
    color: #3498db; /* Blue */
    margin-bottom: 10px;
  }

  .subheading {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 8px;
    color: #333;
  }

  .content {
    font-size: 14px;
    color: #555;
    line-height: 1.5;
    margin-bottom: 8px;
  }

  .skills {
    display: flex;
    flex-wrap: wrap;
    margin-bottom: 10px;
  }

  .skill {
    font-size: 14px;
    background-color: #3498db; /* Blue */
    color: #fff;
    padding: 6px 10px;
    margin: 5px;
    border-radius: 5px;
  }
</style>


</head>
<body>

  <div class='container'>
    <div class='header'>";
   $html.= "  <div class='name'>";
   $html.=$user->getname();
   $html.="</div>
   </div>
   <div class='section'>
     <div class='section-title'>Certifications </div>";
foreach($certifications_array as $ca){
    $html.=" <div class='content'>".$ca["certification_name"]." | ".$ca["Issuing_organization"]." | ".$ca["date_obtained"]."</div>";
}
$html.="</div>
<div class='section'>
      <div class='section-title'>Education</div>
      ";
      foreach($education_array as $ea){
        $html.=" <div class='subheading'>".$ea["degree"]."</div>
        <div class='content'>".$ea["major"]."</div>
        <div class='content'>Graduated: ".$ea["graduation_date"]."</div>";
      }
      $html.="  </div>

      <div class='section'>
        <div class='section-title'>Experiences</div>";
        foreach($experience_array as $ea){
            $html.="<div class='subheading'>".$ea["job_title"]."</div>
            <div class='content'>".$ea["company_name"]."</div>
            <div class='content'>".$ea["start_date"]." | ".$ea["end_date"]."</div>
            <div class='content'>
              ".$ea["responsibilites"]."
            </div>";
       }
        $html.=" </div>

        <div class='section'>
          <div class='section-title'>Skills</div>
          <div class='skills'>";
          foreach($skills_array as $sa){

         $html.="<div class='skill'>".$ea["skill_name"]."</div>";
          }
          $html.=" </div>
          </div>
      
          <div class='section'>
            <div class='section-title'>Contact</div>";
            $html.=" <div class='content'>Email: ".$user->getemail()."</div>";
            $html.=" <div class='content'>phone: ".$user->getphone()."</div>";
            $html.="  </div>
            </div>

           </body>
           </html>";
              $dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render("ِEasy-Resume");

// Output the generated PDF to Browser
$dompdf->stream("Easy-resume");


?>
