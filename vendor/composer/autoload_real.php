<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitcea3d528ebfa925fdd99164be61db74c
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitcea3d528ebfa925fdd99164be61db74c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitcea3d528ebfa925fdd99164be61db74c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitcea3d528ebfa925fdd99164be61db74c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}