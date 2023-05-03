<?php declare(strict_types=1);
/**
 * WP fail2ban main file
 *
 * @package wp-fail2ban
 * @since   4.4.0.9
 */
namespace org\lecklider\charles\wordpress\wp_fail2ban;

defined('ABSPATH') or exit;

/**
 * Allow auto-updates based on semver
 *
 * Major version must match.
 * Minor version must match.
 * Patch and below are ignored.
 *
 * @since  4.4.0.9
 *
 * @param  mixed    $update
 * @param  object   $item
 *
 * @return mixed
 */
function auto_update_plugin($update, $item)
{
    if ('wp-fail2ban' == $item->slug) {
        $old_ver = explode('.', WP_FAIL2BAN_VER);
        $new_ver = explode('.', $item->new_version);

        // Only allow auto-update if Major and Minor match
        return ($old_ver[0] == $new_ver[0] && $old_ver[1] == $new_ver[1])
            ? $update // Do not force auto-update
            : false;
    }
    return $update;
}

