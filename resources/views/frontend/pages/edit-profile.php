<?php
$pageName = 'edit-profile';
$pageTitle = 'Profile member';
$_title = 'Profile member | Alpha Auto Company';
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <?php require resource_path('views/frontend/partials/inc_header.php'); ?>
</head>
<body class="member-profile-page">
    <?php require resource_path('views/frontend/partials/inc_topmenu.php'); ?>
    <main class="main-content">
        <?php include resource_path('views/frontend/partials/inc_topbar.php'); ?>
        <div class="page-content">
            <div class="member-profile" id="memberProfile">
                <div class="member-profile__sidebar">
                    <section class="member-profile__card member-profile__summary" aria-labelledby="profileHeading">
                        <h2 id="profileHeading">Profile</h2>
                        <div class="member-profile__identity">
                            <img src="https://i.pravatar.cc/192?img=12" alt="Wade Warren" class="member-profile__avatar" data-member-avatar>
                            <h3 id="memberDisplayName">Wade Warren</h3>
                            <div class="member-profile__email">
                                <span id="memberDisplayEmail">wade.warren@example.com</span>
                                <button type="button" class="member-profile__icon-button" id="copyMemberEmail" aria-label="Copy email address"><i class="bi bi-copy" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <div class="member-profile__credit"><span>เครดิตคงเหลือ</span><strong>30,000 บาท</strong></div>
                    </section>

                    <section class="member-profile__card member-profile__password" aria-labelledby="passwordHeading">
                        <div class="member-profile__heading">
                            <h2 id="passwordHeading">Change Password</h2>
                            <a href="#memberPasswordHelp" class="member-profile__help" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="memberPasswordHelp">Need help <i class="bi bi-question-circle" aria-hidden="true"></i></a>
                        </div>
                        <p class="collapse member-profile__hint" id="memberPasswordHelp">ใช้รหัสผ่านใหม่อย่างน้อย 8 ตัวอักษร และกรอกยืนยันให้ตรงกัน หน้านี้เป็นแบบจำลอง ยังไม่เปลี่ยนรหัสผ่านจริง</p>
                        <form id="memberPasswordForm">
                            <div class="member-profile__field">
                                <label for="memberCurrentPassword">Current Password</label>
                                <div class="member-profile__input-wrap">
                                    <input type="password" id="memberCurrentPassword" placeholder="Enter password" autocomplete="current-password" required>
                                    <button type="button" class="member-profile__input-icon" data-member-password="memberCurrentPassword" aria-label="Show current password" aria-pressed="false"><i class="bi bi-eye-slash" aria-hidden="true"></i></button>
                                </div>
                                <a href="#memberPasswordHelp" class="member-profile__forgot" data-bs-toggle="collapse" aria-expanded="false" aria-controls="memberPasswordHelp">Forgot Current Password? Click here</a>
                            </div>
                            <div class="member-profile__field">
                                <label for="memberNewPassword">New Password</label>
                                <div class="member-profile__input-wrap">
                                    <input type="password" id="memberNewPassword" placeholder="Enter password" autocomplete="new-password" minlength="8" required>
                                    <button type="button" class="member-profile__input-icon" data-member-password="memberNewPassword" aria-label="Show new password" aria-pressed="false"><i class="bi bi-eye-slash" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <div class="member-profile__field">
                                <label for="memberRepeatPassword">Re-enter Password</label>
                                <div class="member-profile__input-wrap">
                                    <input type="password" id="memberRepeatPassword" placeholder="Enter password" autocomplete="new-password" minlength="8" required>
                                    <button type="button" class="member-profile__input-icon" data-member-password="memberRepeatPassword" aria-label="Show re-entered password" aria-pressed="false"><i class="bi bi-eye-slash" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <button type="submit" class="member-profile__button member-profile__button--primary member-profile__save-password">Save Change</button>
                            <p class="member-profile__status" id="memberPasswordStatus" role="status" hidden></p>
                        </form>
                    </section>
                </div>

                <section class="member-profile__card member-profile__update" aria-labelledby="profileUpdateHeading">
                    <form id="memberProfileForm">
                        <div class="member-profile__heading">
                            <h2 id="profileUpdateHeading">Profile Update</h2>
                            <button type="button" class="member-profile__button member-profile__button--edit" id="editMemberProfile"><i class="bi bi-pencil-square" aria-hidden="true"></i><span>Edit</span></button>
                        </div>
                        <div class="member-profile__upload">
                            <img src="https://i.pravatar.cc/192?img=12" alt="Profile preview" class="member-profile__avatar member-profile__avatar--small" data-member-avatar>
                            <input type="file" id="memberAvatarUpload" accept="image/jpeg,image/png,image/webp" hidden>
                            <button type="button" class="member-profile__button member-profile__button--primary" id="uploadMemberAvatar">Upload New</button>
                            <button type="button" class="member-profile__button" id="deleteMemberAvatar">Delete</button>
                        </div>

                        <div class="member-profile__fields">
                            <div class="member-profile__field">
                                <label for="memberFirstName">First Name</label>
                                <input type="text" id="memberFirstName" value="Wade" autocomplete="given-name" data-member-edit readonly required>
                            </div>
                            <div class="member-profile__field">
                                <label for="memberLastName">Last Name</label>
                                <input type="text" id="memberLastName" value="Warren" autocomplete="family-name" data-member-edit readonly required>
                            </div>
                            <div class="member-profile__field">
                                <label for="memberPasswordPreview">Password</label>
                                <div class="member-profile__input-wrap">
                                    <input type="password" id="memberPasswordPreview" placeholder="***********" readonly aria-describedby="memberPasswordPreviewHelp">
                                    <a href="#memberCurrentPassword" class="member-profile__input-icon" aria-label="Go to change password"><i class="bi bi-eye-slash" aria-hidden="true"></i></a>
                                </div>
                                <span class="visually-hidden" id="memberPasswordPreviewHelp">Change your password in the Change Password panel.</span>
                            </div>
                            <div class="member-profile__field">
                                <label for="memberPhone">Phone Number</label>
                                <div class="member-profile__input-wrap member-profile__phone">
                                    <input type="tel" id="memberPhone" value="(66) 055-533-0120" autocomplete="tel" data-member-edit readonly>
                                    <span class="member-profile__country" aria-label="Thailand +66"><span class="member-profile__flag" aria-hidden="true"></span><i class="bi bi-caret-down-fill" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="member-profile__field">
                                <label for="memberEmail">E-mail</label>
                                <input type="email" id="memberEmail" value="wade.warren@example.com" autocomplete="email" data-member-edit readonly required>
                            </div>
                            <div class="member-profile__field">
                                <label for="memberBirthDate">Date of Birth</label>
                                <input type="date" id="memberBirthDate" value="1999-01-12" autocomplete="bday" data-member-edit readonly>
                            </div>
                            <div class="member-profile__field member-profile__field--full">
                                <label for="memberLocation">Location</label>
                                <input type="text" id="memberLocation" value="2972 Westheimer Rd. Santa Ana, Illinois 85486" autocomplete="street-address" data-member-edit readonly>
                            </div>
                            <div class="member-profile__field member-profile__field--full">
                                <label for="memberCreditCard">Credit Card</label>
                                <div class="member-profile__input-wrap member-profile__card-select">
                                    <span class="member-profile__mastercard" aria-hidden="true"></span>
                                    <select id="memberCreditCard" disabled><option>843-4359-4444</option></select>
                                </div>
                            </div>
                            <div class="member-profile__field member-profile__field--full">
                                <label for="memberBiography">Biography</label>
                                <div class="member-profile__biography">
                                    <textarea id="memberBiography" rows="4" placeholder="Enter a biography about you" data-member-edit readonly></textarea>
                                    <button type="button" class="member-profile__icon-button" id="editMemberBiography" aria-label="Edit biography"><i class="bi bi-pencil-square" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="member-profile__button member-profile__button--primary member-profile__save-profile" id="saveMemberProfile" hidden>Save Change</button>
                    </form>
                    <p class="member-profile__status" id="memberProfileStatus" role="status" hidden></p>
                </section>
            </div>
        </div>
        <?php require resource_path('views/frontend/partials/inc_footer.php'); ?>
    </main>
    <?php require resource_path('views/frontend/partials/scriptjs.php'); ?>
</body>
</html>
