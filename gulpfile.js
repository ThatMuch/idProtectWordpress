var gulp = require("gulp");
var sass = require("gulp-sass")(require("sass"));
//var autoprefixer = require("gulp-autoprefixer");
var cleanCSS = require("gulp-clean-css");
var concat = require("gulp-concat");
var uglify = require("gulp-uglify");
var rename = require("gulp-rename");
var browserSync = require("browser-sync").create();

gulp.task("styles", function () {
	return (
        gulp
            .src("assets/styles/**/*.scss")
            .pipe(sass().on("error", sass.logError))
            //.pipe(autoprefixer("last 2 versions"))
            .pipe(cleanCSS())
            .pipe(rename({ suffix: ".min" }))
            .pipe(gulp.dest("assets/styles/"))
            .pipe(
                browserSync.reload({
                    stream: true,
                }),
            )
    );
});
gulp.task("styles_admin", function () {
	return (
        gulp
            .src("assets/styles/admin/*.scss")
            .pipe(sass().on("error", sass.logError))
            //.pipe(autoprefixer("last 2 versions"))
            .pipe(cleanCSS())
            .pipe(rename({ suffix: ".min" }))
            .pipe(gulp.dest("assets/styles/"))
            .pipe(
                browserSync.reload({
                    stream: true,
                }),
            )
    );
});
gulp.task("scripts", function () {
	return gulp
		.src("assets/scripts/custom/*.js")
		.pipe(concat("all.js"))
		.pipe(uglify())
		.pipe(rename({ suffix: ".min" }))
		.pipe(gulp.dest("assets/scripts/"))
		.pipe(
			browserSync.reload({
				stream: true,
			})
		);
});
gulp.task("watch", function () {
	browserSync.init({
		proxy: "http://localhost:10074",
	});
	gulp.watch("assets/styles/**/*.scss", gulp.series("styles"));
	gulp.watch("assets/styles/admin/*.scss", gulp.series("styles_admin"));
	gulp.watch("assets/scripts/custom/*.js",gulp.series("scripts"));
	gulp.watch("**/*.css").on("change", browserSync.reload);
	gulp.watch("**/*.php").on("change",browserSync.reload);
	gulp.watch("**/*.js").on("change",browserSync.reload);
});
gulp.task("default", gulp.parallel("styles", "scripts", "watch"));
