<?php 
    include 'connect.php';
    
    $message = $_POST['ajax_chatbot_field'];
    $user = "jhoebe";
    
    if($message == ""){
        echo "fail";
    }else{
    
        $sql = "INSERT INTO chat (chat_user, chat_message, chat_type) VALUES ('$user', '$message', 'text')";
        $res = mysqli_query($con, $sql);

    }
    
    $suggest_sql = "SELECT * FROM words WHERE word_action = 'suggest'";
    $suggest_res = mysqli_query($con, $suggest_sql);
    $status = "none";
    
    while($suggest_row = mysqli_fetch_assoc($suggest_res)){
        
        $sw = $suggest_row['word'];
        $pos = strpos($message, $sw);
        
        if($status == "none"){
            if ($pos === false){
                
            }else{
                $type_sql = "SELECT * FROM words WHERE word_action = 'type'";
                $type_res = mysqli_query($con, $type_sql);
                
                $type = "none";
                
                $tt = 0;
                while($type_row = mysqli_fetch_assoc($type_res)){
                    $tw = $type_row['word'];
                    $tpos = strpos($message, $tw);
                    
                    if($type == "none"){
                        if ($tpos === false){
                        }else if($tpos !== false){
                            if($tt == 0){
                                $checker = 0;
                                if($tw == "outfit" || $tw == "attire"){
                                    
                                    $sentence = "Sure. What style do you want me to suggest?";
                                    
                                    $findme   = 'casual';
                                    $pos = strpos($message, $findme);
                                    
                                    if ($pos !== false) {
                                        $sentence = "Here are some suggestions with ".$findme." attire.";
                                    }
                                    
                                    $findmea   = 'business';
                                    $poss = strpos($message, $findmea);
                                    
                                    if ($poss !== false) {
                                        $sentence = "Here are some suggestions with ".$findmea." attire.";
                                    }
                                    
                                    $findmeb   = 'casual';
                                    $posss = strpos($message, $findmeb);
                                    
                                    if ($posss !== false) {
                                        $sentence = "Here are some suggestions with ".$findmeb." attire.";
                                    }
                                    
                                    
                                    
                                }else{
                                    if($tw == "color"){
                                        $sentence = "Okay. Based on your preferences, these are the colors suggested for you.";
                                    }else if($tw == "top"){
                                        $sentence = "Sure. Based on your style preferences, these are the different tops suggested for you.";
                                    }else if($tw == "bottom"){
                                        $sentence = "Sure. Based on your style preferences, these are the different pants suggested for you.";
                                    }
                                    $tt++;
                                }
                            }else{
                                if($tw == "outfit" || $tw == "attire"){
                                    $specific = "SELECT * FROM words WHERE word_action = 'specific'";
                                    $specific_sql = mysqli_query($con, $specific);
                                    
                                    while($specific_row = mysqli_fetch_assoc($specific_sql)){
                                        $s_word = $specific_row['word'];
                                        $s_pos = strpos($message, $s_word);
                                        
                                        if($s_pos == true){
                                            $sentence = "Here are the suggestions for the ".$s_word. " attire";
                                        }else{
                                            $sentence = "What do you want me to suggest?";
                                        }
                                    }
                                }else{
                                    $sentence = $sentence . " a " . $tw;
                                    $tt++;
                                }
                            }
                            
                            
                        }
                    }else{
                        $sentence = "What do you want me to suggest?"; 
                    }
                }
                
                
                $insert_chat = "INSERT INTO chat (chat_user, chat_message, chat_type, chat_second_person) VALUES ('xenon', '$sentence', 'text', '$user')";
                $insert_sql = mysqli_query($con, $insert_chat);
                $status = "finish";
            }
            
        }else{
            
        }
        
    }
    
    $promotions = "SELECT * FROM words where word_action = 'promo'";
    $promotions_res = mysqli_query($con, $promotions);
    $countt = 0;
    while($promotion_row = mysqli_fetch_assoc($promotions_res)){
        $pword = $promotion_row['word'];
        $ppos = strpos($message, $pword);
        
        if($ppos !== false && $countt == 0){
            
            
            $product = "sperry";
            $propos = strpos($message, $product);
            
            if($propos !== false){
                $sentence = "There are promotions for sperry! The nearest to you is in Trinoma.";
                
                
                $insert_chat = "INSERT INTO chat (chat_user, chat_message, chat_type, chat_second_person) VALUES ('xenon', '$sentence', 'text', '$user')";
                $insert_sql = mysqli_query($con, $insert_chat);
            }else{
                $sentence = "There are available promotions near you!";
                $insert_chat = "INSERT INTO chat (chat_user, chat_message, chat_type, chat_second_person) VALUES ('xenon', '$sentence', 'text', '$user')";
                $insert_sql = mysqli_query($con, $insert_chat);
            }
            
            $countt++;
            
        }else{
            
        }
    }
    
    
    $affirmation = "SELECT * FROM words WHERE word_action = 'yes'";
    $affirmation_sql = mysqli_query($con, $affirmation);
    $count = 0;
    while($arow = mysqli_fetch_assoc($affirmation_sql)){
        $aword = $arow['word'];
        $apos = strpos($message, $aword);
        
        if($apos !== false && $count == 0){
            $sentence = "Glad you liked it!";
            $insert_chat = "INSERT INTO chat (chat_user, chat_message, chat_type, chat_second_person) VALUES ('xenon', '$sentence', 'text', '$user')";
            $insert_sql = mysqli_query($con, $insert_chat);
            $count++;
        }
    }
    
  
    $find = "SELECT * FROM words WHERE word_action = 'find'";
    $find_sql = mysqli_query($con, $find);
    
    $counter = 0;
    
    while($frow = mysqli_fetch_assoc($find_sql)){
        $fword = $frow['word'];
        $fpos = strpos($message, $fword);
        
        if($fpos!== false && $counter == 0){
            $sentence = "Sure! Upload a picture of the apparel and I will try to search it for you.";
            $insert_chat = "INSERT INTO chat (chat_user, chat_message, chat_type, chat_second_person) VALUES ('xenon', '$sentence', 'text', '$user')";
            $insert_sql = mysqli_query($con, $insert_chat);
            $counter++;
                
        }
    }
    
    
    
?>