<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Seed default settings.
     */
    public function run(): void
    {
        $settings = [
            // General
            ['key' => 'site_name', 'value' => 'UNNES Menfess', 'group' => 'general'],
            ['key' => 'site_description', 'value' => 'Tempat anonim untuk berbagi cerita, informasi, dan pemikiran mahasiswa UNNES.', 'group' => 'general'],
            ['key' => 'site_logo', 'value' => null, 'group' => 'general'],
            ['key' => 'maintenance_mode', 'value' => 'false', 'group' => 'general'],

            // Menfess
            ['key' => 'menfess_max_length', 'value' => '1000', 'group' => 'menfess'],
            ['key' => 'menfess_cooldown_seconds', 'value' => '60', 'group' => 'menfess'],
            ['key' => 'menfess_media_max_size_mb', 'value' => '10', 'group' => 'menfess'],
            ['key' => 'trending_upvote_threshold', 'value' => '50', 'group' => 'menfess'],
            ['key' => 'pin_duration_hours', 'value' => '24', 'group' => 'menfess'],
            ['key' => 'pin_cost_points', 'value' => '100', 'group' => 'menfess'],

            // Marketplace
            ['key' => 'product_upload_fee', 'value' => '6000', 'group' => 'marketplace'],
            ['key' => 'product_max_images', 'value' => '5', 'group' => 'marketplace'],
            ['key' => 'product_promote_cost', 'value' => '10000', 'group' => 'marketplace'],
            ['key' => 'product_require_approval', 'value' => 'true', 'group' => 'marketplace'],

            // Points / Reward
            ['key' => 'points_per_post', 'value' => '5', 'group' => 'points'],
            ['key' => 'points_per_comment', 'value' => '2', 'group' => 'points'],
            ['key' => 'points_per_vote', 'value' => '1', 'group' => 'points'],
            ['key' => 'points_per_poll_vote', 'value' => '3', 'group' => 'points'],
            ['key' => 'daily_points_cap', 'value' => '50', 'group' => 'points'],

            // WhatsApp
            ['key' => 'wa_gateway_url', 'value' => '', 'group' => 'whatsapp'],
            ['key' => 'wa_gateway_token', 'value' => '', 'group' => 'whatsapp'],
            ['key' => 'wa_admin_number', 'value' => '', 'group' => 'whatsapp'],
            ['key' => 'wa_channel_id', 'value' => '', 'group' => 'whatsapp'],
            ['key' => 'wa_trending_auto_send', 'value' => 'true', 'group' => 'whatsapp'],
            ['key' => 'wa_poll_result_time', 'value' => '07:00', 'group' => 'whatsapp'],

            // Moderation
            ['key' => 'auto_moderate', 'value' => 'true', 'group' => 'moderation'],
            ['key' => 'shadow_ban_threshold_reports', 'value' => '5', 'group' => 'moderation'],
            ['key' => 'max_reports_before_hide', 'value' => '3', 'group' => 'moderation'],

            // Rules & Info
            ['key' => 'rules_content', 'value' => 'Dilarang menyebarkan konten SARA, ujaran kebencian, dan konten dewasa di platform ini.', 'group' => 'rules'],
            ['key' => 'contact_whatsapp', 'value' => '', 'group' => 'rules'],
            ['key' => 'contact_email', 'value' => '', 'group' => 'rules'],

            // Payment
            ['key' => 'payment_confirmation_wa', 'value' => '', 'group' => 'payment'],
            ['key' => 'payment_instructions', 'value' => 'Setelah transfer, kirim bukti pembayaran ke WhatsApp admin untuk dikonfirmasi.', 'group' => 'payment'],
        ];

        $now = now();

        foreach ($settings as $setting) {
            DB::table('settings')->insert(array_merge($setting, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }

        $this->command->info('✅ Settings seeded: ' . count($settings) . ' settings');
    }
}
