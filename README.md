# Resume CV

O **Resume CV** é um website de compartilhamento (rede) de currículos e portfólios. No momento está em desenvolvimento, mas foi construido com Laravel, Jquery e Alpine.

Seu propósito principal é **salvar os dados do usuário e** posteriormente **criar um site** dinâmico com essas informações, o site pode ser um Resume ou um Portfólio, dependendo do plano (role) do usuário.

## 💻 Demonstração

![Uso do projeto em sua ultima versão](https://raw.githubusercontent.com/allan-rcos/resume-cv/refs/heads/main/docs/gifs/resumecv.gif)

## ⚙️ Tecnologias
![Básico ao avançado de PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Blasor](https://img.shields.io/badge/Blasor-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Sanctum](https://img.shields.io/badge/Sanctum-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Spatie](https://img.shields.io/badge/Spatie-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Jquery](https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white)
![Alpine](https://img.shields.io/badge/Alpine%20JS-8BC0D0?style=for-the-badge&logo=alpinedotjs&logoColor=black)
![Javascript](https://img.shields.io/badge/JavaScript-323330?style=for-the-badge&logo=javascript&logoColor=F7DF1E)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)

## 🛠️ Instalação

### 1. Crie uma pasta e extraia o código fonte:

Exemplo pelo git:

```bash
gh repo clone allan-rcos/sistema-de-vendas
```

### 2. Configure o Banco de Dados:

Foi utilizado para desenvolvimento o banco [MariaDB v5.5](https://mariadb.org/download/). Lembre-se de substituir as variáveis de ambiente.

### 3. Composer:

Instale o [Composer](https://getcomposer.org/download/) no seu computador e inicie o projeto:

```bash
composer install
```

### 4 Suba o banco de dados:

Crie a tabela, caso ela ainda não exista, visualize se está funcionando com esses comandos:

```bash
# Database
php artisan db:show
# Table
php artisan db:table
```

Rode as migrações:

```bash
php artisan migrate
```

Rode o seeder principal para criar os Roles e Permissions do Spatie:
```bash
php artisan db:seed
```

**Opcional:** Caso deseje já começar com dados fictícios é só rodar o Seeder UserData:
```bash
php artisan db:seed UserDataSeeder
```

## ✨ Uso

### 1. Iniciando o servidor:

O Laravel funciona com um servidor NodeJs em paralelo para utilizar alguns frameworks Javascript
(Como Jquery, TailwindCss, entre outros), portanto será necessário dois terminais ou rodar o comando em segundo plano.


```bash
# O comando para rodar o servidor Laravel (Back-End):
php artisan serve
# O comando para rodar o servidor Node (Fron-End):
npm run dev
```

Então é só abrir o link http://127.0.0.1:8000, ele aparecerá no log do comando acima.

Por padrão, existe um usuário com email `developer@dev.local` e sua senha, assim como toda senha gerada pelos seeders, é `password`.

#### OBS:
Eu utilizo o [PHPStorm](https://www.jetbrains.com/pt-br/phpstorm/) com o [Herd](https://herd.laravel.com/), o segundo pode ser substituido pelo *Laragon*, caso seja sua preferência.

Se utilizar os dois, iniciar o projeto fica simples. O *Herd* altomaticamente inicia um servidor Laravel quando aberto. E você pode inicializar o *Node* do projeto pelo comando `ALT` + `F11` do *PHPStorm* (Selecionando o Dev).

O *Herd* possui também um servidor Node, porem ele não roda o do projeto, e sim o dele, portante seria necessário instalar os pacotes, porém achei mais prático utilizar o comando do *PHPStorm*.

## 📋 Roteiro

- [ ] Persona (página para alterar Skills, Linguagens, Prêmios e Links);
- [ ] CRUD de Resumes;
- [ ] Configuração de Exibição do Portfólio;
- [ ] Controlador de Resumes e Portfólios de usuários;
- [ ] Listagem pública de resumes de determinado usuário;
- [ ] Responsividade.

## 🔔 Status do Projeto

No momento este é meu projeto de foco. Estarei trabalhando/estudando nele.

## ✏️ Contribuir

Esse é um **projeto de treinamento**, portanto fique a vontade para cloná-lo.

## 🔓 Licença

[![MIT](https://img.shields.io/badge/MIT-green?style=for-the-badge)](https://choosealicense.com/licenses/mit/)
