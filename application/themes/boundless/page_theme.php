<?php
namespace Application\Theme\Boundless;
use Concrete\Core\Page\Theme\Theme;

class PageTheme extends Theme
{
    protected $pThemeGridFrameworkHandle = 'bootstrap3';
    
    public function registerAssets()
    {
        $this->providesAsset('javascript', 'bootstrap/*');
        $this->providesAsset('css', 'bootstrap/*');
        $this->providesAsset('css', 'blocks/form');
        $this->providesAsset('css', 'core/frontend/*');
        $this->requireAsset('css', 'font-awesome');
        $this->requireAsset('javascript', 'jquery');
    }
    
    
    
    public function getThemeBlockClasses()
    {
        return array(
//            'feature' => array('feature-home-page'),
//            'image_slider' => array('slideshowContainer'),
//            'page_list' => array(
//                'recent-blog-entry',
//                'blog-entry-list',
//                'page-list-with-buttons',
//                'block-sidebar-wrapped',
//                'slideCarousel'
//            ),
//            'next_previous' => array('block-sidebar-wrapped'),
//            'share_this_page' => array('block-sidebar-wrapped'),
//            'content' => array(
//                'block-sidebar-wrapped',
//                'block-sidebar-padded',
//                'mobile-only',
//                'desktop-only'
//            ),
//            'date_navigation' => array('block-sidebar-padded'),
//            'topic_list' => array('block-sidebar-wrapped'),
//            'testimonial' => array('testimonial-bio'),
//            'image' => array(
//                'image-right-tilt',
//                'image-circle'
//            )
        );
    }

    public function getThemeAreaClasses()
    {
        return array(
//            'Main' => array('bookContainer')
        );
    }

    public function getThemeDefaultBlockTemplates()
    {
        return array(
//            'image' => 'paragraph'
        );
    }

    public function getThemeResponsiveImageMap()
    {
        return array(
//            'large' => '900px',
//            'medium' => '768px',
//            'small' => '0'
        );
    }

    public function getThemeEditorClasses()
    {
        return array(
//            array('title' => t('Title Thin'), 'menuClass' => 'title-thin', 'spanClass' => 'title-thin'),
//            array('title' => t('Title Caps Bold'), 'menuClass' => 'title-caps-bold', 'spanClass' => 'title-caps-bold'),
//            array('title' => t('Title Caps'), 'menuClass' => 'title-caps', 'spanClass' => 'title-caps'),
//            array('title' => t('Image Caption'), 'menuClass' => 'image-caption', 'spanClass' => 'image-caption'),
//            array('title' => t('Standard Button'), 'menuClass' => '', 'spanClass' => 'btn btn-default'),
//            array('title' => t('Success Button'), 'menuClass' => '', 'spanClass' => 'btn btn-success'),
//            array('title' => t('Primary Button'), 'menuClass' => '', 'spanClass' => 'btn btn-primary'),
//            array('title' => t('Lighter Text'), 'menuClass' => '', 'spanClass' => 'lightenText')
        );
    }
    
}

