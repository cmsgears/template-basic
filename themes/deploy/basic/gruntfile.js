module.exports = function( grunt ) {

	grunt.loadNpmTasks( 'grunt-contrib-sass' );
	grunt.loadNpmTasks('grunt-contrib-concat');
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
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.renameTask( 'concat', 'concatJsCommon' );
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.renameTask( 'concat', 'concatJsLanding' );
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.renameTask( 'concat', 'concatJsPublic' );
	grunt.loadNpmTasks('grunt-contrib-concat');
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
					'../../../frontend/web/basic/ladcmgbi-20190405-src.css': '../../../themes/basic/resources/styles/scss/landing.scss',
					'../../../frontend/web/basic/pubcmgbi-20190405-src.css': '../../../themes/basic/resources/styles/scss/public.scss',
					'../../../frontend/web/basic/prvcmgbi-20190405-src.css': '../../../themes/basic/resources/styles/scss/private.scss'
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
        		dest: '../../../frontend/web/basic/fawcmgbi-20190405-src.css'
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
					'../../../vendor/bower-asset/cmt-breeze-icons/dist/css/breeze-icons-core.min.css',
					//'../../../vendor/bower-asset/cmt-breeze-icons/dist/css/breeze-icons-currency.min.css',
					//'../../../vendor/bower-asset/nouislider/distribute/nouislider.min.css',
					'../../../vendor/bower-asset/intl-tel-input/build/css/intlTelInput.min.css'
				],
        		dest: '../../../frontend/web/basic/cmncmgbi-20190405-src.css'
      		}
    	},
        concatCssLanding: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'../../../frontend/web/basic/ladcmgbi-20190405-src.css'
				],
        		dest: '../../../frontend/web/basic/ladcmgbi-20190405-src.css'
      		}
    	},
        concatCssPublic: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'../../../vendor/bower-asset/datetimepicker/build/jquery.datetimepicker.min.css',
					'../../../frontend/web/basic/pubcmgbi-20190405-src.css'
				],
        		dest: '../../../frontend/web/basic/pubcmgbi-20190405-src.css'
      		}
    	},
        concatCssPrivate: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'../../../vendor/bower-asset/datetimepicker/build/jquery.datetimepicker.min.css',
					'../../../vendor/bower-asset/fullcalendar/dist/fullcalendar.min.css',
					'../../../frontend/web/basic/prvcmgbi-20190405-src.css'
				],
        		dest: '../../../frontend/web/basic/prvcmgbi-20190405-src.css'
      		}
    	},
        concatJsLazy: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'../../../vendor/bower-asset/cmt-velocity/src/solo/lazy.js'
				],
        		dest: '../../../frontend/web/basic/lzycmgbi-20190405-src.js'
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
					//'../../../vendor/bower-asset/nouislider/distribute/nouislider.min.js',
					//'../../../vendor/bower-asset/progressbar.js/dist/progressbar.min.js',
					'../../../vendor/bower-asset/chart.js/dist/Chart.min.js',
					'../../../vendor/bower-asset/intl-tel-input/build/js/utils.js',
					'../../../vendor/bower-asset/intl-tel-input/build/js/intlTelInput-jquery.min.js',
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

					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/notify/base.js',
					'../../../vendor/bower-asset/cmt-velocity-apps/src/apps/notify/controllers/notification.js',

					'../../../themes/basic/resources/scripts/templates/public.js',

					'../../../themes/basic/resources/scripts/apix/public.js',

					'../../../themes/basic/resources/scripts/apps/public.js',

					'../../../themes/basic/resources/scripts/apps/core/base.js',
					'../../../themes/basic/resources/scripts/apps/core/autoload.js',
					'../../../themes/basic/resources/scripts/apps/core/controllers/site.js'
				],
        		dest: '../../../frontend/web/basic/cmncmgbi-20190405-src.js'
      		}
    	},
        concatJsLanding: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'../../../themes/basic/resources/scripts/main.js',
					'../../../themes/basic/resources/scripts/search.js',
					'../../../themes/basic/resources/scripts/sliders.js',
					'../../../themes/basic/resources/scripts/popups.js'
				],
        		dest: '../../../frontend/web/basic/ladcmgbi-20190405-src.js'
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
					'../../../themes/basic/resources/scripts/search.js',
					'../../../themes/basic/resources/scripts/sliders.js',
					'../../../themes/basic/resources/scripts/popups.js'
				],
        		dest: '../../../frontend/web/basic/pubcmgbi-20190405-src.js'
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
					'../../../vendor/bower-asset/fullcalendar/dist/fullcalendar.min.js',

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

					'../../../themes/basic/resources/scripts/templates/private.js',

					'../../../themes/basic/resources/scripts/apix/private.js',

					'../../../themes/basic/resources/scripts/apps/private.js',

					'../../../themes/basic/resources/scripts/apps/core/services/user.js',
					'../../../themes/basic/resources/scripts/apps/core/controllers/main.js',
					'../../../themes/basic/resources/scripts/apps/core/controllers/user.js',

					'../../../themes/basic/resources/scripts/main.js',
					'../../../themes/basic/resources/scripts/search.js',
					'../../../themes/basic/resources/scripts/sliders.js',
					'../../../themes/basic/resources/scripts/popups.js'
				],
        		dest: '../../../frontend/web/basic/prvcmgbi-20190405-src.js'
      		}
    	},
    	cssmin: {
			options: {

			},
      		target: {
	        	files: {
					'../../../frontend/web/basic/fawcmgbi-20190405.css': [ '../../../frontend/web/basic/fawcmgbi-20190405-src.css' ],
					'../../../frontend/web/basic/cmncmgbi-20190405.css': [ '../../../frontend/web/basic/cmncmgbi-20190405-src.css' ],
	          		'../../../frontend/web/basic/ladcmgbi-20190405.css': [ '../../../frontend/web/basic/ladcmgbi-20190405-src.css' ],
					'../../../frontend/web/basic/pubcmgbi-20190405.css': [ '../../../frontend/web/basic/pubcmgbi-20190405-src.css' ],
					'../../../frontend/web/basic/prvcmgbi-20190405.css': [ '../../../frontend/web/basic/prvcmgbi-20190405-src.css' ]
	        	}
      		}
    	},
    	uglify: {
			options: {

			},
      		main_target: {
	        	files: {
					'../../../frontend/web/basic/lzycmgbi-20190405.js': [ '../../../frontend/web/basic/lzycmgbi-20190405-src.js' ],
	          		'../../../frontend/web/basic/cmncmgbi-20190405.js': [ '../../../frontend/web/basic/cmncmgbi-20190405-src.js' ],
					'../../../frontend/web/basic/ladcmgbi-20190405.js': [ '../../../frontend/web/basic/ladcmgbi-20190405-src.js' ],
					'../../../frontend/web/basic/pubcmgbi-20190405.js': [ '../../../frontend/web/basic/pubcmgbi-20190405-src.js' ],
					'../../../frontend/web/basic/prvcmgbi-20190405.js': [ '../../../frontend/web/basic/prvcmgbi-20190405-src.js' ]
	        	}
      		}
    	},
		copy: {
			main: {
				files: [
					{ expand: true, cwd: 'e:/development/projects-vc/php/basicdemo/themes/basic/resources/fonts/opensans/', src: ['**'], dest: 'e:/development/projects-vc/php/basicdemo/frontend/web/fonts/opensans/', filter: 'isFile' },
					{ expand: true, cwd: 'e:/development/projects-vc/php/basicdemo/vendor/bower-asset/cmt-breeze-icons/dist/fonts/breeze/', src: ['**'], dest: 'e:/development/projects-vc/php/basicdemo/frontend/web/fonts/breeze/', filter: 'isFile' },
					{ expand: true, cwd: 'e:/development/projects-vc/php/basicdemo/vendor/bower-asset/fontawesome/web-fonts-with-css/webfonts/', src: ['**'], dest: 'e:/development/projects-vc/php/basicdemo/frontend/web/webfonts/', filter: 'isFile' },
					{ expand: true, cwd: 'e:/development/projects-vc/php/basicdemo/themes/basic/resources/images/basic/', src: ['**'], dest: 'e:/development/projects-vc/php/basicdemo/frontend/web/images/basic/', filter: 'isFile' },
					{ expand: true, cwd: 'e:/development/projects-vc/php/basicdemo/themes/basic/resources/images/basic/icons/', src: ['**'], dest: 'e:/development/projects-vc/php/basicdemo/frontend/web/images/basic/icons/', filter: 'isFile' }
				]
			}
		}
    });

	grunt.registerTask( 'default', [ 'sass', 'concatFa', 'concatCssCommon', 'concatCssLanding', 'concatCssPublic', 'concatCssPrivate', 'concatJsLazy', 'concatJsCommon', 'concatJsLanding', 'concatJsPublic', 'concatJsPrivate', 'cssmin', 'uglify', 'copy' ] );
};
