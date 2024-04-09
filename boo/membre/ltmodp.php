<?php include_once "nav.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
            
            <table class="table table-hover tex-center  mt-3 ">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">NOM</th>
                        <th scope="col">IMAGE</th>
                    </tr>
                </thead>
                <tbody>
                <?php
while($paye=(mysqli_fetch_assoc($resulpa))){
        
        ?>
                    <tr>
                        <td><?php echo $paye['nom'];?></td>
                        <td><img src="../image/<?php echo $paye['photo'];?>" width="48"></td>
                </tbody>    
                <?php } ?>
            </table>
        </div>   
</body>
</html>