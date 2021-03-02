<!-- $_SESSION["type"] 1  = Admin headerlocationback > back admin
$_SESSION["type"] 0  = User  headerlocationback > user -->
<?php

// do we already got an authenticated user here ?
if (!isset($_SESSION["connected"])) {
    // nop
    // so, cleaning
    include("ctrl.session-close.php");
    // and redirecting now
    header("Location: ?login#bad-or-expired-session");
    exit;
}
