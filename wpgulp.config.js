/**
 * ID Protect Configuration File
 *
 * 1. Edit the variables as per your project requirements.
 * 2. In paths you can add <<glob or array of globs>>.
 *
 * @package idProtect
 */

// Project options.

// Local project URL of your already running WordPress site.
// > Could be something like "idProtect.local" or "localhost"
// > depending upon your local WordPress setup.
const projectURL = 'localhost:10074';

// Theme/Plugin URL. Leave it like it is; since our gulpfile.js lives in the root folder.
const productURL = './';
const browserAutoOpen = true;
const injectChanges = true;

// >>>>> Style options.
// Path to main .scss file.
const styleSRC = './assets/styles/style.scss';
const cssSRC = './assets/css/';
// Path to place the compiled CSS file. Default set to root folder.
const styleDestination = './assets/styles/';

// Available options → 'compact' or 'compressed' or 'nested' or 'expanded'
const outputStyle = 'compact';
const errLogToConsole = true;
const precision = 10;

// JS Vendor options.

// Path to JS vendor folder.
const jsVendorSRC = './assets/scripts/vendor/*.js';

// Path to place the compiled JS vendors file.
const jsVendorDestination = './assets/scripts/';


// Compiled JS vendors file name. Default set to vendors i.e. vendors.js.
const jsVendorFile = 'vendor';

// JS Custom options.

// Path to JS custom scripts folder.
const jsCustomSRC = './assets/scripts/custom/*.js';

// Path to place the compiled JS custom scripts file.
const jsCustomDestination = './assets/scripts/';

// Compiled JS custom file name. Default set to custom i.e. custom.js.
const jsCustomFile = 'custom';

// Images options.

// Source folder of images which should be optimized and watched.
// > You can also specify types e.g. raw/**.{png,jpg,gif} in the glob.
const imgSRC = './assets/images/raw/**/*';

// Destination folder of optimized images.
// > Must be different from the imagesSRC folder.
const imgDST = './assets/images/';

// >>>>> Watch files paths.
// Path to all *.scss files inside css folder and inside them.
const watchStyles = './assets/styles/**/*.scss';

// Path to all vendor JS files.
const watchJsVendor = './assets/scripts/vendor/*.js';


// Path to all custom JS files.
const watchJsCustom = './assets/scripts/custom/*.js';


// Path to all PHP files.
const watchPhp = './**/*.php';

// >>>>> Zip file config.
// Must have.zip at the end.
const zipName = 'IDProtect.zip';

// Must be a folder outside of the zip folder.
const zipDestination = './dist'; // Default: Parent folder.
const zipIncludeGlob = ['./**/*']; // Default: Include all files/folders in current directory.

// Default ignored files and folders for the zip file.
const zipIgnoreGlob = [
	'!./{node_modules,node_modules/**/*}',
	'!./.git',
	'!./.svn',
	'!./gulpfile.babel.js',
	'!./StanLee.config.js',
	'!./.eslintrc.js',
	'!./.eslintignore',
	'!./.editorconfig',
	'!./phpcs.xml.dist',
	'!./vscode',
	'!./package.json',
	'!./package-lock.json',
	'!./assets/css/**/*',
	'!./assets/css',
	'!./assets/img/raw/**/*',
	'!./assets/img/raw',
	`!${imgSRC}`,
	`!${styleSRC}`,
	`!${jsCustomSRC}`,
	`!${jsVendorSRC}`
];

// >>>>> Translation options.
// Your text domain here.
const textDomain = 'idProtect';

// Name of the translation file.
const translationFile = 'idProtect.pot';

// Where to save the translation files.
const translationDestination = './languages';

// Package name.
const packageName = 'idProtect';

// Where can users report bugs.
const bugReport = 'https://example.com/bugreport/';

// Last translator Email ID.
const lastTranslator = 'Ahmad Awais <your_email@email.com>';

// Team's Email ID.
const team = 'ThatMuch <social@thatmuch.fr>';

// Browsers you care about for auto-prefixing. Browserlist https://github.com/ai/browserslist
// The following list is set as per WordPress requirements. Though; Feel free to change.
const BROWSERS_LIST = ['last 2 version','> 1%'];

// Export.
module.exports = {
	projectURL,
	productURL,
	browserAutoOpen,
	injectChanges,
	styleSRC,
	styleDestination,
	outputStyle,
	errLogToConsole,
	precision,
	jsVendorSRC,
	jsVendorDestination,
	jsVendorFile,
	jsCustomSRC,
	jsCustomDestination,
	jsCustomFile,
	imgSRC,
	imgDST,
	watchStyles,
	watchJsVendor,
	watchJsCustom,
	watchPhp,
	zipName,
	zipDestination,
	zipIncludeGlob,
	zipIgnoreGlob,
	textDomain,
	translationFile,
	translationDestination,
	packageName,
	bugReport,
	lastTranslator,
	team,
	BROWSERS_LIST
};
