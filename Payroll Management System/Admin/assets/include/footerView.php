<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        const hamBurger = document.querySelector(".toggle-btn");
        hamBurger.addEventListener("click", function() {
            document.querySelector("#sidebar").classList.toggle("expand");
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.view-butt').click(function(e) {
                e.preventDefault();
                var user_id = $(this).closest('tr').find('.user_id').text();
                console.log(user_id);
                $.ajax({
                    method: "POST",
                    url: "handler.inc.php",
                    data: {
                        'view_btn': true,
                        'user_id': user_id,
                    },
                    success: function(response) {
                        $('#viewData').modal('show');
                        $('.view_user_data').html(response);
                    }
                });
            });
        });
        $(document).ready(function() {
            $('.edit-butt').click(function(e) {
                e.preventDefault();
                var user_id = $(this).closest('tr').find('.user_id').text();
                console.log(user_id);
                $.ajax({
                    method: "POST",
                    url: "handler.inc.php",
                    data: {
                        'edit-btn': true,
                        'user_id': user_id,
                    },
                    success: function(response) {
                        $.each(response, function(Key, value) {
                            $('#Id').val(value['Id']);
                            $('#Fname').val(value['Fname']);
                            $('#Mname').val(value['Mname']);
                            $('#Lname').val(value['Lname']);
                            $('#Email').val(value['Email']);
                            $('#Contact').val(value['Contact']);
                            $('#Hiredate').val(value['Hiredate']);
                            $('#Dept').val(value['Dept']);
                            $('#Role').val(value['Role']);
                            $('#Birthdate').val(value['Birthdate']);
                        });
                        $('#editData').modal('show');
                    }
                });
            });
        });
        $(document).ready(function() {
    $('.delete-butt').click(function(e) {
        e.preventDefault();
        var user_id = $(this).closest('tr').find('.user_id').text();
        $('#delete_id').val(user_id);
        $('#deleteDataModal').modal('show');
    });

    $('#delete_data').click(function(e) {
        e.preventDefault();
        var user_id = $('#delete_id').val();
        $.ajax({
            method: "POST",
            url: "handler.inc.php",
            data: {
                'delete_btn': true,
                'user_id': user_id,
            },
            success: function(response) {
                location.reload(); 
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); 
            }
        });
    });
});
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
      <script src="assets/js/script.js"></script>
      <?php
      if (isset($_SESSION['updateStatus'])) {
        ?>
        <script> 
            swal({
            title: "<?php echo $_SESSION['updateStatus']; ?>",
            icon: "<?php echo $_SESSION['updateStatus_code']; ?>",
          });
          </script>
          <?php
          unset($_SESSION['updateStatus']);
      }
    ?>
     <?php
      if (isset($_SESSION['delete_message'])) {
        ?>
        <script> 
            swal({
            title: "<?php echo $_SESSION['delete_message']; ?>",
            icon: "<?php echo $_SESSION['delete_message_code']; ?>",
          });
          </script>
          <?php
          unset($_SESSION['delete_message']);
      }
    ?>
</body>
</html>