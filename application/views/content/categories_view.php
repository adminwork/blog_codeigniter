    <div class="content" id="body">
          <?php
              foreach ($arrayCategory as $key => $value) {
                  echo "<p><a href='post/{$value['id']}'>" . $value['title'] . "</a><br>";
                  echo "<i>create:" . $value['create_at'] . "</i></p>";
                  echo "<br>";
          }
       ?>
    </div>


