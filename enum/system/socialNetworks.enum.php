<?php

namespace API\enum;

class SocialNetworks
{
    const LINKEDIN = 1;
    const FACEBOOK = 2;
    const INSTAGRAM = 4;
    const TWITTER = 3;
    const GITHUB = 5;
    const YOUTUBE = 6;
    const BEHANCE = 7;
    const DRIBBBLE = 8;
    const TIKTOK = 16;
    const THREADS = 28;
    const TELEGRAM = 11;
    const BLUESKY = 12;
    const SNAPCHAT = 13;
    const TUMBLR = 14;
    const DISCORD = 15;
    const WHATSAPP = 9;
    const FACETIME = 17;
    const GITLAB = 18;
    const MEDIUM = 19;
    const REDDIT = 20;
    const SIGNAL = 21;
    const SLACK = 22;
    const SPOTIFY = 23;
    const PINTEREST = 24;
    const TWITCH = 25;
    const YELP = 26;
    const WORDPRESS = 27;
    const GENERICO = 10;

    public static $names = [
        self::LINKEDIN => 'LinkedIn',
        self::FACEBOOK => 'Facebook',
        self::INSTAGRAM => 'Instagram',
        self::TWITTER => 'X (Twitter)',
        self::GITHUB  => 'GitHub',
        self::YOUTUBE => 'YouTube',
        self::BEHANCE => 'Behance',
        self::DRIBBBLE => 'Dribbble',
        self::TIKTOK  => 'Tiktok',
        self::THREADS => 'Threads',
        self::TELEGRAM => 'Telegram',
        self::BLUESKY => 'BlueSky',
        self::SNAPCHAT => 'SnapChat',
        self::TUMBLR  => 'Tumblr',
        self::DISCORD => 'Discord',
        self::WHATSAPP => 'Whatsapp',
        self::FACETIME => 'FaceTime',
        self::GITLAB => 'GitLab',
        self::MEDIUM => 'Medium',
        self::REDDIT => 'Reddit',
        self::SIGNAL => 'Signal',
        self::SLACK => 'Slack',
        self::SPOTIFY => 'Spotify',
        self::PINTEREST => 'Pinterest',
        self::TWITCH => 'Twitch',
        self::YELP => 'Yelp',
        self::WORDPRESS => 'WordPress',
        self::GENERICO => 'Link',
    ];

    public static $placeholder = [
        self::LINKEDIN => 'https://www.linkedin.com/in/username/',
        self::FACEBOOK => 'https://www.facebook.com/username/',
        self::INSTAGRAM => 'https://www.instagram.com/username/',
        self::TWITTER => 'https://x.com/username/',
        self::GITHUB  => 'https://github.com/username/',
        self::YOUTUBE => 'https://www.youtube.com/@username',
        self::BEHANCE => 'https://www.behance.net/username',
        self::DRIBBBLE => 'https://dribbble.com/username',
        self::TIKTOK  => 'https://www.tiktok.com/@username',
        self::THREADS => 'https://www.threads.net/@username',
        self::TELEGRAM => '+5541900000000 (somente os números)',
        self::BLUESKY => 'https://bsky.app/profile/username',
        self::SNAPCHAT => 'https://www.snapchat.com/add/username',
        self::TUMBLR  => 'https://username.tumblr.com/',
        self::DISCORD => 'https://discord.gg/your_server_id', //link para server
        self::WHATSAPP => '+5541900000000 (somente os números)',
        self::FACETIME => 'https://facetime.apple.com/join#url',
        self::GITLAB => 'https://gitlab.com/username',
        self::MEDIUM => 'https://medium.com/@username',
        self::REDDIT => 'https://www.reddit.com/r/username/',
        self::SIGNAL => '+5541900000000 (somente os números)',
        self::SLACK => 'https://join.slack.com/t/link_to_your_channel/shared_invite/code',
        self::SPOTIFY => 'https://open.spotify.com/user/user_id',
        self::PINTEREST => 'https://br.pinterest.com/username/',
        self::TWITCH => 'https://www.twitch.tv/username',
        self::YELP => 'https://www.yelp.com.br/user_details?userid=your_id',
        self::WORDPRESS => 'https://your-website.wordpress.com/',
        self::GENERICO => 'https://url.com/',
    ];

