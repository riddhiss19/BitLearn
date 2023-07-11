
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Student Dashboard </title>
  <link rel="stylesheet" href="style_dash.css?v=e103e010c8d8b" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
  <div class="container">
    <nav>
      <ul>
      <li><a href="#" class="logo" >
        <img src="assets\images\logo.jpeg">
          <span class="nav-item"><h1>BitLearn</h1></span>
        </a></li>
         <li><a href="#" class="logo">
          <!-- <img src="assets\images\admin.png">
          <span class="nav-item">
            Hello        
          </span> -->
        </a></li>
       
 
        <li><a href="logout.php" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item" onclick>Log out</span>
        </a></li>
      </ul>
    </nav>


    <section class="main">
      <!-- <div class="main-top">
        <h2>Subjets:</h2>
      </div> -->
      <div class="users">
        <div class="card">
          <img src="assets\images\os.jpeg">
          <h4>Operating System</h4>
          <p>Mrs. Sangita Lade</p>
          <a href="#os"><button>GoTo</button></a>
        </div>
        <div class="card">
          <img src="assets\images\coa.jpeg">
          <h4>Computer Organization and Architecture</h4>
          <p>Mr.S.T Patil</p>
          <a href="#coa"><button>GoTo</button></a>
        </div>
        <div class="card">
          <img src="assets\images\toc.jpeg">
          <h4>Theory of Computation</h4>
          <p>Mrs. Jyoti Kanjalkar</p>
         
          <a href="#toc"><button>GoTo</button></a>
        </div>
        <div class="card">
          <img src="assets\images\ds.jpeg">
          <h4>Data Structure</h4>
          <p>Milind Kulkarni</p>
         
          <a href="#ds"><button>GoTo</button></a>
        </div>
      </div>
  <?php  
            $con=mysqli_connect('localhost','root');
            mysqli_select_db($con,'edi_project');
  ?>
      <section class="attendance">
        <div class="attendance-list">
        
          <h1 id="os">Opearting System</h1>
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Lecture</th>                
                <th>Transcript</th>
                <th>Summery</th>
              </tr>
            </thead>
            <tbody>
          <?php
            $q = "select * from edi_tabel where Subject='OS'";
            $result=mysqli_query($con,$q);
            $cnt = 1;
            while($res=mysqli_fetch_array($result))
            {
           ?>
              <tr>
                <td><?php echo $cnt?></td>
                <td><?php echo $res['Summary_Name'] ?></td>
                <td><?php echo $res['Text'] ?></td>

                <td>

                <form action="temp1.php" method="POST">
  			              <input type="hidden" name="id" value="<?php echo $res['ID'] ?>">
			
			                <button>View</button>
			
			          </form>
                </td>

              </tr>
              <div id="myModal<?php echo $res['ID'] ?>" class="popup">
                    <button type="button" class="close" data-dismiss="dialog">&times;</button>
                    <h3>Summery : <?php echo $res['Summery']; ?></h3>
                    
              </div>
              <?php
             $cnt += 1; }?>
            </tbody>
          </table>
        </div>
        <div class="attendance-list">
          <h1 id="coa">Computer Organization and Architecture</h1>
          <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Lecture</th>                
                <th>Transcript</th>
                <th>Summery</th>
              </tr>
            </thead>
            <tbody>
            <?php
            $q = "select * from edi_tabel where Subject='COA'";
            $result=mysqli_query($con,$q);
            $cnt = 1;
            while($res=mysqli_fetch_array($result))
            {
             ?>
              <tr>
                <td><?php echo $cnt?></td>
                <td><?php echo $res['Summary_Name'] ?></td>
                <td><?php echo $res['Text'] ?></td>
                <td><?php echo $res['Summary'] ?></td>
              </tr>
              <?php
             $cnt += 1;}?>
            </tbody>
          </table>
        </div>
        <div class="attendance-list">
          <h1 id="toc">Theory of Computation</h1>
          <table class="table">
            <thead>
             <tr>
                <th>ID</th>
                <th>Lecture</th>                
                <th>Transcript</th>
                <th>Summery</th>
              </tr>
            </thead>
            <tbody>
            <?php
            $q = "select * from edi_tabel where Subject='TOC'";
            $result=mysqli_query($con,$q);
            $cnt = 1;
            while($res=mysqli_fetch_array($result))
            {
             ?>
              <tr>
                <td><?php echo $cnt?></td>
                <td><?php echo $res['Summary_Name'] ?></td>
                <td><?php echo $res['Text'] ?></td>
                <td><?php echo $res['Summary'] ?></td>
              </tr>
              <?php
            $cnt += 1; }?>
            
            </tbody>
          </table>
        </div>
        <div class="attendance-list">
          <h1 id="ds">Data Structure</h1>
          <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Lecture</th>                
                <th>Transcript</th>
                <th>Summery</th>
              </tr>
            </thead>
            <tbody>
            <?php
            $q = "select * from edi_tabel where Subject='DS'";
            $result=mysqli_query($con,$q);
            $cnt = 1;
            while($res=mysqli_fetch_array($result))
            {
             ?>
              <tr>
                <td><?php echo $cnt ?></td>
                <td><?php echo $res['Summary_Name'] ?></td>
                <td><?php echo $res['Text'] ?></td>
                <td><?php echo $res['Summery'] ?></td>
              </tr>
              <?php
             $cnt++;}?>
            </tbody>
          </table>
        </div>
       
      </section>
    </section>
  </div>

</body>
</html>


<script>
  $ = function(id) {
  return document.getElementById(id);
}

var show = function(id) {
	$(id).style.display ='block';
}
var hide = function(id) {
	$(id).style.display ='none';
}
</script>