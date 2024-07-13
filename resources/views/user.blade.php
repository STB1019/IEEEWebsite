{{--
This is the user profile update form for the application. It allows the user to update their username, nickname, email,
password, role, position, and profile picture.

The form is submitted to the `user.update` route, which updates the user's information in the database.

The form includes the following fields:
- Username
- Nickname
- Email
- New Password
- Old Password
- Role (only visible to admin users)
- Position
- Active status
- Profile picture

The form also includes client-side validation to ensure the password meets the required format, and the old password is
correct before allowing the form to be submitted.
--}}

@extends('layouts/master_h')
@php
    $page_name = "";
    $title = "";
@endphp

@include('components/hero_small')

@section('body')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="post" enctype="multipart/form-data" name="edit_user" id="register-form"
                action="{{ route('user.update', ['user' => $user->id]) }}">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="name" class="form-control" value="{{$user->name}}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="nickname">Nickname:</label>
                    <input type="text" id="nickname" name="nickname" class="form-control" value="{{$user->nickname}}">
                </div>

                {{--<div class="form-group mb-3">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{$user->email}}" required>
                </div>--}}

                <div class="col-md-12">
                    <p class="btn btn-warning w-100 py-3"> <i class="fa fa-exclamation-triangle me-2"></i> Warning: If
                        you do not wish to change your password, leave these two fields empty. Otherwise, please enter
                        your new password and your current password.</p>
                </div>

                <div class="form-group mb-3">
                    <label for="password">New Password:</label>
                    <input type="password" id="password" name="password" class="form-control" onkeyup="reset_errors()">
                </div>

                <div class="form-group mb-3">
                    <label for="confirmPassword">Old Password:</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" class="form-control"
                        onkeyup="reset_errors()">
                </div>

                <div class="col-md-12">
                    <p class="btn btn-warning w-100 py-3"></p>
                </div>

                <div class="form-group mb-3">
                    <label for="role">Role: <span class="info"><i class="fa fa-info-circle"></i></span></label>
                    @if($sessionuserrole != 'admin')
                        <br />
                        <label class="form-control">{{$user->role}}</label>
                    @else
                        <select id="role" name="role" class="form-control">
                            <option value="admin" <?php echo ($user->role == 'admin') ? 'selected' : ''; ?>>Admin</option>
                            <option value="webmaster" <?php echo ($user->role == 'webmaster') ? 'selected' : ''; ?>>Webmaster
                            </option>
                            <option value="member" <?php echo ($user->role == 'member') ? 'selected' : ''; ?>>Member</option>
                        </select>
                    @endif
                    <div id="infoPopup" class="mb-4" style="display:none;">
                        <br />
                        <p>Specifies the role on the website as either Admin, Webmaster, or Member.</p>
                        <button class="btn btn-light rounded-pill" onclick="hideInfo()">Close</button>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="position">Position: <span class="info1"><i class="fa fa-info-circle"></i></span></label>
                    <input type="text" id="position" name="position" class="form-control" value="{{$user->position}}">
                    <div id="infoPopup1" class="mb-4" style="display:none;">
                        <p>Specifies the role in the organization, for example member, chair, vice-chair, webmaster,
                            etc.</p>
                        <button class="btn btn-light rounded-pill" onclick="hideInfo1()">Close</button>
                    </div>
                </div>

                <div class="form-group form-check mb-4">
                    <input type="checkbox" id="isactive" name="isactive" class="form-check-input" value="on" {{ $user->active ? 'checked' : '' }}>
                    <label for="isactive" class="form-check-label">Active?</label>
                </div>

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="file" id="input-i" class="form-control" name="image" accept="image/*"
                            onchange="verifyFileUpload('input-i','1')">
                        <label for="image">Profile picture</label>
                        <p id="input-h"><small> Note: the image needs to be square</small></p>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>
<script>
    function showInfo() {
        document.getElementById("infoPopup").style.display = "block";
    }
    function hideInfo() {
        document.getElementById("infoPopup").style.display = "none";
    }
    const toggleinfo = document.querySelector(".info i");

    toggleinfo.addEventListener("click", function () {
        showInfo();
    });
