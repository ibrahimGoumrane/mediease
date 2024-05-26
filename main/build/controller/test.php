<?php
// Password to hash
$password = 'raizel';

// Hash the password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);
echo "Hashed Password: " . $hashed_password . "<br>";

// Verify the hashed password
if (password_verify($password, $hashed_password)) {
    echo "Password verification successful!";
} else {
    echo "Password verification failed!";
}
?>
