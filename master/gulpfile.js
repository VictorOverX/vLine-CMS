var gulp        = require('gulp'),
    concat      = require('gulp-concat'),
    uglify      = require('gulp-uglify'),
    jade        = require('gulp-jade'),
    less        = require('gulp-less'),
    path        = require('path'),
    livereload  = require('gulp-livereload'), // Livereload plugin needed: https://chrome.google.com/webstore/detail/livereload/jnihajbhpnppcggbcgedagnkighmdlei
    marked      = require('marked'), // For :markdown filter in jade
    path        = require('path'),
    changed     = require('gulp-changed'),
    prettify    = require('gulp-html-prettify'),
    w3cjs       = require('gulp-w3cjs'),
    rename      = require('gulp-rename'),
    flip        = require('css-flip'),
    through     = require('through2'),
    gutil       = require('gulp-util'),
    minifyCSS   = require('gulp-minify-css'),
    filter      = require('gulp-filter'),
    expect      = require('gulp-expect-file'),
    gulpsync    = require('gulp-sync')(gulp),
    sourcemaps  = require('gulp-sourcemaps'),
    PluginError = gutil.PluginError;

// LiveReload port. Change it only if there's a conflict
var lvr_port = 35729;

var W3C_OPTIONS = {
  doctype: 'HTML5'
};

// production mode (see build task)
var isProduction = false;
var useSourceMaps = false;

// ignore everything that begins with underscore
var hidden_files = '**/_*.*';
var ignored_files = '!'+hidden_files;


// VENDOR CONFIG
var vendor = {
  // vendor scripts required to start the app
  // base: {
  //   source: require('./vendor.base.json'),
  //   dest: '../app/js',
  //   name: 'base.js'
  // },
  // vendor scripts to make to app work. Usually via lazy loading
  app: {
    source: require('./vendor.json'),
    dest: '../vendor'
  }
};

// SOURCES CONFIG 
var source = {
  scripts: {
    app:    [ 'js/app.init.js',
              'js/modules/*.js',
              'js/custom/**/*.js',
              ignored_files
            ],
    watch: ['js/**/*.js'],
    demo: 'js/modules/demo/*.js'
  },
  templates: {
    app: {
        files : ['jade/index.jade'],
        watch: ['jade/index.jade', hidden_files]
    },
    views: {
        files : ['jade/views/**/*.jade'],
        watch: ['jade/views/**/*.jade']
    },
    pages: {
        files : ['jade/pages/*.jade'],
        watch: ['jade/pages/*.jade']
    }
  },
  styles: {
    app: {
      main: ['less/app.less', '!less/themes/*.less'],
      dir:  'less',
      watch: ['less/*.less', 'less/**/*.less', '!less/themes/*.less']
    },
    themes: {
      main: ['less/themes/*.less', ignored_files],
      dir:  'less/themes',
      watch: ['less/themes/*.less']
    },
  },
  bootstrap: {
    main: 'less/bootstrap/bootstrap.less',
    dir:  'less/bootstrap',
    watch: ['less/bootstrap/*.less']
  }
};

// BUILD TARGET CONFIG 
var build = {
  scripts: {
    app: {
      main: 'app.js',
      dir: '../app/js'
    },
    demo: '../app/js/demo'
  },
  styles: '../app/css',
  templates: {
    app: '..',
    views: '../app/',
    pages: '../app/'
  }
};



//---------------
// TASKS
//---------------


// JS APP
gulp.task('scripts:app', function() {
    // Minify and copy all JavaScript (except vendor scripts)
    return gulp.src(source.scripts.app)
        .pipe( useSourceMaps ? sourcemaps.init() : gutil.noop())
        .pipe(concat(build.scripts.app.main))
        .on("error", handleError)
        .pipe( isProduction ? uglify({preserveComments:'some'}) : gutil.noop() )
        .on("error", handleError)
        .pipe( useSourceMaps ? sourcemaps.write() : gutil.noop() )
        .pipe(gulp.dest(build.scripts.app.dir));
});


// VENDOR BUILD
gulp.task('scripts:vendor', [/*'scripts:vendor:base',*/ 'scripts:vendor:app']);

//  This will be included vendor files statically
gulp.task('scripts:vendor:base', function() {

    // Minify and copy all JavaScript (except vendor scripts)
    return gulp.src(vendor.base.source)
        .pipe(expect(vendor.base.source))
        .pipe(uglify())
        .pipe(concat(vendor.base.name))
        .pipe(gulp.dest(vendor.base.dest))
        ;
});

// copy file from bower folder into the app vendor folder
gulp.task('scripts:vendor:app', function() {
  
  var jsFilter = filter('**/*.js');
  var cssFilter = filter('**/*.css');

  return gulp.src(vendor.app.source, {base: 'bower_components'})
      .pipe(expect(vendor.app.source))
      .pipe(jsFilter)
      .pipe(uglify())
      .pipe(jsFilter.restore())
      .pipe(cssFilter)
      .pipe(minifyCSS())
      .pipe(cssFilter.restore())
      .pipe( gulp.dest(vendor.app.dest) );

});

// SCRIPTS DEMO
// copy file from demo folder into the app folder
gulp.task('scripts:demo', function() {
  
  return gulp.src(source.scripts.demo)
      .pipe( gulp.dest(build.scripts.demo) );

});

// APP LESS
gulp.task('styles:app', function() {
    return gulp.src(source.styles.app.main)
        .pipe( useSourceMaps ? sourcemaps.init() : gutil.noop())
        .pipe(less({
            paths: [source.styles.app.dir]
        }))
        .on("error", handleError)
        .pipe( isProduction ? minifyCSS() : gutil.noop() )
        .pipe( useSourceMaps ? sourcemaps.write() : gutil.noop())
        .pipe(gulp.dest(build.styles));
});

