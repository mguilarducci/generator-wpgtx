# [generator-wpgtx](https://www.npmjs.org/package/generator-wpgtx)

> [Yeoman](http://yeoman.io) Generator


## Começando

Antes de qualquer coisa, precisamos ter instalados o [Node.js](http://nodejs.org/download/), o NPM (que é instalado junto ao Node.js) e o Ruby (para utilização do [`Compass`](http://compass-style.org/)).

O Ruby já vem instalado nativo no Mac OS e Linux. Mas, no Windows, precisamos instalá-lo. Para isto, utilize [este instalador](http://rubyinstaller.org/downloads/).

Com o Ruby instalado, você precisa instalar o `Compass`. O `Compass` é um framework baseado em [`Sass`](http://sass-lang.com/) que irá concatenar e comprimir seu `CSS`, além de oferecer inúmeros recursos, como trabalhar com variáveis, funções, contadores e tomadas de decisão.

Para instalar o `Compass`, execute o comando:

```bash
$ [sudo] gem install compass
```

_O_ `sudo` _(os_ `[]` _indicam que é "opcional") deve ser utilizado **apenas** se estiver num sistema operacional baseado em_ `UNIX` _(Mac OS e Linux) para que o comando seja executado como administrador._

Desta forma você irá instalar tanto o `Sass` quanto o `Compass` em sua máquina.

***

Agora, é hora de instalar o [Yeoman](http://yeoman.io/). Para isso, digite o comando abaixo:

```bash
$ [sudo] npm install -g yo
```

Além do Yeoman, serão instalados o [Bower](http://bower.io/) e o [Grunt](http://gruntjs.com/).

### Instalando o Generator

O `generator-wpgtx` é uma extensão para o Yeoman que irá acessar o repositório e baixar os arquivos.

Para instalar o `generator-wpgtx`, rode o comando:

```bash
$ [sudo] npm install -g generator-wpgtx
```

Agora o Yeoman e o nosso Generator estão instalados e prontos para usar!

***

### Atualizando o Generator

Estou sempre buscando atualizar o `generator-wpgtx`, seja otimizando o código, seja adicionando novas features.

Para que ele esteja sempre atualizado, é necessário rodar o seguinte comando periodicamente:

```bash
$ [sudo] npm update -g generator-wpgtx
```

Assim, caso haja uma nova atualização, ela será baixada e você terá a versão mais recente.

***

## Colocando tudo em ordem

Faça a instalação local da [versão mais recente do WordPress](http://br.wordpress.org/latest-pt_BR.zip) no local desejado.

> _Dica: eu utilizo o [Nettuts+ Fetch](https://github.com/weslly/Nettuts-Fetch) em meu [Sublime Text 3](http://sublimetext.com/3)._

Após instalar o WordPress no diretório escolhido, vá até a pasta `wp-content/themes` de sua instalação, utilizando o `Terminal`, `Git Bash`, `Windows PowerShell`, ou outro de sua preferência.

Então, inicie o Generator:

```bash
$ [sudo] yo wpgtx
```

Ao iniciar a instalação, você será solicitado a inserir o nome do projeto.

![Inserindo o nome do projeto no generator-wpgtx](http://i.imgur.com/64i0UbG.jpg)

Após isto, o Generator irá criar o diretório com o nome do projeto selecionado e adicionar os arquivos necessários, como abaixo.

```
.
├── img/
│   └── sprite.png
├── inc/
│   ├── loop-single.php
│   └── loop.php
├── js/
│   ├── min/
│   │   └── scripts.min.js
│   ├── vendor/
│   │   ├── fitvids.min.js
│   │   ├── flexslider.min.js
│   │   ├── jquery.min.js
│   │   └── modernizr.min.js
│   └── scripts.js
├── scss/
│   ├── _base.scss
│   ├── _bootstrap.scss
│   ├── _normalize.scss
│   └── style.scss
├── .ftppass
├── .gitignore
├── 404.php
├── archive.php
├── author.php
├── category.php
├── config.rb
├── footer.php
├── functions.php
├── Gruntfile.js
├── header.php
├── index.php
├── package.json
├── page.php
├── screenshot.png
├── search.php
├── searchform.php
├── sidebar.php
├── single.php
├── style.css
└── tag.php
```

## Configurando o Grunt

O tema gerado já virá com o `Gruntfile.js` quase totalmente configurado, restando apenas configurar informações de `ftp` para `deploy` e instalar as dependências necessárias para que tudo funcione corretamente.

Para isto, vá até o diretório do tema e insira os seguintes comandos:

### Para instalar o `Grunt`

```bash
$ [sudo] npm install grunt --save-dev
```

Através do `Grunt` você irá gerenciar e automatizar todas as tarefas pré-configuradas no `Gruntfile.js`.

### Para instalar o `Matchdep`

```bash
$ [sudo] npm install matchdep --save-dev
```

O `Matchdep` serve para que você não precise alterar o `Gruntfile.js` cada vez que instalar uma nova dependência.

### Para instalar o `Watch`

```bash
$ [sudo] npm install grunt-contrib-watch --save-dev
```

O `Watch` irá verificar quaisquer alterações nos arquivos e executar a `task` específica para cada um, além de acionar o [Live Reload](https://chrome.google.com/webstore/detail/livereload/jnihajbhpnppcggbcgedagnkighmdlei), caso você possua a extensão instalada.

### Para instalar o `Compass`

```bash
$ [sudo] npm install grunt-contrib-compass --save-dev
```

A task `Compass` irá compilar seus arquivos `.scss`, gerando apenas um arquivo `CSS` otimizado.

### Para instalar o `Uglify`

```bash
$ [sudo] npm install grunt-contrib-uglify --save-dev
```

O `Uglify` irá comprimir seu `JavaScript`, gerando um arquivo de tamanho menor.

### Para instalar o `ImageMin`

```bash
$ [sudo] npm install grunt-contrib-imagemin --save-dev
```

O `ImageMin` irá otimizar suas imagens em `JPG` e `PNG`, excluindo dados inúteis das mesmas, diminuindo seu tamanho final.

_Esta tarefa já está pré-configurada para ser executada antes de cada_  `deploy`_, juntamente com o_ `FTPush`_. Saiba sobre o_ `FTPush` _abaixo._

### Para instalar o `FTPush`

```bash
$ [sudo] npm install grunt-ftpush --save-dev
```

O `FTPush` irá fazer o `deploy` do tema, ou seja, subir os arquivos para o ar. Para utilizá-lo, primeiramente use o comando `CTRL+C`, do teclado, caso você esteja com a task `watch` sendo executada, para que o processo seja parado. Então, insira o comando:

```bash
$ grunt deploy
```

> Antes de dar o `deploy` é necessário inserir os dados de `ftp`. Estas informações são inseridas no `Gruntfile.js`, definindo o `host` (linha 87) e o diretório destino dentro do servidor (linha 92), e no `.ftppass`, definindo o usuário e senha.

_Esta task irá subir apenas os arquivos **do tema** para o ar. A instalação do WordPress no domínio será feita da forma que achar melhor._

***

Agora, com tudo devidamente instalado e configurado, é hora de iniciar o `Grunt`:

```bash
$ grunt
```

Isto irá iniciar o `Grunt` e, automaticamente, a task `watch` será executada para fazer a compilação dos arquivos e, caso tenha o Live Reload instalado, recarregar a página.

> Lembrando, mais uma vez, que todas estas dependências já estarão pré-configuradas no `Gruntfile.js`.
>
> Para inserir mais dependências, é necessária configuração no mesmo.

## Licença

MIT
