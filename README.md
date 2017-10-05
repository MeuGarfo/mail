# mail
:email: Sistema básico de envio de email

## como usar
```php
<?php
require 'vendor/autoload';
$cfg=[
    'server'=>'servidor smtp',
    'user'=>'usuário',
    'password'=>'senha',
    'port'=>'porta ssl',
    'from'=>'email do remetende',
    'name'=>'nome do remetente'
];
$mail=new Mail($cfg);
if($mail->send($to,$html,$txt)){
    echo 'mensagem enviada com sucesso!';
}
```
