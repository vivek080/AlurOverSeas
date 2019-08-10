<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<script>
function myFunction() {
  var element = document.getElementById("msg");
  element.className = element.className.replace(/\bsuccess\b/g, "");
}
</script>
<div class="message success" id="msg" onclick="myFunction"><?= $message ?></div>
