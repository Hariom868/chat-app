<?php
session_start();
include_once('pdo1.php');
$name = $_SESSION['name'];
$logindata=new Database_Connection();
?>
<html>

<head>
    <title>Chat | Dashboard</title>
    <link rel="stylesheet" href="../CSS/login.css">
    <link rel="stylesheet" href="../CSS/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>
    <header>
        <div style = "position:relative; left:20px; top:20px;" class="begin">
            <strong class="logo_name">Chat App</strong>
            <ul style="list-style: none;" class="ho">
                
                
                <li><a href="about_us.PHP" style="text-decoration: none; color:whitesmoke;">About Us</a></li>
                <li><a href="logout.PHP" style="text-decoration: none; color:whitesmoke;">Log Out</a></li>

            </ul>
        </div><br>
        <br>
    </header>
    <main>
        <img class = "h" src ="../Images/4.png">
        <h2 align ="center"> <?php echo $name ; ?></h2>
        <div class="dropdown">
            <button class="dropbtn"><h2>Friend List</h2></button>
            <div class="dropdown-content">
                <?php
                $sql=$logindata->friends($name);
                while ($row=mysqli_fetch_array($sql)) {
                    ?>
               <h3><?php echo $row['B'];?></h3>
               <?php echo "<a href='chat.php?a=".$row['B']."'>Chat</a>"; ?>
              <?php echo "<a href='chat.php?a=".$row['B']."'>Images</a>"; ?>
              <?php
                }?>
            </div>
          </div>
          <div class="dropdown">
            <button class="dropbtn"><h2>Friend Request</h2></button></button>
            <div class="dropdown-content">
            <?php
                $sql=$logindata->friendsaccept($name);
                while ($row=mysqli_fetch_array($sql)) {
                    ?>
               <h3><?php echo $row['A'];?></h3>
               <?php echo "<a href='accept.php?a=".$row['A']."'>Accept</a>"; ?>
              <?php
                }?>
            </div>
          </div>
          <div class="dropdown">
            <button class="dropbtn"><h2>All User</h2></button></button>
            <div class="dropdown-content">
            <?php
                $sql=$logindata->viewall($name);
                while ($row=mysqli_fetch_array($sql)) {
                    ?>
               <h3><?php echo $row['Name'];?></h3>
               <?php echo "<a href='send.php?a=".$row['Name']."'>Send</a>"; ?>
              <?php
                }?>
            </div>
          </div>
          <div class="dropdown">
            <button class="dropbtn"><h2><a href ="#" style="text-decoration: none; color:whitesmoke;">Update Profile</a></h2></button>
            </div>
</main>
</body>
</html>