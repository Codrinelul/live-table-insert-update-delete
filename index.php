<html>

<head>
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <br />
        <h1>Tabel</h1>
        <br />
        <br />
        <div class="table-responsive">
            <span id="result"></span>
            <div id="live_data"></div>
        </div>
    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        function fetch_data() {
            $.ajax({
                url: "select.php",
                method: "POST",
                success: function(data) {
                    $('#live_data').html(data);
                }
            });
        }
        fetch_data();
        $(document).on('click', '#btn_add', function() {
            var name = $('#name').text();
            var email = $('#email').text();
            var phone = $('#phone').text();
            var address = $('#address').text();
            if (name == '') {
                alert("Enter  Name");
                return false;
            }
            if (email == '') {
                alert("Enter email");
                return false;
            }
            if (phone == '') {
                alert("Enter phone");
                return false;
            }
            if (address == '') {
                alert("Enter address");
                return false;
            }
            $.ajax({
                url: "insert.php",
                method: "POST",
                data: {
                    name: name,
                    email: email,
                    phone: phone,
                    address: address
                },
                dataType: "text",
                success: function(data) {
                    alert(data);
                    fetch_data();
                }
            })
        });

        function edit_data(id, text, column_name) {
            $.ajax({
                url: "edit.php",
                method: "POST",
                data: {
                    id: id,
                    text: text,
                    column_name: column_name
                },
                dataType: "text",
                success: function(data) {
                    //alert(data);
                    $('#result').html("<div class='alert alert-success alert-dismissible fade show' role='alert'>" + data + "<button type='button'class='btn-close' data-bs-dismiss='alert' aria-label='Close'>" + "</div>");
                }
            });
        }
        $(document).on('blur', '.name', function() {
            var id = $(this).data("id1");
            var name = $(this).text();
            edit_data(id, name, "name");
        });
        $(document).on('blur', '.email', function() {
            var id = $(this).data("id2");
            var email = $(this).text();
            edit_data(id, email, "email");
        });
        $(document).on('blur', '.phone', function() {
            var id = $(this).data("id3");
            var phone = $(this).text();
            edit_data(id, phone, "phone");
        });
        $(document).on('blur', '.address', function() {
            var id = $(this).data("id4");
            var address = $(this).text();
            edit_data(id, address, "address");
        });
        $(document).on('click', '.btn_delete', function() {
            var id = $(this).data("id5");
            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    url: "delete.php",
                    method: "POST",
                    data: {
                        id: id
                    },
                    dataType: "text",
                    success: function(data) {
                        alert(data);
                        fetch_data();
                    }
                });
            }
        });
    });
</script>