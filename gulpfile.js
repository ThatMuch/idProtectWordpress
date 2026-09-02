var gulp = require("gulp");
var path = require("path");
var Transform = require("stream").Transform;
var sass = require("sass");
//var autoprefixer = require("gulp-autoprefixer");
var cleanCSS = require("gulp-clean-css");
var concat = require("gulp-concat");
var uglify = require("gulp-uglify");
var rename = require("gulp-rename");
var zip = require("gulp-zip");
var browserSync = require("browser-sync").create();

// Replaces gulp-sass (which still relies on Dart Sass's deprecated legacy
// render API) with a thin wrapper around the modern sass.compile() API.
// Partial files (leading underscore) are skipped, matching gulp-sass's
// historic behavior.
function compileSass() {
	return new Transform({
		objectMode: true,
		transform: function (file, encoding, callback) {
			if (file.isNull() || path.basename(file.path).charAt(0) === "_") {
				return callback();
			}
			try {
				var result = sass.compile(file.path, { style: "expanded" });
				file.contents = Buffer.from(result.css);
				file.path = file.path.replace(/\.scss$/, ".css");
				callback(null, file);
			} catch (err) {
				console.error(err.toString());
				callback();
			}
		},
	});
}

gulp.task("styles", function () {
	return (
        gulp
            .src("assets/styles/**/*.scss")
            .pipe(compileSass())
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
            .pipe(compileSass())
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
gulp.task("zip", function () {
	// "idprotect" is the theme slug used throughout the codebase (Text Domain,
	// function/hook prefixes) — the zip must extract into a folder of that
	// name so an admin upload installs it under wp-content/themes/idprotect.
	var slug = "idprotect";
	return gulp
		.src(
			[
				"**/*",
				"!node_modules/**",
				"!.git/**",
				"!.claude/**",
				"!build/**",
				"!**/.DS_Store",
			],
			{ base: ".", dot: true }
		)
		.pipe(
			rename(function (filePath) {
				filePath.dirname =
					filePath.dirname === "."
						? slug
						: slug + "/" + filePath.dirname;
			})
		)
		.pipe(zip(slug + ".zip"))
		.pipe(gulp.dest("build"));
});
gulp.task("default", gulp.parallel("styles", "scripts", "watch"));
