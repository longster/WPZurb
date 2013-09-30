'use strict';
module.exports = function(grunt) {

  grunt.initConfig({
    sass: {
      dist: {
        options: {
          includePaths: ['assets/sass/*.scss'],
          outputStyle: 'compressed'
        },
        files: {
          'assets/main.css': [ // destination file
            //'assets/sass/css/_custom.scss',
            //'assets/sass/css/_normalize.scss',
            //'assets/sass/css/_settings.scss',
            //'assets/sass/css/app.scss',
            'assets/sass/main.scss'
          ] //Original files
        }
      }
    },
    watch: {
      sass: {
        files: [
          'assets/sass/css/*.scss',
          'assets/sass/*.scss'
        ],
        tasks: ['sass']
      },
      livereload: {
        // Browser live reloading
        // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
        options: {
          livereload: false
        },
        files: [
          'assets/main.css',
          'templates/*.php',
          '*.php'
        ]
      }
    },
    clean: {
      dist: [
        'assets/main.css'
      ]
    }
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-sass');

  // Register tasks
  grunt.registerTask('default', [
    'clean',
    'uglify',
    'sass' 
  ]);
  grunt.registerTask('dev', [
    'watch'
  ]);

};