'use strict';
var util = require('util');
var path = require('path');
var yeoman = require('yeoman-generator');
var chalk = require('chalk');


var TesteGenerator = yeoman.generators.Base.extend({
  promptUser: function() {
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

    this.copy('js/scripts.js', dir+'/js/scripts.js');
    this.copy('js/min/scripts.min.js', dir+'/js/min/scripts.min.js');
    this.copy('js/vendor/jquery.min.js', dir+'/js/vendor/jquery.min.js');
    this.copy('js/vendor/modernizr.min.js', dir+'/js/vendor/modernizr.min.js');
    this.copy('scss/_base.scss', dir+'/scss/_base.scss');
    this.copy('scss/_bootstrap.scss', dir+'/scss/_bootstrap.scss');
    this.copy('scss/_normalize.scss', dir+'/scss/_normalize.scss');
    this.copy('scss/style.scss', dir+'/scss/style.scss');
    this.copy('404.php', dir+'/404.php');
    this.copy('apple-touch-icon-precomposed.png', dir+'/apple-touch-icon-precomposed.png');
    this.copy('archive.php', dir+'/archive.php');
    this.copy('browserconfig.xml', dir+'/browserconfig.xml');
    this.copy('category.php', dir+'/category.php');
    this.copy('config.rb', dir+'/config.rb');
    this.copy('editorconfig', dir+'/.editorconfig');
    this.copy('favicon.ico', dir+'/favicon.ico');
    this.copy('footer.php', dir+'/footer.php');
    this.copy('ftppass', dir+'/.ftppass');
    this.copy('functions.php', dir+'/functions.php');
    this.copy('gitignore', dir+'/.gitignore');
    this.copy('header.php', dir+'/header.php');
    this.copy('index.php', dir+'/index.php');
    this.copy('page.php', dir+'/page.php');
    this.copy('screenshot.png', dir+'/screenshot.png');
    this.copy('search.php', dir+'/search.php');
    this.copy('searchform.php', dir+'/searchform.php');
    this.copy('single.php', dir+'/single.php');
    this.copy('style.css', dir+'/style.css');
    this.copy('tag.php', dir+'/tag.php');
    this.copy('tile-wide.png', dir+'/tile-wide.png');
    this.copy('tile.png', dir+'/tile.png');

    var context = {
      theme_name: this.appName
    };

    this.template('_gruntfile.js', dir+'/Gruntfile.js', context);
    this.template('_package.json', dir+'/package.json', context);
  }
});

module.exports = TesteGenerator;
