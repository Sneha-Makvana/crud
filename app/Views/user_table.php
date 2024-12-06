<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>User Table</title>
</head>

<body>
    <!-- <div class="container mt-5">
        <h2 class="mb-4">User List</h2> -->

    <table class="table table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>Profile</th>
            <th>UserName</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Phone Number</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody id="userTable"></tbody>
    </table>
    </div>

    <script>
        function fetchUsers() {
            $.ajax({
                url: "UserController/fetchUsers",
                method: "GET",
                success: function(response) {
                    let rows = '';
                    response.forEach(user => {
                        rows += `<tr>
                            <td>${user.id}</td>
                            <td><img src='uploads/${user.profile_images}' alt='Profile Image' width='50' height='50'></td>
                            <td>${user.username}</td>
                            <td>${user.lname}</td>
                            <td>${user.email}</td>
                            <td>${user.gender}</td>
                            <td>${user.phone_number}</td>
                            <td>
                            <a href="<?= base_url('/form') ?>?id=${user.id}" class="btn btn-warning btn-sm">Edit</a>
                            </td>
                            <td>
                            <button class="btn btn-danger btn-sm" onclick="deleteUser(${user.id})">Delete</button>
                            </td>
                        </tr>`;
                    });
                    $('#userTable').html(rows);
                }
            });
        }

        function deleteUser(id) {
            if (confirm('Are you sure?')) {
                $.ajax({
                    url: `<?= base_url('UserController/deleteUser/') ?>${id}`,
                    method: "DELETE",
                    success: function(response) {
                        alert(response.message);
                        fetchUsers();
                    }
                });
            }
        }

        $(document).ready(function() {
            fetchUsers();
        });
    </script>
</body>

</html>