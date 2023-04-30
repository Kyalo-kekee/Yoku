<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcea3d528ebfa925fdd99164be61db74c
{
    public static $prefixLengthsPsr4 = array (
        'Y' => 
        array (
            'Yoku\\Ddd\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Yoku\\Ddd\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcea3d528ebfa925fdd99164be61db74c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcea3d528ebfa925fdd99164be61db74c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitcea3d528ebfa925fdd99164be61db74c::$classMap;

        }, null, ClassLoader::class);
    }
}
