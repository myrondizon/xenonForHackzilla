<?php
include 'connect.php';
$user = "jhoebe";

$x = 0;
$y = 0;
                    
                    $sql = "SELECT * FROM chat WHERE chat_user = '$user' OR chat_second_person = '$user'";
                    $query = mysqli_query($con, $sql);
                    
                    
                    
                    while($row = mysqli_fetch_assoc($query)){
                        
                        
                        $chat_user = $row['chat_user'];
                        $chatmsg = $row['chat_message'];
                        $chat_second_person = $row['chat_second_person'];
                        
                        if($chat_user == $user){
                            $x = $x + 1;
                            
                            if($x == 1){
                                echo "<div style='width: 100%;'><div style='margin-top: 10px; width:80%; float:left; background-color: #dcdcdc; border-radius: 10px; color: #3a3a3a; font-family: segoe;'><p style='padding: 10px;'>".$chatmsg."</p></div><div style='margin-top: 10px; width:10%; float:right;'><img class='ui mini image' src='images/2.png'></div></div>";
                            
                            }else{
                                echo "<div style='width: 100%;'><div style='margin-top: 10px; width:90%; float:left; background-color: #dcdcdc; border-radius: 10px; color: #3a3a3a; font-family: segoe;'><p style='padding: 10px;'>".$chatmsg."</p></div></div>";
                            
                            }
                            
                        }else if($chat_second_person == $user){
                            if($chatmsg == "Here are some suggestions with casual attire."){
                                echo "<div style='width: 100%;'><div style='margin-top: 10px; width:80%; float:right; background-color: #84a68c; border-radius: 10px; color: white; font-family: segoe;'><p style='padding: 10px;'>".$chatmsg."</p></div><div style='margin-top: 10px; width:10%; float:left;'><img class='ui mini image' src='images/1.png'></div></div>";
                                echo "<div style='width: 100%;'><div style='margin-top: 10px; width:80%; float:right; border-radius: 10px; color: white; font-family: segoe;'><div id='chat_circle' onclick='$(\"#outfit_1\").modal(\"show\");'><p id='chat_ctext'><br>Outfit 1</p></div>"
                                . "<div id='chat_circle' onclick='$(\"#outfit_2\").modal(\"show\");'><p id='chat_ctext'><br>Outfit 2</p></div>"
                                        . "<div id='chat_circle'><p id='chat_ctext'><br>Outfit 3</p></div></div><div style='margin-top: 10px; width:10%; float:left;'><img class='ui mini image' src='images/1.png'></div></div>";
                                echo "<div style='width: 100%;'><div style='margin-top: 10px; width:80%; float:right; background-color: #84a68c; border-radius: 10px; color: white; font-family: segoe;'><p style='padding: 10px;'>I picked this outfits based on your preferred match of apparel. Did you like it?</p></div><div style='margin-top: 10px; width:10%; float:left;'><img class='ui mini image' src='images/1.png'></div></div>";
                                
                            }else if($chatmsg == "Okay. Based on your preferences, these are the colors suggested for you."){
                                echo "<div style='width: 100%;'><div style='margin-top: 10px; width:80%; float:right; background-color: #84a68c; border-radius: 10px; color: white; font-family: segoe;'><p style='padding: 10px;'>".$chatmsg."</p></div><div style='margin-top: 10px; width:10%; float:left;'><img class='ui mini image' src='images/1.png'></div></div>";
                                echo "<div style='width: 100%;'><div style='margin-top: 10px; width:80%; float:right; border-radius: 10px; color: white; font-family: segoe;'><div style='width: 50px; height: 50px; background-color:#8dacdd; float:left;'></div><div style='width: 50px; height: 50px; background-color:#d39981; float:left;'></div><div style='width: 50px; height: 50px; background-color:#6686a8; float:left;'></div><div style='width: 50px; height: 50px; background-color:#bae2c8; float:left;'></div><div style='width: 50px; height: 50px; background-color:#fce39f; float:left;'></div></div></div>";
                                echo "<div style='width: 100%;'><div style='margin-top: 10px; width:80%; float:right; background-color: #84a68c; border-radius: 10px; color: white; font-family: segoe;'><p style='padding: 10px;'>I can also suggest you to buy apparel in warm colors.</p></div><div style='margin-top: 10px; width:10%; float:left;'><img class='ui mini image' src='images/1.png'></div></div>";
                                
                            }else if($chatmsg == "There are promotions for sperry! The nearest to you is in Trinoma."){
                                echo "<div style='width: 100%;'><div style='margin-top: 10px; width:80%; float:right; background-color: #84a68c; border-radius: 10px; color: white; font-family: segoe;'><p style='padding: 10px;'>".$chatmsg."</p></div><div style='margin-top: 10px; width:10%; float:left;'><img class='ui mini image' src='images/1.png'></div></div>";
                                
                                $promos_sql = "SELECT * FROM promos WHERE promo_brand = 'Sperry'";
                                $promos_res = mysqli_query($con, $promos_sql);
                                
                                while($promo_row = mysqli_fetch_assoc($promos_res)){
                                    $promo_mall = $promo_row['promo_mall'];
                                    $promo_brand = $promo_row['promo_brand'];
                                    $promo_description = $promo_row['promo_description'];
                                    $promo_date = $promo_row['promo_date'];
                                    
                                    echo "<div style='width: 100%;'><div style='margin-top: 10px; width:90%; float:right; color: white; font-family: segoe;'><div class='ui raised segment' style='background-color: #c66161; border-radius: 20px;'>"
                                    . "<p>Mall: ".$promo_mall."<br>Promo: ".$promo_description."<br>Promo Until: ".$promo_date."<br></p>"
                                            . "</div></div></div>";
                                
                                }
                                
                            }
                            
                            else{
                                echo "<div style='width: 100%;'><div style='margin-top: 10px; width:80%; float:right; background-color: #84a68c; border-radius: 10px; color: white; font-family: segoe;'><p style='padding: 10px;'>".$chatmsg."</p></div><div style='margin-top: 10px; width:10%; float:left;'><img class='ui mini image' src='images/1.png'></div></div>";
                            }
                        }
                        
                        
                        
                        
                        
                        
                    }
                ?>

