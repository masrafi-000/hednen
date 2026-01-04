<?php


function pararius_subscription_shortcode()
{
    ob_start();
?>

    <!-- Changed bg-[#181818] to bg-gray-50 so dark text and logo are visible -->
    <div class="bg-gray-50 min-h-screen flex flex-col items-center py-12 px-4">

        <!-- Main Content Area -->
        <div class="max-w-5xl w-full grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-24">

            <!-- Left Column: Logo & Payment Card -->
            <div class="flex flex-col items-center">
                <!-- Logo -->
                <div class="mb-8 flex items-center gap-1">
                    <span class="text-[#2d3e50] text-5xl font-extrabold tracking-tighter italic">pararius</span>
                    <span class="text-[#0ea5e9] text-5xl font-light leading-none">+</span>
                </div>

                <!-- Payment Card -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 w-full max-w-md text-center">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Almost done</h1>
                    <p class="text-xl font-semibold text-gray-900 mb-8">Proceed to payment</p>

                    <button class="w-full bg-[#106ba3] hover:bg-[#0d5a8a] text-white font-bold py-4 rounded-md transition-colors mb-6">
                        Activate Pararius+
                    </button>

                    <div class="text-gray-500 space-y-1">
                        <p>Try 14 days for €0,01, then €29.95 per month</p>
                        <p>Cancel anytime</p>
                    </div>
                </div>
            </div>

            <!-- Right Column: Illustration & Features -->
            <div class="flex flex-col">
                <!-- House Illustration -->
                <div class="mb-8 flex justify-start">
                    <svg width="240" height="160" viewBox="0 0 240 160" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="20" y="60" width="120" height="80" stroke="#106ba3" stroke-width="2" />
                        <rect x="40" y="80" width="30" height="40" stroke="#106ba3" stroke-width="2" />
                        <rect x="90" y="80" width="30" height="40" stroke="#106ba3" stroke-width="2" />
                        <path d="M20 60L80 20L140 60" stroke="#106ba3" stroke-width="2" />
                        <line x1="160" y1="140" x2="160" y2="40" stroke="#106ba3" stroke-width="2" />
                        <circle cx="160" cy="40" r="4" fill="#106ba3" />
                        <path d="M160 50C175 50 185 60 185 60" stroke="#106ba3" stroke-width="2" />
                        <path d="M20 60C10 60 0 70 0 70" stroke="#106ba3" stroke-width="1" opacity="0.3" />
                        <circle cx="70" cy="35" r="15" stroke="#fca5a5" stroke-width="1" stroke-dasharray="4 4" />
                    </svg>
                </div>

                <h2 class="text-4xl font-extrabold text-gray-900 leading-tight mb-8">
                    Be the first to know<br />
                    about new housing<br />
                    offers
                </h2>

                <!-- Features List -->
                <ul class="space-y-4">
                    <li class="flex items-center gap-3">
                        <div class="bg-[#22c55e] rounded-full p-1 shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="text-gray-700 text-lg">Direct notifications</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <div class="bg-[#22c55e] rounded-full p-1 shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="text-gray-700 text-lg">Insight into the number of responses</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <div class="bg-[#22c55e] rounded-full p-1 shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="text-gray-700 text-lg">Respond easily with just one click</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <div class="bg-[#22c55e] rounded-full p-1 shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="text-gray-700 text-lg">Overview, status and position of your reactions</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Trustpilot Footer Section -->
        <div class="w-full max-w-7xl flex flex-wrap items-start justify-center gap-8 border-t border-gray-200 pt-12">

            <!-- Trustpilot Main Score -->
            <div class="flex flex-col items-center text-center">
                <span class="text-2xl font-bold text-gray-800 mb-2">Excellent</span>
                <div class="flex gap-1 mb-2">
                    <div class="bg-[#00b67a] p-1"><svg class="w-6 h-6 text-white fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg></div>
                    <div class="bg-[#00b67a] p-1"><svg class="w-6 h-6 text-white fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg></div>
                    <div class="bg-[#00b67a] p-1"><svg class="w-6 h-6 text-white fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg></div>
                    <div class="bg-[#00b67a] p-1"><svg class="w-6 h-6 text-white fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg></div>
                    <div class="bg-[#d1d5db] p-1 relative overflow-hidden">
                        <div class="absolute inset-0 bg-[#00b67a] w-1/2"></div>
                        <svg class="w-6 h-6 text-white fill-current relative z-10" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                    </div>
                </div>
                <p class="text-sm text-gray-600 mb-2">Based on <span class="underline">510 reviews</span></p>
                <div class="flex items-center gap-1">
                    <svg class="w-5 h-5 text-[#00b67a] fill-current" viewBox="0 0 24 24">
                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                    </svg>
                    <span class="text-lg font-bold text-gray-800">Trustpilot</span>
                </div>
            </div>

            <!-- Reviews Carousel Container -->
            <div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Review 1 -->
                <div class="flex flex-col gap-2">
                    <div class="flex gap-1 items-center">
                        <div class="flex gap-px">
                            <div class="w-4 h-4 bg-[#00b67a]"><svg class="w-full h-full text-white fill-current p-0.5" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg></div>
                            <div class="w-4 h-4 bg-[#00b67a]"><svg class="w-full h-full text-white fill-current p-0.5" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg></div>
                            <div class="w-4 h-4 bg-[#00b67a]"><svg class="w-full h-full text-white fill-current p-0.5" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg></div>
                            <div class="w-4 h-4 bg-[#00b67a]"><svg class="w-full h-full text-white fill-current p-0.5" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg></div>
                            <div class="w-4 h-4 bg-gray-200"><svg class="w-full h-full text-white fill-current p-0.5" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg></div>
                        </div>
                        <div class="flex items-center gap-1 ml-2">
                            <div class="w-4 h-4 bg-gray-400 rounded-full flex items-center justify-center">
                                <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                                </svg>
                            </div>
                            <span class="text-[10px] text-gray-500 font-medium">Verified</span>
                        </div>
                    </div>
                    <h3 class="font-bold text-gray-900 text-sm">I could find the rental property i ...</h3>
                    <p class="text-xs text-gray-600 line-clamp-2">I could find the rental property i was lo...</p>
                    <p class="text-[10px] text-gray-400 font-medium uppercase mt-auto">Hamid, <span class="normal-case">November 8</span></p>
                </div>

                <!-- Review 2 -->
                <div class="flex flex-col gap-2">
                    <div class="flex gap-1 items-center">
                        <div class="flex gap-px">
                            <div class="w-4 h-4 bg-[#00b67a]"><svg class="w-full h-full text-white fill-current p-0.5" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg></div>
                            <div class="w-4 h-4 bg-[#00b67a]"><svg class="w-full h-full text-white fill-current p-0.5" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg></div>
                            <div class="w-4 h-4 bg-[#00b67a]"><svg class="w-full h-full text-white fill-current p-0.5" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg></div>
                            <div class="w-4 h-4 bg-[#00b67a]"><svg class="w-full h-full text-white fill-current p-0.5" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg></div>
                            <div class="w-4 h-4 bg-[#00b67a]"><svg class="w-full h-full text-white fill-current p-0.5" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg></div>
                        </div>
                        <div class="flex items-center gap-1 ml-2">
                            <div class="w-4 h-4 bg-gray-400 rounded-full flex items-center justify-center">
                                <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                                </svg>
                            </div>
                            <span class="text-[10px] text-gray-500 font-medium">Verified</span>
                        </div>
                    </div>
                    <h3 class="font-bold text-gray-900 text-sm">Fast posting time</h3>
                    <p class="text-xs text-gray-600 line-clamp-2">Best posting times. Over time we managed to understand how important is</p>
                    <p class="text-[10px] text-gray-400 font-medium uppercase mt-auto">Zlata Podlucká, <span class="normal-case">November 8</span></p>
                </div>

                <!-- Review 3 -->
                <div class="flex flex-col gap-2">
                    <div class="flex gap-1 items-center">
                        <div class="flex gap-px">
                            <div class="w-4 h-4 bg-[#00b67a]"><svg class="w-full h-full text-white fill-current p-0.5" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg></div>
                            <div class="w-4 h-4 bg-[#00b67a]"><svg class="w-full h-full text-white fill-current p-0.5" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg></div>
                            <div class="w-4 h-4 bg-[#00b67a]"><svg class="w-full h-full text-white fill-current p-0.5" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg></div>
                            <div class="w-4 h-4 bg-[#00b67a]"><svg class="w-full h-full text-white fill-current p-0.5" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg></div>
                            <div class="w-4 h-4 bg-[#00b67a]"><svg class="w-full h-full text-white fill-current p-0.5" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg></div>
                        </div>
                        <div class="flex items-center gap-1 ml-2">
                            <div class="w-4 h-4 bg-gray-400 rounded-full flex items-center justify-center">
                                <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                                </svg>
                            </div>
                            <span class="text-[10px] text-gray-500 font-medium">Verified</span>
                        </div>
                    </div>
                    <h3 class="font-bold text-gray-900 text-sm">Found my dream apartment thro...</h3>
                    <p class="text-xs text-gray-600 line-clamp-2">The premium subscription makes it 10 times easier to find a home via Pararius.</p>
                    <p class="text-[10px] text-gray-400 font-medium uppercase mt-auto">Catarina, <span class="normal-case">October 30</span></p>
                </div>
            </div>

        </div>

        <!-- Sub-footer -->
        <div class="mt-8 text-center">
            <p class="text-xs text-gray-500 font-semibold">Showing our favorite reviews</p>
        </div>

    </div>

<?php
    return ob_get_clean();
}

add_shortcode('pararius_subscription_plan', 'pararius_subscription_shortcode');