</script>
<script>
    function showInfo1() {
        document.getElementById("infoPopup1").style.display = "block";
    }
    function hideInfo1() {
        document.getElementById("infoPopup1").style.display = "none";
    }
    const toggleinfo1 = document.querySelector(".info1 i");

    toggleinfo1.addEventListener("click", function () {
        showInfo1();
    });
</script>
<script>

    // Function to verify file upload based on aspect ratio
    function verifyFileUpload(id, ratio_s) {

        // Initialize ratio variable
        var ratio = 1;

        var ratio = parseFloat(ratio_s);

        // Reset any previous custom validity message
        document.getElementById(id).setCustomValidity("");

        // Get the file input element
        var fileInput = document.getElementById(id);

        // Get the first file from the input
        var file = fileInput.files[0];

        if (file) {

            // Create a new Image object
            var img = new Image();

            // Set the source of the image to the file
            img.src = window.URL.createObjectURL(file);

            // When the image is loaded
            img.onload = function () {
                // Get the natural width and height of the image
                var width = this.naturalWidth;
                var height = this.naturalHeight;

                // Revoke the object URL to free up memory
                window.URL.revokeObjectURL(this.src);


                // Check if the aspect ratio is within the allowed range (Machine error)
                if (width / height < (ratio) - 0.05 || width / height > (ratio) + 0.05) {
                    // Set a custom validity message if the ratio is not within the allowed range
                    document.getElementById(id).setCustomValidity("The Image " + file.name + " does not meet the ratio requirements.");
                }
            };
        }
    }
</script>
<script>

    function reset_errors() {
        // Reset
        document.getElementById("password").setCustomValidity("");
        document.getElementById("confirmPassword").setCustomValidity("");
    }


    $(document).ready(function () {
        $("#register-form").submit(function (event) {

            // Get values from input fields
            var name = $("input[name='username']").val();
            var email = $("input[name='email']").val();
            var password = $("input[name='password']").val();

            // Regular expression to validate password format
            var passwordRegex = /^(?=.*[0-9])(?=.*[!-\*\[\]\{selectedText}\/]).{8,}$/;
            var rpassword = $("input[name='confirmPassword']").val();

            // Check if password is not empty
            if (password.trim() !== "") {
                // Check if confirm password is not empty
                if (rpassword.trim() !== "") {
                    // Check if password matches the required format
                    if (!passwordRegex.test(password)) {

                        document.getElementById("password").setCustomValidity("The password must be at least 8 characters long, and must include at least one number, one special character, and one uppercase letter.");
                        document.getElementById("password").reportValidity();
                        event.preventDefault();
                        $("input[name='password']").focus();
                    }
                    // If password format is correct
                    else {
                        // Check if password and confirm password match
                        if (rpassword.trim() == password.trim()) {
                            document.getElementById("password").setCustomValidity("The passwords match.");
                            document.getElementById("password").reportValidity();
                            event.preventDefault();
                            $("input[name='password']").focus();
                        }
                        // If passwords don't match
                        else {

                            // Prevent form submission before checking old password
                            event.preventDefault();
                            // AJAX request to check old password
                            $.ajax({

                                type: 'GET',

                                url: '/ajaxPassword',

                                data: { rpassword: rpassword.trim() },

                                success: function (data) {

                                    if (!data.valid) {
                                        error = true;
                                        document.getElementById("confirmPassword").setCustomValidity("The old password is incorrect");
                                        document.getElementById("confirmPassword").reportValidity();
                                    } else {
                                        // Submit the form if old password is correct
                                        $("form")[0].submit();
                                    }
                                }
                            });
                        }
                    }
                }
                else {
                    document.getElementById("confirmPassword").setCustomValidity("Please put old password");
                    document.getElementById("confirmPassword").reportValidity();
                    event.preventDefault();
                    $("input[name='password']").focus();
                }
            }

        });
    });
</script>
@endsection