    public static $color = [
        self::LINKEDIN => 'info',
        self::FACEBOOK => 'info',
        self::INSTAGRAM => 'primary',
        self::TWITTER => 'dark',
        self::GITHUB  => 'dark',
        self::YOUTUBE => 'danger',
        self::BEHANCE => 'danger',
        self::DRIBBBLE => 'danger',
        self::TIKTOK  => 'dark',
        self::THREADS => 'dark',
        self::TELEGRAM => 'success',
        self::BLUESKY => 'info',
        self::SNAPCHAT => 'warning',
        self::TUMBLR  => 'dark',
        self::DISCORD => 'primary',
        self::WHATSAPP => 'success',
        self::FACETIME => 'success',
        self::GITLAB => 'dark',
        self::MEDIUM => 'dark',
        self::REDDIT => 'danger',
        self::SIGNAL => 'info',
        self::SLACK => 'primary',
        self::SPOTIFY => 'success',
        self::PINTEREST => 'danger',
        self::TWITCH => 'primary',
        self::YELP => 'danger',
        self::WORDPRESS => 'dark',
        self::GENERICO => 'info',
    ];

    public static $colorReal = [
        self::LINKEDIN => '#0A66C2',
        self::FACEBOOK => '#1877F2',
        self::INSTAGRAM => '#E4405F',
        self::TWITTER => '#000000',
        self::GITHUB => '#181717',
        self::YOUTUBE => '#FF0000',
        self::BEHANCE => '#1769FF',
        self::DRIBBBLE => '#EA4C89',
        self::TIKTOK => '#010101',
        self::THREADS => '#000000',
        self::TELEGRAM => '#26A5E4',
        self::BLUESKY => '#00A7E3',
        self::SNAPCHAT => '#FFFC00',
        self::TUMBLR => '#36465D',
        self::DISCORD => '#5865F2',
        self::WHATSAPP => '#25D366',
        self::FACETIME => '#28C541',
        self::GITLAB => '#FC6D26',
        self::MEDIUM => '#00AB6C',
        self::REDDIT => '#FF4500',
        self::SIGNAL => '#3A76F0',
        self::SLACK => '#611F69',
        self::SPOTIFY => '#1DB954',
        self::PINTEREST => '#E60023',
        self::TWITCH => '#9146FF',
        self::YELP => '#AF0606',
        self::WORDPRESS => '#21759B',
        self::GENERICO => '#001100',
    ];

    public static $colorText = [
        self::LINKEDIN => '#fff',
        self::FACEBOOK => '#fff',
        self::INSTAGRAM => '#fff',
        self::TWITTER => '#fff',
        self::GITHUB => '#fff',
        self::YOUTUBE => '#fff',
        self::BEHANCE => '#fff',
        self::DRIBBBLE => '#fff',
        self::TIKTOK => '#fff',
        self::THREADS => '#fff',
        self::TELEGRAM => '#fff',
        self::BLUESKY => '#fff',
        self::SNAPCHAT => '#000',
        self::TUMBLR => '#fff',
        self::DISCORD => '#fff',
        self::WHATSAPP => '#fff',
        self::FACETIME => '#fff',
        self::GITLAB => '#000',
        self::MEDIUM => '#fff',
        self::REDDIT => '#fff',
        self::SIGNAL => '#fff',
        self::SLACK => '#fff',
        self::SPOTIFY => '#fff',
        self::PINTEREST => '#fff',
        self::TWITCH => '#fff',
        self::YELP => '#fff',
        self::WORDPRESS => '#fff',
        self::GENERICO => '#fff',
    ];

