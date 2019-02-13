var gulp = require('gulp')
	browserSync = require('browser-sync'),
	sass = require('gulp-sass');

gulp.task('browser-sync', function(){
	var files = [
		'./style.css',
		'./resources/views/*php',
	];
	browserSync.init(files,{
		proxy : 'http://localhost/skeleton/public'
	});
});

gulp.task('sass',function(){
	return gulp.src('sass/*.scss')
		.pipe(sass({
			'outputStyle' : 'compressed'
		}))
		.pipe(gulp.dest('./'))
		.pipe(browserSync.stream());
})

gulp.task('default', ['sass','browser-sync'],function(){
	gulp.watch('sass/**/*.scss', ['sass']);
})