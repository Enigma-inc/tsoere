var gulp = require('gulp');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');

var rev = require('gulp-rev-append');

var myLibsJsFiles = [
    'public/theme/js/libs/jquery/jquery-1.11.2.min.js',
    'public/theme/js/libs/autosize/jquery.autosize.min.js',
    'public/theme/js/libs/jquery/jquery-migrate-1.2.1.min.js',
    'public/theme/js/libs/bootstrap/bootstrap.min.js',
    'public/theme/js/libs/nanoscroller/jquery.nanoscroller.min.js',
    'resources/assets/libs/slick/slick.min.js',
    'public/theme/js/core/source/App.js',  
    'public/theme/js/core/source/AppNavigation.js',  
    'public/theme/js/core/source/AppNavSearch.js',
    'public/theme/js/core/source/AppVendor.js'
    ],
    scriptsDestDir = 'public/theme/js/bundle'; 

gulp.task('minifyScripts', function(){
    return gulp.src(myLibsJsFiles)
        .pipe(concat('scripts.js'))
        .pipe(gulp.dest(scriptsDestDir))
        .pipe(rename('scripts.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(scriptsDestDir));
});

gulp.task('rev', function(){
    gulp.src('resources/views/layouts/partials/common-scripts.blade')
    .pipe(rev())
    .pipe(gulp.dest('.'));
});


