<?php

/**
 * Check if a POST variable is set and redirect if not.
 *
 * @param string $name The name of the POST name to check.
 * @param string $redirectLocation The location to redirect to if the variable is not set.
 * @return void
 */

function checkPostVariable($name, $redirectLocation) {
    if (!isset($_POST[$name])) {
        header("Location: $redirectLocation");
        exit();
    }
}
?>
