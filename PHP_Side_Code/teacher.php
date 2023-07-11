<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BitLearn | Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="faviconsite.jpg" />
   
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row pt-0">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
           <h1></h1>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">

          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="teacherimg.png" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">Admin</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-email-outline"></i>
                <span class="count-symbol bg-warning"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
               
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                <span class="count-symbol bg-danger"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
               
              </div>
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
            <li class="nav-item nav-settings d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-format-line-spacing"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="teacherimg.png" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">Admin</span>
                  <span class="text-secondary text-small">VIT Pune</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="teacher.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
         


            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                
                </div>
                <button class="btn btn-block btn-lg btn-gradient-primary mt-4"> Logout</button>

              </span>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Teacher's Dashboard
              </h3>
            </div>

            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">
                    </h4>
                    <h2 class="mb-5"><br> Record Lectures  <br><i class="mdi mdi-chart-line mdi-24px float-right"></i></h2>
                    Upload your Audio/Video lectures
                    <h6 class="card-text"></h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">
                    </h4>
                    <h2 class="mb-5"><br>Summarize lectures<i class="mdi mdi-bookmark-outline mdi-24px float-right"></i></h2>
                    Get detailed summary of your lectures
                    <h6 class="card-text"></h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">
                    </h4>
                    <h2 class="mb-5"><br>Lectures history<br><i class="mdi mdi-diamond mdi-24px float-right"></i></h2>
                    Get history of your previously summarized lectures
                    <h6 class="card-text"></h6>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="clearfix">

                      <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white me-2">
                          <i class="mdi mdi-microphone"></i>
                        </span>
                        Record Lectures
                      </h3>


                        <!--i frame-->
                    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
                    <script type="text/javascript">
                    $(function(){
                        $('.iframe_mic').click(function(){ 
                            if(!$('#iframe').length) {
                                    $('#iframeHolder').html('<iframe id="iframe" src="assets/images/mic2croped.gif" width="700" height="220" margin-left="10px" margin-top="0px" align="center" scrolling="no"></iframe>');
       
                            }
                          
                        });   
                    });
                    </script>
                    <div id="iframeHolder"  margin="auto" width="50%" padding="10px"></div>
                   
                      <!--i frame end-->
                    <div id="controls"><br>
                  <button id="recordButton" class="iframe_mic btn btn-block btn-lg btn-gradient-warning mt-4">Record</button>
                  <button id="pauseButton" class="btn btn-block btn-lg btn-gradient-info mt-4" disabled>Pause</button>
                  <script type="text/javascript">
                            $(function(){
                                $('.stop_class').click(function(){ 
                                  iframe.style.display = 'none';
                                });   
                            });
                    </script>
                                                                            <button id="stopButton" class="btn btn-block btn-lg btn-gradient-primary mt-4 stop_class" disabled>Stop</button>
                                                                            </div>
                                                                            <div id="formats"></div>  
                                                                          <p><strong>Recordings:</strong></p>
                                                                          <ol id="recordingsList"></ol>
                      <!-- <button id="mybutton" class="btn btn-block btn-lg btn-gradient-info mt-4"> Record</button>
                      <div class="container">
                           <div class="display">

                           </div>
                           <div class="controllers">

                           </div>
                      </div> -->
                    
                      


                    </div>

                  </div>
                </div>
              </div>

              <!-- upload audio-->
              <iframe src="iframe_upload_audio.php" height="450" scrolling="no" ></iframe>
              
              <!-- upload audio end-->
                    
              <hr style="height:0;width:0">
              <!-- upload video-->
              <iframe src="iframe_upload_video.php" height="450" scrolling="no"></iframe>
              
              <!-- upload video end-->
              </div>  
          
            
          





            
           
            <br>
            <br>
           
            <!-- History section -->

            <!--
              <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">History of summarized lectures</h4>
                    <button class="btn btn-block btn-lg btn-gradient-primary mt-4"> History</button>
                    <div class="table-responsive">
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
              <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- record lecture-->
    <!-- End custom js for this page -->
    <script src="assets/js/recorder.js"></script>
  	<script src="assets/js/app.js"></script>
  </body>
</html>