<?php

$destination = "assets/cdr/" . date('Y-m-d') . ".log";

$json="Test logs";

if (error_log("\n" . date('Y-m-d H:i:s') . " Incoming Request :\n $json ", 3, $destination) === false) {
    echo "Failed to write to log file.";
} else {
    echo "Log entry added successfully.";
}