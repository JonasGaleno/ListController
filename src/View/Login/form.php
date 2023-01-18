<?php include __DIR__ . '/../header.php' ?>

    <div class="container container-form">
        <form action="/process-login" method="POST">
            <span class="warning-text">Para controlar suas listas é necessário ter uma conta</span>
            
            <p class="title-form">Login</p>

            <div class="form-group">
                <label for="inputEmail">E-mail</label>
                <input type="text" name="email" class="form-control" id="inputEmail" placeholder="email@gmail.com">
            </div>

            <div class="form-group">
                <label for="inputPassword">Senha</label>
                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Sua senha">
            </div>

            <div class="container-buttons">
                <button type="submit" class="btn btn-primary btn-form">Entrar</button>
                <a href="/login-google" class="btn btn-secondary btn-form">
                    <img class="google-icon" src="Assets/google.svg" alt="google icon"/>Google
                </a>
                <a href="/register" class="btn btn-success btn-form">Cadastrar</a> 
            </div>
        </form>
    </div>
    
<?php include __DIR__ . '/../footer.php' ?>
