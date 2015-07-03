<div class="btn-group-vertical" id="sidebar" id="header">
    <?php
    foreach ($categories as $category =>$value){
        echo "<a href='http://localhost/blog_codeigniter/index.php/category/{$value['id']}' class='btn btn-default'>";
        echo $value['name'];
        echo '</a>';
    }
    ?>
</div>