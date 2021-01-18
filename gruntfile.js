/*
to start up -

npm install grunt-contrib-concat --save-dev
npm install --save-dev node-sass grunt-sass
npm install grunt-contrib-uglify --save-dev
npm install grunt-contrib-cssmin --save-dev
*/
//export this module from node
module.exports = function(grunt) {
	const sass = require("node-sass");
	// Configuration =============================================
	grunt.initConfig({
		//pass in options to plugins, references to files etc concat and sass is used because the plugin names within is the task name for example src or dest
		watch: {
			sass: {
				files: ["css/sass/styles.scss"],
				tasks: ["sass"]
			}
		},
		concat: {
			js: {
				src: ["js/*.js"],
				dest: "build/scripts.js"
			},
			css: {
				//src: ['css/*.css'], needs ordering
				src: ["build/styles.min.css"],
				dest: "build/styles.min.css"
			}
		}, // end of concat ============================
		sass: {
			options: {
				implementation: sass,
				outputStyle: "expanded",
				sourceMap: true,
				quiet: true // stop depreciation errors
			},
			build: {
				files: [
					{
						src: "css/sass/styles.scss",
						dest: "css/styles.css"
					}
				]
			} // end of build sass ========================
		},
		uglify: {
			build: {
				files: [
					{
						src: "build/scripts.js",
						dest: "build/scripts-min.js"
					}
				]
			}
		}, //end of uglify
		cssmin: {
			build: {
				files: [
					{
						expand: true,
						cwd: "css/",
						src: ["*.css", "!*.min.css"],
						dest: "build/",
						ext: ".min.css"
					}
				]
			}
		}
	});

	// after adding plugin and config type in "grunt concat" in the command line

	// Load plugins by there plugin names in the devdepencies ===============================================
	grunt.loadNpmTasks("grunt-contrib-watch");
	grunt.loadNpmTasks("grunt-contrib-concat");
	grunt.loadNpmTasks("grunt-sass");
	grunt.loadNpmTasks("grunt-contrib-uglify");
	grunt.loadNpmTasks("grunt-contrib-cssmin");

	// Register tasks ===============================================

	// for individual tasks, one at a time
	//any name in parameter one , parameter 2 is the spefic one to change

	// js version
	grunt.registerTask("concatJs", ["concat:js"]);
	// css version
	grunt.registerTask("concatCss", ["concat:css"]);
};
