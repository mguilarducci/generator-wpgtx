# generator-wpgtx

> [Yeoman](http://yeoman.io) Generator


## Começando

Antes de qualquer coisa, precisamos ter instalados o [Node.js](http://nodejs.org/download/), o NPM (que é instalado junto ao Node.js) e o Ruby (para utilização do [`Compass`](http://compass-style.org/)).

O Ruby já vem instalado nativo no Mac OS e Linux. Mas, no Windows, precisamos instalá-lo. Para isto, utilize [este instalador](http://rubyinstaller.org/downloads/).

Com o Ruby instalado, você precisa instalar o `Compass`. O `Compass` é um framework baseado em [`SASS`](http://sass-lang.com/) que irá concatenar e comprimir seu `CSS`, além de oferecer inúmeras possibilidades, como trabalhar com variáveis, funções, contadores e tomadas de decisão.

Para instalar o `Compass`, abra o execute o comando:

```bash
$ [sudo] gem install compass
```

_O_ `sudo` _(os_ `[]` _indicam que é "opcional") deve ser utilizado **apenas** se estiver num sistema operacional baseado em_ `UNIX` _(Mac OS e Linux) para que o comando seja executado como administrador._

Desta forma você irá instalar tanto o `SASS` quanto o `Compass` em sua máquina.

***

Agora, é hora de instalar o [Yeoman](http://yeoman.io/). Para isso, digite o comando abaixo:

```bash
$ [sudo] npm install -g yo
```

### Instalando o Generator

O `generator-wpgtx` é uma "extensão" para o Yeoman que irá acessar o repositório e baixar os arquivos.

Para instalar o `generator-wpgtx`, rode o comando:

```bash
$ [sudo] npm install -g generator-wpgtx
```

Agora o Yeoman e o nosso Generator estão instalados e prontos para usar!

### Pondo tudo em ordem

Faça a instalação local da [versão mais recente do WordPress](http://br.wordpress.org/latest-pt_BR.zip) no local desejado.

Após instalar o WordPress no diretório escolhido, vá até a pasta `wp-content/themes` de sua instalação, utilizando o `Terminal/Git Bash/Windows PowerShell`.

Então, inicie o Generator:

```bash
$ [sudo] yo wpgtx
```

Ao iniciar a instalação, você será solicitado a inserir o nome do projeto.

> Lembrando que você deve inserir o nome entre `""` caso o nome possua mais de uma palavra.

Após isto, o Generator irá criar o diretório com o nome do projeto selecionado e adicionar os arquivos necessários, como abaixo.

```
.
|- _js
|- |- _min
|- |- |- scripts.min.js
|- |- _vendor
|- |- |- jquery.min.js
|- |- |- modernizr.min.js
|- |- scripts.js
|- _scss
|- |- _base.scss
|- |- _bootstrap.scss
|- |- _normalize.scss
|- |- style.scss
|- .editorconfig
|- .ftppass
|- .gitignore
|- 404.php
|- apple-touch-icon-precomposed.png
|- archive.php
|- browserconfig.xlm
|- category.php
|- config.rb
|- favicon.ico
|- footer.php
|- functions.php
|- Gruntfile.js
|- header.php
|- index.php
|- package.json
|- page.php
|- screenshot.png
|- search.php
|- searchform.php
|- single.php
|- style.css
|- tag.php
|- tile-wide.png
|- tile.png
```

### Configurando o Grunt

O tema gerado já virá com o `Gruntfile.js` quase totalmente configurado, restando apenas configurar informações de `ftp` para `deploy` e instalar as dependências necessárias para que tudo funcione corretamente.

Para isto, utilizando o `Terminal/Git Bash/Windows PowerShell`, vá até o diretório do tema e insira os seguintes códigos:

#### Para instalar o `Grunt`

```bash
$ [sudo] npm install grunt --save-dev
```

Através do `Grunt` você irá gerenciar automatizar todas as tarefas pré-configuradas no `Gruntfile.js`.

Para iniciar o grunt, basta inserir:

```bash
$ grunt
```

Isto irá iniciar o `Grunt` e, automaticamente, a task `watch` será executada. Saiba mais sobre o `watch` [mais abaixo](#para-instalar-o-watch).

#### Para instalar o `Matchdep`

```bash
$ [sudo] npm install grunt --save-dev
```

O `Matchdep` serve para que você não precise alterar o `Gruntfile.js` após instalar cada nova dependência.

#### Para instalar o `Watch`

```bash
$ [sudo] npm install grunt-contrib-watch --save-dev
```

O `Watch` irá verificar quaisquer alterações nos arquivos e executar a `task` específica para cada um.

#### Para instalar o `Compass`

```bash
$ [sudo] npm install grunt-contrib-compass --save-dev
```

A task `Compass` irá compilar seus arquivos `.scss`, gerando apenas um arquivo `CSS` otimizado.

#### Para instalar o `Uglify`

```bash
$ [sudo] npm install grunt-contrib-uglify --save-dev
```

O `Uglify` irá comprimir seu `JavaScript`, gerando um arquivo de tamanho menor.

#### Para instalar o `ImageMin`

```bash
$ [sudo] npm install grunt-contrib-imagemin --save-dev
```

O `ImageMin` irá otimizar suas imagens em `JPG` e `PNG`, excluindo dados inúteis das mesmas, diminuindo seu tamanho final.

_Esta tarefa já está pré-configurada para ser executanda antes de cada_  `deploy`_, juntamente com o_ `FTPush`_. Saiba sobre o_ `FTPush` _[abaixo](#para-instalar-o-ftpush)._

#### Para instalar o `FTPush`

```bash
$ [sudo] npm install grunt-ftpush --save-dev
```

O `FTPush` irá fazer o `deploy` do tema, ou seja, subir os arquivos para o ar. Para utilizá-la, primeiramente use o comando `CTRL+C`, do teclado, caso você esteja com a task `watch` sendo executada, para que o processo seja parado. Agora, insira o comando:

```bash
$ grunt deploy
```

> Antes de dar o `deploy` é necessário inserir os dados de `ftp`. Estas informações são inseridas no `Gruntfile.js`, definindo o `host` (linha 85) e o diretório destino dentro do servidor (linha 90), e no `.ftppass`, definindo o usuário e senha.

_Esta task irá subir apenas os arquivos **do tema** para o ar. A instalação do WordPress no domínio será feita da forma que achar melhor._

***

> Lembrando, mais uma vez, que todas estas dependências já estarão pré-configuradas no `Gruntfile.js`.
>
> Para inserir mais dependências, é necessária configuração no mesmo.

## Licença

MIT
