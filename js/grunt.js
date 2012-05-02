module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    meta: {
      banner: '/* HI */'
    },
    concat: {
      dist: {
        src: ['lib/*.js'],
        dest: 'js.js'
      }
    },
    min: {
      dist: {
        src: ['<config:concat.dist.dest>'],
        dest: 'js.min.js'
      }
    },
    watch: {
      files: '<config:concat.dist.src>',
      tasks: 'concat min'
    },
    uglify: {}
  });

  // Default task.
  grunt.registerTask('default', 'concat min');

};
