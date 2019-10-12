
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<?php
   
    
    require_once 'token.php';
    $value = $_POST['token'];
    if(isset($_POST['post'])){
        if(token::check_token($value, $_COOKIE['csrfCookie'])){
            echo '
            <div class=outer_div>
                <h1 class=welcome align=center>Cookie Accepted!</h1>
                
            </div>
            
            ';
        }
        else{
            echo '
            <div class=outer_div>
                <h1 class=welcome align=center>Cookie Rejected!</h1>
               
            </div>
            
            ';
        }
    }
?>