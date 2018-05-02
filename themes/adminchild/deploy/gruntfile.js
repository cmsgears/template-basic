module.exports = function( grunt ) {

	grunt.loadNpmTasks( 'grunt-contrib-sass' );
 	grunt.loadNpmTasks( 'grunt-contrib-concat' );
	grunt.renameTask( 'concat', 'concatCssCommon' );
 	grunt.loadNpmTasks( 'grunt-contrib-concat' );
	grunt.renameTask( 'concat', 'concatCssChild' );
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.renameTask( 'concat', 'concatJsCommon' );
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.renameTask( 'concat', 'concatJsPublic' );
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.renameTask( 'concat', 'concatJsPrivate' );
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.renameTask( 'concat', 'concatJsChild' );
	grunt.loadNpmTasks( 'grunt-contrib-cssmin' );
	grunt.loadNpmTasks( 'grunt-contrib-uglify' );
	grunt.loadNpmTasks( 'grunt-contrib-copy' );

    grunt.initConfig({
        pkg: grunt.file.readJSON( 'package.json' ),

		sass: {
			dist: {
				options: {
					style: 'expanded',
					loadPath: 'e:/development/projects-vc/css/cmt-ui/cmt-ui/src/scss'
				},
				files: {
					'e:/development/projects-vc/php/basicdemo/backend/web/styles/pubazxrs-20170816-src.css': 'e:/development/projects-vc/php/basicdemo/themes/admin/resources/styles/scss/public.scss',
					'e:/development/projects-vc/php/basicdemo/backend/web/styles/prvazxrs-20170816-src.css': 'e:/development/projects-vc/php/basicdemo/themes/admin/resources/styles/scss/private.scss'
				}
			}
		},
        concatCssCommon: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'e:/development/projects-vc/php/basicdemo/vendor/bower-asset/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css',
					'e:/development/projects-vc/php/basicdemo/vendor/bower-asset/cmt-iconlib/dist/css/cmti.min.css'
				],
        		dest: 'e:/development/projects-vc/php/basicdemo/backend/web/styles/cmnazxrs-20170816-src.css'
      		}
    	},
        concatCssChild: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'e:/development/projects-vc/php/basicdemo/themes/adminchild/resources/styles/main.css'
				],
        		dest: 'e:/development/projects-vc/php/basicdemo/backend/web/styles/chdazxrs-20170816-src.css'
      		}
    	},
        concatJsCommon: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					//'e:/development/projects-vc/php/basicdemo/vendor/bower-asset/jquery/dist/jquery.min.js',
					'e:/development/projects-vc/php/basicdemo/vendor/bower-asset/jquery-ui/jquery-ui.min.js',
					'e:/development/projects-vc/php/basicdemo/vendor/foxslider/cmg-plugin/widgets/resources/scripts/foxslider-core.js',
					'e:/development/projects-vc/php/basicdemo/vendor/bower-asset/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js',
					'e:/development/projects-vc/php/basicdemo/vendor/bower-asset/imagesloaded/imagesloaded.pkgd.min.js',
					'e:/development/projects-vc/php/basicdemo/vendor/bower-asset/handlebars/handlebars.min.js',
					'e:/development/projects-vc/php/basicdemo/vendor/bower-asset/cmt-js/dist/cmgtools.min.js',
					'e:/development/projects-vc/php/basicdemo/vendor/cmsgears/widget-form-ajax/resources/scripts/apps/form.js',

					'e:/development/projects-vc/php/basicdemo/themes/admin/resources/scripts/main.js',
					'e:/development/projects-vc/php/basicdemo/themes/admin/resources/scripts/search.js'
				],
        		dest: 'e:/development/projects-vc/php/basicdemo/backend/web/scripts/cmnazxrs-20170816-src.js'
      		}
    	},
        concatJsPublic: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'e:/development/projects-vc/php/basicdemo/themes/admin/resources/scripts/templates/public.js',
					
					'e:/development/projects-vc/php/basicdemo/themes/admin/resources/scripts/apix/public.js',
					
					'e:/development/projects-vc/php/basicdemo/themes/admin/resources/scripts/apps/public.js'
				],
        		dest: 'e:/development/projects-vc/php/basicdemo/backend/web/scripts/pubazxrs-20170816-src.js'
      		}
    	},
        concatJsPrivate: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'e:/development/projects-vc/php/basicdemo/themes/admin/resources/scripts/templates/private.js',
					
					'e:/development/projects-vc/php/basicdemo/themes/admin/resources/scripts/apix/public.js',
					'e:/development/projects-vc/php/basicdemo/themes/admin/resources/scripts/apix/private.js',

					'e:/development/projects-vc/php/basicdemo/themes/admin/resources/scripts/apps/public.js',
					'e:/development/projects-vc/php/basicdemo/themes/admin/resources/scripts/apps/private.js',
					'e:/development/projects-vc/php/basicdemo/themes/admin/resources/scripts/apps/user.js',
					'e:/development/projects-vc/php/basicdemo/themes/admin/resources/scripts/apps/location.js',
					'e:/development/projects-vc/php/basicdemo/themes/admin/resources/scripts/apps/notification.js',
					'e:/development/projects-vc/php/basicdemo/themes/admin/resources/scripts/apps/category.js'
				],
        		dest: 'e:/development/projects-vc/php/basicdemo/backend/web/scripts/prvazxrs-20170816-src.js'
      		}
    	},
        concatJsChild: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'e:/development/projects-vc/php/basicdemo/themes/adminchild/resources/scripts/main.js'
				],
        		dest: 'e:/development/projects-vc/php/basicdemo/backend/web/scripts/chdazxrs-20170816-src.js'
      		}
    	},
    	cssmin: {
			options: {

			},
      		target: {
	        	files: {
					'e:/development/projects-vc/php/basicdemo/backend/web/styles/cmnazxrs-20170816.css': [ 'e:/development/projects-vc/php/basicdemo/backend/web/styles/cmnazxrs-20170816-src.css' ],
	          		'e:/development/projects-vc/php/basicdemo/backend/web/styles/pubazxrs-20170816.css': [ 'e:/development/projects-vc/php/basicdemo/backend/web/styles/pubazxrs-20170816-src.css' ],
					'e:/development/projects-vc/php/basicdemo/backend/web/styles/prvazxrs-20170816.css': [ 'e:/development/projects-vc/php/basicdemo/backend/web/styles/prvazxrs-20170816-src.css' ],
					'e:/development/projects-vc/php/basicdemo/backend/web/styles/chdazxrs-20170816.css': [ 'e:/development/projects-vc/php/basicdemo/backend/web/styles/chdazxrs-20170816-src.css' ]
	        	}
      		}
    	},
    	uglify: {
			options: {

			},
      		main_target: {
	        	files: {
	          		'e:/development/projects-vc/php/basicdemo/backend/web/scripts/cmnazxrs-20170816.js': [ 'e:/development/projects-vc/php/basicdemo/backend/web/scripts/cmnazxrs-20170816-src.js' ],
					'e:/development/projects-vc/php/basicdemo/backend/web/scripts/pubazxrs-20170816.js': [ 'e:/development/projects-vc/php/basicdemo/backend/web/scripts/pubazxrs-20170816-src.js' ],
					'e:/development/projects-vc/php/basicdemo/backend/web/scripts/prvazxrs-20170816.js': [ 'e:/development/projects-vc/php/basicdemo/backend/web/scripts/prvazxrs-20170816-src.js' ],
					'e:/development/projects-vc/php/basicdemo/backend/web/scripts/chdazxrs-20170816.js': [ 'e:/development/projects-vc/php/basicdemo/backend/web/scripts/chdazxrs-20170816-src.js' ]
	        	}
      		}
    	},
		copy: {
			main: {
				files: [
					{ expand: true, cwd: 'e:/development/projects-vc/php/basicdemo/themes/admin/resources/fonts/clearsans/', src: ['**'], dest: 'e:/development/projects-vc/php/basicdemo/backend/web/fonts/clearsans/', filter: 'isFile' },
					{ expand: true, cwd: 'e:/development/projects-vc/php/basicdemo/themes/admin/resources/fonts/opensans/', src: ['**'], dest: 'e:/development/projects-vc/php/basicdemo/backend/web/fonts/opensans/', filter: 'isFile' },
					{ expand: true, cwd: 'e:/development/projects-vc/php/basicdemo/vendor/bower-asset/cmt-iconlib/dist/fonts/cmgtools/', src: ['**'], dest: 'e:/development/projects-vc/php/basicdemo/backend/web/fonts/cmgtools/', filter: 'isFile' },
					{ expand: true, cwd: 'e:/development/projects-vc/php/basicdemo/vendor/bower-asset/fontawesome/web-fonts-with-css/webfonts/', src: ['**'], dest: 'e:/development/projects-vc/php/basicdemo/backend/web/webfonts/', filter: 'isFile' },
					{ expand: true, cwd: 'e:/development/projects-vc/php/basicdemo/themes/admin/resources/images/', src: ['**'], dest: 'e:/development/projects-vc/php/basicdemo/backend/web/images/', filter: 'isFile' },
					{ expand: true, cwd: 'e:/development/projects-vc/php/basicdemo/themes/admin/resources/images/icons/', src: ['**'], dest: 'e:/development/projects-vc/php/basicdemo/backend/web/images/icons/', filter: 'isFile' }
				]
			}
		}
    });

    grunt.registerTask( 'default', [ 'sass', 'concatCssCommon', 'concatCssChild', 'concatJsCommon', 'concatJsPublic', 'concatJsPrivate', 'concatJsChild', 'cssmin', 'uglify', 'copy' ] );
};
