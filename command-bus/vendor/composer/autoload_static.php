<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5a2ab9d89cc48a02abe775ae09601e17
{
    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/src',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->fallbackDirsPsr4 = ComposerStaticInit5a2ab9d89cc48a02abe775ae09601e17::$fallbackDirsPsr4;

        }, null, ClassLoader::class);
    }
}
