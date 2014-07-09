"use strict";

module.exports = function( grunt ) {

    // Carrega todas as tasks
    require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);

    grunt.initConfig({

        // Watch
        watch: {
            options: {
                livereload: true
            },
            js: {
                files: "js/*.js",
                tasks: [ "uglify" ]
            },
            sass: {
                files: "scss/*.{scss,sass}",
                tasks: [ "compass" ]
            },
            html: {
                files: "**/*.{html,php}"
            }
        },

        // SCSS
        compass: {
            dist: {
                options: {
                    force: true,
                    outputStyle: "compressed",
                    // comentando esta linha, o CSS compilado não será comprimido.
                    // útil para debug durante o desenvolvimento
                    config: "config.rb"
                }
            }
        },

        // Ugilfy JS
        uglify: {
            options: {
                mangle: false
            },
            dist: {
                files: {
                    "js/min/scripts.min.js": [
                        "js/scripts.js"
                    ]
                }
            }
        },

        // Image Min
        imagemin: {
            png: {
                options: {
                    optimizationLevel: 7
                },
                files: [{
                    expand: true,
                    cwd: 'img/',
                    src: ['**/*.png'],
                    dest: 'img/',
                    ext: '.png'
                }]
            },
            jpg: {
                options: {
                    progressive: true
                },
              files: [{
                    expand: true,
                    cwd: 'img/',
                    src: ['**/*.jpg'],
                    dest: 'img/',
                    ext: '.jpg'
                }]
            }
        },

        // FTP
        ftpush: {
            build: {
                auth: {
                    host: "ftp.dominio.com.br",
                    port: 21,
                    authKey: "key1"
                },
                src: ".",
                dest: "/www/wp-content/themes/<%= _.slugify(theme_name) %>/",
                exclusions: [
                    ".DS_Store",
                    "Thumbs.db",
                    "scss",
                    "js/*.js",
                    "Gruntfile.js",
                    "package.json",
                    "config.rb",
                    "node_modules",
                    ".ftppass",
                    ".jshintrc",
                    ".gitignore",
                    ".git",
                    ".sass-cache"
                ]
            }
        }

    });

    // registrando tarefa default
    grunt.registerTask( "default", [ "watch" ] );

    // registrando tarefa para deploy
    grunt.registerTask( "deploy", [ "imagemin", "ftpush" ] );

};