<?php


namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;

class MenuBuilder
{
    private $factory;

    /**
     * Add any other dependency you need...
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(array $options): ItemInterface
    {
        $menu = $this->factory->createItem('root', [
            'childrenAttributes' => [
                'class' => 'navbar-nav',
            ]
        ]);

        $menu->addChild('Home', ['route' => 'default']);
        $menu['Home']->setAttribute('class', 'navbar-item');
        $menu['Home']->setLinkAttribute('class', 'nav-link');
        $menu->addChild('Weather Data', ['route' => 'weather_data_index']);
        $menu['Weather Data']->setAttribute('class', 'navbar-item');
        $menu['Weather Data']->setLinkAttribute('class', 'nav-link');

        return $menu;
    }
}
