'use strict';
var util = require('util');
var path = require('path');
var yeoman = require('yeoman-generator');
var chalk = require('chalk');


var TesteGenerator = yeoman.generators.Base.extend({
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
    var dir = this._.slugify(this.appName);
    var arquivos = [
      'inc/loop-single.php',
      'inc/loop.php',
      'js/scripts.js',
      'js/min/scripts.min.js',
      'js/vendor/jquery.min.js',
      'js/vendor/modernizr.min.js',
      'scss/_base.scss',
      'scss/_bootstrap.scss',
      'scss/_normalize.scss',
      '404.php',
      'archive.php',
      'category.php',
      'config.rb',
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
      'style.css',
      'tag.php'
    ];

    arquivos.forEach(function (arquivo) {
      this.copy(arquivo, dir + '/' + arquivo);
    });

    this.copy('ftppass', dir + '/.ftppass');
    this.copy('gitignore', dir + '/.gitignore');

    var context = {
      theme_name: this.appName
    };

    this.template('_gruntfile.js', dir + '/Gruntfile.js', context);
    this.template('_package.json', dir + '/package.json', context);
    this.template('_style.scss', dir + '/scss/style.scss', context);
  }
});

module.exports = TesteGenerator;
