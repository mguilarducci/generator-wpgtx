'use strict';

module.exports = (grunt) ->
  require("time-grunt") grunt
  require("load-grunt-tasks") grunt
  grunt.initConfig
    pkg: grunt.file.readJSON("package.json")

    files:
      js: ["**/*.js"]

    jshint:
      options:
        jshintrc: ".jshintrc"
        ignores: ["node_modules/**", "app/templates/**"]

      uses_defaults: "<%= files.js %>"

    mochacli:
      options:
        reporter: 'spec'
        timeout: '3000'
        env:
          NODE_ENV: 'test'

      all: ["test/test-*.js"]

  grunt.registerTask "test", ["jshint", "mochacli"]
  grunt.registerTask "default", ["jshint"]
