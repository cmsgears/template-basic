module.exports = function( grunt ) {

	grunt.loadNpmTasks( 'grunt-contrib-sass' );
 	grunt.loadNpmTasks( 'grunt-contrib-concat' );
	grunt.renameTask( 'concat', 'concatCssCmn' );
 	grunt.loadNpmTasks( 'grunt-contrib-concat' );
	grunt.renameTask( 'concat', 'concatCssMan' );
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks( 'grunt-contrib-cssmin' );
	grunt.loadNpmTasks( 'grunt-contrib-uglify' );
	grunt.loadNpmTasks( 'grunt-contrib-copy' );

    grunt.initConfig({
        pkg: grunt.file.readJSON( 'package.json' ),

		sass: {
			dist: {
				options: {
					style: 'expanded',
					loadPath: '<cmgtools path>/cmgtools/cmt-ui/src/scss'
				},
				files: {
					'<project root>/backend/web/styles/pubazxrs-20170816-src.css': '<project root>/themes/admin/resources/styles/scss/public.scss',
					'<project root>/backend/web/styles/prvazxrs-20170816-src.css': '<project root>/themes/admin/resources/styles/scss/private.scss'
				}
			}
		},
        concatCssCmn: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'<project root>/vendor/bower/fontawesome/css/font-awesome.min.css',
					'<project root>/vendor/bower/cmt-iconlib/dist/css/cmti.min.css'
				],
        		dest: '<project root>/backend/web/styles/cmnazxrs-20170816-src.css'
      		}
    	},
        concatCssMan: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'<project root>/themes/adminchild/resources/styles/main.css'
				],
        		dest: '<project root>/backend/web/styles/manazxrs-20170816-src.css'
      		}
    	},
        concat: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					//'<project root>/vendor/bower/jquery/dist/jquery.js',
					'<project root>/vendor/bower/jquery-ui/jquery-ui.min.js',
					'<project root>/vendor/foxslider/cmg-plugin/widgets/resources/scripts/foxslider-core.js',
					'<project root>/vendor/bower/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js',
					'<project root>/vendor/bower/imagesloaded/imagesloaded.pkgd.min.js',
					'<project root>/vendor/bower/handlebars/handlebars.js',
					'<project root>/vendor/bower/cmt-js/dist/cmgtools.js',
					'<project root>/vendor/cmsgears/widget-form-ajax/resources/scripts/apps/form.js',

					'<project root>/themes/admin/resources/scripts/templates/public.js',
					'<project root>/themes/admin/resources/scripts/templates/private.js',

					'<project root>/themes/admin/resources/scripts/main.js',
					'<project root>/themes/admin/resources/scripts/search.js',

					'<project root>/themes/admin/resources/scripts/apix/public.js',
					'<project root>/themes/admin/resources/scripts/apix/private.js',

					'<project root>/themes/admin/resources/scripts/apps/public.js',
					'<project root>/themes/admin/resources/scripts/apps/private.js',
					'<project root>/themes/admin/resources/scripts/apps/user.js',
					'<project root>/themes/admin/resources/scripts/apps/location.js',
					'<project root>/themes/admin/resources/scripts/apps/notification.js',
					'<project root>/themes/admin/resources/scripts/apps/category.js',

					'<project root>/themes/adminchild/resources/scripts/main.js'
				],
        		dest: '<project root>/backend/web/scripts/cmnazxrs-20170816-src.js'
      		}
    	},
    	cssmin: {
			options: {

			},
      		target: {
	        	files: {
					'<project root>/backend/web/styles/cmnazxrs-20170816.css': [ '<project root>/backend/web/styles/cmnazxrs-20170816-src.css' ],
	          		'<project root>/backend/web/styles/pubazxrs-20170816.css': [ '<project root>/backend/web/styles/pubazxrs-20170816-src.css' ],
					'<project root>/backend/web/styles/prvazxrs-20170816.css': [ '<project root>/backend/web/styles/prvazxrs-20170816-src.css' ],
					'<project root>/backend/web/styles/manazxrs-20170816.css': [ '<project root>/backend/web/styles/manazxrs-20170816-src.css' ]
	        	}
      		}
    	},
    	uglify: {
			options: {

			},
      		main_target: {
	        	files: {
	          		'<project root>/backend/web/scripts/cmnazxrs-20170816.js': [ '<project root>/backend/web/scripts/cmnazxrs-20170816-src.js' ]
	        	}
      		}
    	},
		copy: {
			main: {
				files: [
					{ expand: true, cwd: '<project root>/themes/admin/resources/fonts/clearsans/', src: ['**'], dest: '<project root>/backend/web/fonts/clearsans/', filter: 'isFile' },
					{ expand: true, cwd: '<project root>/themes/admin/resources/fonts/opensans/', src: ['**'], dest: '<project root>/backend/web/fonts/opensans/', filter: 'isFile' },
					{ expand: true, cwd: '<project root>/vendor/bower/cmt-iconlib/dist/fonts/cmgtools/', src: ['**'], dest: '<project root>/backend/web/fonts/cmgtools/', filter: 'isFile' },
					{ expand: true, cwd: '<project root>/vendor/bower/fontawesome/fonts/', src: ['**'], dest: '<project root>/backend/web/fonts/', filter: 'isFile' },
					{ expand: true, cwd: '<project root>/themes/admin/resources/images/', src: ['**'], dest: '<project root>/backend/web/images/', filter: 'isFile' },
					{ expand: true, cwd: '<project root>/themes/admin/resources/images/icons/', src: ['**'], dest: '<project root>/backend/web/images/icons/', filter: 'isFile' }
				]
			}
		}
    });

    grunt.registerTask( 'default', [ 'sass', 'concatCssCmn', 'concatCssMan', 'concat', 'cssmin', 'uglify', 'copy' ] );
};
