module.exports = function( grunt ) {

	grunt.loadNpmTasks( 'grunt-contrib-sass' );
	grunt.loadNpmTasks( 'grunt-contrib-concat' );
	grunt.renameTask( 'concat', 'concatFa' );
 	grunt.loadNpmTasks( 'grunt-contrib-concat' );
	grunt.renameTask( 'concat', 'concatCssCommon' );
 	grunt.loadNpmTasks( 'grunt-contrib-concat' );
	grunt.renameTask( 'concat', 'concatCssLanding' );
 	grunt.loadNpmTasks( 'grunt-contrib-concat' );
	grunt.renameTask( 'concat', 'concatCssPublic' );
 	grunt.loadNpmTasks( 'grunt-contrib-concat' );
	grunt.renameTask( 'concat', 'concatCssPrivate' );
 	grunt.loadNpmTasks( 'grunt-contrib-concat' );
	grunt.renameTask( 'concat', 'concatJsLazy' );
	grunt.loadNpmTasks( 'grunt-contrib-concat' );
	grunt.renameTask( 'concat', 'concatJsCommon' );
	grunt.loadNpmTasks( 'grunt-contrib-concat' );
	grunt.renameTask( 'concat', 'concatJsLanding' );
	grunt.loadNpmTasks( 'grunt-contrib-concat' );
	grunt.renameTask( 'concat', 'concatJsPublic' );
	grunt.loadNpmTasks( 'grunt-contrib-concat' );
	grunt.renameTask( 'concat', 'concatJsPrivate' );
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
					'../../../frontend/web/basic/ladcmgbi-20200401-src.css': '../../../themes/basic/resources/styles/scss/landing.scss',
					'../../../frontend/web/basic/pubcmgbi-20200401-src.css': '../../../themes/basic/resources/styles/scss/public.scss',
					'../../../frontend/web/basic/prvcmgbi-20200401-src.css': '../../../themes/basic/resources/styles/scss/private.scss'
				}
			}
		},
        concatFa: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'../../../themes/basic/resources/styles/fixes/font-fix-fa.css',
					'../../../vendor/bower-asset/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css'
				],
        		dest: '../../../frontend/web/basic/fawcmgbi-20200401-src.css'
      		}
    	},
        concatCssCommon: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'../../../themes/basic/resources/styles/fixes/font-fix-breeze.css',
					'../../../vendor/bower-asset/animate.css/animate.min.css',
					'../../../vendor/cmgtools/breeze-icons/dist/css/breeze-icons-core.min.css',
					'../../../vendor/cmgtools/breeze-icons/dist/css/breeze-icons-brand.min.css',
					'../../../vendor/cmgtools/breeze-icons/dist/css/breeze-icons-currency.min.css',
					'../../../vendor/bower-asset/chart.js/dist/Chart.min.css',
					'../../../vendor/bower-asset/aos/dist/aos.css',
					'../../../vendor/bower-asset/intl-tel-input/build/css/intlTelInput.min.css'
				],
        		dest: '../../../frontend/web/basic/cmncmgbi-20200401-src.css'
      		}
    	},
        concatCssLanding: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'../../../frontend/web/basic/ladcmgbi-20200401-src.css'
				],
        		dest: '../../../frontend/web/basic/ladcmgbi-20200401-src.css'
      		}
    	},
        concatCssPublic: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'../../../vendor/bower-asset/datetimepicker/build/jquery.datetimepicker.min.css',
					'../../../frontend/web/basic/pubcmgbi-20200401-src.css'
				],
        		dest: '../../../frontend/web/basic/pubcmgbi-20200401-src.css'
      		}
    	},
        concatCssPrivate: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'../../../vendor/bower-asset/datetimepicker/build/jquery.datetimepicker.min.css',
					'../../../themes/assets/vendor/fullcalendar/lib/main.min.css',
					'../../../frontend/web/basic/prvcmgbi-20200401-src.css'
				],
        		dest: '../../../frontend/web/basic/prvcmgbi-20200401-src.css'
      		}
    	},
        concatJsLazy: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'../../../vendor/cmgtools/velocity/src/solo/lazy.js'
				],
        		dest: '../../../frontend/web/basic/lzycmgbi-20200401-src.js'
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
					//'../../../vendor/bower-asset/conditionizr/dist/conditionizr.min.js',
					'../../../vendor/bower-asset/imagesloaded/imagesloaded.pkgd.min.js',
					'../../../vendor/bower-asset/handlebars/handlebars.min.js',
					'../../../vendor/bower-asset/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js',
					//'../../../vendor/bower-asset/progressbar.js/dist/progressbar.min.js',
					'../../../vendor/bower-asset/chart.js/dist/Chart.min.js',
					'../../../vendor/bower-asset/aos/dist/aos.js',
					'../../../vendor/bower-asset/intl-tel-input/build/js/utils.js',
					'../../../vendor/bower-asset/intl-tel-input/build/js/intlTelInput-jquery.min.js',
					'../../../vendor/cmgtools/velocity/dist/velocity.js',

					'../../../vendor/cmgtools/velocity-apps/src/apps/core/base.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/grid.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/autoload.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/services/follower.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/controllers/site.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/controllers/province.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/controllers/region.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/controllers/city.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/controllers/comment.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/controllers/follower.js',

					'../../../vendor/cmgtools/velocity-apps/src/apps/forms/base.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/forms/controllers/form.js',

					'../../../vendor/cmgtools/velocity-apps/src/apps/notify/base.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/notify/controllers/notification.js',

					'../../../themes/basic/resources/scripts/templates/public.js',

					'../../../themes/basic/resources/scripts/apix/public.js',

					'../../../themes/basic/resources/scripts/apps/public.js',

					'../../../themes/basic/resources/scripts/apps/core/base.js',
					'../../../themes/basic/resources/scripts/apps/core/autoload.js',
					'../../../themes/basic/resources/scripts/apps/core/controllers/site.js'
				],
        		dest: '../../../frontend/web/basic/cmncmgbi-20200401-src.js'
      		}
    	},
        concatJsLanding: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'../../../themes/basic/resources/scripts/main.js',
					'../../../themes/basic/resources/scripts/landing.js',
					'../../../themes/basic/resources/scripts/search.js',
					'../../../themes/basic/resources/scripts/sliders.js',
					'../../../themes/basic/resources/scripts/popups.js'
				],
        		dest: '../../../frontend/web/basic/ladcmgbi-20200401-src.js'
      		}
    	},
        concatJsPublic: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'../../../vendor/bower-asset/datetimepicker/build/jquery.datetimepicker.full.min.js',

					'../../../themes/basic/resources/scripts/main.js',
					'../../../themes/basic/resources/scripts/public.js',
					'../../../themes/basic/resources/scripts/search.js',
					'../../../themes/basic/resources/scripts/sliders.js',
					'../../../themes/basic/resources/scripts/popups.js'
				],
        		dest: '../../../frontend/web/basic/pubcmgbi-20200401-src.js'
      		}
    	},
        concatJsPrivate: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'../../../vendor/bower-asset/datetimepicker/build/jquery.datetimepicker.full.min.js',
					'../../../vendor/bower-asset/moment/min/moment.min.js',
					'../../../themes/assets/vendor/fullcalendar/lib/main/fullcalendar.min.js',

					'../../../vendor/cmgtools/velocity-apps/src/apps/core/services/address.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/services/data.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/services/file.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/services/gallery.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/services/location.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/services/mapper.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/services/meta.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/services/model.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/services/social.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/services/user.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/controllers/main.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/controllers/address.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/controllers/data.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/controllers/file.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/controllers/gallery.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/controllers/location.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/controllers/mapper.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/controllers/meta.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/controllers/model.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/controllers/social.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/core/controllers/user.js',

					'../../../vendor/cmgtools/velocity-apps/src/apps/notify/base.js',
					'../../../vendor/cmgtools/velocity-apps/src/apps/notify/controllers/notification.js',

					'../../../themes/basic/resources/scripts/templates/private.js',

					'../../../themes/basic/resources/scripts/apix/private.js',

					'../../../themes/basic/resources/scripts/apps/private.js',

					'../../../themes/basic/resources/scripts/apps/core/services/user.js',
					'../../../themes/basic/resources/scripts/apps/core/controllers/main.js',
					'../../../themes/basic/resources/scripts/apps/core/controllers/user.js',

					'../../../themes/basic/resources/scripts/main.js',
					'../../../themes/basic/resources/scripts/private.js',
					'../../../themes/basic/resources/scripts/search.js',
					'../../../themes/basic/resources/scripts/sliders.js',
					'../../../themes/basic/resources/scripts/popups.js'
				],
        		dest: '../../../frontend/web/basic/prvcmgbi-20200401-src.js'
      		}
    	},
    	cssmin: {
			options: {

			},
      		target: {
	        	files: {
					'../../../frontend/web/basic/fawcmgbi-20200401.css': [ '../../../frontend/web/basic/fawcmgbi-20200401-src.css' ],
					'../../../frontend/web/basic/cmncmgbi-20200401.css': [ '../../../frontend/web/basic/cmncmgbi-20200401-src.css' ],
	          		'../../../frontend/web/basic/ladcmgbi-20200401.css': [ '../../../frontend/web/basic/ladcmgbi-20200401-src.css' ],
					'../../../frontend/web/basic/pubcmgbi-20200401.css': [ '../../../frontend/web/basic/pubcmgbi-20200401-src.css' ],
					'../../../frontend/web/basic/prvcmgbi-20200401.css': [ '../../../frontend/web/basic/prvcmgbi-20200401-src.css' ]
	        	}
      		}
    	},
    	uglify: {
			options: {

			},
      		main_target: {
	        	files: {
	          		'../../../frontend/web/basic/lzycmgbi-20200401.js': [ '../../../frontend/web/basic/lzycmgbi-20200401-src.js' ],
					'../../../frontend/web/basic/cmncmgbi-20200401.js': [ '../../../frontend/web/basic/cmncmgbi-20200401-src.js' ],
					'../../../frontend/web/basic/ladcmgbi-20200401.js': [ '../../../frontend/web/basic/ladcmgbi-20200401-src.js' ],
					'../../../frontend/web/basic/pubcmgbi-20200401.js': [ '../../../frontend/web/basic/pubcmgbi-20200401-src.js' ],
					'../../../frontend/web/basic/prvcmgbi-20200401.js': [ '../../../frontend/web/basic/prvcmgbi-20200401-src.js' ]
	        	}
      		}
    	},
		copy: {
			main: {
				files: [
					{ expand: true, cwd: '../../../themes/basic/resources/fonts/opensans/', src: ['**'], dest: '../../../frontend/web/fonts/opensans/', filter: 'isFile' },
					{ expand: true, cwd: '../../../vendor/cmgtools/breeze-icons/dist/fonts/breeze/', src: ['**'], dest: '../../../frontend/web/fonts/breeze/', filter: 'isFile' },
					{ expand: true, cwd: '../../../vendor/bower-asset/fontawesome/web-fonts-with-css/webfonts/', src: ['**'], dest: '../../../frontend/web/webfonts/', filter: 'isFile' },
					{ expand: true, cwd: '../../../vendor/bower-asset/intl-tel-input/build/img/', src: ['**'], dest: '../../../frontend/web/img/', filter: 'isFile' },
					{ expand: true, cwd: '../../../themes/basic/resources/images/basic/', src: ['**'], dest: '../../../frontend/web/images/basic/', filter: 'isFile' },
					{ expand: true, cwd: '../../../themes/basic/resources/images/basic/icons/', src: ['**'], dest: '../../../frontend/web/images/basic/icons/', filter: 'isFile' }
				]
			}
		}
    });

	grunt.registerTask( 'default', [ 'sass', 'concatFa', 'concatCssCommon', 'concatCssLanding', 'concatCssPublic', 'concatCssPrivate', 'concatJsLazy', 'concatJsCommon', 'concatJsLanding', 'concatJsPublic', 'concatJsPrivate', 'cssmin', 'uglify', 'copy' ] );
};
