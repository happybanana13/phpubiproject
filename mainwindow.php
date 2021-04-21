<?php
   include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="mainstyles.css">
<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
<script>
    //for queue button.. Was unable to use toggle, implemented the button instead
    $(document).ready(function(){
        $("#query").click(function(){
            $("#container").load("loadquery.php");
            $("#query").hide();
            $("#closequery").show();
        });
    })
    $(document).ready(function(){
        $("#closequery").click(function(){
            $("#container").load("closequery.php");
            $("#query").show();
            $("#closequery").hide();
        });
    })
    //delete button which ajax calls every 30 seconds as a function
    $(document).ready(function(){
        $("#delete").click(function(){
            $("#container").load("delete.php");
        });
    })
</script>
</head>
<body>
    <!-- Button to form--> 
<button id ="back"onclick="document.location='form.php'">Form</button>
<br />
<br/>
<!-- its always called according to id in ascending order so you can implement FIFO easily, if implementing LIFO then reverse the order of id-->
<?php
    $x = $pdo->prepare("SELECT * FROM games LIMIT 6");
    $x->execute();
    $y = $pdo->prepare("SELECT COUNT(*) as total FROM games");
    $y->execute();
?>
<div id = "container">
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
</div>
<?php $hi = $y-> fetch(PDO::FETCH_ASSOC);
         ?>
<button id ="query">Queue [<?php echo $hi['total']?>]</button>
<button id="closequery">Queue [<?php echo $hi['total']?>]</button>
<button id="delete">Delete</button>


</body>
</html>