module.exports = (grunt) ->
  grunt.initConfig
    pkg: grunt.file.readJSON 'package.json'

    coffeelint:
      options:
        "max_line_length":
          value: 80
          level: "warn"
        "no_trailing_semicolons":
          level: "warn"
      app: [
          'scripts/scripts.coffee'
      ]

    coffee:
      compile:
        options:
          bare: true
        files:
          'scripts/scripts.js': 'scripts/scripts.coffee'

    jshint:
      options:
        browser: true
      all: [
          'Gruntfile.js',
          'scripts/scripts.js'
      ]

    min:
      code:
        src: 'scripts/scripts.js'
        dest: 'scripts/scripts.min.js'

    concat:
      options:
        separator: ' '
      dist:
        src: [
          'scripts/libs/jquery-2.1.1.min.js'
          'scripts/libs/jquery.iecors.js'
          'scripts/libs/jPages.min.js'
          'scripts/libs/jquery.maskedinput.min.js'
          'scripts/libs/lightbox.min.js'
          'scripts/libs/imagesloaded.pkgd.min.js'
          'scripts/scripts.min.js'
        ]
        dest: 'scripts/public.min.js'

    sass:
      options:
        style: 'compressed'
      dist:
        files:
          'styles/styles.min.css': 'styles/styles.sass'

    shell:
      makeDeploy:
        options:
          stderr: false
        command: './deployit.sh'

    notify_hooks:
      options:
        title: "Portal Mauá e Região v2"

    notify:
      shell:
        options:
          title: 'Tarefa completada'
          message: 'Os arquivos foram enviados para o servidor.'

    watch:
      coffeelint:
        files: [
            'scripts/scripts.coffee'
        ]
        tasks: [
            'coffeelint'
        ]

      coffee:
        files: [
            'scripts/scripts.coffee'
        ]
        tasks: [
            'coffee'
        ]

      jshintMin:
        files: [
            'scripts/scripts.js'
        ]
        tasks: [
            'jshint'
            'min'
            'concat'
            'shell'
            'notify:shell'
        ]

      sass:
        files: [
            'styles/styles.sass'
        ]
        tasks: [
            'sass'
            'shell'
            'notify:shell'
        ]

      php:
        files: [
            '*.php'
        ]
        tasks: [
            'shell'
            'notify:shell'
        ]

  grunt.loadNpmTasks 'grunt-contrib-watch'
  grunt.loadNpmTasks 'grunt-coffeelint'
  grunt.loadNpmTasks 'grunt-contrib-coffee'
  grunt.loadNpmTasks 'grunt-contrib-jshint'
  grunt.loadNpmTasks 'grunt-yui-compressor'
  grunt.loadNpmTasks 'grunt-contrib-sass'
  grunt.loadNpmTasks 'grunt-shell'
  grunt.loadNpmTasks 'grunt-notify'
  grunt.loadNpmTasks 'grunt-contrib-concat'
  grunt.registerTask 'all', ['watch']
  return
