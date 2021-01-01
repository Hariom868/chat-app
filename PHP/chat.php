<?php
session_start();
$user = $_GET['a'];
include_once('pdo1.php');
$name = $_SESSION['name'];
$logindata=new Database_Connection();
if(isset($_POST['message']))
{
$message = $_POST['message'];
$sql = $logindata->savemessage($name,$user,$message);
}
?>
<html>

<head>
    <title>Chat | Dashboard</title>
    <link rel="stylesheet" href="../CSS/login.css">
    <link rel="stylesheet" href="../CSS/chat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>
    <header>
        <div style = "position:relative; left:20px; top:20px;" class="begin">
            <strong class="logo_name">Chat App</strong>
            <ul style="list-style: none;" class="ho">
                
                
                <li><a href="dashboard.PHP" style="text-decoration: none; color:whitesmoke;">dashboard</a></li>
                <li><a href="logout.PHP" style="text-decoration: none; color:whitesmoke;">Log Out</a></li>

            </ul>
        </div><br>
        <br>
    </header>
    <div style = "position:relative; left:20px; top:100px;" class="fir">
    <table>
    <?php
                $sql=$logindata->friends($name);
               
        
        while ($row=mysqli_fetch_array($sql)) {
            ?>
            <tr>
                <td><img class="pic" src ="../Images/5.png"></td>
                <?php $r = $row['B'];?>
               <td><h3><?php echo "<a href='chat.php?a=".$row['B']."'>$r</a>"; ?></h3></td>
             
                
            </tr>
            <?php
                }?>
           

        </table>
       
        </div>
        <div style = "position:relative; left:500px; top:-418px;"class ="sec">
        <table>
            <tr>
                <td><img class="pic" src="../images/5.png"></td>
                <td><h3><?php echo $user ;?></h3></td>
            </tr>
        </table><hr>
        <div class="third">
        <?php
        $sql=$logindata->seemessage($name,$user);
        while ($row=mysqli_fetch_array($sql)) {
            ?>
            <?php
            if($name == $row['A'])
            {?>
                <h3 align ="right"><?php echo $row['chat'];?></h3>
                <h6 align ="right"><?php echo $row['RegDate'];?></h6>
          <?php  }
            else
            {?>
                <h3 align ="left"><?php echo $row['chat']; ?></h3>
                <h6 align ="left"><?php echo $row['RegDate']; ?></h6>
           <?php }
            ?>
      <?php
        }?>

        </div>
        <div>
            <form method = "POST">
                <input class="field" type="text" placeholder="Enter message" name="message" required>
                
            </form>
        </div>
        </div>
        </body>
        </html>