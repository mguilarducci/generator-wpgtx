'use strict';

var yeoman = require('yeoman-generator');

var GeneratorWPGTX = yeoman.generators.Base.extend({
  promptUser: function () {
    var done = this.async();

    console.log(this.yeoman);

    var prompts = [{
      name: 'appName',
      message: 'Qual o nome do tema do projeto?'
    }];

    this.prompt(prompts, function (props) {
      this.appName = props.appName;

      done();
    }.bind(this));
  },

  scaffoldFolders: function () {
    var dir = this._.slugify(this.appName);

    this.mkdir(dir);
  },

  projectfiles: function () {
    var index;
    var name = this.appName;
    var dir = this._.slugify(name);
    var files = [
      'img/sprite.png',
      'inc/content-aside.php',
      'inc/content-audio.php',
      'inc/content-chat.php',
      'inc/content-gallery.php',
      'inc/content-image.php',
      'inc/content-link.php',
      'inc/content-quote.php',
      'inc/content-video.php',
      'inc/content.php',
      'inc/loop-single.php',
      'inc/loop.php',
      'js/scripts.js',
      'js/min/scripts.min.js',
      'js/vendor/fitvids.min.js',
      'js/vendor/flexslider.min.js',
      'js/vendor/modernizr.min.js',
      'scss/_base.scss',
      'scss/_bootstrap.scss',
      'scss/_flexslider.scss',
      'scss/_normalize.scss',
      '404.php',
      'archive.php',
      'author.php',
      'category.php',
      'config.rb',
      'date.php',
      'footer.php',
      'functions.php',
      'header.php',
      'index.php',
      'page.php',
      'screenshot.png',
      'search.php',
      'searchform.php',
      'sidebar.php',
      'single.php',
      'tag.php'
    ];

    for (index = 0; index < files.length; ++index) {
      this.copy(files[index], dir + '/' + files[index]);
    }

    this.copy('ftppass', dir + '/.ftppass');
    this.copy('gitignore', dir + '/.gitignore');

    var context = {
      /*jshint camelcase: false */
      theme_name: name
    };

    this.template('_gruntfile.js', dir + '/Gruntfile.js', context);
    this.template('_package.json', dir + '/package.json', context);
    this.template('_style.scss', dir + '/scss/style.scss', context);
    this.template('_style.css', dir + '/style.css', context);
  }
});

module.exports = GeneratorWPGTX;