<div class="ui basic modal" id="outfit_1">
  <div class="ui icon header" style="font-family: raleway; letter-spacing: 0.1em;">
    OUTFIT 1
    <br>
    <p style="font-size: 10px;">total price: P1,280.00</p>
    <p style="font-size: 10px; margin-top:-5px;">All items available at: Trinoma</p><br>
  </div>
    
  <div class="content">
      <div class="ui grid">
          <div style="width: 100%; height: 130px;">
              <div id="cdt">
                  <div style="width: 100%; height: 85%;   z-index: 1000; overflow: hidden;">
                      <img class="ui image" src="images/outfit1/1.jpeg" style="border-radius: 200px; margin-left: 30px;width: 110px; height: 110px;">
                  </div>
                  <div style="width: 100%; height: 15%; color: white; font-family: raleway; text-transform: uppercase; text-align:center; font-size: 10px;">
                      <br>Bench | P 120.00 
                  </div>
              </div>
              <div id="cdt">
                  <div style="width: 100%; height: 85%; z-index: 1000; overflow: hidden;">
                      <img class="ui image" src="images/outfit1/2.jpg" style="border-radius: 200px; margin-left: 30px;width: 110px; height: 110px;">
                  </div>
                  <div style="width: 100%; height: 15%; color: white; font-family: raleway; text-transform: uppercase; text-align:center; font-size: 10px;">
                      <br>Lacoste | P 720.00 
                  </div>
              </div>
          </div>
          <div style="width: 100%; height: 130px;">
            <div id="cdt">
                <div style="margin-top: 20px; margin-left: 50%; width: 100%; height: 100%;  z-index: 1000; overflow: hidden;">
                    <img class="ui image" src="images/outfit1/3.jpg" style="border-radius: 200px; margin-left: 30px;width: 110px; height: 110px;">
                </div>
                <div style="width: 100%; margin-top: -20px; margin-left: 50%; height: 15%; color: white; font-family: raleway; text-transform: uppercase; text-align:center; font-size: 10px;">
                    <br>Bench | P 120.00 
                </div>
            </div>
          </div>
          
          <div style="width: 100%; height: 130px;">
            <div id="cdt">
                <div style="margin-top: 40px; margin-left: 50%; width: 100%; height: 100%;  z-index: 1000; overflow: hidden;">
                    <img class="ui image" src="images/outfit1/4.jpg" style="border-radius: 200px; margin-left: 30px;width: 110px; height: 110px;">
                </div>
                <div style="width: 100%;  margin-top: -20px;margin-left: 50%; height: 15%; color: white; font-family: raleway; text-transform: uppercase; text-align:center; font-size: 10px;">
                    <br>Adidas | P 320.00 
                </div>
            </div>
          </div>
      </div>
      
  </div>
    <br><br><br><br><br>
  <div class="actions" style="text-align: center;">
    <div class="ui red basic cancel inverted button">
      Back
    </div>
  </div>
