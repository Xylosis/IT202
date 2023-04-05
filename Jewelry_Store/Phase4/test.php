<?php
// See the password_hash() example to see where this came from.
require_once('admin_db.php');

$hashed = get_hashed('ajd93@njit.edu','pentakill');

echo $hashed;
echo "<br>";

$holder = password_hash('tsm2023', PASSWORD_DEFAULT);

echo $holder;

echo "<br>";


if (password_verify('tsm2023', $holder)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>
