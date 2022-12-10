import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';

window.Alpine = Alpine;

// Plugins
Alpine.plugin(collapse);

// Forms
import messageForm from './forms/message';

const items = {
  messageForm,
};

Object.keys(items).forEach((name) => {
  Alpine.data(name, items[name]);
});

Alpine.start();
