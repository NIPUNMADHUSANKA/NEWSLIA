<?php
    

    include '../Model/connect.php';


    //News

    $pending_post_sql = "SELECT * FROM news_pending";
    $pending_post_statement = $conn -> query($pending_post_sql);
    $pending_post_results = $pending_post_statement->fetchAll(PDO::FETCH_ASSOC);
    
    if($pending_post_results){
      foreach($pending_post_results as $pending_post_result){

          $img = $pending_post_result['Image'];
          $img = base64_encode($img);
          $text = pathinfo($pending_post_result['Post_ID'], PATHINFO_EXTENSION);

          $Post_ID = $pending_post_result['Post_ID'];
          $Creator_ID = $pending_post_result['Creator_ID'];

          echo "
          <div class='box-container'>
              <div class='box_head'>
                <img src='data:image/".$text.";base64,".$img."'/>
                <div class='tag'>
                  <div class='tag_text'>News</div>
                </div>

                <div class='middle'>
                    <div class='view_btn'>
                       <ul>
                         <li><a href='#'>View</a></li>
                       </ul>
                    </div>            
                 </div>

              </div>

              <div class='box_body'>
                <h3>".$pending_post_result['Title']."</h3>";
                
                $post_from_sql = "SELECT * FROM post_area WHERE Post_ID='$Post_ID'";
                $post_from_state = $conn->query($post_from_sql);
                $post_from_results = $post_from_state->fetchAll(PDO::FETCH_ASSOC);

                if($post_from_results){
                   echo "<b><i>-</i>";
                   foreach($post_from_results as $post_from_result){
                      echo "<i>".$post_from_result['Area']." - ";
                      echo "</i>";
                    }
                }
             
              echo "</b></div>

              <div class='more'>
                <p>".$pending_post_result['Calendar_Date']."</p>
              </div>

              <div class='setting_close'>
                 <img src='../images/Check.svg' alt='' srcset='' onclick='window.open('Moderator_Check_News.php','_self')'>
              </div>
          </div>";
      }
    }

    //Article


    /*
    echo "
          

          <div class='box-container'>
                      <div class='box_head'>
                      <img src='../images/pending/kandy_perehera.jpg' alt=''>
                      <div class='tag'>
                       <div class='tag_text'>Article</div>
                      </div>
                    </div>

                    <div class='box_body'>
                      <h3>Kandy Perahera</h3>
                      <p>Amith Malsanka</p>
                    </div>

                    <div class='setting_close'>
                       <img src='../images/Check.svg' alt='' srcset='' onclick='window.open('Moderator_Check_Articles.php','_self')'>
                    </div>
          </div>


          <div class='box-container'>
              <div class='box_head'>
                <img src='../images/pending/cafe_shop.jpg' alt=''>
                <div class='tag'>
                  <div class='tag_text'>Ads</div>
                </div>
              </div>

              <div class='box_body'>
                <h3>Candy Cafe</h3>
                <p>Candy Cafe Team</p>
              </div>

              <div class='more'>
                  <p>2022:01:17</p>
                  <p>00:00</p>
              </div>

              <div class='setting_close'>
                 <img src='../images/Check.svg' alt='' srcset='' onclick='window.open('Moderator_Check_Ads.php','_self')'>
              </div>

              

          </div>
        ";

*/        

          ?>
