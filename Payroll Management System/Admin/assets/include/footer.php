<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
      <script src="assets/js/script.js"></script>
      <?php
      if (isset($_SESSION['saveStatus'])) {
        ?>
        <script> 
              swal({
            title: "<?php echo $_SESSION['saveStatus']; ?>",
            icon: "<?php echo $_SESSION['saveStatus_code']; ?>",
          });
          
          </script>
          </div> 
          <?php
          unset($_SESSION['saveStatus']);
      }
    ?>
  </body>
</html>