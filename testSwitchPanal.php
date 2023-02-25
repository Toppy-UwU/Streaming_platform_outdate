<!DOCTYPE html>
<html>
  <head>
    <title>Two Panel Example</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container mt-3">
      <h1 class="text-center">Two Panel Example</h1>
      <div class="text-center mt-3">
        <button id="button1" class="btn btn-primary" onclick="showPanel('panel1')">Show Panel 1</button>
        <button id="button2" class="btn btn-primary" onclick="showPanel('panel2')">Show Panel 2</button>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div id="panel1" class="card">
            <div class="card-header">
              Panel 1
            </div>
            <div class="card-body">
              <?php
                include 'log.php';
                include 'conn.php';

                showLog($conn);
              ?>
            </div>
          </div>
          <div id="panel2" class="card d-none">
            <div class="card-header">
              Panel 2
            </div>
            <div class="card-body">
              <?php
                include 'userList.php';
              ?>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    
    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <script>
      // Function to show selected panel
      function showPanel(panelId) {
        // Hide both panels
        $('#panel1, #panel2').addClass('d-none');
        // Show the selected panel
        $('#' + panelId).removeClass('d-none');
      }
    </script>
  </body>
</html>
