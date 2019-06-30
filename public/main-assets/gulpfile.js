var gulp           = require('gulp'), // Gulp
    sass           = require('gulp-sass'), // SASS,
    changed        = require('gulp-changed'),
    autoprefixer   = require('gulp-autoprefixer'); // Add the desired vendor prefixes and remove unnecessary in SASS-files


//
// SASS
//

// Unify Main
gulp.task('sass', function() {
  return gulp.src('./assets/include/scss/**/*.scss')
    .pipe(changed('./assets/css/'))
    .pipe(sass({outputStyle:'expanded'}))
    .pipe(autoprefixer(['last 3 versions', '> 1%'], { cascade: true }))
    .pipe(gulp.dest('./assets/css/'))
});

// E-commerce
gulp.task('sass-shop', function() {
  return gulp.src('./e-commerce/assets/scss/**/*.scss')
    .pipe(changed('./e-commerce/assets/css/'))
    .pipe(sass({outputStyle:'expanded'}))
    .pipe(autoprefixer(['last 3 versions', '> 1%'], { cascade: true }))
    .pipe(gulp.dest('./e-commerce/assets/css/'))
});

// Blog & Magazine
gulp.task('sass-blog', function() {
  return gulp.src('./blog-magazine/classic/assets/scss/**/*.scss')
    .pipe(changed('./blog-magazine/classic/assets/css/'))
    .pipe(sass({outputStyle:'expanded'}))
    .pipe(autoprefixer(['last 3 versions', '> 1%'], { cascade: true }))
    .pipe(gulp.dest('./blog-magazine/classic/assets/css/'))
});

// Multi Page (Marketing Demo example, please change this path if you are using other demos)
gulp.task('sass-mp-marketing', function() {
  return gulp.src('./multi-pages/marketing/assets/scss/**/*.scss')
    .pipe(changed('./multi-pages/marketing/assets/css/'))
    .pipe(sass({outputStyle:'expanded'}))
    .pipe(autoprefixer(['last 3 versions', '> 1%'], { cascade: true }))
    .pipe(gulp.dest('./multi-pages/marketing/assets/css/'))
});

// One Page (Accounting Demo example, please change this path if you are using other demos)
gulp.task('sass-op', function() {
  return gulp.src('./one-pages/accounting/assets/scss/**/*.scss')
    .pipe(changed('./one-pages/accounting/assets/css/'))
    .pipe(sass({outputStyle:'expanded'}))
    .pipe(autoprefixer(['last 3 versions', '> 1%'], { cascade: true }))
    .pipe(gulp.dest('./one-pages/accounting/assets/css/'))
});

// Dark Theme
gulp.task('sass-dt', function() {
  return gulp.src('./unify-main/misc/dark-theme/assets/scss/**/*.scss')
    .pipe(changed('./unify-main/misc/dark-theme/assets/css/'))
    .pipe(sass({outputStyle:'expanded'}))
    .pipe(autoprefixer(['last 3 versions', '> 1%'], { cascade: true }))
    .pipe(gulp.dest('./unify-main/misc/dark-theme/assets/css/'))
});


//
// Watch
//

gulp.task('watch', function() {
  gulp.watch('./assets/include/scss/**/*.scss', ['sass']);
});


//
// Default
//

gulp.task('default', ['watch', 'sass']);