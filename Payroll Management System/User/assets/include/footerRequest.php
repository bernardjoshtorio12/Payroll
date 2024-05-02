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

    
<script>
                $(document).ready(function() {
                $('.approve-butt').click(function(e) {
                    e.preventDefault();
                    var user_id = $(this).closest('tr').find('.user_id').text();
                    $.ajax({
                        method: "POST",
                        url: "handler.inc.php",
                        data: {
                            'approve-btn': true,
                            'user_id': user_id,
                        },
                        success: function(response) {
                            console.log(response);
                            location.reload();
                        }
                    });
                });
            });
            $(document).ready(function() {
                $('.decline-butt').click(function(e) {
                    e.preventDefault();
                    var user_id = $(this).closest('tr').find('.user_id').text();
                    $.ajax({
                        method: "POST",
                        url: "handler.inc.php",
                        data: {
                            'decline-btn': true,
                            'user_id': user_id,
                        },
                        success: function(response) {
                            console.log(response);
                            location.reload();
                        }
                    });
                });
            });
    </script>
    <?php
      if (isset($_SESSION['approve'])) {
        ?>
        <script> 
              swal({
            title: "<?php echo $_SESSION['approve']; ?>",
            icon: "<?php echo $_SESSION['approve_code']; ?>",
          });
          </script>
          <?php
          unset($_SESSION['approve']);
      }
    ?>
    <?php
      if (isset($_SESSION['decline'])) {
        ?>
        <script> 
              swal({
            title: "<?php echo $_SESSION['decline']; ?>",
            icon: "<?php echo $_SESSION['decline_code']; ?>",
          });
          </script>
          <?php
          unset($_SESSION['decline']);
      }
    ?>
  </body>
</html>
