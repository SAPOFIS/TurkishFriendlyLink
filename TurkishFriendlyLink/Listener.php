<?php

namespace TurkishFriendlyLink;

class Listener
{
    /**
     * @param \XF\Container $container
     * @param \XF\Mvc\Router $router
     * @see \XF\Mvc\Router::prepareStringForUrl()
     * @see utf8_deaccent
     * @see utf8_romanize
     */
    public static function routerPublicSetup(\XF\Container $container, \XF\Mvc\Router &$router)
    {
        global $UTF8_LOWER_ACCENTS, $UTF8_UPPER_ACCENTS, $UTF8_ROMANIZATION;

        $mapLower = [
            'o' => ['ö'],
            'c' => ['ç'],
            'g' => ['ğ'],
            's' => ['ş'],
            'u' => ['ü'],
            'a' => ['â'],
            'e' => ['ê'],
			'i' => ['ı', 'î', 'é'],
            '' => ['̉', '̣', '̃', '̀', '́'],
        ];
        foreach ($mapLower as $to => $fromMany) {
            foreach ($fromMany as $from) {
                $UTF8_LOWER_ACCENTS[$from] = $to;
            }
        }

        $mapUpper = [
            'O' => ['Ö'],
            'C' => ['Ç'],
            'G' => ['Ğ'],
            'S' => ['Ş'],
            'U' => ['Ü'],
            'A' => ['Â'],
            'E' => ['Ê'],
			'İ' => ['I', 'Î', 'Ê'],
            '' => ['̉', '̣', '̃', '̀', '́'],
        ];
        foreach ($mapUpper as $to => $fromMany) {
            foreach ($fromMany as $from) {
                $UTF8_UPPER_ACCENTS[$from] = $to;
            }
        }

         $UTF8_ROMANIZATION["TR"] = 'tr';

        $router->setRomanizeUrls(true);
    }
}
