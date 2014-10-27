/*global describe, beforeEach, afterEach, it */
'use strict';
var path = require('path'),
  helpers = require('yeoman-generator').test,
  rimraf = require('rimraf');

describe('wpgtx generator', function () {
  beforeEach(function (done) {
    helpers.testDirectory(path.join(__dirname, 'temp'), function (err) {
      if (err) {
        return done(err);
      }

      this.app = helpers.createGenerator('wpgtx:app', [
        '../../app'
      ]);
      done();
    }.bind(this));
  });

  afterEach(function(done) {
    rimraf(path.join(__dirname, 'temp'), done);
  });

  it('creates expected files', function (done) {
    var expected = [
      // git
      '.gitignore',

      // img
      'img/sprite.png',

      // inc
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

      // js
      'js/scripts.js',
      'js/min/scripts.min.js',
      'js/vendor/fitvids.min.js',
      'js/vendor/flexslider.min.js',
      'js/vendor/modernizr.min.js',

      // scss
      'scss/_base.scss',
      'scss/_bootstrap.scss',
      'scss/_flexslider.scss',
      'scss/_normalize.scss',

      // files
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

    helpers.mockPrompt(this.app, {
      'someOption': true
    });
    this.app.options['skip-install'] = true;
    this.app.run({}, function () {
      helpers.assertFile(expected);
      done();
    });
  });
});
