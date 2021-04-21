<?php
    include "config.php";
    $x = $pdo->prepare("DELETE FROM  games ORDER BY id LIMIT 1");
    $x->execute();
?>
<?php

    $x = $pdo->prepare("SELECT * FROM games LIMIT 6");
    $x->execute();
?>
<?php     
        while($row = $x->fetch(PDO::FETCH_ASSOC)){
?>          <div class="card">
                <div class="img">
                    <?php 
                        $im = $row['img_loc'];
                        echo "<img src='$im' height='300px' width='300px'/>";?>
                    </div>
                <div class="name">
                    <?php echo $gname= $row['game_name'];?>
                </div>
                <div class="desc">
                    <?php echo $des = $row['desc'];?>
                </div>
                 <div class="id">
                    <?php   $gid = $row['id'];?>
                </div>
            </div>
        <?php   
        } ?>    