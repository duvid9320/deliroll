<?php
/**/

function isEmpty($var) {
    return is_null($var) || empty($var);
}

function showWindowAlertAndRedirect($message, $dir) {
    ?>
    <script type="text/javascript">
        alert("<?php echo $message?>");
        window.location = "<?php echo $dir?>";
    </script>
    <?php
}

function showWarningAlert($title, $message) {
    showAlert($title, $message, "warning");
}

function showSuccessAlert($title, $message) {
    showAlert($title, $message, "success");
}

function showDangerAlert($title, $message) {
    showAlert($title, $message, "danger");
}

function showInfoAlert($title, $message) {
    showAlert($title, $message, "info");
}

function showPrimaryAlert($title, $message) {
    showAlert($title, $message, "primary");
}

function showSecondaryAlert($title, $message) {
    showAlert($title, $message, "secondary");
}

function showDarkAlert($title, $message) {
    showAlert($title, $message, "dark");
}

function showLightAlert($title, $message) {
    showAlert($title, $message, "light");
}

function showAlert($title, $message, $type) {
    ?>
    <div class="text-center alert alert-<?php echo $type ?> alert-dismissible fade show m-0" role="alert">
        <strong><?php echo $title ?></strong> <?php echo strlen($message) > 0 ? "<br>" . $message : "" ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
}

function debugGetVars() {
    echo '<br>GET<br><pre>';
    debugArray($_GET);
    echo '</pre>';
}

function debugPostVars() {
    echo '<br>POST<br><pre>';
    debugArray($_POST);
    echo '</pre>';
}

function debugArray($array) {
    foreach ($array as $key => $value)
        echo $key . " => " . $value . "<br>";
}

function debugRequestVars() {
    debugArray($_REQUEST);
}

function getPostString($name) {
    return filter_input(INPUT_POST, $name, FILTER_SANITIZE_STRING);
}

function getPostInt($name) {
    return intval(filter_input(INPUT_POST, $name, FILTER_SANITIZE_NUMBER_INT));
}

function postVarExists($name) {
    return filter_has_var(INPUT_POST, $name);
}

function getGetString($name) {
    return filter_input(INPUT_GET, $name, FILTER_SANITIZE_STRING);
}

function getGetInt($name) {
    return intval(filter_input(INPUT_POST, $name, FILTER_SANITIZE_NUMBER_INT));
}

function getVarExists($name) {
    return filter_has_var(INPUT_GET, $name);
}

function cookieExists($name) {
    return filter_has_var(INPUT_COOKIE, $name);
}

function getCookie($name) {
    return filter_input(INPUT_COOKIE, $name, FILTER_SANITIZE_STRING);
}

function getSessionVarOrElseNull($name) {
    return isset($_SESSION[$name]) ? $_SESSION[$name] : NULL;
}

function sessionArrayIsValid($name){
    return isset($_SESSION[$name]) && !empty($_SESSION[$name]);
}
?>