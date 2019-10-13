<?php

if(isset($_POST['uname'], $_POST['psw'])){
    $uname = $_POST['uname'];
    $pword = $_POST['psw'];
    if($uname == 'admin' && $pword == 'password'){
        echo '<script>alert("Login Success")</script>;';
        session_start();
        $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
        $session_id = session_id();
        setcookie('sessionCookie', $session_id, time() + 60*60*24*365, '/', "localhost", false, false);
        setcookie('csrfCookie', $_SESSION['token'], time() + 60*60*24*365, '/', "localhost", false, false);
        echo '<script>alert("Login Success!");';
    }
    else{
        echo '<script>alert("Invalid Credentials!")</script>;';
        header('Location: login_dscp.php');
    }
}
?>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <script>
        $(document).ready(function(){
            var cookie_value = "";
            var cookie_decoded = decodeURIComponent(document.cookie);
            var cookie = cookie_decoded.split(';');
            var csrf = cookie_decoded.split(';')[2];
            if(csrf.split('=')[0] = "csrfCookie")
	    {
                cookie_value = csrf.split('csrfCookie=')[1];
                document.getElementById("hidden_token").setAttribute('value',cookie_value);
            }
        });
    </script>
    <link href="style_dscp.css" rel="stylesheet" id="css">
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <body>
        <div class="outer_div">
            <h1 class=welcome align=center>Welcome</h1>
            <h2 class=welcome align=center>CSRF prevention - Double Submit Cookie Pattern</h3>
            <form class='form_' action="verify.php" method="post">
                <div class=inner_div>
                    <label class=welcome >Please Enter your Message Below:</label><br><br><input type="text" class=input_text id="post" placeholder = "Enter Message" name="post"><br><br><br>
                    
                    <div id=div_hidden>
                        <input type="hidden" name="token" value="" id="hidden_token"/>
                    </div>

                    <button type="submit">Send Message</button>
                </div>
            </form>
        </div>
    </body>

</html>
