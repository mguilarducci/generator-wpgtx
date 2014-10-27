'use strict';

var yeoman = require('yeoman-generator'),
  path = require('path'),
  util = require('util');

var GeneratorWPGTX = module.exports = function GeneratorWPGTX(args, options) {
  yeoman.generators.Base.apply(this, arguments);

  this.on('end', function () {
    this.installDependencies({ skipInstall: options['skip-install'] });
  });

  this.pkg = JSON.parse(this.readFileAsString(path.join(__dirname, '../package.json')));
};

util.inherits(GeneratorWPGTX, yeoman.generators.Base);

GeneratorWPGTX.prototype.askFor = function askFor() {
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
};

GeneratorWPGTX.prototype.app = function app() {
  this.mkdir('img');
  this.mkdir('inc');
  this.mkdir('js');
  this.mkdir('js/min');
  this.mkdir('js/vendor');
  this.mkdir('scss');
};

GeneratorWPGTX.prototype.git = function git() {
  this.copy('gitignore', '.gitignore');
};

GeneratorWPGTX.prototype.img = function img() {
  this.copy('img/sprite.png', 'img/sprite.png');
};

GeneratorWPGTX.prototype.inc = function inc() {
  this.copy('inc/content-aside.php', 'inc/content-aside.php');
  this.copy('inc/content-audio.php', 'inc/content-audio.php');
  this.copy('inc/content-chat.php', 'inc/content-chat.php');
  this.copy('inc/content-gallery.php', 'inc/content-gallery.php');
  this.copy('inc/content-image.php', 'inc/content-image.php');
  this.copy('inc/content-link.php', 'inc/content-link.php');
  this.copy('inc/content-quote.php', 'inc/content-quote.php');
  this.copy('inc/content-video.php', 'inc/content-video.php');
  this.copy('inc/content.php', 'inc/content.php');
  this.copy('inc/loop-single.php', 'inc/loop-single.php');
  this.copy('inc/loop.php', 'inc/loop.php');
};

GeneratorWPGTX.prototype.js = function js() {
  this.copy('js/scripts.js', 'js/scripts.js');
  this.copy('js/min/scripts.min.js', 'js/min/scripts.min.js');
  this.copy('js/vendor/fitvids.min.js', 'js/vendor/fitvids.min.js');
  this.copy('js/vendor/flexslider.min.js', 'js/vendor/flexslider.min.js');
  this.copy('js/vendor/modernizr.min.js', 'js/vendor/modernizr.min.js');
};

GeneratorWPGTX.prototype.scss = function scss() {
  this.copy('scss/_base.scss', 'scss/_base.scss');
  this.copy('scss/_bootstrap.scss', 'scss/_bootstrap.scss');
  this.copy('scss/_flexslider.scss', 'scss/_flexslider.scss');
  this.copy('scss/_normalize.scss', 'scss/_normalize.scss');
};

GeneratorWPGTX.prototype.files = function files() {
  this.copy('404.php', '404.php');
  this.copy('archive.php', 'archive.php');
  this.copy('author.php', 'author.php');
  this.copy('category.php', 'category.php');
  this.copy('config.rb', 'config.rb');
  this.copy('date.php', 'date.php');
  this.copy('footer.php', 'footer.php');
  this.copy('functions.php', 'functions.php');
  this.copy('header.php', 'header.php');
  this.copy('index.php', 'index.php');
  this.copy('page.php', 'page.php');
  this.copy('screenshot.png', 'screenshot.png');
  this.copy('search.php', 'search.php');
  this.copy('searchform.php', 'searchform.php');
  this.copy('sidebar.php', 'sidebar.php');
  this.copy('single.php', 'single.php');
  this.copy('tag.php', 'tag.php');
};
