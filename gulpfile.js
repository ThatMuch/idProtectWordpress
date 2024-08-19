const { task, src, dest, watch, series, parallel } = require("gulp");
var sass = require("gulp-sass")(require("sass"));
//var autoprefixer = require("gulp-autoprefixer");
var cleanCSS = require("gulp-clean-css");
const concat = require("gulp-concat-util");
var uglify = require("gulp-uglify");
var rename = require("gulp-rename");
var browserSync = require("browser-sync").create();
const babel = require("gulp-babel");
const block = {
    header: `(function (wp) {
    const { registerBlockType } = wp.blocks;
    const {RichText} = wp.editor;
    const {components, editor, blocks, element, i18n} = wp;
  `,
    footer: `})(window.wp);`,
};

task("styles", function () {
    return (
src("assets/styles/**/*.scss")
            .pipe(sass().on("error", sass.logError))
            //.pipe(autoprefixer("last 2 versions"))
            .pipe(cleanCSS())
            .pipe(rename({ suffix: ".min" }))
            .pipe(dest("dist/css/"))
            .pipe(
                browserSync.reload({
                    stream: true,
                }),
            )
    );
});
task("styles_admin", function () {
    return (
src("assets/styles/admin/*.scss")
            .pipe(sass().on("error", sass.logError))
            //.pipe(autoprefixer("last 2 versions"))
            .pipe(cleanCSS())
            .pipe(rename({ suffix: ".min" }))
            .pipe(dest("dist/css"))
            .pipe(
                browserSync.reload({
                    stream: true,
                }),
            )
    );
});
task("scripts", function () {
    return src("assets/scripts/custom/*.js")
        .pipe(concat("all.js"))
        .pipe(uglify())
        .pipe(rename({ suffix: ".min" }))
        .pipe(dest("dist/js"))
        .pipe(
            browserSync.reload({
                stream: true,
            }),
        );
});

task("blocks", function () {
    return src("./blocks/**/*.js")
	.pipe(
		babel({
			presets: ["@babel/preset-react"],
		}),
	)
        .pipe(concat("blocks.js"))
        .pipe(concat.header(block.header))
        .pipe(concat.footer(block.footer))
        .pipe(dest("dist/js"));
});

task("watch", function () {
    browserSync.init({
        proxy: "http://localhost:10074",
    });
    watch("assets/styles/**/*.scss", series("styles"));
    watch("assets/styles/admin/*.scss", series("styles_admin"));
    watch("assets/scripts/custom/*.js", series("scripts"));
	watch("./blocks/**/*.js", series("blocks"));
    watch("**/*.css").on("change", browserSync.reload);
	watch("**/*.php").on("change",browserSync.reload);
});

task("default", parallel("styles", "scripts", "watch"));
