# [generator-wpgtx](https://www.npmjs.org/package/generator-wpgtx)

> [Yeoman](http://yeoman.io) Generator


## Getting started

Before anithing, we need to have installed [Node.js](http://nodejs.org/download/), NPM (which is installed with Node.js) and Ruby (for the [`Compass`](http://compass-style.org/)).

Ruby is already installed native on Mac OS and Linux. But in Windows, we need to install it. For this, use [this installer](http://rubyinstaller.org/downloads/).

With Ruby installed, you need to install `Compass`. The `Compass` is a [`Sass-based`](http://sass-lang-com/) framework which will concatenate and compress your compilled `CSS`, in addition to providing numerous resources, working with variables, functions, counters and `if` statements.

To install `Compass` run the command:

```bash
$ [sudo] gem install compass
```

_The_ `sudo` _should be used **only** if you are in a UNIX-based operating system (like Mac OS and Linux) to run as administrator._

This way you will install both as `Sass` and `Compass` on your machine.

***

Now, it's time to [Yeoman](http://yeoman.io/). To do this, type de following command:

```bash
$ [sudo] npm install -g yo
```

Besides Yeoman, will be installed [Bower](http://bower.io/) and [Grunt](http://gruntjs.com/).

### Installing Generators

The `generator-wpgtx` is an extension to the Yeoman who will access the repository and download the files.

To install the `generator-wpgtx`, run the command:

```bash
$ [sudo] npm install -g generator-wpgtx
```

Now Yeoman and our Generator are installed and ready to use!

***

### Updating Generators

I'm always looking to update the `generator-wpgtx`, optimizing the code or adding new features when I learn or find something new.

For it to be always up to date, you must run periodically the following command:

```bash
$ [sudo] npm update -g generator-wpgtx
```

Thus, if there is a new update, it will be downloaded and you'll get the latest version.

***

## Putting it all together

Make the local installation of the [latest version of WordPress](https://wordpress.org/latest.zip) in the desired location.

> _Tip: I use [Nettuts+ Fetch](https://github.com/weslly/Nettuts-Fetch) in my [Sublime Text 3](http://sublimetext.com/3)._

After installing WordPress on your chosen directory, go to the `wp-content/themes` folder of your installation by using the `Terminal`, `Git Bash`, `Windows PowerShell`, or another of your choice.

Then, start the Generator:

```bash
$ [sudo] yo wpgtx
```

When starting the installation, you will be prompted to enter the project name.

![Entering the project name on generator-wpgtx](http://i.imgur.com/64i0UbG.jpg)

After this, the generator will create a directory with the name of the selected project and add the necessary files, as below.

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

## Configuring Grunt

The theme generated has come with `Gruntfile.js` almost fully configured, leaving only configure `FTP` information to `deploy` and install the necessary dependencies for everything to work properly.

To do this, go to the theme directory and enter the following command:

```bash
$ [sudo] npm install
```

Through the above command, the following dependencies are installed:

#### Grunt

Through the `Grunt` you will manage and automate every preconfigured tasks in `Gruntfile.js`.

#### Matchdep

With `Matchdep` you don't need to change the `Gruntfile.js` each time you install a new dependency.

#### Watch

The `Watch` will check any changes in files and perform the specific task for each, as well as trigger the [Live Reload](http://feedback.livereload.com/knowledgebase/articles/86242-how-do-i-install-and-use-the-browser-extensions-), if you have the extension installed.

#### Compass

The `Compass` task will compile your `.scss` files, generating only an optimized `CSS` file.

#### Uglify

The `Uglify` will compress your `JavaScript`, creating a smaller file.

#### ImageMin

The `ImageMin` will optimize your images in `JPG` and `PNG`, deleting useless data the same, decreasing its final size.

_This task is already preconfigured to run before each deployment along with the_ `FTPush` _task. You can cancel this changing the line 117 of the_ `Gruntfile.js`_._

#### FTPush

The `FTPush` will `deploy` your theme, ie, send the files to the server.

> Before the deployment it's necessary to insert the data from `FTP`. This information is entered into the `Gruntfile.js`, setting the host (line 87) and the destination directory within the server (line 92), and in the `.ftppass` file, setting the username and password.

_This task will send only the **theme files** to the server. The WordPress installation on your host will be the way you prefer._

***

Now, with everything installed and configured, it's time to start `Grunt`:

```bash
$ grunt
```

This will start the `Grunt` and automatically the `watch` task will be executed to make things happen.

Enjoy!

## License

MIT
