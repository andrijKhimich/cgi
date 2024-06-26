const uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    cached = require('gulp-cached'),
    scriptsPATH = {
        "input": "./dev/js/",
        "output": "./build/js/"
    },
    babel = require('gulp-babel');

module.exports = function () {
    $.gulp.task('libsJS:dev', () => {
        return $.gulp.src(['node_modules/svg4everybody/dist/svg4everybody.min.js'])
            .pipe(concat('libs.min.js'))
            .pipe($.gulp.dest(scriptsPATH.output));
    });

    $.gulp.task('libsJS:build', () => {
        return $.gulp.src(['node_modules/svg4everybody/dist/svg4everybody.min.js'])
            .pipe(concat('libs.min.js'))
            .pipe(uglify())
            .pipe($.gulp.dest(scriptsPATH.output));
    });

    // Work version  
    // ========================================================
    $.gulp.task('js:dev', () => {
        return $.gulp.src([scriptsPATH.input + '**/*.js',
        '!' + scriptsPATH.input + 'libs.min.js'])
            .pipe(cached('script')) // need to test it 

            .pipe(babel({
                presets: ['@babel/env']
            }))
            .pipe($.gulp.dest(scriptsPATH.output))
            .pipe($.browserSync.reload({
                stream: true
            }));
    });
    // ========================================================


    $.gulp.task('js:build', () => {
        return $.gulp.src([scriptsPATH.input + '*.js',
        '!' + scriptsPATH.input + 'libs.min.js'])
            .pipe(babel({
                presets: ['@babel/env']
            }))
            .pipe($.gulp.dest(scriptsPATH.output))
    });

    $.gulp.task('js:build-min', () => {
        return $.gulp.src([scriptsPATH.input + '*.js',
        '!' + scriptsPATH.input + 'libs.min.js'])
            .pipe(babel({
                presets: ['@babel/env']
            }))
            .pipe(concat('main.min.js'))
            .pipe(uglify())
            .pipe($.gulp.dest(scriptsPATH.output))
    });
};
