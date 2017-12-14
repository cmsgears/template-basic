<?php

// Ensures that openssl is installed and configured properly
if ( !extension_loaded( 'openssl' ) ) {

	die( 'The OpenSSL PHP extension is required by Yii2.' );
}

// Ensures that mcrypt is installed and configured properly
if ( !extension_loaded( 'mcrypt' ) ) {

	die( 'The mcrypt PHP extension is required by Yii2.' );
}

// Read available applications from the environments index
$root		= str_replace( '\\', '/', __DIR__ );
$envs		= require( "$root/environments/index.php" );
$envNames	= array_keys( $envs );

$envName	= null;

echo "Yii Application Initialization Tool\n\n";

if( count( $argv ) > 1 ) {

	$envName = $argv[ 1 ];
}

if( !isset( $envName ) || !in_array( $envName, [ 'dev', 'alpha', 'prod' ] ) ) {

	echo "Enter your development environment among dev, alpha or prod:";

	// Set the required environemnt
	$envName	= trim( fgets( STDIN ) );
}

switch( $envName ) {

	case 'dev': {

		$envName = "Development";

		break;
	}
	case 'alpha': {

		$envName = "Alpha";

		break;
	}
	case 'prod': {

		$envName	= "Production";

		break;
	}
	default: {

		echo "Wrong environemnt choosen.";

		die();
	}
}

$env = $envs[ $envName ];

echo "\n  Start initialization ...\n\n";

// Copy all files to respective directories
$files = getFileList( "$root/environments/{$env['path']}" );

foreach ( $files as $file ) {

	if ( !copyFile( $root, "environments/{$env['path']}/$file", $file ) ) {

		break;
	}
}

// Set the CSRF keys
$callbacks = [ 'setCookieValidationKey', 'setWritable', 'setExecutable' ];
foreach ( $callbacks as $callback ) {

	if ( !empty( $env[ $callback ] ) ) {

		$callback($root, $env[$callback]);
	}
}

echo "\n  ... initialization completed.\n\n";

function getFileList( $root, $basePath = '' ) {

	$files	= [];
	$handle = opendir($root);

	while ( ( $path = readdir( $handle ) ) !== false ) {

		if ( $path === '.svn' || $path === '.' || $path === '..' ) {

			continue;
		}

		$fullPath		= "$root/$path";
		$relativePath	= $basePath === '' ? $path : "$basePath/$path";

		if ( is_dir( $fullPath ) ) {

			$files = array_merge( $files, getFileList( $fullPath, $relativePath ) );
		}
		else {
			$files[] = $relativePath;
		}
	}

	closedir( $handle );

	return $files;
}

function copyFile( $root, $source, $target ) {

	if ( !is_file( $root . '/' . $source ) ) {

		echo "		 skip $target ($source not exist)\n";

		return true;
	}

	if ( is_file( $root . '/' . $target ) ) {

		if ( file_get_contents( $root . '/' . $source ) === file_get_contents( $root . '/' . $target ) ) {

			echo "	unchanged $target\n";

			return true;
		}

		file_put_contents( $root . '/' . $target, file_get_contents( $root . '/' . $source ) );

		return true;
	}

	echo "	 generate $target\n";

	@mkdir( dirname( $root . '/' . $target ), 0777, true );

	file_put_contents( $root . '/' . $target, file_get_contents( $root . '/' . $source ) );

	return true;
}

function setWritable( $root, $paths ) {

	foreach( $paths as $writable ) {

		echo "		chmod 0777 $writable\n";

		@chmod( "$root/$writable", 0777 );
	}
}

function setExecutable( $root, $paths ) {

	foreach ( $paths as $executable ) {

		echo "		chmod 0755 $executable\n";

		@chmod( "$root/$executable", 0755 );
	}
}

function setCookieValidationKey( $root, $paths ) {

	foreach ( $paths as $file ) {

		echo "	 generate cookie validation key in $file\n";

		$file		= $root . '/' . $file;
		$length		= 32;
		$bytes		= mcrypt_create_iv( $length, MCRYPT_DEV_URANDOM );
		$key		= strtr( substr( base64_encode( $bytes ), 0, $length ), '+/=', '_-.' );
		$content	= preg_replace( '/(("|\')cookieValidationKey("|\')\s*=>\s*)(""|\'\')/', "\\1'$key'", file_get_contents( $file ) );

		file_put_contents( $file, $content );
	}
}
