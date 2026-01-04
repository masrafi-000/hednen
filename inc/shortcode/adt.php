<?php

function plan_section_shortcode()
{
    $plans = [
        [
            'title' => 'Summer Safety Special',
            'badge' => 'Limited Time Offer',
            'price' => '$0 Down',
            'button' => 'Claim This Offer',
            'features' => [
                'Free Security System Installation',
                'First Month Monitoring Free',
                'Wireless Doorbell Camera Included',
                '24/7 Professional Monitoring',
            ],
        ],
        [
            'title' => 'Smart Home Bundle',
            'badge' => 'Most Popular',
            'price' => '<span class="text-2xl">$</span>49.99<span class="text-2xl">/mo</span>',
            'button' => 'Get Smart Home Security',
            'features' => [
                'Complete Smart Home Security',
                'Smart Lock & Thermostat',
                'Indoor/Outdoor Camera Package',
                'Mobile App Control',
            ],
        ],
        [
            'title' => 'Senior Safety Package',
            'badge' => 'Specialized Protection',
            'price' => '<span class="text-2xl">$</span>39.99<span class="text-2xl">/mo</span>',
            'button' => 'Protect Your Loved Ones',
            'features' => [
                'Medical Alert Integration',
                'Fall Detection Sensors',
                '24/7 Emergency Response',
                'Simplified Control Panel',
            ],
        ],
    ];

    ob_start();
?>

    <div class="max-w-7xl mx-auto px-4 py-16">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold! text-[#0060AA]!! mb-4">
                Current Security Promotions
            </h1>
            <p class="text-gray-600 text-lg">
                Take advantage of these limited-time offers to secure your home
            </p>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($plans as $plan): ?>
                <div class="bg-white! rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all transform duration-400! hover:scale-105 flex flex-col h-full">

                    <div class="bg-[#0060AA] text-white! p-6 text-center">
                        <h2 class="text-2xl font-bold text-white!">
                            <?php echo esc_html($plan['title']); ?>
                        </h2>
                        <p class="font-bold">
                            <?php echo esc_html($plan['badge']); ?>
                        </p>
                    </div>

                    <div class="p-6 flex flex-col justify-between flex-1">
                        <div class="space-y-1 mb-8">
                            <?php foreach ($plan['features'] as $feature): ?>
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-[#0060AA]! flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-gray-700">
                                        <?php echo esc_html($feature); ?>
                                    </span>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="flex flex-col items-start gap-4">
                            <div class="text-3xl! font-bold! text-[#0060AA]!!">
                                <?php echo wp_kses_post($plan['price']); ?>
                            </div>

                              <button class="w-full bg-[#0060AA] border hover:bg-white! hover:border! text-white! hover:text-black! font-bold py-3 px-4 rounded-2xl! transition-all duration-400">
                             <?php echo esc_html($plan['button']); ?>
                        </button>
                            <!-- <form method="post" action="<?php echo esc_url(site_url('/add-ons')); ?>">
                                <input type="hidden" name="selected_plan" value="<?php echo esc_attr(json_encode($plan)); ?>">
                                <div type="submit"
                                    class="w-full! bg-[#0060AA] border hover:bg-white! hover:border! text-white! hover:text-black! font-bold py-3 px-4 rounded-2xl! transition-all duration-400">
                                   
                                </div>
                            </form> -->
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php
    return ob_get_clean();
}

add_shortcode('plan_section', 'plan_section_shortcode');