    public static $icon = [
        self::LINKEDIN => '<i class="bi bi-linkedin"></i>',
        self::FACEBOOK => '<i class="bi bi-facebook"></i>',
        self::INSTAGRAM => '<i class="bi bi-instagram"></i>',
        self::TWITTER => '<i class="bi bi-twitter"></i>',
        self::GITHUB => '<i class="bi bi-github"></i>',
        self::YOUTUBE => '<i class="bi bi-youtube"></i>',
        self::BEHANCE => '<i class="bi bi-behance"></i>',
        self::DRIBBBLE => '<i class="bi bi-dribbble"></i>',
        self::TIKTOK => '<i class="bi bi-tiktok"></i>',
        self::THREADS => '<i class="bi bi-threads"></i>',
        self::TELEGRAM => '<i class="bi bi-telegram"></i>',
        self::BLUESKY => '<i class="bi bi-chat"></i>',
        self::SNAPCHAT => '<i class="bi bi-snapchat"></i>',
        self::TUMBLR => '<i class="bi bi-chat"></i>',
        self::DISCORD => '<i class="bi bi-discord"></i>',
        self::WHATSAPP => '<i class="bi bi-whatsapp"></i>',
        self::FACETIME => '<i class="bi bi-apple"></i>',
        self::GITLAB => '<i class="bi bi-git"></i>',
        self::MEDIUM => '<i class="bi bi-medium"></i>',
        self::REDDIT => '<i class="bi bi-reddit"></i>',
        self::SIGNAL => '<i class="bi bi-signal"></i>',
        self::SLACK => '<i class="bi bi-slack"></i>',
        self::SPOTIFY => '<i class="bi bi-spotify"></i>',
        self::PINTEREST => '<i class="bi bi-pinterest"></i>',
        self::TWITCH => '<i class="bi bi-twitch"></i>',
        self::YELP => '<i class="bi bi-yelp"></i>',
        self::WORDPRESS => '<i class="bi bi-wordpress"></i>',
        self::GENERICO => '<i class="bi bi-link"></i>',
    ];

    public static $iconName = [
        self::LINKEDIN => 'linkedin',
        self::FACEBOOK => 'facebook',
        self::INSTAGRAM => 'instagram',
        self::TWITTER => 'twitter-x',
        self::GITHUB => 'github',
        self::YOUTUBE => 'youtube',
        self::BEHANCE => 'behance',
        self::DRIBBBLE => 'dribbble',
        self::TIKTOK => 'tiktok',
        self::THREADS => 'threads',
        self::TELEGRAM => 'telegram',
        self::BLUESKY => 'chat',
        self::SNAPCHAT => 'snapchat',
        self::TUMBLR => 'chat',
        self::DISCORD => 'discord',
        self::WHATSAPP => 'whatsapp',
        self::FACETIME => 'apple',
        self::GITLAB => 'git',
        self::MEDIUM => 'medium',
        self::REDDIT => 'reddit',
        self::SIGNAL => 'signal',
        self::SLACK => 'slack',
        self::SPOTIFY => 'spotify',
        self::PINTEREST => 'pinterest',
        self::TWITCH => 'twitch',
        self::YELP => 'yelp',
        self::WORDPRESS => 'wordpress',
        self::GENERICO => 'link',
    ];

    public static function getName($id)
    {
        if (array_key_exists($id, self::$names)) {
            return self::$names[$id];
        }
    }

    public static function getColor($id)
    {
        if (array_key_exists($id, self::$color)) {
            return self::$color[$id];
        }
    }

    public static function getColorReal($id)
    {
        if (array_key_exists($id, self::$colorReal)) {
            return self::$colorReal[$id];
        }
    }

    public static function getColorText($id)
    {
        if (array_key_exists($id, self::$colorText)) {
            return self::$colorText[$id];
        }
    }

    public static function getIcon($id)
    {
        if (array_key_exists($id, self::$icon)) {
            return self::$icon[$id];
        }
    }
    public static function getIconName($id)
    {
        if (array_key_exists($id, self::$iconName)) {
            return self::$iconName[$id];
        }
        return 'link';
    }

    public static function getPlaceholder($id)
    {
        if (array_key_exists($id, self::$placeholder)) {
            return self::$placeholder[$id];
        }
    }
}
