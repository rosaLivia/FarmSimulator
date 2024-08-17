import Aura from '@primevue/themes/aura';
import { definePreset } from '@primevue/themes';

const MyPreset = definePreset(Aura, {
  semantic: {
    primary: {
      50: '{amber.50}',
      100: '{amber.100}',
      200: '{amber.200}',
      300: '{amber.300}',
      400: '{amber.400}',
      500: '{amber.500}',
      600: '{amber.600}',
      700: '{amber.700}',
      800: '{amber.800}',
      900: '{amber.900}',
      950: '{amber.950}',
    }
  }
});

// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },
  css: ['assets/scss/main.scss'],
  modules: [
    '@primevue/nuxt-module',
    '@vee-validate/nuxt',
    '@nuxtjs/tailwindcss',
    'nuxt-swiper',
    "@nuxt/image",
    'radix-vue/nuxt'
  ],
  primevue: {
    options: {
        ripple: false,
        theme: {
            preset: MyPreset,
            options: {
              darkModeSelector: '.p-dark-mode',
            }
        }
    }
  },
  image: {
    domains: ['placehold.co']
  },
  compatibilityDate: '2024-07-18'
})