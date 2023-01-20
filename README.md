# ListController

[![NPM](https://img.shields.io/npm/l/react)](https://github.com/JonasGaleno/ListController/blob/main/LICENSE) 

# Sobre o projeto

//link da aplicaç

ListController é um projeto com mais foco no back end e nas funcionalidades, ele surgiu com o objetivo de melhorar o desenvolvimento com a linguagem PHP, dessa forma foram utilizados algumas das melhores práticas assim como ferramentas.

A aplicação web serve para gerenciar listas ou itens de categorias cadastradas, em resumo cadastramos algumas categorias e dentro das categorias montamos os itens relacionados. Além disso temos o controle de login, então as listas e categorias são separadas por usuários.

## Funcionalidades
- Sistema de login e cadastro
- Cadastro, edição e exclusão de categorias
- Cadastro, edição e exclusão de itens/listas
- Consulta dos itens de cada categoria
- Marcar item como finalizado
- Consulta de itens finalizados por categoria
- Logout do sistema

## Interface do usuario
Sitemap: https://www.figma.com/file/jZdJG1IaftKXqFOUIGDhz6/ListController-Sitemap?node-id=0%3A1&t=aJKBdVYPFMYbVeVl-1
Prototipação: https://www.figma.com/file/QSv62hE0rlHCdXw9hpLA2n/ListController-Design?node-id=0%3A1&t=RrruoDjQs80PQdoF-1


## Layout web
![Web 1](https://github.com/acenelio/assets/raw/main/sds1/web1.png)

![Web 2](https://github.com/acenelio/assets/raw/main/sds1/web2.png)

## Modelo conceitual
![Modelo Conceitual](https://github.com/acenelio/assets/raw/main/sds1/modelo-conceitual.png)

## Diagrama de classe
![Modelo Conceitual](https://github.com/acenelio/assets/raw/main/sds1/modelo-conceitual.png)

# Tecnologias utilizadas
## Back end
- PHP
- Composer
- Doctrine
- MySQL
- PSR-7 http-response
- PSR-15 http-server-handle
- PSR-11 Container interface
- phpdotenv
## Front end
- HTML / CSS / JS
- Bootstrap
- SweetAlert
- GoogleFonts

# Como executar o projeto

## Back end
Pré-requisitos: Apache, MySQL, PHP-8 e Composer

```bash
# clonar repositório
git clone https://github.com/JonasGaleno/ListController.git

# entrar na pasta do projeto
cd ListController

# instalar as depêndencias
composer install

# configurar as variáveis de ambiente
public/.env

DATABASE_NAME=
DATABASE_USER=
DATABASE_PASSWORD=
DATABASE_HOST=
DATABASE_PORT=

# criação do banco de dados e das tabelas no terminal
php bin/doctrine.php orm:schema-tool:create

# subir servidor do php
php -S localhost:8080 -t public
```

# Autor

Jonas Galeno da Silva

https://www.linkedin.com/in/jonas-galeno-96604520a/
