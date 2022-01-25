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
       showInfo.style.display = "none";
    //    backbtn.style.display = "none";
       modal.classList.remove('showPdf');

    });

    closemodal.addEventListener('click',()=>{
        showInfo.style.display = "block";
        modal.classList.add('showPdf');
    })

    
    
    
    
</script>



