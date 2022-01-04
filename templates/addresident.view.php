
<main>
    <section class="section-hero">
        <div class="hero">
            <div class="container">
             <h1 class="heading-primary">Add A Resident</h1>
            </div>
        </div>
    </section>
        
    <section class="add-form">
        <div class="form-container">
            <div class="resident-form">
                <form action="" autocomplete="off">
                    <div class="input">
                        <label for="trn">TRN</label>
                        <input type="text" placeholder="XXX-XXX-XXX" name="trn" id="trn" >
                    </div>
                    <div class="input">
                        <label for="firstname">First Name</label>
                        <input type="text" placeholder="First Name" name="firstname" id="firstname" autocomplete="off">
                    </div>
                    <div class="input">
                        <label for="lastname">Last Name</label>
                        <input type="text" placeholder="Last Name" name="lastname" id="lastname">
                    </div>
                    <div class="input">
                        <label for="lastname">Date of Birth</label>
                        <input type="date" placeholder="Last Name" name="lastname" id="lastname">
                    </div>
                    <div class="input">
                        <label for="gender">Gender</label>
                       <select name="gender" id="">
                           <option value="Male">Male</option>
                           <option value="Female">Female</option>
                       </select>
                    </div>
                    <div class="input">
                        <label for="home">Apostolate</label>
                       <select name="home" id="">
                           <option value="MFH">MFH</option>
                       </select>
                    </div>
                    <div class="input">
                        <label for="condition">Condition</label>
                       <select name="condition" id="">
                           <option value="CP">CP</option>
                           <option value="MC">MC</option>
                       </select>
                    </div>
    
                    <div class="sub-btn">
                        <input type="submit" name = "submit" value = "Submit" class = "submit-btn c-main">
                        <input type="cancel" name = "cancel" value = "Cancel" class = "submit-btn c-grey">
                    </div>
                  
                </form>
            </div>
        </div>
        
    </section>

</main>
