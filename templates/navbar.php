<header class="header">
    <a href="dashboard.php">
        <img src="images/logo.png" alt="Logo" class="logo">
    </a>
    
    <nav class="main-nav">
        <ul class="main-nav-list">
            <li><a class="main-nav-link" href="dashboard.php" >Home</a></li>
            <li><a class="main-nav-link" href="#">Repairs</a></li>
            <!-- <li><a class="main-nav-link" href="addresident.php" >Add Resident</a></li> -->
            <!-- <li><a class="main-nav-link" href="addnursesnotes.php"> Nurses Notes</a></li> -->
            <li><a href="myaccount.php" class="main-nav-link badge_item"><i class="far fa-user-circle fa-lg"></i><?php echo $name;?><span class="badge">
                <?php echo $_SESSION['mcount'];?></span></a>
                
        
        </li>
            <li> <a href="logout.php" class="logout-btn">Logout</a></li>
        </ul>
    </nav>
</header>



