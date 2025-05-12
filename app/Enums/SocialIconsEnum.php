<?php

namespace App\Enums;

enum SocialIconsEnum: int
{
    case TWITTER       = 0;
    case FACEBOOK      = 1;
    case GOOGLE_PLUS   = 2;
    case GOOGLE        = 3;
    case DRIBBBLE      = 4;
    case OCTOCAT       = 5;
    case GITHUB        = 6;
    case INSTAGRAM     = 7;
    case WHATSAPP      = 8;
    case SNAPCHAT      = 9;
    case FOUR_SQUARE   = 10;
    case PINTEREST     = 11;
    case RSS           = 12;
    case TUMBLR        = 13;
    case WORDPRESS     = 14;
    case REDDIT        = 15;
    case HACKER_NEWS   = 16;
    case DESIGNER_NEWS = 17;
    case YAHOO         = 18;
    case BUFFER        = 19;
    case SKYPE         = 20;
    case LINKEDIN      = 21;
    case VIMEO         = 22;
    case TWITCH        = 23;
    case YOUTUBE       = 24;
    case DROPBOX       = 25;
    case APPLE         = 26;
    case ANDROID       = 27;
    case WINDOWS       = 28;
    case HTML5         = 29;
    case CSS3          = 30;
    case JAVASCRIPT    = 31;
    case ANGULAR       = 32;
    case NODE          = 33;
    case SASS          = 34;
    case PYTHON        = 35;
    case CHROME        = 36;
    case CODEPEN       = 37;
    case MARKDOWN      = 38;
    case TUX           = 39;
    case FREEBSD_DEVIL = 40;
    case USD           = 41;
    case BITCOIN       = 42;
    case YEN           = 43;
    case EURO          = 44;

    public function icon(): string
    {
        return match($this) {
            SocialIconsEnum::TWITTER       => 'twitter',
            SocialIconsEnum::FACEBOOK      => 'facebook',
            SocialIconsEnum::GOOGLE_PLUS   => 'googleplus',
            SocialIconsEnum::GOOGLE        => 'google',
            SocialIconsEnum::DRIBBBLE      => 'dribbble',
            SocialIconsEnum::OCTOCAT       => 'octocat',
            SocialIconsEnum::GITHUB        => 'github',
            SocialIconsEnum::INSTAGRAM     => 'instagram',
            SocialIconsEnum::WHATSAPP      => 'whatsapp',
            SocialIconsEnum::SNAPCHAT      => 'snapchat',
            SocialIconsEnum::FOUR_SQUARE   => 'foursquare',
            SocialIconsEnum::PINTEREST     => 'pinterest',
            SocialIconsEnum::RSS           => 'rss',
            SocialIconsEnum::TUMBLR        => 'tumblr',
            SocialIconsEnum::WORDPRESS     => 'wordpress',
            SocialIconsEnum::REDDIT        => 'reddit',
            SocialIconsEnum::HACKER_NEWS   => 'hackernews',
            SocialIconsEnum::DESIGNER_NEWS => 'designernews',
            SocialIconsEnum::YAHOO         => 'yahoo',
            SocialIconsEnum::BUFFER        => 'buffer',
            SocialIconsEnum::SKYPE         => 'skype',
            SocialIconsEnum::LINKEDIN      => 'linkedin',
            SocialIconsEnum::VIMEO         => 'vimeo',
            SocialIconsEnum::TWITCH        => 'twitch',
            SocialIconsEnum::YOUTUBE       => 'youtube',
            SocialIconsEnum::DROPBOX       => 'dropbox',
            SocialIconsEnum::APPLE         => 'apple',
            SocialIconsEnum::ANDROID       => 'android',
            SocialIconsEnum::WINDOWS       => 'windows',
            SocialIconsEnum::HTML5         => 'html5',
            SocialIconsEnum::CSS3          => 'css3',
            SocialIconsEnum::JAVASCRIPT    => 'javascript',
            SocialIconsEnum::ANGULAR       => 'angular',
            SocialIconsEnum::NODE          => 'nodejs',
            SocialIconsEnum::SASS          => 'sass',
            SocialIconsEnum::PYTHON        => 'python',
            SocialIconsEnum::CHROME        => 'chrome',
            SocialIconsEnum::CODEPEN       => 'codepen',
            SocialIconsEnum::MARKDOWN      => 'markdown',
            SocialIconsEnum::TUX           => 'tux',
            SocialIconsEnum::FREEBSD_DEVIL => 'freebsd-devil',
            SocialIconsEnum::USD           => 'usd',
            SocialIconsEnum::BITCOIN       => 'bitcoin',
            SocialIconsEnum::YEN           => 'yen',
            SocialIconsEnum::EURO          => 'euro'
        };
    }
}
