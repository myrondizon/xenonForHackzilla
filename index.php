<html>
    <head>
        
       <?php
        include 'components/head.php';
       ?> 
       
    </head>
    
    <body style="background-color: #6caa7c;">
        <div class="ui equal height full_height centered grid padded">
            
            <div class="sixteen wide column"></div>
            
            <div class="sixteen wide column" id="center_text">
                <div class="row">
                    <br><br>
                    <p class="index_title">Xenon</p>
                </div>
                
                <form id="loginForm" method="post" action="back_end/login.php">
                    <div class="row">
                        <div class="ui huge input">
                            <input type="text" name="username" id="index_username" placeholder="Username">
                        </div>
                    </div>

                    <div class="row">
                        <div class="ui huge input">
                            <input type="password" name="userpass" id="index_username" placeholder="Password">
                        </div>
                    </div>

                    <div class="row">
                        <button type="submit" class="ui medium button" id="index_login_button"><text id="index_button_text">LOGIN</text></button>
                    </div>
                </form>
            </div>
            
            <div class="sixteen wide column" id="center_text">
                <br>
                <p id="index_s1">Don't have an account yet?</p><br>
                <a href="sign_up.php" id="index_s2">Register here.</a>
            </div>
            <div class="sixteen wide column"></div>
        </div>
        
    </body>
</html>