//引入基础gulp模块
var gulp= require('gulp');
//引入处理模块
//less预编译
var less=require('gulp-less');
//多文件索引，用于多文件编译作为对应表
var sourcemaps=require('gulp-sourcemaps');
//引入异常处理模块,当出现异常时不终止watch事件（gulp-plumber），并提示我们出现了错误（gulp-notify）。
var notify=require('gulp-notify');
var plumber = require('gulp-plumber');
//新建任务编译多个less文件,另外生成sourcemap保证当less有各种引入关系是可以进行查找
gulp.task('compliLess',function(){
	return gulp.src('./less/*.less')
			   .pipe(sourcemaps.init())//创建索引文件
			   .pipe(plumber({errorHandler:notify.onError('Error <%= error.message %>')}))//监控错误
			   .pipe(less())
			   .pipe(sourcemaps.write())
			   .pipe(gulp.dest('./css'));
});

//监听自动编译
gulp.task('watchComLess',function(){
	gulp.watch('./less/*.less',['compliLess']);
});

//异常处理

