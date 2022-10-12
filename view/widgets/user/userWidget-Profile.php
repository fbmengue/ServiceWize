<?php

use controller\UserContr;

session_start();


    //Instancias
    include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/user.classe.php';
    include __DIR__ . '/../../../controller/user-contr.classes.php';

    //New Service
    $newUserProfile = new UserContr();

    //Roda erros
    $myProfile = $newUserProfile->getMyProfileByID($_SESSION["userID"]);
    // print_r("<pre>");
    // print_r($myProfile);
    // print_r("</pre>");
    // exit;

if (isset($_SESSION["userID"])) {
    //Get dados
    $userID = $_SESSION["userid"];
    $pwd = $_SESSION["pwd"];


    ?>
        


        <form id="form-user-profile" class="my-profile-form w-100" method="post">
        

            <?php


            ?>
            <div class="row mb-3">
                <div class="col-12">
                    <div>
                        <label>Full Name:</label>
                    </div>
                    <div>
                        <input class="profile-name" id="utilizador-nome" name="utilizadorNome" 
                            placeholder="<?php echo $myProfile[0]['userFullName'];?>"
                            value="<?php echo $myProfile[0]['userFullName'];?>"
                            data-editar="<?php echo $myProfile[0]['userID'];?>" maxlength="70" >
                    </div>
                </div>
              
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <div>
                        <label>Email:</label>
                    </div>
                    <div>
                        <input class="profile-email" id="utilizador-email" name="utilizadorEmail" 
                            placeholder="<?php echo $myProfile[0]['userEmail'];?>" 
                            value="<?php echo $myProfile[0]['userEmail'];?>" 
                            data-editar="<?php echo $myProfile[0]['userID'];?>" maxlength="70" 
                            onchange="validaEmail(this)"> 
                    </div>
                    <div >
                        <span id="email-span" class="hide" style="margin: 0;padding: 2px;"></span>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <div>
                        <label>Phone:</label>
                    </div>
                    <div >
                        <input class="profile-mobile" id="utilizador-tel" name="utilizadorTel" 
                            placeholder="<?php echo $myProfile[0]['userMobile'];?>"
                            value="<?php echo $myProfile[0]['userMobile'];?>"
                            data-editar="<?php echo $myProfile[0]['userID'];?>" maxlength="70" 
                            onchange="validaTel(this)"> 
                    </div>
                    <div class="col-5">
                        <span id="telemovel-span" class="hide" style="margin: 0;padding: 2px;"></span>
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <label>Date of Birth:</label>
                    </div>
                    <div >
                        <input class="profile-birthDate" id="utilizador-tel" name="utilizadorTel" 
                            placeholder="<?php echo $myProfile[0]['userBirthDate'];?>"
                            value="<?php echo $myProfile[0]['userBirthDate'];?>"
                            data-editar="<?php echo $myProfile[0]['userID'];?>" type="date"> 
                    </div>
                    <div class="col-5">
                        <span id="telemovel-span" class="hide" style="margin: 0;padding: 2px;"></span>
                    </div>
                </div>
            </div>


            <div class="row mb-3">
                
            </div>

    <?php
}

?>
                <div class="row mb-3">
                    <div >
                        
                    </div>
                    <div >
                    <button id="edit-my-profile" class="edit-my-profile p-3 font-semibold rounded-2 border-0 bg-green-medium" 
                    type="submit" form="form-user-profile"
                    name="submit" formaction=""> EDIT MY PROFILE </button>
                           
                    </div>
                    <div class="col-5">
                       
                    </div>
                </div>
        
        </form>
