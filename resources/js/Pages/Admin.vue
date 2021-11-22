<template>
    <app-layout title="Admin">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Admin
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                        <section data-section-id="4" data-category="features" data-component-id="4d2f33a1_02_awz" class="py-8 px-4">
                            <div class="flex flex-wrap -mx-4 -mb-6">
                            <div class="lg:w-1/3 px-4 mb-6">
                                <svg class="text-indigo-600 w-10 h-10" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                <h3 class="text-xl my-3 font-semibold font-heading" data-config-id="col1-header">High durability</h3>
                                <p class="text-gray-400 leading-relaxed" data-config-id="col1-desc">Forget about paper jams with our increased stability product. Ideal for high-quality printing, colour printing and photocopying.</p>
                            </div>
                            <div class="lg:w-1/3 px-4 mb-6">
                                <svg class="text-indigo-600 w-10 h-10" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                                </svg>
                                <h3 class="text-xl my-3 font-semibold font-heading" data-config-id="col2-header">Versatility</h3>
                                <p class="text-gray-400 leading-relaxed" data-config-id="col2-desc">Multi-functional paper for various office needs. Snow-white sheets will shine bright like diamond for many years.</p>
                            </div>
                            <div class="lg:w-1/3 px-4 mb-6">
                                <svg class="text-indigo-600 w-10 h-10" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                <h3 class="text-xl my-3 font-semibold font-heading" data-config-id="col3-header">Value-based price</h3>
                                <p class="text-gray-400 leading-relaxed" data-config-id="col3-desc">The best combination of quality and economy comes with Dunder Mifflin paper. The offer includes paper in wide range of density and sizes.</p>
                            </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Welcome from '@/Jetstream/Welcome.vue'
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'

    export default defineComponent({
        components: {
            AppLayout,
            Welcome,
            JetApplicationLogo,
        },
    })
</script>
