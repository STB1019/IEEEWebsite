
<style>
    input::-ms-reveal,
    input::-ms-clear {
        display: none;
    }
</style>
<div class="container-fluid pt-5 bg-primary hero-header">
    <div class="container pt-5">
        <div class="row g-5 pt-5">
            <div class="col-lg-1">
            </div>
            <div class="col-lg-4 d-none d-lg-block">
                <img class="img-fluid" id="rotate" src="img/IEEE.png" alt="">
            </div>
            <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">

                <div class="align-self-center text-center mt-lg-5">


                    <div>

                        <h2 class="display-4 text-white mb-4 animated slideInRight ">Sign Up</h2>

                        <form id="register-form" class="form" action="{{ route('user.register') }}" method="post">
                        @csrf

                            <input type="text" name="username" id="username" onkeyup="reset_errors()" required>
                            <p class="text-white mb-4 animated slideInRight">Username</p>

                            <input type="text" name="email" id="email" onkeyup="reset_errors()" required>
                            <p class="text-white mb-4 animated slideInRight">Email</p>

                            {{-- <input type="text" name="key" required>
                            <p class="text-white mb-4 animated slideInRight">Key <span class="info"></spanclass><i class="fa fa-info-circle"></i></span></p>
                            
                            
                            <div id="infoPopup"  class="text-white mb-4" style="display:none;">
                                <p>For sign up you need to ask to the admins the key</p>
                                <button class="btn btn-light rounded-pill"
                                    onclick="hideInfo()">Close</button>
                            </div>--}}                       

                            <input type="password" name="password" id="password" onkeyup="reset_errors()" required>
                            <p class="text-white mb-4 animated slideInRight">Password <span class="password-toggle-icon"><i class="fas fa-eye"></i></span></p>
                            <!--<div class="text-white mb-4 animated slideInRight"> <a class="text-white mb-4 animated slideInRight" href="#">Forgot Password</a> <a class="text-white mb-4 animated slideInRight" href="#">Signup</a></div> -->

                            <input type="password" name="rpassword" id="rpassword" onkeyup="reset_errors()" required>
                            <p class="text-white mb-4 animated slideInRight">Re-type Password</p>

                            <input id="register-submit" class="btn btn-light py-sm-3 px-sm-5 rounded-pill animated slideInRight" type="submit" value="Login">
                        </form>

                    </div>

                </div>
                </br>
                </br>
            </div>
            <div class="col-lg-1">

            </div>
        </div>
    </div>
</div>

<script>
    var r = document.querySelector(':root');

    function set_rotation() {
        r.style.setProperty('--rot', '180deg');
    }
    function reset_rotation() {
        r.style.setProperty('--rot', '0deg');
    }

    const passwordField = document.getElementById("password");
    const togglePassword = document.querySelector(".password-toggle-icon i");

    togglePassword.addEventListener("click", function () {
        if (passwordField.type == "password") {
            passwordField.type = "text";
            togglePassword.classList.remove("fa-eye");
            togglePassword.classList.add("fa-eye-slash");
            set_rotation();
        } else {
            passwordField.type = "password";
            togglePassword.classList.remove("fa-eye-slash");
            togglePassword.classList.add("fa-eye");
            reset_rotation();
        }
    });
</script>

<script>

    function reset_errors() {
        // Reset
        document.getElementById("username").setCustomValidity("");
        document.getElementById("email").setCustomValidity("");
        document.getElementById("password").setCustomValidity("");
        document.getElementById("rpassword").setCustomValidity("");
    }


    $(document).ready(function(){
        // When the form is submitted
        $("#register-form").submit(function(event) {
            var name = $("input[name='username']").val();
            var email = $("input[name='email']").val();
            var password = $("input[name='password']").val();

            // Regular expression to check password requirements
            var passwordRegex = /^(?=.*[0-9])(?=.*[!-\*\[\]\{selectedText}\/]).{8,}$/;
            var rpassword = $("input[name='rpassword']").val();
            var error = false;

            // Check if rpassword is empty
            if (rpassword.trim() === "") {
                error = true;
                document.getElementById("rpassword").setCustomValidity("You need to rewrite the password");
                document.getElementById("rpassword").reportValidity();
                event.preventDefault(); 
                $("input[name='rpassword']").focus();
            }

            // Check if password is empty or doesn't meet requirements
            if (password.trim() === "") {
                error = true;
                document.getElementById("password").setCustomValidity("The password is required.");
                document.getElementById("password").reportValidity();
                event.preventDefault();
                $("input[name='password']").focus();
            } else if(!passwordRegex.test(password)) {
                error = true;
                document.getElementById("password").setCustomValidity("The password must be at least 8 characters long, and must include at least one number, one special character, and one uppercase letter.");
                document.getElementById("password").reportValidity();
                event.preventDefault();
                $("input[name='password']").focus();
            }

            // Check if email is empty
            if (email.trim() === "") {
                error = true;
                document.getElementById("email").setCustomValidity("The email is required.");
                document.getElementById("email").reportValidity();
                event.preventDefault();
                $("input[name='email']").focus();
            }

            // Check if name is empty
            if (name.trim() === "") {
                error = true;
                document.getElementById("username").setCustomValidity("The username is required.");
                document.getElementById("username").reportValidity();
                event.preventDefault();
                $("input[name='username']").focus();
            }else{
                // No action needed if name is not empty
            }

            // If there are no errors
            if(!error) {
                // Check if passwords don't match
                if(rpassword.trim() !== password.trim())
                {
                    document.getElementById("password").setCustomValidity("The passwords don't match.");
                    document.getElementById("password").reportValidity();
                    event.preventDefault(); 
                    $("input[name='password']").focus();
                }

                // Prevent default form submission
                event.preventDefault(); 
                // Send AJAX request to check if email is already in use
                $.ajax({
                    type: 'GET',
                    url: '/ajaxEmail',
                    data: {email: email.trim()},
                    success: function (data) {
                        if (data.found)
                        {
                            error = true;
                            document.getElementById("email").setCustomValidity("The email is already in use.");
                            document.getElementById("email").reportValidity();
                        } else {
                            // If email is not in use, submit the form
                            $("form")[0].submit();
                        }
                    }
                });
            }
        });
    });
</script>