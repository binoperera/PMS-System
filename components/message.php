<?php
// Success messages
if (isset($success_msg) && is_array($success_msg) && count($success_msg) > 0) {
    foreach ($success_msg as $success) {
        echo '<script>swal("' . addslashes($success) . '", "", "success");</script>';
    }
} else if (isset($success_msg) && is_string($success_msg)) {
    echo '<script>swal("' . addslashes($success_msg) . '", "", "success");</script>';
}

// Warning messages
if (isset($warning_msg) && is_array($warning_msg) && count($warning_msg) > 0) {
    foreach ($warning_msg as $warning) {
        echo '<script>swal("Warning", "' . addslashes($warning) . '", "warning");</script>';
    }
} else if (isset($warning_msg) && is_string($warning_msg)) {
    echo '<script>swal("Warning", "' . addslashes($warning_msg) . '", "warning");</script>';
}

// Info messages
if (isset($info_msg) && is_array($info_msg) && count($info_msg) > 0) {
    foreach ($info_msg as $info) {
        echo '<script>swal("' . addslashes($info) . '", "", "info");</script>';
    }
} else if (isset($info_msg) && is_string($info_msg)) {
    echo '<script>swal("' . addslashes($info_msg) . '", "", "info");</script>';
}

// Error messages
if (isset($error_msg) && is_array($error_msg) && count($error_msg) > 0) {
    foreach ($error_msg as $error) {
        echo '<script>swal("Error", "' . addslashes($error) . '", "error");</script>';
    }
} else if (isset($error_msg) && is_string($error_msg)) {
    echo '<script>swal("Error", "' . addslashes($error_msg) . '", "error");</script>';
}

// Clear all message variables after display
if (isset($success_msg)) unset($success_msg);
if (isset($warning_msg)) unset($warning_msg);
if (isset($info_msg)) unset($info_msg);
if (isset($error_msg)) unset($error_msg);
?>