<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            background-color: #f4f4f9;
            color: #333;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0px 4px 6px rgb(149 140 140 / 10%);
            background-color: #ffffff;
            padding: 20px;
            margin-top: 20px;
            width: 900px;
            margin-left: -147px;
        }

        .form-label {
            font-weight: 600;
            color: #555;
        }

        .input-group-text {
            background-color: #e9ecef;
            color: #495057;
        }

        .form-control {
            background-color: #f9f9f9;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
        }

        .btn-primary {
            background-color: #5a67d8;
            border-color: #5a67d8;
        }

        .btn-primary:hover {
            background-color: #434190;
            border-color: #434190;
        }

        .text-danger {
            font-weight: bold;
        }

        h4 {
            color: #333;
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
        }

        .container {
            max-width: 720px;
        }
    </style>

    <title>User Form</title>
</head>

<body>
    <section class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="container">
            <div class="card">
                <h4>User Details Form</h4>
                <form id="userForm" enctype="multipart/form-data">
                    <input type="hidden" id="userId" name="userId" value="">

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="username" class="form-label">User Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter user name">
                            </div>
                            <div class="error-message text-danger" id="error-username"></div>
                        </div>
                        <div class="col-md-6">
                            <label for="lname" class="form-label">Last Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter last name">
                            </div>
                            <div class="error-message text-danger" id="error-lname"></div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                            </div>
                            <div class="error-message text-danger" id="error-email"></div>
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                            </div>
                            <div class="error-message text-danger" id="error-password"></div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter phone number">
                            </div>
                            <div class="error-message text-danger" id="error-phone_number"></div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Gender</label>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" id="male" name="gender" value="Male">
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="female" name="gender" value="Female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>
                            <div class="error-message text-danger" id="error-gender"></div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="subject" class="form-label">Subject</label>
                            <select id="subject" name="subject" class="form-control">
                                <option selected disabled>Choose an option</option>
                                <option value="MBA">MBA</option>
                                <option value="MCA">MCA</option>
                                <option value="BCA">BCA</option>
                                <option value="BBA">BBA</option>
                            </select>
                            <div class="error-message text-danger" id="error-subject"></div>
                        </div>
                        <div class="col-md-6">
                            <label for="profile_images" class="form-label">Profile Image</label>
                            <input type="file" id="profile_images" name="profile_images" class="form-control">
                            <div id="currentProfileImage"></div>
                            <div class="error-message text-danger" id="error-profile_images"></div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-4">Save</button>
                    </div>

                    <div id="responseMessage" class="mt-3"></div>
                </form>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            const userId = getQueryParameter('id');

            if (userId) {
                fetchUserData(userId);
            }

            function fetchUserData(id) {
                $.ajax({
                    url: `<?= base_url('UserController/fetchUser') ?>/${id}`,
                    method: 'GET',
                    success: function(response) {
                        if (response.status === 'success') {
                            populateForm(response.data);
                        } else {
                            alert('Failed to fetch user data: ' + response.message);
                        }
                    },
                    error: function() {
                        alert('An error occurred while fetching user data.');
                    }
                });
            }

            function populateForm(data) {
                $("#userId").val(data.id);
                $("#username").val(data.username);
                $("#lname").val(data.lname);
                $("#email").val(data.email);
                $(`input[name="gender"][value="${data.gender}"]`).prop("checked", true);
                $("#phone_number").val(data.phone_number);
                $("#subject").val(data.subject);

                if (data.profile_images) {
                    $("#currentProfileImage").html(
                        `<p>Current Image: <a href="./uploads/${data.profile_images}" target="_blank">${data.profile_images}</a></p>`
                    );
                }
            }

            $("#userForm").on('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                const formAction = userId ? 'updateUser' : 'createUser';

                $(".error-message").html("");

                $.ajax({
                    url: `<?= base_url('UserController/') ?>${formAction}`,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status === 'success') {
                            $("#responseMessage").html('<p class="text-success">' + response.message + '<a href="/table">View</a>' + '</p>');
                            $("#userForm")[0].reset();
                            // if (userId) {
                            //     window.location.href = '/table';
                            // }
                        } else if (response.status === 'error') {
                            let errors = response.errors;
                            for (let key in errors) {
                                $("#error-" + key).html(errors[key]);
                            }
                        }
                    },
                    error: function() {
                        $("#responseMessage").html('<p class="text-danger">An error occurred while submitting the form. Please try again.</p>');
                    }
                });
            });

            function getQueryParameter(param) {
                const urlParams = new URLSearchParams(window.location.search);
                return urlParams.get(param);
            }
        });
    </script>


</body>

</html>