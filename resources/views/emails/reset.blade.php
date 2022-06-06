<html>
    <body>
        <p>Olá {{ $user->name }}!</p>
        <p></p>
        <p>Este é um email de recuperação de senha. Criamos uma nova senha temporária, use-a para fazer login e depois crie uma nova senha mais forte</p>
        <p>Nova senha: {{ $user->password }}</p>
        <p>Att, <br>
        Time de desenvolvimento Masterer!</p>
    </body>
</html>