<?php

session_start();

?>



<form id="form-user-password" class="my-profile-form w-100" method="post">



    <div class="row mb-3">
        <div class="col-12">
            <div>
                <label>Current Password:</label>
            </div>
            <div>
                <input class="profile-data account-current-password" id="currentPassword" name="utilizadorNome"
                    maxlength="70" onchange="validatePassword(this)">
            </div>
        </div>

    </div>

    <div class="row mb-3">
        <div class="col-12">
            <div>
                <label>new password:</label>
            </div>
            <div>
                <input class="profile-data account-new-password" id="newPassword" name="utilizadorEmail" maxlength="70"
                    onchange="validatePassword(this)">
            </div>
            <div>
                <span id="email-span" class="hide" style="margin: 0;padding: 2px;"></span>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12">
            <div>
                <label>new password repeat:</label>
            </div>
            <div>
                <input class="profile-data account-new-password-reapeat" id="newPasswordRepeat" name="newPasswordRepeat"
                    maxlength="70" onchange="validatePasswordReapeat(this)">
            </div>
            <div>
                <span id="email-span" class="hide" style="margin: 0;padding: 2px;"></span>
            </div>
        </div>
    </div>



    <div class="row mb-3">

    </div>


    <div class="row mb-3">
        <div>

        </div>
        <div>
            <button id="edit-my-profile" class="edit-my-profile p-3 font-semibold rounded-2 border-0 bg-green-medium"
                type="submit" form="form-user-password" name="submit" formaction=""> Change password </button>

        </div>
        <div class="col-5">

        </div>
    </div>

</form>