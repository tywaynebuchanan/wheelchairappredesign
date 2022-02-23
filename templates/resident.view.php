<?php 
include('processes/functions.php');
resident_data();
?>

<script>
    const showInfo = document.getElementById("showInfo");
    const modal = document.getElementById("modal");
    // const backbtn = document.getElementById("back-btn");
    const closemodal = document.getElementById("closemodal");
    const open = document.getElementById("openmodal").addEventListener('click', ()=>{
        showInfo.classList.add('showInfo');
        modal.style.display = "block";


    });

    closemodal.addEventListener('click',()=>{
      modal.style.display = "none";
      showInfo.classList.remove('showInfo');
    })

    
    
    
    
</script>



