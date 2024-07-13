<!-- Hero Start (Big Header)-->
<!-- needs a variable $title, $subtitle, $desc in the page -->
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


                        <h2 class="display-4 text-white mb-4 animated slideInRight ">Sign In</h2>

                        <form id="login-form" action="{{ route('user.login') }}" method="post">
                            @csrf

                            <input type="text" name="email" id="email" onkeyup="reset_errors()" required>
                            <p class="text-white mb-4 animated slideInRight">Email</p>

                            <input type="password" name="password" id="password" onkeyup="reset_errors()" required>
                            <p class="text-white mb-4 animated slideInRight">Password <span
                                    class="password-toggle-icon"><i class="fas fa-eye"></i></span></p>
                            <!--<div class="text-white mb-4 animated slideInRight"> <a class="text-white mb-4 animated slideInRight" href="#">Forgot Password</a> <a class="text-white mb-4 animated slideInRight" href="#">Signup</a></div> -->

                            <input class="btn btn-light py-sm-3 px-sm-5 rounded-pill animated slideInRight" id="login-submit" type="submit" value="Login">
                        </form>
                        <a href="{{ route('register') }}" class="btn btn-primary py-sm-3 px-sm-5 rounded-pill animated slideInRight">Go to Registration</a>

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
        document.getElementById("email").setCustomValidity("");
        document.getElementById("password").setCustomValidity("");
    }

    $(document).ready(function(){
        $("#login-form").submit(function(event) {
            // Ottenere i valori dei campi email e password
            var email = $("input[name='email']").val();
            var password = $("input[name='password']").val();
            var error = false;
            // Verifica se il campo "password" e' vuoto
            if (password.trim() === "") {
                error = true;
                document.getElementById("password").setCustomValidity("La password è obbligatoria.");
                event.preventDefault(); // Impedisce l'invio del modulo
                $("input[name='password']").focus();
            }

            // Verifica se il campo "email" e' vuoto
            if (email.trim() === "") {
                error = true;
                document.getElementById("password").setCustomValidity("L'indirizzo email è obbligatorio.");
                event.preventDefault(); // Impedisce l'invio del modulo
                $("input[name='email']").focus();
            } 
        });
    });
</script>
