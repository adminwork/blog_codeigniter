    <div class="content" id="body">
          <?php
              foreach ($post as $key=>$value){
                echo '<b>';
                    echo $value['title'];
                    echo "</b><br />";
                echo $value['text'];
                echo "<br /><br />";
              }
       ?>
    </div>


