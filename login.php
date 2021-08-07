<html>

<head>
    <title>Log in - My FB</title>
    <script src="jquery.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="includes/CSS/login.css">
    <script>
        $(document).ready(function() {
            reg_wrap = $("#reg-form");
            new_account_btn = $("input.new_account_btn");
            wrapper = $("#wrapper");
            new_account_btn.click(function() {
                reg_wrap.show();
                wrapper.css("opacity", "0.4");

            });

            close_form = $("img.close_form");
            close_form.click(function() {
                reg_wrap.hide();
                wrapper.css("opacity", "1");
            });

            //Check register form
            register_btn = $("input.register_btn");

            register_btn.click(load);

            //Login form hover
            email_login = $(".error-log-absolute-email");
            $("input.email").focus(function() {
                email_login.show();
                $(this).focusout(function() {
                    email_login.hide();
                });
            });

            $("input.email").focus();

            password_login = $(".error-log-absolute-password");
            $("input.password").focus(function() {
                password_login.show();
                $(this).focusout(function() {
                    password_login.hide();
                });
            });


        });

        function load() {
            $.ajax({
                url: 'ajaxRequest.php',
                type: "POST",
                dataType: "text",
                data: {
                    name: $("input.name").val(),
                    lastname: $("input.lastname").val(),
                    password: $("input.password").val(),
                    password2: $("input.password2").val(),
                    email: $("input.email").val(),
                },
            }).done(function(data) {
                $("#errors").show();
                $("#errors").html(data);
            });
        }
    </script>
</head>

<body>
    <div id="reg-wrap">
        <div id="reg-form">
            <div id="column">
                <div id="row">
                    <div class="left">
                        <h1>Registration</h1>
                    </div>
                    <div class="right">
                        <img src="includes/images/close.png" class="close_form">
                    </div>
                </div>
                <ul>
                    <li>
                        <input type="text" placeholder="Name" class="name" autofocus>
                        <div class="error-reg-absolute">What's your name?</div>
                    </li>
                    <li>
                        <input type="text" placeholder="Lastname" class="lastname">
                        <div class="error-reg-absolute">What's your name?</div>

                    </li>
                    <li>
                        <input type="text" placeholder="Email" class="email">
                        <div class="error-reg-absolute">Your email adress?</div>

                    </li>

                    <li>
                        <input type="text" placeholder="Password" class="password">
                        <div class="error-reg-absolute">Your Password?</div>

                    </li>
                    <li>
                        <input type="text" placeholder="Password Again" class="password2">
                        <div class="error-reg-absolute">Password Again?</div>

                    </li>
                    <li>
                        <input type="submit" value="Registration" class="register_btn">
                    </li>
                    <li>
                        <div id="errors"></div>
                    </li>

            </div>
        </div>
    </div>
    <div id="wrapper">
        <div id="left">
            <h1>MyFB</h1>
            <h3>Connecting people</h3>
            <img src="includes/images/connection-people.jpg">
        </div>
        <div id="right">
            <div id="column">
                <?php

                ?>
                <form method="post">
                    <ul>
                        <li>
                            <div class="error-log-absolute-email">Type your email.</div>
                            <input type="text" placeholder="Email" class="email">
                        </li>
                        <li>
                            <div class="error-log-absolute-password">Type your password.</div>
                            <input type="text" placeholder="Password" class="password">
                        </li>
                        <li>
                            <input type="submit" value="Sign In" class="login">
                        </li>
                        <input type="hidden" name="hidden-btn" value="1">
                        <li>
                            <p><a href="#">Forgot Password?</a></p>
                        </li>
                        <li>
                            <hr>
                        </li>
                        <?php
                        $er = 0;
                        if ($er == 1) {
                            echo '
                        <li>
                            <div id="errors">Wrong username or password.</div>
                        </li> ';
                        }
                        ?>
                </form>
                <li>
                    <input type="button" value="Create new account" class="new_account_btn">
                </li>

            </div>
        </div>
    </div>
</body>
