<div class="container" id="container">
    <div style="float: right" ><a href="login.php" class="btn btn-success">Log in</a></div>
    <div style="float: right" ><a href="registration.php" class="btn btn-success">Registrahion</a></div>
    <div class="header"><a href="index.php" ><img src = images/football_1.jpg alt = "Blog of football"></a></div>
    <div class="btn-group-vertical" id="sidebar" id="header">
        <?php
        foreach ($categories as $category =>$value){
            echo "<a href='http://localhost/blog_codeigniter/index.php/category/{$value['id']}' class='btn btn-default'>";
            echo $value['name'];
            echo '</a>';
        }
        ?>
    </div>
    <div class="content" id="body">
          <?php
              foreach ($posts as $post=>$value){
                echo '<b>';
                    echo $value['title'];
                    echo "</b><br />";
                echo $value['text'];
                echo "<br /><br />";
              }
       ?>
    </div>


