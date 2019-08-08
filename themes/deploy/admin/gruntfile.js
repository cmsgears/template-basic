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
					loadPath: [ '../../../../../../projects-vc/css/cmt-ui/breeze/src/scss', '../../../../../../projects-vc/css/cmt-ui/breeze-templates/src/scss' ]
				},
				files: {
					'../../../backend/web/styles/pubazxrs-20190405-src.css': '../../../themes/admin/resources/styles/scss/public.scss',
					'../../../backend/web/styles/prvazxrs-20190405-src.css': '../../../themes/admin/resources/styles/scss/private.scss'
				}
			}
		},
        concatCssCommon: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'../../../vendor/bower-asset/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css',
					'../../../vendor/bower-asset/cmt-breeze-icons/dist/css/breeze-icons-core.min.css',
					'../../../vendor/bower-asset/cmt-breeze-icons/dist/css/breeze-icons-currency.min.css'
				],
        		dest: '../../../backend/web/styles/cmnazxrs-20190405-src.css'
      		}
    	},
        concatCssChild: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'../../../themes/adminchild/resources/styles/main.css'
				],
        		dest: '../../../backend/web/styles/chdazxrs-20190405-src.css'
      		}
    	},
        concatJsCommon: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					//'../../../vendor/bower-asset/jquery/dist/jquery.min.js',
					'../../../vendor/bower-asset/jquery-ui/jquery-ui.min.js',
					'../../../vendor/foxslider/cmg-plugin/widgets/resources/scripts/foxslider-core.js',
					'../../../vendor/bower-asset/imagesloaded/imagesloaded.pkgd.min.js',
					'../../../vendor/bower-asset/handlebars/handlebars.min.js',
					'../../../vendor/bower-asset/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js',
					'../../../vendor/bower-asset/cmt-velocity/dist/velocity.js',

					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/core/base.js',
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/core/grid.js',
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/core/autoload.js',
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/core/controllers/site.js',
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/core/controllers/province.js',
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/core/controllers/region.js',
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/core/controllers/city.js',
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/core/controllers/comment.js',

					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/forms/base.js',
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/forms/controllers/form.js',

					'../../../themes/admin/resources/scripts/templates/public.js',

					'../../../themes/admin/resources/scripts/apix/public.js',

					'../../../themes/admin/resources/scripts/apps/public.js',

					'../../../themes/admin/resources/scripts/apps/core/controllers/site.js'
				],
        		dest: '../../../backend/web/scripts/cmnazxrs-20190405-src.js'
      		}
    	},
        concatJsPublic: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'../../../themes/admin/resources/scripts/main.js',
					'../../../themes/admin/resources/scripts/search.js'
				],
        		dest: '../../../backend/web/scripts/pubazxrs-20190405-src.js'
      		}
    	},
        concatJsPrivate: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/core/data.js',
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/core/social.js',
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/core/gallery.js',
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/core/mapper.js',

					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/core/services/address.js',
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/core/services/location.js',
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/core/services/file.js',
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/core/services/meta.js',
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/core/services/model.js',
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/core/services/user.js',
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/core/controllers/main.js',
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/core/controllers/address.js',
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/core/controllers/location.js',
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/core/controllers/file.js',
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/core/controllers/meta.js',
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/core/controllers/model.js',
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/core/controllers/user.js',

					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/notify/base.js',
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/notify/controllers/notification.js',

					'../../../themes/admin/resources/scripts/templates/private.js',

					'../../../themes/admin/resources/scripts/apix/private.js',

					'../../../themes/admin/resources/scripts/apps/private.js',

					'../../../themes/admin/resources/scripts/apps/core/services/user.js',
					'../../../themes/admin/resources/scripts/apps/core/controllers/main.js',
					'../../../themes/admin/resources/scripts/apps/core/controllers/user.js',
					'../../../themes/admin/resources/scripts/apps/core/controllers/admin.js',

					'../../../themes/admin/resources/scripts/main.js',
					'../../../themes/admin/resources/scripts/search.js',
					'../../../themes/admin/resources/scripts/sliders.js',
					'../../../themes/admin/resources/scripts/popups.js',
					'../../../themes/admin/resources/scripts/maps.js'
				],
        		dest: '../../../backend/web/scripts/prvazxrs-20190405-src.js'
      		}
    	},
        concatJsChild: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'../../../themes/adminchild/resources/scripts/main.js'
				],
        		dest: '../../../backend/web/scripts/chdazxrs-20190405-src.js'
      		}
    	},
    	cssmin: {
			options: {

			},
      		target: {
	        	files: {
					'../../../backend/web/styles/cmnazxrs-20190405.css': [ '../../../backend/web/styles/cmnazxrs-20190405-src.css' ],
	          		'../../../backend/web/styles/pubazxrs-20190405.css': [ '../../../backend/web/styles/pubazxrs-20190405-src.css' ],
					'../../../backend/web/styles/prvazxrs-20190405.css': [ '../../../backend/web/styles/prvazxrs-20190405-src.css' ],
					'../../../backend/web/styles/chdazxrs-20190405.css': [ '../../../backend/web/styles/chdazxrs-20190405-src.css' ]
	        	}
      		}
    	},
    	uglify: {
			options: {

			},
      		main_target: {
	        	files: {
	          		'../../../backend/web/scripts/cmnazxrs-20190405.js': [ '../../../backend/web/scripts/cmnazxrs-20190405-src.js' ],
					'../../../backend/web/scripts/pubazxrs-20190405.js': [ '../../../backend/web/scripts/pubazxrs-20190405-src.js' ],
					'../../../backend/web/scripts/prvazxrs-20190405.js': [ '../../../backend/web/scripts/prvazxrs-20190405-src.js' ],
					'../../../backend/web/scripts/chdazxrs-20190405.js': [ '../../../backend/web/scripts/chdazxrs-20190405-src.js' ]
	        	}
      		}
    	},
		copy: {
			main: {
				files: [
					{ expand: true, cwd: '../../../themes/admin/resources/fonts/clearsans/', src: ['**'], dest: '../../../backend/web/fonts/clearsans/', filter: 'isFile' },
					{ expand: true, cwd: '../../../themes/admin/resources/fonts/opensans/', src: ['**'], dest: '../../../backend/web/fonts/opensans/', filter: 'isFile' },
					{ expand: true, cwd: '../../../vendor/bower-asset/cmt-breeze-icons/dist/fonts/breeze/', src: ['**'], dest: '../../../backend/web/fonts/breeze/', filter: 'isFile' },
					{ expand: true, cwd: '../../../vendor/bower-asset/fontawesome/web-fonts-with-css/webfonts/', src: ['**'], dest: '../../../backend/web/webfonts/', filter: 'isFile' },
					{ expand: true, cwd: '../../../themes/admin/resources/images/', src: ['**'], dest: '../../../backend/web/images/', filter: 'isFile' },
					{ expand: true, cwd: '../../../themes/admin/resources/images/icons/', src: ['**'], dest: '../../../backend/web/images/icons/', filter: 'isFile' }
				]
			}
		}
    });

    grunt.registerTask( 'default', [ 'sass', 'concatCssCommon', 'concatCssChild', 'concatJsCommon', 'concatJsPublic', 'concatJsPrivate', 'concatJsChild', 'cssmin', 'uglify', 'copy' ] );
};
