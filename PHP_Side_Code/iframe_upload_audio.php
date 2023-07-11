
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
     <!--input field for file name and lenght-->
     <!-- <link rel="stylesheet" href="input_field.css"> -->
      <link rel="stylesheet" href="input_field2.css">
  </head>
  
 
  <body scrolling="no">
  <div id="loader">
  </div>
    <div class="row" scrolling="no" >
      <div class="col-12 grid-margin stretch-card" scrolling="no" >
        <div class="card">
          <div class="card-body">
            
          <div class="input_lecture_details">
              <div class="login-box">
                  <h2 class="title">Enter summary details</h2>
                  <form method="POST" action="" >
                  <div class="make_inline">
                    <div class="user-box">
                      <input type="text" name="lecname" required="" autocomplete="off">
                      <label>Lecture name</label>
                    </div><br>
                    <div class="user-box">
                      <input type="text" name="subject" required="" autocomplete="off">
                      <label>Subject</label>
                    </div><br>
                    <div class="user-box">
                      <input type="text" name="percentage" required="" autocomplete="off">
                      <label>Lenght</label>
                    </div>
                  </div>
                  <div class="file-input">
              <span id="spnFilePath"></span>
              <input type="file" id="file" class="file" name="file">
                
              <label for="file">Select audio file</label>
              </div>
                <input type="submit" value="Submit" id="wavtomp3" name="submit" >
                </div>
              </div>
              </form>
              <?php
 
 if(array_key_exists('submit', $_POST))
 {
     $file = $_POST['file'];
     $lecname = $_POST['lecname'];
     $subject = $_POST['subject'];
     $percentage = $_POST['percentage'];
     

     $con=mysqli_connect('localhost','root');
     mysqli_select_db($con,'edi_project');

      $qy="insert into EDI_Tabel (Summary_Name,Subject,Percentage,WAV,MP4,MP3,Text,Summary,Flag) values('$lecname','$subject','$percentage','$file','0','$file','0','0','0')";
       mysqli_query($con,$qy);
 } 
?>

            <div class="clearfix">

              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-arrow-up-bold-circle"></i>
                </span>
                Upload Audio Lectures
              </h3>
              
             
              <!-- <form method="POST">
               <input type="submit" name="btn2" value="btn2">Refresh</input>
              </form> -->
             <br><br>
           
          

            <!-- <div class="input_lecture_details">
                     inputs for file name and lenght
                  <input class="c-checkbox" type="checkbox" id="checkbox">
                  <div class="c-formContainer">
                  <form class="c-form" action="">
                      <input class="c-form__input" placeholder="E-mail" type="email" required>
                      <label class="c-form__buttonLabel" for="checkbox">
                      <button class="c-form__button" type="button">Send</button>
                      </label>
                      <label class="c-form__toggle" for="checkbox" data-title="Notify me"></label>
                  </form>
                  </div>
              </div>
          <div > -->

              <div class="main">
            
              
             
            <div class="buttons_conversion">
               <!-- <button id="btnFileUpload" value="Select File" class="btn btn-block btn-lg btn-gradient-info mt-4" name="Transcriptbtn"> Wav_Mp3 </button> -->
               <form action="" method="POST">
               <input type="submit" value="Wav To MP3" id="WavToMp3" name="WavToMp3" visibility="hidden"></input>
               </form>
               <?php
                   if(array_key_exists('WavToMp3', $_POST))
                   {
                    $true=system("C:\Users\Vishal\AppData\Local\Programs\Python\Python311\python.exe C:\Users\Vishal\PycharmProjects\EDI_07_Lec-Transcript\Wav_MP3.py");
                    if($true != " ")
                    {
                      echo '<script>swal("Done....!", "File Converted To MP3!!!", "success");</script>';
                    }
                   }
                ?>


               <!--<button id="btnFileUpload" value="Select File" class="btn btn-block btn-lg btn-gradient-info mt-4" name="Transcriptbtn"> Audio_Text </button>-->
               <form action="" method="POST">
               <input type="submit" value="Audio_Text" id="Audio_Text" name="Audio_Text" visibility="hidden"></input>
               </form>
               <?php
                   set_time_limit(12000);
                   if(array_key_exists('Audio_Text', $_POST))
                   {
                    $true=exec("C:\Users\Vishal\AppData\Local\Programs\Python\Python311\python.exe C:\Users\Vishal\PycharmProjects\EDI_07_Lec-Transcript\Extra\Audio_to_Text_API.py");
                    if($true != " ")
                    {
                      echo '<script>swal("Done....!", "You can check Summary at User End!!!", "success");</script>';
                    }
                   }
                ?>
               <!-- <button id="btnFileUpload" value="Select File" class="btn btn-block btn-lg btn-gradient-primary mt-4"> Summarize </button> -->
               <form action="" method="POST">
               <input type="submit" value="Summarize" id="summrize" name="summrize">
               </form>
             
                  
            </div>
</div>
        </div>
            </div>

          </div>
       


          

        
      </div>
  </body>






<?php
                   if(array_key_exists('summrize', $_POST))
                   {
                    $true=system("C:\Users\Vishal\AppData\Local\Programs\Python\Python311\python.exe C:\Users\Vishal\PycharmProjects\EDI_07_Lec-Transcript\Extra\Summary_2.py");
                    if($true != " ")
                    {
                      echo '<script>swal("Done....!", "You Can Check Summary At User End!!!", "success");</script>';
                    }}
?>