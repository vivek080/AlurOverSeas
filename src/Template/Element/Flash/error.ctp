<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<script>
function myFunction() {
  var element = document.getElementById("msg");
  element.className = element.className.replace(/\berror\b/g, "");
}
</script>
<div class="message error" id="msg" onclick="this.classList.add('hidden');"><?= $message ?></div>