</div>

<div class="ui basic modal" id="outfit_2">
  <div class="ui icon header" style="font-family: raleway; letter-spacing: 0.1em;">
    OUTFIT 2
    <br>
    <p style="font-size: 10px;">total price: P1,680.00</p>
    <p style="font-size: 10px; margin-top:-5px;">All items available at: Trinoma</p><br>
  </div>
    
  <div class="content">
      <div class="ui grid">
          <div style="width: 100%; height: 130px;">
              <div id="cdt">
                  <div style="width: 100%; height: 85%;   z-index: 1000; overflow: hidden;">
                      <img class="ui image" src="images/outfit2/1.png" style="border-radius: 200px; margin-left: 30px;width: 110px; height: 110px;">
                  </div>
                  <div style="width: 100%; height: 15%; color: white; font-family: raleway; text-transform: uppercase; text-align:center; font-size: 10px;">
                      <br>Zara | P 420.00 
                  </div>
              </div>
              <div id="cdt">
                  <div style="width: 100%; height: 85%; z-index: 1000; overflow: hidden;">
                      <img class="ui image" src="images/outfit2/2.png" style="border-radius: 200px; margin-left: 30px;width: 110px; height: 110px;">
                  </div>
                  <div style="width: 100%; height: 15%; color: white; font-family: raleway; text-transform: uppercase; text-align:center; font-size: 10px;">
                      <br>Topshop | P 420.00 
                  </div>
              </div>
          </div>
          <div style="width: 100%; height: 130px;">
            <div id="cdt">
                <div style="margin-top: 20px; margin-left: 50%; width: 100%; height: 100%;  z-index: 1000; overflow: hidden;">
                    <img class="ui image" src="images/outfit2/3.png" style="border-radius: 200px; margin-left: 30px;width: 110px; height: 110px;">
                </div>
                <div style="width: 100%; margin-top: -20px; margin-left: 50%; height: 15%; color: white; font-family: raleway; text-transform: uppercase; text-align:center; font-size: 10px;">
                    <br>Bench | P 420.00 
                </div>
            </div>
          </div>
          
          <div style="width: 100%; height: 130px;">
            <div id="cdt">
                <div style="margin-top: 40px; margin-left: 50%; width: 100%; height: 100%;  z-index: 1000; overflow: hidden;">
                    <img class="ui image" src="images/outfit2/4.png" style="border-radius: 200px; margin-left: 30px;width: 110px; height: 110px;">
                </div>
                <div style="width: 100%;  margin-top: -20px;margin-left: 50%; height: 15%; color: white; font-family: raleway; text-transform: uppercase; text-align:center; font-size: 10px;">
                    <br>Sperry | P 420.00 
                </div>
            </div>
          </div>
      </div>
      
  </div>
    <br><br><br><br><br>
  <div class="actions" style="text-align: center;">
    <div class="ui red basic cancel inverted button">
      Back
    </div>
  </div>
</div>
