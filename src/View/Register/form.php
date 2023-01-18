<?php include __DIR__ . '/../header.php' ?>

    <div class="container container-form">
        <form action="process-register" method="POST">   

            <p class="title-form">Cadastro</p>

            <div class="form-group">
                <label for="inputName">Nome</label>
                <input type="text" name="name" class="form-control" id="inputName" placeholder="Seu nome">
            </div>

            <div class="form-group">
                <label for="inputEmail">E-mail</label>
                <input type="text" name="email" class="form-control" id="inputEmail" placeholder="email@gmail.com">
            </div>

            <div class="form-group">
                <label for="inputPassword">Senha</label>
                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Sua senha">
            </div>

            <div class="container-buttons">
                <button type="submit" class="btn btn-primary btn-form">Enviar</button>
                <a href="/login" class="btn btn-secondary btn-form">Voltar</a> 
            </div>
        </form>
    </div>

<?php include __DIR__ . '/../footer.php' ?>
