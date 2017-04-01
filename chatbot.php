<html>
    <head>
        <?php
            include 'components/head.php';
            include 'connect.php';
        ?>
        
    </head>
    <body style="background-color: #f2f2f2;">
        <div class="ui full_height equal height grid padded" id="center_text">
            <div class="sixteen wide column" id="chat_logs">
                <?php
                    include 'sep.php';
                ?>
                
            </div>
            
            <div class="sixteen wide column">
                <form name="form_chat" action="" method="post">
                    <div class="row">
                        <textarea name="chatbot_field" id="chatbot_field"></textarea>
                    </div>

                    <button class="ui right floated button" id="chatbot_send"> SEND </button>
                    <form action="back_end/uploadimage.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="imgupload" id="imgupload" style="display:none" onchange="this.form.submit();"> 
                    </form>
                    <button class="ui right floated button" id="chatbot_pic" onclick="$('#imgupload').trigger('click'); return false;"><i class="Photo icon"></i> </button>
                </form>
            </div>
            
        </div>
    </body>
</html>