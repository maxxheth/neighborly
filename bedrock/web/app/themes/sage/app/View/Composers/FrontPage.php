<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class FrontPage extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'front-page',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'hero_heading' => $this->heroHeading(),
            'hero_heading_line2' => $this->heroHeadingLine2(),
            'hero_subheading' => $this->heroSubheading(),
        ];
    }

    /**
     * Retrieve the hero heading (line 1).
     *
     * @return string
     */
    public function heroHeading(): string
    {
        $heading = get_field('hero_heading');
        
        return $heading ?: 'Hi, Neighbor!';
    }

    /**
     * Retrieve the hero heading (line 2).
     *
     * @return string
     */
    public function heroHeadingLine2(): string
    {
        $heading = get_field('hero_heading_line2');
        
        return $heading ?: 'Need a hand around the house?';
    }

    /**
     * Retrieve the hero subheading/badge text.
     *
     * @return string
     */
    public function heroSubheading(): string
    {
        $subheading = get_field('hero_subheading');
        
        return $subheading ?: 'Home Services Made Simple';
    }
}
