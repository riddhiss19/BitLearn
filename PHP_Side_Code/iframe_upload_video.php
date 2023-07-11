
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
    <div class="row" scrolling="no" >
      <div class="col-12 grid-margin stretch-card" scrolling="no" >
        <div class="card">
          <div class="card-body">
            
          <div class="input_lecture_details">
              <div class="login-box">
                  <h2 class="title">Enter summary details</h2>
                  <form>
                  <div class="make_inline">
                    <div class="user-box">
                      <input type="text" name="" required="">
                      <label>Lecture name</label>
                    </div><br>
                    <div class="user-box">
                      <input type="password" name="" required="">
                      <label>Password</label>
                    </div><br>
                    <div class="user-box">
                      <input type="password" name="" required="">
                      <label>Password</label>
                    </div>
                  </div>
                  <div class="file-input">
              <span id="spnFilePath"></span>
              <input type="file" id="file" class="file" name="file">
                
              <label for="file">Select Video file</label>
              </div>
                  <input type="submit" value="Submit" id="WavToMp3" name="submit" >
                  </form>
                </div>
              </div>
            <div class="clearfix">

              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-arrow-up-bold-circle"></i>
                </span>
                Upload Video Lectures
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
               <input type="submit" value="Video To Audio" id="WavToMp3" name="Videotoaudio" >
               </form>
             
               <!--<button id="btnFileUpload" value="Select File" class="btn btn-block btn-lg btn-gradient-info mt-4" name="Transcriptbtn"> Audio_Text </button>-->
               <form action="" method="POST">
                  <input type="submit" value="Audio to text" id="Audio_Text" name="Audio_Text" >
               </form>

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
                   if(array_key_exists('submit', $_POST))
                   {
                       $var = $_POST['file'];
                       

                       $con=mysqli_connect('localhost','root');
                       mysqli_select_db($con,'edi_project');

                        $qy="insert into EDI_Tabel (WAV,MP4,MP3,Text,Summary,Flag) values('$var','0','$var','0','0','0')";
 	                      mysqli_query($con,$qy);
                   } 
  ?>

<?php
                   if(array_key_exists('Videotoaudio', $_POST))
                   {
                    $true=system("C:\Users\Vishal\AppData\Local\Programs\Python\Python311\python.exe C:\Users\Vishal\PycharmProjects\EDI_07_Lec-Transcript\Video_audio.py");
                   }
?>

<?php
                   set_time_limit(12000);
                   if(array_key_exists('Audio_Text', $_POST))
                   {
                    exec("C:\Users\Vishal\AppData\Local\Programs\Python\Python311\python.exe C:\Users\Vishal\PycharmProjects\EDI_07_Lec-Transcript\Audio_Text.py");
                   }
?>

<?php
                   if(array_key_exists('summrize', $_POST))
                   {
                    system("C:\Users\Vishal\AppData\Local\Programs\Python\Python311\python.exe C:\Users\Vishal\PycharmProjects\EDI_07_Lec-Transcript\Algo_Transcript.py");
                   }
?>