// APP RTL
gulp.task('styles:app:rtl', function() {
    return gulp.src(source.styles.app.main)
        .pipe( useSourceMaps ? sourcemaps.init() : gutil.noop())
        .pipe(less({
            paths: [source.styles.app.dir]
        }))
        .on("error", handleError)
        .pipe(flipcss())
        .pipe( isProduction ? minifyCSS() : gutil.noop() )
        .pipe( useSourceMaps ? sourcemaps.write() : gutil.noop())
        .pipe(rename(function(path) {
            path.basename += "-rtl";
            return path;
        }))
        .pipe(gulp.dest(build.styles));
});

// LESS THEMES
gulp.task('styles:themes', function() {
    return gulp.src(source.styles.themes.main)
        .pipe(less({
            paths: [source.styles.themes.dir]
        }))
        .on("error", handleError)
        .pipe(gulp.dest(build.styles));
});

// BOOSTRAP
gulp.task('bootstrap', function() {
    return gulp.src(source.bootstrap.main)
        .pipe(less({
            paths: [source.bootstrap.dir]
        }))
        .on("error", handleError)
        .pipe(gulp.dest(build.styles));
});

// JADE
gulp.task('templates:app', function() {
    return gulp.src(source.templates.app.files)
        // .pipe(changed(build.templates.app, { extension: '.html' }))
        .pipe(jade())
        .on("error", handleError)
        .pipe(prettify({
            indent_char: ' ',
            indent_size: 3,
            unformatted: ['a', 'sub', 'sup', 'b', 'i', 'u']
        }))
        // .pipe(w3cjs( W3C_OPTIONS ))
        .pipe(gulp.dest(build.templates.app))
        ;
});

// JADE
gulp.task('templates:pages', function() {
    return gulp.src(source.templates.pages.files)
        .pipe(changed(build.templates.pages, { extension: '.html' }))
        .pipe(filter(function (file) {
          return !/[\/\\]_/.test(file.path) && !/[\/\\]_/.test(file.relative) && !/^_/.test(file.relative);
        }))
        .pipe(jade())
        .on("error", handleError)
        .pipe(prettify({
            indent_char: ' ',
            indent_size: 3,
            unformatted: ['a', 'sub', 'sup', 'b', 'i', 'u']
        }))
        // .pipe(w3cjs( W3C_OPTIONS ))
        .pipe(gulp.dest(build.templates.pages))
        ;
});

// JADE
gulp.task('templates:views', function() {
    return gulp.src(source.templates.views.files)
        .pipe(changed(build.templates.views, { extension: '.html' }))
        .pipe(filter(function (file) {
          return !/[\/\\]_/.test(file.path) && !/[\/\\]_/.test(file.relative) && !/^_/.test(file.relative);
        }))
        .pipe(jade({
          locals: require('./sidebar.json')
        }))
        .on("error", handleError)
        .pipe(prettify({
            indent_char: ' ',
            indent_size: 3,
            unformatted: ['a', 'sub', 'sup', 'b', 'i', 'u']
        }))
        // .pipe(w3cjs( W3C_OPTIONS ))
        .pipe(gulp.dest(build.templates.views))
        ;
});

//---------------
// WATCH
//---------------

// Rerun the task when a file changes
gulp.task('watch', function() {
  livereload.listen();

  gulp.watch(source.scripts.watch,           ['scripts:app', 'scripts:demo']);
  gulp.watch(source.styles.app.watch,        ['styles:app', 'styles:app:rtl']);
  gulp.watch(source.styles.themes.watch,     ['styles:themes']);
  gulp.watch(source.bootstrap.watch,         ['styles:app']); //bootstrap
  gulp.watch(source.templates.pages.watch,   ['templates:pages']);
  gulp.watch(source.templates.views.watch,   ['templates:views']);
  // gulp.watch(source.templates.app.watch,     ['templates:app']);

  gulp.watch([

      '../app/**'

  ]).on('change', function(event) {

      livereload.changed( event.path );

  });

});


//---------------
// DEFAULT TASK
//---------------

// build for production (minify)
gulp.task('build', ['prod', 'default']);
gulp.task('prod', function() { isProduction = true; });
// build with sourcemaps (no minify)
gulp.task('sourcemaps', ['usesources', 'default']);
gulp.task('usesources', function(){ useSourceMaps = true; });
// default (no minify)
gulp.task('start',[
          'styles:app',
          'styles:app:rtl',
          'styles:themes',
          // 'templates:app',
          'templates:pages',
          'templates:views',
          'watch'
        ]);

gulp.task('default', gulpsync.sync([
          'scripts:vendor',
          'scripts:app',
          'scripts:demo',
          'start'
        ]), function(){

  gutil.log(gutil.colors.cyan('************'));
  gutil.log(gutil.colors.cyan('* All Done *'), 'You can start editing your code, LiveReload will update your browser after any change..');
  gutil.log(gutil.colors.cyan('************'));

});

// Error handler
function handleError(err) {
  console.log(err.toString());
  this.emit('end');
}

// Mini gulp plugin to flip css (rtl)
function flipcss(opt) {
  
  if (!opt) opt = {};

  // creating a stream through which each file will pass
  var stream = through.obj(function(file, enc, cb) {
    if(file.isNull()) return cb(null, file);

    if(file.isStream()) {
        console.log("todo: isStream!");
    }

    var flippedCss = flip(String(file.contents), opt);
    file.contents = new Buffer(flippedCss);
    cb(null, file);
  });

  // returning the file stream
  return stream;
}
