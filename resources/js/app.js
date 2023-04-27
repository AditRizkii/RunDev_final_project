import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import.meta.glob([
    '../assets/img/**',
    '../assets/css/**',
    '../assets/fonts/**',
    '../assets/js/**',
  ]);