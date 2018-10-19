<?php 
$options = [ 'cost' => 8, 'salt' => '5doasdlvua;asnfeuyjvlaksdyvq0w9e798welkbca7'];
echo password_hash("LeFevre7", PASSWORD_BCRYPT, $options);
?>